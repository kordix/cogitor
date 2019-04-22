<div class="row"><div class="col-md-10">
    @foreach(App\Question::find($question->id)->tags as $tag)
    <a href="{{route('listtag',$tag->id)}}">   <button type="button" name="button" class="btn-sm btn-primary">{{$tag->name}}</button></a>

@endforeach


</div>
<div class="form-group col-md-12">
    <form action="{{route('counterquestion', $question->id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('patch')}}
        <label for="counter">*Ustaw counter pytania</label>
        <input name="counter" type="number" style="width:50px">
        <button type="submit" class="btn btn-sm" name="button">Ok</button>
    </form>
</div>
<div class="form-group col-md-12">
    <form action="{{route('answerset')}}" method="POST">
        {{csrf_field()}}
        {{method_field('patch')}}
        <label for="counter">*Tryb odpowiedzi</label>
        <select name="answerset">
            <option value="0">obcy->rodzimy</option>
        <option value="1" @if($answersetting == 1) selected @endif>rodzimy->obcy</option>
        </select>
        <button type="submit" class="btn btn-sm" name="button">ok</button>
    </form>
</div>

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


<div class="form-group col-md-5">
    <p>Wyszukaj:</p>
    <input style="width:200px" type="text" class="form-control" name="" id="search" value="">
    <button type="button" name="button" class="btn-secondary" onclick="searchcollins()">Collins</button>
    <button type="button" name="button" class="btn-success" onclick="searchbabla()">Babla</button>
</div>
