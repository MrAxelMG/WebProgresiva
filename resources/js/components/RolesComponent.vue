<template>
  <div class="">
    <div class="my-2">
      <button type="button" class="btn btn-info btn-md" @click="addFormModal">
        <i class="fas fa-fw fa-plus"></i>
        Agregar
      </button>
    </div>

    <table
      class="table table-responsive-lg text-center table-striped table-bordered"
    >
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="role in rolesTable" :key="role.id">
          <td>{{ role.id }}</td>
          <td>{{ role.name }}</td>
          <td>
            <button
              type="button"
              class="btn btn-success btn-sm"
              @click="editFormModal(role)"
            >
              <i class="fas fa-fw fa-edit"></i>
              Editar
            </button>
            <button
              type="button"
              class="btn btn-danger btn-sm"
              @click="openModal"
            >
              <i class="fas fa-fw fa-trash"></i>
              Eliminar
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <div
      class="modal fade"
      ref="exampleModal"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
              <span v-if="Type == 'add'">Agregar rol</span>
              <span v-else>Editar rol</span>
            </h5>
            <button
              type="button"
              class="close"
              @click="closeModal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="">
              <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input
                  type="email"
                  v-model="fields.name"
                  class="form-control"
                  id="name"
                  aria-describedby="nombre"
                />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="closeModal">
              Cerrar
            </button>
            <button
              type="button"
              class="btn btn-primary"
              @click="addUpdateElement"
            >
              Guardar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { Modal } from "bootstrap";

export default {
  props: {
    roles: {
      type: [Object, Array],
      required: true,
    },
  },
  data() {
    return {
      rolesTable: this.roles,
      Type: "add",
      fields: {
        id: "",
        name: "",
      },
    };
  },

  mounted() {
    this.modal = new Modal(this.$refs.exampleModal);
  },
  methods: {
    openModal() {
      this.modal.show();
    },
    closeModal() {
      this.fields.name = "";
      this.modal.hide();
    },
    addFormModal() {
      this.Type = "add";
      this.fields.name = "";
      this.openModal();
    },
    editFormModal(role) {
      this.Type = "edit";
      this.fields.id = role.id;
      this.fields.name = role.name;
      this.openModal();
    },
    addUpdateElement() {
      if (this.Type == "add") {
        let count = this.rolesTable.length + 1;
        this.rolesTable.push({ id: count, name: this.fields.name });
      } else {
        let upd_obj = this.rolesTable.findIndex(
          (obj) => obj.id == this.fields.id
        );
        this.rolesTable[upd_obj].name = this.fields.name;
      }
      this.closeModal();
    },
  },
};
</script>