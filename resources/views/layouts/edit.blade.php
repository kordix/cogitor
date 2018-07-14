@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12"><h3>Edytuj pytanie</h3></div>
<div class="col-md-5">
<div class="form-group">
<form action="/edit/{{$question->id}}" method="post">
    {{csrf_field()}}
    {{method_field('patch')}}
    <label for="question">Pytanie (po polsku)</label>
<input type="text" name="question" class="form-control" value="{{$question->question}}">
<label for="answer">Odpowiedź (po niemiecku) </label>
<input type="text" name="answer" class="form-control" value="{{$question->answer}}">
<button type="submit" class="btn btn-primary margintop">Dodaj!</button>

</form>

</div>
</div>

</div>

@endsection
