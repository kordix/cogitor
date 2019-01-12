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
