@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{route('storecategory')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Dodaj kategorie</label>
            <input type="text" name="name" placeholder="nazwa kategorii">
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </div>
    </form>
</div>

@endsection
