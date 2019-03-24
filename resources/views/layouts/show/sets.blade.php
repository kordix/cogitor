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


<div class="form-group col-md-5">
    <p>Wyszukaj:</p>
    <input style="width:200px" type="text" class="form-control" name="" id="search" value="">
    <button type="button" name="button" class="btn-secondary">Collins</button>
    <button type="button" name="button" class="btn-success">Babla</button>
</div>
