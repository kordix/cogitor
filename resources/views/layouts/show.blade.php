@extends('layouts.app')

@section('content')
<div class="container">



<div class="col-md-12"><div class="col-md-6"><h1>Witaj w appce do nauki języka</h1></div><div class="col-md-6"><h3>Counterset: {{$operator}} {{$ile}}</h3></div> </div>
<div class="col-md-12"><div class="col-md-5">

    <div class="form-group">
<form action=" {{route('answer')}}" method="post" autofocus>
{{csrf_field()}}
<label for="question">Przetłumacz:  {{$question->question}}</label><span style="float:right">id:{{$question->id}} counter:{{$question->counter}}</span>

{{-- <label for="answer">Twoja odpowiedź</label> --}}
<input class="form-control" type="text" name="useranswer" autocomplete="off" autofocus>
<input class="form-control" name="question" value="{{$question->question}}" type="hidden">
<input class="form-control" name="answer" value="{{$question->answer}}" type="hidden">
<input class="form-control" name="id" value="{{$question->id}}" type="hidden">
{{-- <input class="form-control" name="counter" value="{{$question->counter}}" type="hidden"> --}}


<button class="btn btn-primary" style="margin-top:5px" type="submit">Zatwierdź</button>

</div>

</form>
</div>
</div>

<div class="col-md-12"><div class="col-md-5">
<br><br>
</div></div>



<div class="col-md-12">
    <form action="/delete/{{$question->id}}" method="POST">
        {{csrf_field()}}
    {{method_field('DELETE')}}

    <div class="col-md-5"><button class="btn btn-danger">Wywal</button></div>
</form>
    <div class="col-md-5"><a href="{{route('edit', $question->id)}}"><button class="btn btn-info margin">Edit</button></a>
        <a href="{{route('show', $previous)}}"><button class="btn btn-info margin">Previous</button></a>
        <a href="{{route('show', $next)}}"><button class="btn btn-success margin">Next</button></a>


    </div>
</div>

<div class="row"><div class="col-md-10">

</div>
<div class="form-group col-md-12">
    <form action="{{route('counterquestion', $question->id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('patch')}}
        <label for="counter">*Ustaw counter pytania</label>
        <input name="counter" type="number" style="width:50px">
    </form>



</div>

</div>
</div>


</div>

@endsection
