<template>
    <!-- Componente Form Items -->
     <div class="row">
        <div class="col-xs-12">
           <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Componente Form Items</h3>
                </div>
                
                <div class="box-body">
                  <div class="box-body">

                    <div class="row">
                      <form novalidate method="post" @submit.prevent="update != 0 ? $emit('updateItem', update) : $emit('addItem')">
                        <div class="form-group col-lg-4 col-xs-12">
                          
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input 
                              v-model="item.name"
                              name="name" 
                              type="text" 
                              class="form-control" 
                              placeholder="Nombre">   
                          </div>
                        <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                       <ValidationProvider name="email" rules="required|email">
                          <div slot-scope="{ errors }">
                            <div class="form-group col-lg-4 col-xs-12 input-group" >
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input v-model="item.email" type="email" class="form-control" placeholder="Email">
                            </div>
                            <p>{{ errors[0] }}</p>
                          </div>  
                        </ValidationProvider>

                        <ValidationProvider name="email" rules="required|email">
                          <div class="
                            form-group col-lg-4 col-xs-12 input-group" slot-scope="{ errors }"
                            :class="errors.length ? 'has-error': 'has-success'">
                            <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->
                            <input 
                              type="text" 
                              class="form-control" 
                              id="inputError" 
                              placeholder="Enter email"
                              v-model="item.email">
                            <div>
                              <span class="help-block">{{ errors[0] }}</span>
                            </div>
                          </div>
                        </ValidationProvider>

                        <div class="form-group col-md-2 col-xs-12">
                            <div class="input-group">
                              <button v-bind:update="update" v-if="update != 0" type="submit" class="btn btn-warning btn-block" id="item">Editar</button> 
                              <button v-show="item.name && item.email" v-bind:update="update" v-else type="submit" class="btn btn-info btn-block" id="item">Guardar</button> 
                            </div>
                        </div>

                        <div class="form-group col-md-2 col-xs-12">
                            <div class="input-group pull-left">
                              <button type="button" @click="$emit('clearFields')" class="btn btn-block">Cancelar</button>
                            </div>
                        </div>

                      </form>
                    </div>
                    <!-- /.row -->
                  </div>

                </div>
                <!-- /.box-body -->
          </div> 
        </div>
    </div>
    <!--FIN Componente Form Items -->
</template>

<script>
    //Vee-validate
    import { extend } from 'vee-validate';
    import { ValidationProvider } from 'vee-validate';
    import { required } from 'vee-validate/dist/rules';
    import { email } from 'vee-validate/dist/rules';
    
    // Add the required rule
    extend('required', {
      ...required,
      message: 'Este campo es requerido'
    });

    extend('email', {
      ...email,
      message: 'Email no valido'
    });

    export default {
        props:['item', 'update'],

        components:{
          ValidationProvider
        },
    }
</script>
