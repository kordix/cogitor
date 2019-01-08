@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-12">


    @if($check==0)
        <h3>Źle!</h3>
    @else <h3>Dobrze!</h3>
    @endif

<h3>Pytanie: <span style="color:#333399">{{$question}}</span></h3>
<h3>Poprawna odpowiedź: <span style="color:#009966">{{$answer}}</span></h3>
@if($check==1)
<h3>Twoja odpowiedź: <span style="color:#339900">{{$useranswer}}</span></h3>
@endif
@if($check==0)
<h3>Twoja odpowiedź: <span style="color:#CC0000">{{$useranswer}}</span></h3>
@endif
<br>
<h3>Counter: {{$counter}}</h3>
<h4>Id: <a href="{{route('show',$id)}}">{{$id}}</a></h4>

</div>

<div class="col-md-12">
<div class="col-md-1"><a href="{{ URL::to( 'show/' . $next ) }}"><button type="submit" class="btn btn-success" autofocus>Next</button></a></div>


</div>
    <div class="col-md-12">
<br><br>


</div>

<br><br>
<form action="{{route('mamracje', $question2->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('patch')}}
    {{-- <label for="counter">*Ustaw counter pytania</label> --}}
    <input type="hidden" value="{{$question2->counter + 1}}" name="counter" type="number" style="width:50px">

    <button class="btn btn-warning">Mam rację</button>
</form>

<div style="margin-top:20px" class="col-md-5"><a href="{{ URL::to( 'show/' . $previous ) }}"><button type="submit" class="btn-sm btn-info">Previous</button></a></div>
<div class="col-md-1"><a href="{{ route('edit',$id)}}"><button type="submit" class="btn btn-info">Edit</button></a></div>

</div>

@endsection
