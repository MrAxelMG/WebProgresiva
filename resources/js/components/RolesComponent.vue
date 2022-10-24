<template>
  <div class="container">
    <h1>Roles</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="role in roles" :key="role.id">
        <td>{{role.id}}</td>
        <td>{{role.name}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props:{
    roles:{
      type:Object,
      required:true
    }
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>

