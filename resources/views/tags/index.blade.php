@extends('layouts.app')

@section('content')
@foreach($tags as $tag)
<p>{{$tag->id}}-{{$tag->name}}</p>
@endforeach

@endsection
