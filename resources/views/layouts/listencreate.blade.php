@extends('layouts.applisten')

@section('content')

<div class="container">
<div class="col-md-5">
<div class="form-group">
<form action="{{route('listenstore')}}" method="post">
    {{csrf_field()}}
    <label for="title">Tutuł</label>
    <input name="title" type="text" class="form-control" required><br>
    <label for="question">Tekst</label>
<textarea name="content" class="form-control" required></textarea>

<button type="submit" class="btn btn-primary pull-right" style="margin-top:10px">Dodaj!</button>

</form>

</div>
</div>

</div>

@endsection
