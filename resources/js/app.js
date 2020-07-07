/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


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


//Toastr

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "show",
  "hideMethod": "hide"
}


//Datatables

$(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,

      "language" : {
        "info" : "_TOTAL_ registros",
        "search": "Buscar",
        "paginate" : {
          "next" : "Siguiente",
          "previous" : "Anterior",
        },
        "lengthMenu" : 'Mostrar <select'>+
                    '<option value="10">10</option>'+
                    '<option value="30">30</option>'+
                    '<option value="-1">Todos</option>'+
                    '</select> registros',
        "emptyTable": "No hay datos",
        "zeroRecords" : "No hay coincidencias",
         "infoEmpty" : "",
        "infoFiltered": ""
      }
    })
  });


