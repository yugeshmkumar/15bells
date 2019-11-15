$(function(){
   
   $('#modalButton').click(function(e){

      e.preventDefault();
      $('#modal').modal('show');
       
       $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
       
   });
});
