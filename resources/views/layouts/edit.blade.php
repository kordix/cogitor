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
<label for="zdanie">Zdanie</label>
<select name="zdanie" id="">
    <option value="0" >Nie</option>
    <option value="1" @if($question->zdanie == 1 ) selected @else dupa @endif>Tak</option>
</select>
<button type="submit" class="btn btn-primary margintop">Zatwierdź</button>


</form>
<a href="{{route('edit', $next)}}"><button class="btn btn-success margintop pull-right">Next</button></a>

</div>
</div>

</div>

@endsection
