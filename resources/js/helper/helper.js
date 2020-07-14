function setUpdateProperty(id,  propertyName){
    $('#modal').modal('show');
    $("#submit").html("<i class='fa fa-save'></i> Update "+propertyName+"");
    $("#modalLabel").html("Update "+propertyName+"");
    $("#submit").val(id);
}
function removeUpdateProperty(propertyName){
    $("#submit").html('Submit');
    $("#modalLabel").html("<i class='fa fa-save'></i> New "+propertyName+" Information");
    $("#submit").val(0);
}
function getError(errorMessage){
    $( "div" ).remove( ".text-danger" );
                for (err in errorMessage) {
                $('<div>'+errorMessage[err]+'</div>').insertAfter('#'+err).addClass('text-danger').attr('id','error');
                console.log(err);
    }
}
function successNotification() {
    $( "div" ).remove( ".text-danger" );
    swal({
        title: 'Success !',
        text: 'Thank You !',
        type: 'success',
        timer: 2000,
        confirmButtonClass: 'btn btn-primary btn-lg',
        buttonsStyling: false
    });
        // setTimeout(function() {window.location.reload();}, 600);
       setTimeout(function() {table.draw()}, 600);
}
function deleteAttribute(url, id){
    swal({
             title: "Are you sure?",
             text: "You won't be able to recover this data!",
             type: "warning",
             showCancelButton: true,
             confirmButtonText: "Yes, delete it!",
             cancelButtonText: "No, cancel!",
             closeOnConfirm: true,
             closeOnCancel: true,
         }, function(isConfirm) {
             if (isConfirm) {
                 
            //    var url = "{{url('/section/delete')}}";
            //    $.ajax({
            //        url:url+"/"+id,
            //        type:"GET",
            //        dataType:"json",
            //        success:function(data) {
            //            console.log(data)
            //            table.draw();
            //        }
            //    })


             } else {
                 swal("Cancelled", "Your imaginary file is safe :)", "error");
             }
         });

 }