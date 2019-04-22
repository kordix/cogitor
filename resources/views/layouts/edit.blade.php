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
<label for="link">Link (opcjonalne)</label>
<input type="text" name="link" value="@if($question->link=='')- @else{{$question->link}}@endif" class="form-control">



<label for="zdanie">Zdanie</label>
<select name="zdanie" id="">
    <option value="0" >Nie</option>
    <option value="1" @if($question->zdanie == 1 ) selected @else dupa @endif>Tak</option>
</select>
<select name="jezyk" id="">
    <option value="DE">DE</option>
    <option value="SP" @if($currentlanguage == 'SP') selected @endif>SP</option>
</select>
<select name="category_id" id="">
    @foreach($categories as $category)
        <option value="{{$category->id}}" @if($category->id==$question->category_id) selected @endif>{{$category->name}}</option>
    @endforeach
</select>
<select name="rodzajnik" id="">
    <option value=""> </option>
    @if($currentlanguage == 'DE')
    <option value="der">der</option>
    <option value="die">die</option>
    <option value="das">das</option>
    @endif
    @if($currentlanguage == 'SP')
        <option value="der">el</option>
        <option value="die">la</option>
    @ENDIF
</select>

<button type="submit" class="btn btn-primary margintop">Zatwierdź</button>


</form>
<a href="{{route('show', $question->id)}}"><button class="btn btn-info margintop">Przejdź</button></a>
<a href="{{route('edit', $next)}}"><button class="btn btn-success margintop pull-right">Next</button></a>

</div>
<form class="" action="{{route('tagpivot.store')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">

        <label for="tag">Dodaj tag</label>
        <input type="hidden" name="question_id" value="{{$question->id}}">
        <div class="row">

        <div class="col-md-5">

        <select class="form-control" name="tag_id" style="width:200px">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>

        <div class="col-md-5">

        <button type="submit" style="margin-left:15px">Dodaj tag</button>
    </div>

    </div>

    </div>
</form>

@foreach(App\Question::find($question->id)->tags as $tag)
<a href="{{route('listtag',$tag->id)}}">   <button type="button" name="button" class="btn-sm btn-primary">{{$tag->name}}</button></a>

@endforeach
</div>


</div>

@endsection
