require('./bootstrap');

//SweetAlert
$(document).ready(function(){	
	$('.btn-delete').on('click', function(){
		let id = (this.id);
		swal = require('sweetalert');
		swal({
		  title: "Está seguro?",
		  text: "Una vez eliminado, no podra recuperar este registro!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   	$("#form-destroy-"+id).submit();
		  } else {
		    //swal("Your imaginary file is safe!");
		  }
		});


	});
});