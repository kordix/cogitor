@extends('layouts.app')

@section('content')
<h2>Stwórz tag</h2>
<div class="col-md-5">

<form class="" action="{{route('tags.store')}}" method="post">
{{csrf_field()}}
<div class="form-group">

<label for="Name">Nazwa</label>
<input type="text" class="form-control" name="name" value="">
</div>

<div class="form-group">

<button type="submit" class="btn btn-primary">Zatwierdź</button>
</div>

</form>


</div>

@endsection
