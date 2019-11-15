function me(s,check,p)
{
	
  var dataString = 'check='+s + '&t1='+check + '&pid='+p ;	
$.ajax({
type: "GET",
url: "transaction/changestatus",
data: dataString,
cache: false,
success: function(result){


}
});
}