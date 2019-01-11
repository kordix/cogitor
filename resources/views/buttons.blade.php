@foreach($randoms as $id => $random)
<div id="przyciski" class="col-md-2"><button @click="pipa" class="btn" id={{"button".$loop->index}} avalue="{{$random}}">{{$random}}</button></div>
@endforeach
