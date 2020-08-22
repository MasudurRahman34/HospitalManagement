
@if ($row->status==0)
<span class="tag tag-warning" onClick="btnApprove({{ $row->id }})">Not Approved</span>
@elseif($row->status==1)
<span class="tag tag-primary" onClick="btnPayBill({{ $row->id }})">Pay Bill</span>
@else
<span class="tag tag-primary">Paid</span>
@endif
