<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use App\User;
use App\Code;
use Auth;
use Mail;

class WebController extends Controller
{
  public function index(Request $request) {
    $autoCode = null;
    if($request->code) {
      $autoCode = Code::where('id', $request->code)->where('user_id', Auth::user()->id)->first();
    }
    $activateCodes = Code::where('email', Auth::user()->email)->where('active', false)->get();
    //dd($activateCodes);
    foreach($activateCodes as $activeCode) {
      $activeCode->active = true;
      $activeCode->save();
    }
    return view('web.index', compact('autoCode'));
  }
  public function invite(Request $request) {

    //valida code
    $valCode = Code::where('email', $request->email)->where('user_id', Auth::user()->id)->first();
    if($valCode || $request->email == Auth::user()->email) {
      return redirect()->route('home');
    }
    $code = new Code;
    $code->user_id = Auth::user()->id;
    $code->code = strtoupper(str_random(6));
    $code->name = $request->name;
    $code->email = $request->email;
    $code->save();

    // create Image from file
    $img = Image::make('uploads/tag.jpg');
    if(!empty(Auth::user()->avatar)) {
      $img->insert(Auth::user()->avatar, 'center-top', 0, 420);
    }
    $img->text(Auth::user()->name, 550, 540, function($font) {
        $font->file('uploads/roboto.ttf');
        $font->size(50);
        $font->color('#808080');
        $font->align('center');
        $font->valign('top');
    });
    $img->save('uploads/code-'.$code->id.'.jpg');


    Mail::send('emails.taggea', ['code' => $code], function ($m) use ($code) {
        $m->from('invitacion@tuchurrisimo.com', 'Tu Churrisimo');
        $m->to($code->email, $code->name)->subject('Hey, '.$code->user->name.' te ha invitado');
    });

    return redirect()->route('home', ['code'=>$code->id]);
  }
  public function code($id) {
    $code = Code::findOrFail($id);
    //activate code
    if($code->email == Auth::user()->email) {
      $code->active = true;
      $code->save();
    }
    return view('web.code', compact('code'));
  }
  public function taggea($id) {
    $code = Code::findOrFail($id);
    return view('web.taggea', compact('code'));
  }
  public function politicas() {
    return view('web.politicas');
  }
  public function redimir(Request $request) {
    $code = Code::where('code', $request->code)->first();
    if(!$code) { $response = 'Codigo no existe'; }
    elseif($code->active == false) { $response = 'Codigo ya aun no ha sido confirmado'; }
    elseif($code->redimed_place_id > 0) { $response = 'Codigo ya fue redimido'; }
    else {
      $code->redimed_place_id = $request->redimed_place_id;
      $code->redimed_at = date('Y-m-d H:i:s');
      $code->save();
      $response = 'Redimido correctamente';
    }
    return view('web.redime', compact('code', 'response'));
  }
}
