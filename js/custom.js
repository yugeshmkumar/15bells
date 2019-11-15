function del(id) 
{ 

var result=ConfirmDelete();
if (result) {

  var dataString = 'id='+id;     
$.ajax({ 
type: "POST", 
url: "deleteajax", 
data: dataString, 
cache: false, 
success: function(result){ 
 
} 
});

} 
}

function ConfirmDelete() {
  return confirm("Are you sure you want to delete?");
}

function edt1(id)
{
  var dataString = 'id='+id;     
$.ajax({ 
type: "POST", 
url: "editajax", 
data: dataString, 
cache: false, 
success: function(result){ 
} 
});
}




function edt(id) {
    if ( 'undefined' != typeof id ) {

  var dataString = 'id='+id;
    $.getJSON('editajax?id=' + id, function(obj) 
    {
    $('#id').val(obj[0].id);
    $('#email').val(obj[0].email);
    $('#u1').val(obj[0].username);
   // $('#number').val(obj[0].username);
   $('#pass').val(obj[0].password_hash);
    $('#edit-modal').modal('show')
    }


).fail(function() { alert('Unable to fetch data, please try again later.') });
    } else alert('Unknown row id.');
    }


