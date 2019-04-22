@extends('layouts.app')

@section('content')
@foreach($tags as $tag)
<div class="row">
<div class="col-md-1">
<p>{{$tag->id}}</p>
</div>
<div class="col-md-3">
    {{$tag->name}}
</div>

<div class="col-md-2">

<form class="" action="{{route('tags.destroy', $tag->id)}}" method="post">
{{csrf_field()}}
{{method_field('delete')}}
<button type="submit" class="btn btn-danger" name="button">Usuń</button>
</form>
</div>

</div>


@endforeach

@endsection
