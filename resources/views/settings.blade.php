@extends('layouts.app')

@section('content')
    <div class="col-md-5 pt-2">

<form class="" action="{{route('updatesettings')}}" method="post">
{{csrf_field()}}
{{method_field('PATCH')}}
<div class="form-group">
    <label for="language">Język</label>

    <select class="form-control" name="language">
        <option value="DE">Niemiecki</option>
        <option value="SP" @if($settings->language == "SP") selected @endif>Hiszpański</option>
    </select>

</div>

<div class="form-group">
    <label for="counter">Counter</label>;
<select name="operator" id=""><option value="<"> < </option><option value=">"> > </option></select>
<input class="" style="width:50px" type="number" name="counterinput" value="{{$settings->counterset}}" placeholder="">
</div>

<div class="form-group">

<label for="counter">*Tryb odpowiedzi</label>
<select name="answerset">
    <option value="0">obcy->rodzimy</option>
<option value="1" @if($settings->answersetting == 1) selected @endif>rodzimy->obcy</option>
</select>
</div>

<div class="form-group">

<label for="">Zdania</label>
<select class="" name="sentences">
    <option value="0">NIE</option>
    <option value="1" @if($settings->sentences == 1) selected @endif)>TAK</option>
</select>
</div>


<label for="category">Kategorie</label>
<select class="form-control"  name="category" id="" style="width:200px">
    <option value="0") >Nie patrz na kategorie</option>
    <option value="1" @if($settings->category==1) selected @endif) >Bez kategorii</option>
    @foreach($categories as $category) <option value="{{$category->id}}" @if($settings->category==$category->id) selected @endif)>{{$category->name}}</option> @endforeach
</select>
<div class="form-group">

<button type="submit" class="btn btn-primary" style="margin-top:5px" name="button">Zatwierdź</button>
</div>

</form>
</div>



@endsection
