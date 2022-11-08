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
          <th>Apellido paterno</th>
          <th>Apellido materno</th>
          <th>Correo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="usuario in usuariosTable" :key="usuario.id">
          <td>{{ usuario.id }}</td>
          <td>{{ usuario.nombre }}</td>
          <td>{{ usuario.apellidop }}</td>
          <td>{{ usuario.apellidom }}</td>
          <td>{{ usuario.email }}</td>
          <td>
            <button
              type="button"
              class="btn btn-success btn-sm"
              @click="editFormModal(usuario)"
            >
              <i class="fas fa-fw fa-edit"></i>
              Editar
            </button>
            <button
              type="button"
              class="btn btn-danger btn-sm"
              @click="deleteFormModal(usuario.id)"
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
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
              <span v-if="Type == 'add'">Agregar usuarios</span>
              <span v-else>Editar usuarios</span>
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
            <form action="" id="formUsuarios">
              <input name="id" type="hidden" v-model="fields.id" />
              <div class="row">
                <div class="col-md-6 col-12 mb-3">
                  <label for="nombreInput">Nombre</label>
                  <input
                    type="text"
                    v-model="fields.nombre"
                    class="form-control"
                    id="nombreInput"
                    name="nombre"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="apellidoPInput">Apellido paterno</label>
                  <input
                    type="text"
                    class="form-control"
                    id="apellidoPInput"
                    name="apellidop"
                    v-model="fields.apellidop"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="apellidoMInput">Apellido materno</label>
                  <input
                    type="text"
                    class="form-control"
                    id="apellidoMInput"
                    name="apellidom"
                    v-model="fields.apellidom"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="emailInput">Correo</label>
                  <input
                    type="email"
                    class="form-control"
                    id="emailInput"
                    name="email"
                    v-model="fields.email"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="passwordInput">Contraseña</label>
                  <input
                    type="password"
                    class="form-control"
                    id="passwordInput"
                    name="password"
                    v-model="fields.password"
                    required
                  />
                </div>
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
    usuarios: {
      type: [Object, Array],
      required: true,
    },
  },
  data() {
    return {
      usuariosTable: this.usuarios,
      Type: "add",
      fields: {
        id: "",
        nombre: "",
        apellidop: "",
        apellidom: "",
        email: "",
        foto_perfil: "",
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
      this.fields.id = "";
      this.fields.nombre = "";
      this.fields.apellidop = "";
      this.fields.apellidom = "";
      this.fields.email = "";
      this.fields.foto_perfil = "";
      this.modal.hide();
    },
    addFormModal() {
      this.Type = "add";
      this.fields.id = "";
      this.fields.nombre = "";
      this.fields.apellidop = "";
      this.fields.apellidom = "";
      this.fields.email = "";
      this.fields.foto_perfil = "";
      this.openModal();
    },
    editFormModal(usuario) {
      this.Type = "edit";
      this.fields.id = usuario.id;
      this.fields.nombre = usuario.nombre;
      this.fields.apellidop = usuario.apellidop;
      this.fields.apellidom = usuario.apellidom;
      this.fields.email = usuario.email;
      this.fields.foto_perfil = usuario.foto_perfil;
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
            .post("/admin/usuarios/delete", {
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
      const form = document.getElementById("formUsuarios");
      const formData = new FormData(form);

      if (this.Type == "add") {
        this.usuariosTable.push({
          id: this.fields.id,
          nombre: this.fields.nombre,
          apellidop: this.fields.apellidop,
          apellidom: this.fields.apellidom,
          email: this.fields.email,
          foto_perfil: this.fields.foto_perfil,
        });

        axios
          .post("/admin/usuarios/save", formData)
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
        let upd_obj = this.usuariosTable.findIndex(
          (obj) => obj.id == this.fields.id
        );
        this.usuariosTable[upd_obj].id = this.fields.id;
        this.usuariosTable[upd_obj].nombre = this.fields.nombre;

        axios
          .post("/admin/usuarios/update", formData)
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