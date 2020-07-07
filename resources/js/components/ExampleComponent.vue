<template>


  <div class="list-item">
     <div v-if="errors.length" class="alert alert-danger">
        <p v-for="error in errors">{{ error.errors.email }}</p>
        <p v-for="error in errors">{{ error.errors.name }}</p>
      </div> 

    
    <form-items
      v-on:addItem="addItem()"
      @clearFields="clearFields()"
      @updateItem="updateItem(update)"
      :item="item"
      :update="update"></form-items>

    
  <!-- Tabla de Item -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Componente List Items</h3>

            <div class="box-tools">
              <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>

           
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" v-if="items.length">

          <div v-if="submitStatus === 'PENDING'" class="col-sm-7 col-xs-12 pull-right">
            <stretch-spin></stretch-spin>          
          </div>

            <table v-else class="table table-hover">
              <tbody>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Acciones</th>
              </tr>           

              <list-items @removeItem="removeItem(item)" @editItem="editItem(item)" v-for="item in items" v-bind:key="item.id" v-bind:item="item">
                  
              </list-items>
            </tbody></table>
          </div>
          <div v-else>No hay registros</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>


   </div>
</template>

<script>
  
  import ListItems from './items/ListItemsComponent.vue'
  import FormItems from './items/FormItemsComponent.vue'
  import axios from 'axios'

  //Vue-Loader Spinner
  import StretchSpin from 'vue-loading-spinner/src/components/Stretch'
   
    export default {
        components:{
          ListItems, FormItems, StretchSpin
        },
        
        data(){
          return {
            items: [],
            item:{
              email: '',
              name: ''
            },
            errors: [],
            searchUser: '',
            submitStatus:null,
            update: 0
          }
        },
        
        mounted() {
          this.getItems();
        },

        methods:{

          clearFields(){
            let me        = this;
            me.item.name  = '';
            me.item.email = '';
            me.update    = false;
          },

              //Funcion de Guardado
          addItem: function(){
            let me = this;
            let url = '../items';
            const data = {
                    name:   me.item.name,
                    email:  me.item.email
                  };
            me.errors = [];
              axios
              .post(url, data)
              .then(
              response => {
                me.clearFields();
                me.getItems();
                toastr.success('Item creado Correctamente'); //Mensaje al Usuario  
                me.errors = [];    
              }).catch(error => {
                toastr.error('Ocurrio un error al Insertar');
                me.errors.push(error.response.data)
              });
              this.submitStatus = 'PENDING'
                setTimeout(() => {
                this.submitStatus = 'OK'
              }, 1500)
          }, //Fin Funcion de Guardado


           //Funcion de Listar  
          getItems: function(){ 
            let me=this;
            let url = '../items';

            axios.get(url).then(response => {
              this.items = response.data;
              console.log(this.items);
            }).catch(function(error){
              console.log(error);
              toastr.error('Ocurrio un error al Listar');
              errors => {
                this.errors = errors.data;
              }
            });
          },

          removeItem(item){
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
                  let url = '../items/'+item.id;
                  axios.delete(url).then( response => {
                    this.getItems();
                    toastr.success('El item fue eliminado');
                  }).catch(function(error){
                    toastr.error('Ocurrió un error al eliminar');
                    console.log(error);
                  });
                } else {
                  swal("Your imaginary file is safe!");
                }
              });
          },

          editItem(item){
            let url ='../items/'+item.id+'/edit';
            this.update = item.id;
            axios.get(url).then(response => {
              this.item.name = response.data.name,
              this.item.email = response.data.email,
              console.log(this.update)
            }).catch(function(error){
              toastr.error('Ocurrió un error al datos');
              console.log(error);
            });
          },

          updateItem(update){
             let url = '../items/'+update
             let me = this;
             const data = {
                    name:   me.item.name,
                    email:  me.item.email
                  };
             axios.put(url, data).then( response => {
                this.getItems();
                this.clearFields;
                toastr.success('Edicion correcta');
             }).catch(function(error){
                toastr.error('Ocurrió un error al actualizar');
                console.log (error);
             }); 
          }

        }
    }
</script>
