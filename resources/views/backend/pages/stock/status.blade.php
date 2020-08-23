@if ($row->status==0)
<span class="tag tag-warning" >Not Approved</span>
@elseif($row->status==1)
<span class="tag tag-primary" onClick="Stock_in_Product({{ $row->id }},{{ $row->quantity }})">Waiting For Received</span>
@else
<span class="tag tag-primary">Receieved</span>
@endif
