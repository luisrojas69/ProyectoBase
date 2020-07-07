<template>
  <form id="registerForm" method="POST" @submit.prevent="validateBeforeSubmit">
    <fieldset>
        <legend>Mi formulario con Vuejs 2</legend>
        <div class="form-group col-xs-3 col-md-2">
            <label for="firstname" class="control-label">Nombre</label>
            <input
                v-model="firstname"
                name="firstname"
                class="form-control"
                id="firstname"
                placeholder="Nombre"
                v-validate="'required'"
                :class="{'has-errors': errors.has('firstname')}"
            >
            <FormError :attribute_name="'firstname'" :errors_form="errors"> </FormError>
        </div>
        <div class="form-group col-xs-3 col-md-2">
            <label for="lastname" class="control-label">Apellidos</label>
            <input
                v-model="lastname"
                name="lastname"
                class="form-control"
                id="lastname"
                placeholder="Apellidos"
                v-validate="'required'"
                :class="{'has-errors': errors.has('lastname')}"
            >
            <FormError :attribute_name="'lastname'" :errors_form="errors"> </FormError>
        </div>
        <div class="form-group col-xs-3 col-md-2">
            <label for="email" class="control-label">Email</label>
            <input
                v-model="email"
                name="email"
                class="form-control"
                id="email"
                placeholder="Email"
                v-validate="'required|email'"
                :class="{'has-errors': errors.has('email')}"
            >
            <FormError :attribute_name="'email'" :errors_form="errors"> </FormError>
        </div>
        <div class="form-group col-xs-3 col-md-2">
            <label for="password" class="control-label">Password</label>
            <input
                type="password"
                v-model="password"
                name="password"
                class="form-control"
                id="password"
                placeholder="Password"
                v-validate="'required|min:6'"
                :class="{'has-errors': errors.has('password')}"
            >
            <FormError :attribute_name="'password'" :errors_form="errors"> </FormError>
        </div>
        <div class="form-group col-xs-3 col-md-2">
            <label for="password_confirmation" class="control-label">Confirma el password</label>
            <input
                type="password"
                v-model="password_confirmation"
                name="password_confirmation"
                class="form-control"
                id="password_confirmation"
                placeholder="Confirma el password"
                v-validate="'required|confirmed:password'"
                :class="{'has-errors': errors.has('password_confirmation')}"
            >
            <FormError :attribute_name="'password_confirmation'" :errors_form="errors"> </FormError>
        </div>
        <div class="form-group">
            <div class="col-md-2 col-xs-12 col-sm-3 pull-right">
                <button type="submit" name="register" class="btn btn-block btn-primary">
                    Registrarme
                </button>
            </div>
       </div>
    </fieldset>
  </form>
</template>

<script>
    import FormError from '../FormError';
    export default {
        name: "form-component",
        components: {
            FormError
        },
        data () {
            return {
                firstname: null,
                lastname: null,
                email: null,
                password: null,
                password_confirmation: null
            }
        },
        methods: {
            validateBeforeSubmit: function() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        alert('From Submitted!');
                        return;
                    }
                    //errores
                });
            }
        }
    }
</script>