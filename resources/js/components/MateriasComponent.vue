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
        <tr v-for="materia in materiasTable" :key="materia.id">
          <td>{{ materia.id }}</td>
          <td>{{ materia.name }}</td>
          <td>
            <button
              type="button"
              class="btn btn-success btn-sm"
              @click="editFormModal(materia)"
            >
              <i class="fas fa-fw fa-edit"></i>
              Editar
            </button>
            <button
              type="button"
              class="btn btn-danger btn-sm"
              @click="deleteFormModal(materia.id)"
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
              <span v-if="Type == 'add'">Agregar materia</span>
              <span v-else>Editar materia</span>
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
            <form action="" id="formMaterias">
              <div class="mb-3">
                <input name="id" type="hidden" v-model="fields.id" />
                <label for="name" class="form-label">Nombre</label>
                <input
                  type="text"
                  name="name"
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
    materias: {
      type: [Object, Array],
      required: true,
    },
  },
  data() {
    return {
      materiasTable: this.materias,
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
    editFormModal(materia) {
      this.Type = "edit";
      this.fields.id = materia.id;
      this.fields.name = materia.name;
      this.openModal();
    },
    deleteFormModal(id) {
      Swal.fire({
        title:
          '<h1 style="font-family: Poppins; font-weight: 700;">Eliminar registro</h1>',
        html: '<p style="font-family: Poppins">¿Estás seguro de eliminar este registro? esta opción no se puede deshacer</p>',
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: '<a style="font-family: Poppins">Eliminar</a>',
        confirmButtonColor: "#01bbcc",
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#dc3545",
      }).then((result) => {
        if (result.value) {
          axios
            .post("/admin/materias/delete", {
              id: id,
            })
            .then((response) => {
              Swal.fire({
                icon: "success",
                title:
                  '<h1 style="font-family: Poppins; font-weight: 700;">Registro eliminado</h1>',
                html: '<p style="font-family: Poppins">El registro ha sido eliminado con exito</p>',
                confirmButtonText:
                  '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
              });
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                title:
                  '<h1 style="font-family: Poppins; font-weight: 700;">Error</h1>',
                html: '<p style="font-family: Poppins">La petición ha fallado</p>',
                confirmButtonText:
                  '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
              });
            });
        } else {
          Swal.fire({
            icon: "error",
            title:
              '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
            html: '<p style="font-family: Poppins">El registro no se ha eliminado</p>',
            confirmButtonText: '<a style="font-family: Poppins">Aceptar</a>',
            confirmButtonColor: "#01bbcc",
          });
        }
      });
    },
    addUpdateElement() {
      const form = document.getElementById("formMaterias");
      const formData = new FormData(form);

      if (this.Type == "add") {
        let count = this.materiasTable.length + 1;
        this.materiasTable.push({ id: count, name: this.fields.name });

        axios
          .post("/admin/materias/save", formData)
          .then((response) => {
            if (response.status == 200) {
              Swal.fire({
                icon: "success",
                title:
                  '<h1 style="font-family: Poppins; font-weight: 700;">Registro añadido</h1>',
                html: '<p style="font-family: Poppins">El registro ha sido guardado correctamente</p>',
                confirmButtonText:
                  '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
              });
            }
          })
          .catch((err) => {
            Swal.fire({
              icon: "error",
              title:
                '<h1 style="font-family: Poppins; font-weight: 700;">Error</h1>',
              html: '<p style="font-family: Poppins">La petición ha fallado</p>',
              confirmButtonText: '<a style="font-family: Poppins">Aceptar</a>',
              confirmButtonColor: "#01bbcc",
            });
          });
      } else {
        let upd_obj = this.materiasTable.findIndex(
          (obj) => obj.id == this.fields.id
        );
        this.materiasTable[upd_obj].name = this.fields.name;

        axios
          .post("/admin/materias/update", formData)
          .then((response) => {
            if (response.status == 200) {
              Swal.fire({
                icon: "success",
                title:
                  '<h1 style="font-family: Poppins; font-weight: 700;">Registro actualizado</h1>',
                html: '<p style="font-family: Poppins">El registro ha sido editado correctamente</p>',
                confirmButtonText:
                  '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
              });
            }
          })
          .catch((err) => {
            Swal.fire({
              icon: "error",
              title:
                '<h1 style="font-family: Poppins; font-weight: 700;">Error</h1>',
              html: '<p style="font-family: Poppins">La petición ha fallado</p>',
              confirmButtonText: '<a style="font-family: Poppins">Aceptar</a>',
              confirmButtonColor: "#01bbcc",
            });
          });
      }
      this.closeModal();
    },
  },
};
</script>