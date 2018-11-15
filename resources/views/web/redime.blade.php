@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-3 text-center">
          <a href="{{ route('home') }}"><img src="/img/logo00.png" class="img-fluid"></a>
        </div>
        <div class="col-md-4 text-center ml-auto">
          <h3>{{ $response }}</h3>

          <a data-fancybox data-type="ajax" class="card text-left" data-src="/code/{{ $code->id }}" href="javascript:;">
            <div class="card-body bg-warning text-white">
              @if($code->user->avatar)
                <img src="{{ $code->user->avatar }}" class="float-left mr-2 mb-2" width="50">
              @endif
              Has invitado a <strong>{{ $code->name }}</strong> para <strong>2x1</strong> en Churrisimo.
              @if(!$code->active)
                <br><small>Pero aun no ha visto tu invitación.</small>
              @endif
            </div>
          </a>
        </div>
      </div>

      @if(Auth::user()->places->count() > 0)
        @include('partials.admin')
      @endif
  </div>


@endsection
