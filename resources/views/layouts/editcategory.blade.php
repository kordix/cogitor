@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12"><h3>Edytuj kategorie</h3></div>
<div class="col-md-5">
<div class="form-group">
<form action="{{route('updatec', $category->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('patch')}}
    <label for="question">Pytanie (po polsku)</label>
<input type="text" name="name" class="form-control" value="{{$category->name}}">
<button type="submit" class="btn btn-primary margintop">Zatwierdź</button>
</form>


</div>
</div>

</div>

@endsection
