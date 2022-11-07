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
          <th>Direccion</th>
          <th>Fraccionamiento</th>
          <th>Código postal</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="escuela in escuelasTable" :key="escuela.id">
          <td>{{ escuela.id }}</td>
          <td>{{ escuela.nombre }}</td>
          <td>{{ escuela.direccion }}</td>
          <td>{{ escuela.col_fracc }}</td>
          <td>{{ escuela.cp }}</td>
          <td>
            <button
              type="button"
              class="btn btn-success btn-sm"
              @click="editFormModal(escuela)"
            >
              <i class="fas fa-fw fa-edit"></i>
              Editar
            </button>
            <button
              type="button"
              class="btn btn-danger btn-sm"
              @click="deleteFormModal(escuela.id)"
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
              <span v-if="Type == 'add'">Agregar escuela</span>
              <span v-else>Editar escuela</span>
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
            <form action="" id="formEscuelas">
              <input name="id" type="hidden" v-model="fields.id" />
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="nombreInput">Nombre de la escuela</label>
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
                  <label for="direccionInput">Dirección de la escuela</label>
                  <input
                    type="text"
                    class="form-control"
                    id="direccionInput"
                    name="direccion"
                    v-model="fields.direccion"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="colInput">Colonia o fraccionamiento</label>
                  <input
                    type="text"
                    class="form-control"
                    id="colInput"
                    name="col_fracc"
                    v-model="fields.col_fracc"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="cpInput">Código postal</label>
                  <input
                    type="number"
                    class="form-control"
                    id="cpInput"
                    name="cp"
                    v-model="fields.cp"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="ciudadInput">Ciudad</label>
                  <input
                    type="text"
                    class="form-control"
                    id="ciudadInput"
                    name="ciudad"
                    v-model="fields.ciudad"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="estadoInput">Estado</label>
                  <input
                    type="text"
                    class="form-control"
                    id="estadoInput"
                    name="estado"
                    v-model="fields.estado"
                    required
                  />
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="paisInput">País</label>
                  <input
                    type="text"
                    class="form-control"
                    id="paisInput"
                    name="pais"
                    v-model="fields.pais"
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
    escuelas: {
      type: [Object, Array],
      required: true,
    },
  },
  data() {
    return {
      escuelasTable: this.escuelas,
      Type: "add",
      fields: {
        id: "",
        nombre: "",
        direccion: "",
        col_fracc: "",
        cp: "",
        ciudad: "",
        estado: "",
        pais: "",
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
      this.fields.nombre = "";
      this.fields.direccion = "";
      this.fields.col_fracc = "";
      this.fields.cp = "";
      this.fields.ciudad = "";
      this.fields.estado = "";
      this.fields.pais = "";
      this.modal.hide();
    },
    addFormModal() {
      this.Type = "add";
      this.fields.nombre = "";
      this.fields.direccion = "";
      this.fields.col_fracc = "";
      this.fields.cp = "";
      this.fields.ciudad = "";
      this.fields.estado = "";
      this.fields.pais = "";
      this.openModal();
    },
    editFormModal(escuela) {
      this.Type = "edit";
      this.fields.id = escuela.id;
      this.fields.nombre = escuela.nombre;
      this.fields.direccion = escuela.direccion;
      this.fields.col_fracc = escuela.col_fracc;
      this.fields.cp = escuela.cp;
      this.fields.ciudad = escuela.ciudad;
      this.fields.estado = escuela.estado;
      this.fields.pais = escuela.pais;
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
            .post("/admin/escuelas/delete", {
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
              s;
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
      const form = document.getElementById("formEscuelas");
      const formData = new FormData(form);

      if (this.Type == "add") {
        let count = this.escuelasTable.length + 1;
        this.escuelasTable.push({
          id: count,
          nombre: this.fields.nombre,
          direccion: this.fields.direccion,
          col_fracc: this.fields.col_fracc,
          cp: this.fields.cp,
          ciudad: this.fields.ciudad,
          estado: this.fields.estado,
          pais: this.fields.pais,
        });

        axios
          .post("/admin/escuelas/save", formData)
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
        let upd_obj = this.escuelasTable.findIndex(
          (obj) => obj.id == this.fields.id
        );
        this.escuelasTable[upd_obj].nombre = this.fields.nombre;
        this.escuelasTable[upd_obj].direccion = this.fields.direccion;
        this.escuelasTable[upd_obj].col_fracc = this.fields.col_fracc;
        this.escuelasTable[upd_obj].cp = this.fields.cp;
        this.escuelasTable[upd_obj].ciudad = this.fields.ciudad;
        this.escuelasTable[upd_obj].estado = this.fields.estado;
        this.escuelasTable[upd_obj].pais = this.fields.pais;

        axios
          .post("/admin/escuelas/update", formData)
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