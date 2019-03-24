@extends('layouts.app')

@section('content')
@foreach($tagpivots as $tagpivot)
<p>{{$tagpivot->question_id}}-{{$tagpivot->tag_id}}</p>
@endforeach

@endsection
