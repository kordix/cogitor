@extends('layouts.applisten')

@section('content')

<div class="container">
<div class="col-md-5">
<div class="form-group">
    <h4>Edytuj fiszke id: <a href="{{route('listenshow', $question->id)}}">{{$question->id}}</a></h4>
<form action="{{route('listenedit', $question->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('PATCH')}}
<label for=title"">Tytuł</label>
    <input type="text" name="title" placeholder="tytuł" class="form-control" value="{{$question->title}}">

    <label for="question">Tekst</label>
<textarea name="content" class="form-control" placeholder="tekst" required>{{$question->content}}</textarea>
<button type="submit" class="btn btn-primary pull-right" style="margin-top:10px">Edytuj!</button>


</form>
<a href="{{route('listenedit',$next)}}"><button class="btn btn-success">Next</button></a>
</div>
</div>

</div>

@endsection
