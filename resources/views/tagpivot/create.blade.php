@extends('layouts.app')

@section('content')
<h2>Stwórz przypisanie tagu</h2>
<div class="col-md-5">

<form class="" action="{{route('tagpivot.store')}}" method="post">
{{csrf_field()}}
<div class="form-group">

<label for="Name">Id pytania</label>
<input type="text" class="form-control" name="question_id" value="">
</div>

<div class="form-group">

<label for="Name">Id tagu</label>
<input type="text" class="form-control" name="tag_id" value="">
</div>


<div class="form-group">

<button type="submit" class="btn btn-primary">Zatwierdź</button>
</div>

</form>


</div>

@endsection
