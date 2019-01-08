@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-5">
<div class="form-group">
<form action="{{route('store')}}" method="post">
    {{csrf_field()}}
    <label for="question">Pytanie (po polsku)</label>
<input type="text" name="question" class="form-control" required>
<label for="answer">Odpowiedź (po   @if($currentlanguage == 'SP') hiszpańsku @else niemiecku @endif ) </label>
<input type="text" name="answer" class="form-control" required>
<button type="submit" class="btn btn-primary pull-right" style="margin-top:10px">Dodaj!</button>

<label for="zdanie">Zdanie:</label>
<select name="zdanie" id="">
    <option value="0">Nie</option>
    <option value="1" @if($sentencesetting == 1) selected @endif>Tak</option>
</select>
<label for="zdanie">Język</label>
<select name="jezyk" id="">
    <option value="DE" >DE</option>
    <option value="SP" @if($currentlanguage == 'SP') selected @endif>SP</option>
</select>
<select name="category_id" id="">
    @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
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

</form>

</div>
</div>

</div>

@endsection
