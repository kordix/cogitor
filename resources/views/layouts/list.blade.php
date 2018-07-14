@extends('layouts.app')


@section('content')
<div class="container">

<table>
@foreach($rows as $row)
<tr>
    <td class="col-md-5"><a href="{{route('show', $row->id)}}">{{$row->question}}</a></td>
    <td class="col-md-1">{{$row->counter}}</td>

    <td class="col-md-5">{{$row->answer}}</td>
</tr>



@endforeach
</table>
</div>
@endsection
