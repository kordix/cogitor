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
<button type="submit" class="btn btn-primary">Dodaj!</button>

</form>

</div>
</div>

</div>

@endsection
