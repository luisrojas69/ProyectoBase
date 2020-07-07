<template>
   <tr class="item"> 
      <td>{{ item.id }}</td>
      <td>{{ item.name }}</td>
      <td>{{ item.email }}</td>
      <td>
      	<button class="btn btn-sm btn-info" :id="item.id" @click="$emit('editItem', item.id)">
      		<i class="fa fa-pencil"></i>
      	</button>

      	<button class="btn btn-sm btn-danger" :id="item.id" @click="$emit('removeItem', item.id)">
      		<i class="fa fa-trash"></i>
      	</button>
      </td>
   </tr>
</template>

<script>
  export default{
    props: ['item'],
  }
</script>