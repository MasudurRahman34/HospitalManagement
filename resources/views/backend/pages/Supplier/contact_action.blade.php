<ul class="list-group list-group-flush">
@foreach ($supplier->contactPerson as $value)

<li class="list-group-item"><div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-secondary waves-effect waves-light" onClick="btnContactEdit({{ $value->id }})"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-secondary waves-effect waves-light" onClick="btnContactDelete({{ $value->id }})"><i class="fa fa-trash-o"></i></button>
</div></li>
@endforeach
</ul>