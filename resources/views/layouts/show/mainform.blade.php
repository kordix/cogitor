<div class="col-md-12"><div class="col-md-5">
<div class="form-group">
<form id="myForm" action="{{route('answer')}}" method="post" autofocus>
{{csrf_field()}}
<p >Kategoria: <span style="font-weight:bold">{{$categories->find($question->category_id)['name']}}</p></span>
<label for="question" style="font-size:20px">Przetłumacz: @if($answersetting==0){{$question->answer}} @else {{$question->question}} @endif</label><span style="float:right">id:{{$question->id}} counter:{{$question->counter}}</span>

{{-- <label for="answer">Twoja odpowiedź</label> --}}
<input class="form-control" type="text" id="useranswer" name="useranswer" autocomplete="off" autofocus>
<input class="form-control" name="question" value="{{$question->question}}" type="hidden">
<input class="form-control" name="answer" value="{{$question->answer}}" type="hidden">
<input class="form-control" name="id" value="{{$question->id}}" type="hidden">
{{-- <input class="form-control" name="counter" value="{{$question->counter}}" type="hidden"> --}}


<button class="btn btn-primary" style="margin-top:5px" id="apply" type="submit">Zatwierdź</button>

@if($currentlanguage=='DE')
<a target="_blank" class="pull-right" href="https://pl.bab.la/koniugacja/niemiecki/{{$question->answer}}">&nbsp;babla</a>  <a target="_blank" href="https://www.collinsdictionary.com/dictionary/german-english/{{$question->answer}}" class="pull-right">Collins</a>
@endif

@if($currentlanguage=='SP')
<a target="_blank" class="pull-right" href="https://pl.bab.la/koniugacja/hiszpanski/{{$question->answer}}">&nbsp;babla</a>  <a target="_blank" href="https://www.collinsdictionary.com/dictionary/spanish-english/{{$question->answer}}" class="pull-right">Collins</a>
@endif

</div>

 </form>
</div>
</div>

<div class="col-md-12 mb-2">
<form action="{{route('delete',$question->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('DELETE')}}

    <div class="col-md-5"><button class="btn btn-danger">Wywal</button></div>
</form>
    <div class="col-md-5"><a href="{{route('edit', $question->id)}}"><button class="btn btn-info margin">Edit</button></a>
        <a href="{{route('show', $previous)}}"><button class="btn btn-info margin">Previous</button></a>
        <a href="{{route('show', $next)}}"><button class="btn btn-success margin">Next</button></a>


    </div>
</div>
