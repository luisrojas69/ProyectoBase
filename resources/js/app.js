require('./bootstrap');

//SweetAlert
$(document).ready(function(){	
	$('.btn-delete').on('click', function(){
		let id = (this.id);
		swal = require('sweetalert');
		swal({
		  title: "Está seguro? "+id,
		  text: "Una vez eliminado, no podra recuperar este registro!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   	$("#form-edit").submit();
		  } else {
		    swal("Your imaginary file is safe!");
		  }
		});


	});
});