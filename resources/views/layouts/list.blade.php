@extends('layouts.app')


@section('content')
<div class="container">

<table>
@foreach($rows as $row)
<tr><td><a href="{{route('show', $row->id)}}">{{$row->question}}</a></td>
    <td>{{$row->counter}}</td>
<td>{{$row->answer}}</td>
</tr>



@endforeach
</table>
</div>
@endsection
