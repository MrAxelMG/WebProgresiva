<template>
  <div class="container">
    <h1>Usuarios</h1>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.nombre }}</td>
          <td>{{ user.apellidop }}</td>
          <td>{{ user.apellidom }}</td>
          <td>{{ user.email }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
  
  <script>
export default {
  props: {
    roles: {
      type: Object,
      required: true,
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
  
  