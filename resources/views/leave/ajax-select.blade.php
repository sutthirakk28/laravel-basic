<option>--- Select State ---</option>
@if(!empty($states))
  @foreach($states as $key)
    <option value="{{ $key->id }}">{{ $value->id }}</option>
  @endforeach
@endif