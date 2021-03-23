<script>
		  function deleteFile(userId,arg){
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:'fileDelete/'+userId,
      type:'get',
      success:function(response){
         swal("Success","Record Successfully Deleted","success");
         $(arg).closest('tr').remove();
         $.each($('#fileTable tbody tr'),function(key,value){
          $(this).find('td:first-child').html(key+1);
         })
      }
    })
  } 
}); 
}
</script>