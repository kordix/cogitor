<div class="row">
<div class="col-md-12">
@foreach($randoms as $id => $random)
<div id="przyciski" class="col-md-2 col-xs-4">
    <button class="btn mb-1" id={{"button".$loop->index}} avalue="{{$random}}">{{$random}}</button>
</div>
@endforeach
</div>
</div>
