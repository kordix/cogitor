@extends('layouts.app')


@section('content')
<div class="container">

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        <button type="submit">Logout</button>
        {{ csrf_field() }}
    </form>

<table>
@foreach($rows as $row)
<tr>
    <td class="col-md-3"><a href="{{route('show', $row->id)}}">{{$row->question}}</a></td>
    <td class="col-md-2">{{$categories->find($row->category_id)['name']}} </td>

    <td class="col-md-1">{{$row->counter}}</td>

    <td class="col-md-5">{{$row->answer}}</td>
</tr>



@endforeach
</table>
</div>
@endsection
