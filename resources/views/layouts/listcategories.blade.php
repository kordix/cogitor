@extends('layouts.app')


@section('content')
<div class="container">
<table>
@foreach($categories as $category)
<tr>
    <td class="col-md-3"><a href="">{{$category->name}}</a></td><td class="col-md-3"><a href="{{route('editc',$category->id)}}">Edytuj</a></td>
    <td class="col-md-3"><form action="{{route('deletec',$category->id)}}" method="post">{{csrf_field()}}{{method_field('DELETE')}} <button class="btn btn-sm btn-danger">Usuń</button></form></td>
</tr>



@endforeach
</table>
</div>
</div>
@endsection
