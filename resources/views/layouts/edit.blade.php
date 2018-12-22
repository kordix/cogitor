@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-12"><h3>Edytuj pytanie</h3></div>
<div class="col-md-5">
<div class="form-group">
<form action="{{route('edit', $question->id)}}" method="post">
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
<select name="jezyk" id="">
    <option value="DE">DE</option>
    <option value="SP">SP</option>
</select>
<select name="category_id" id="">
    @foreach($categories as $category)
        <option value="{{$category->id}}" @if($category->id==$question->category_id) selected @endif>{{$category->name}}</option>
    @endforeach
</select>
<button type="submit" class="btn btn-primary margintop">Zatwierdź</button>


</form>
<a href="{{route('show', $question->id)}}"><button class="btn btn-info margintop pull-right">Przejdź</button></a>
<a href="{{route('edit', $next)}}"><button class="btn btn-success margintop pull-right">Next</button></a>

</div>
</div>

</div>

@endsection
