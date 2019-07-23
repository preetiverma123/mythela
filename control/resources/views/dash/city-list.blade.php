<option value="">Select City</option>
@foreach($clist as $clist_p)
<option value="{{$clist_p->id}}">{{$clist_p->name}}</option>
@endforeach