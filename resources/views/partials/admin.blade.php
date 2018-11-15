<form action="{{ route('redimir') }}" method="POST" class="form-inline">
  @csrf
  <input type="text" name="code" class="form-control" placeholder="Código" required>
  <select name="redimed_place_id" class="form-control">
    @foreach(Auth::user()->places as $place)
      <option value="{{ $place->id }}">{{ $place->name }}</option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-warning">Redimir</button>
</form>
<table class="table table-warning">
  <tr>
    <th>Código</th>
    <th>Usuario</th>
    <th>Invito a</th>
    <th>Redimido en</th>
    <th>Fecha</th>
  </tr>
  @foreach(Auth::user()->places as $place)
    @foreach($place->codes as  $code)
    <tr>
      <td>{{ $code->code }}</td>
      <td>
        {{ $code->user->name }}<br>
        <small>{{ $code->user->email }}</small>
      </td>
      <td>
        {{ $code->name }}<br>
        <small>{{ $code->email }}</small>
      </td>
      <td>
        {{ $code->place ? $code->place->name : '' }}<br>
        {{ $code->redimed_at }}
      </td>
      <td>{{ $code->created_at }}</td>
    </tr>
    @endforeach
  @endforeach
</table>
