<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">

</head>
<body>
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add File
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Avatar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="backend" method="post" enctype="multipart/form-data">
  <div class="form-group">
  	@csrf
    <label for="avatar_name">Avatar:</label>
    <input type="file"  name="avatar_name" class="form-control" id="avatar_name">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<table class="table" id="fileTable">
  <thead>
    <tr>
    <th>Id</th>
    <th>Avatar</th>
    <th>Date</th>
    <th>Delete</th>
    <th>Download</th>
    </tr>
  </thead>
  <tbody>
    @foreach($file as $key=> $image)
    <tr>
      <td>{{$key+1}}</td>
      <td><img src="{{asset('storage/avatar/'.$image->avatar_name)}}" height="100px" width="100px"></td>
      <td>{{$image->created_at}}</td>
      <td><a onclick="deleteFile('{{$image->id}}',this)" class="btn btn-primary">Delete</a></td>
      <td><a href="downloadAvatar/{{$image->avatar_name}}" class="btn btn-primary">Download</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
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
</html>