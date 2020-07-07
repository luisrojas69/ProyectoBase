<template>
	<div class="list-items">
		<div v-if="errors" class="alert alert-danger">
			<p v-for="error in errors.email">{{ error }}</p>
			<p v-for="error in errors.name">{{ error }}</p>
		</div>
	
		<div class="row">
			<div class="col-md-8">
				<items-form
					v-on:addItem="addItem()"
					v-bind:item="item"
				/>		
			</div>

			<div class="form-group col-xs-4">
				<label for="searchItems">Buscar</label>
				<input
					v-model="searchItems"
					id="searchItems"
					name="searchItems" 
					type="text" 
					class="form-control"
				>
			</div>
		</div>

		<div v-if="items.length">
			<table class="table table-stripped table-bordered">
				<thead>
					<th>Name</th>
					<th>Email</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>
					<item
						v-for="item_data in filteredItems(items)"
						v-bind:item="item_data"
						v-on:edit="edit(item_data)"
						v-on:remove="remove(item_data.id)"
					/>	
				</tbody>
			</table>
		</div>
		<div v-else>
			No existen Usuarios
		</div>

	</div>
</template>

<script>
	import Vue from 'vue';
	import API from '../../services/api';
	import Item from './Item.vue';
	import ItemsForm from './Form.vue'

	export default{
		components: {
			Item, ItemsForm
		},

		data(){
			return{
				items: [],
				item:{
					email: '',
					name: ''
				},
				errors: null,
				searchItems: ''
			}
		},

		mounted(){
			this.fetchItems();
		}
	}
</script>