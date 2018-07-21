@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-5">
<div class="form-group">
<form action="{{route('store')}}" method="post">
    {{csrf_field()}}
    <label for="question">Pytanie (po polsku)</label>
<input type="text" name="question" class="form-control">
<label for="answer">Odpowiedź (po niemiecku) </label>
<input type="text" name="answer" class="form-control">
<label for="zdanie">Zdanie:</label>
<select name="zdanie" id="">
    <option value="0">Nie</option>
    <option value="1">Tak</option>
</select>
<button type="submit" class="btn btn-primary pull-right" style="margin-top:10px">Dodaj!</button>

</form>

</div>
</div>

</div>

@endsection
