@extends('layouts.app')

@section('content')
    <div class="col-md-6"><h1>Witaj w aplikacji do nauki języka</h1></div>

    @include('layouts.show.buttons')
    @include('layouts.show.toprow')
    @include('layouts.show.mainform')
    @include('layouts.show.sets')


    {{-- <button id="TEST" avalue="costam" class="btn btn-primary">TEST</button> --}}
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/find.js')}}">

    </script>
    <script>
    let wartosc;
    for(let i=0;i<5;i++){
        document.getElementById('button'+i).addEventListener("click",function(ev){
        wartosc = ev.target.getAttribute('avalue');
        document.getElementById('useranswer').value=wartosc;
        document.forms['myForm'].submit();
        });
    }


    </script>

@endsection
