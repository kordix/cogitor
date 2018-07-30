@extends('layouts.applisten')


@section('content')
<div class="container">

<table>
        <thead><td>tytuł</td><td>id</td><td>counter</td></thead>
@foreach($rows as $row)

<tr>
    <td class="col-md-5">{{$row->title}}</td>
    <td class="col-md-1"><a href="{{route('listenshow', $row->id)}}">{{$row->id}}</a></td>
    <td class="col-md-1">{{$row->counter}}</td>
</tr>



@endforeach
</table>
</div>
@endsection
