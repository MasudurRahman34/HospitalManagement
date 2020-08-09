<ul class="list-group list-group-flush"><li class="list-group-item"><div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-secondary waves-effect waves-light" onClick="btnEdit({{ $row->id }})"><i class="fa fa-edit"></i></button>
    <button type="button" class="btn btn-secondary waves-effect waves-light" onClick="btnDelete({{ $row->id }})"><i class="fa fa-trash-o"></i></button>
</div></li>
</ul>