@extends('layouts.applisten')


@section('content')
<div class="container">
<div class="col-md-12">
    <div class="col-md-5">
        <h4>Fiszka słuchowa nr {{$question->id}}</h4>
        tu będą fiszki słuchowe
        <input id="listen"  type='button' value='🔊 Play' />
        <a href="{{route('listenshow', $next)}}"><button class="btn btn-success">Next</button></a>
        <br><br>
        <div class="well" id="answer" style="display:none">{{$question->content}}</div>
        <button id="toggledisplaybutton" class="btn btn-default" >Pokaż/ukryj odpowiedź</button>
    </div>
    <div class="col-md-5">
        <h3>Counterset: {{$operator}} {{$ile}}</h3>
    </div>

    </div>
</div>
@endsection



@section('scripts')
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>2
<script>document.getElementById('listen').addEventListener("click", function(){responsiveVoice.speak("{{ html_entity_decode($content2)}}")});</script>
<script>
function myFunction() {
    var x = document.getElementById("answer");
    if (x.style.display === "none") {
        x.style.display = "block";
        console.log('fsadfsd');
    } else {
        x.style.display = "none";
        console.log('fsadfsd');

    }
}

document.getElementById("toggledisplaybutton").addEventListener("click", myFunction);

</script>

@endsection
