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
          <th>Plataformas</th>
          <th>Jugadores</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="videojuego in videojuegosTable" :key="videojuego.id">
          <td>{{ videojuego.id }}</td>
          <td>{{ videojuego.nombre }}</td>
          <td>{{ videojuego.plataformas }}</td>
          <td>{{ videojuego.jugadores }}</td>
          <td>
            <button
              type="button"
              class="btn btn-success btn-sm"
              @click="editFormModal(videojuego)"
            >
              <i class="fas fa-fw fa-edit"></i>
              Editar
            </button>
            <button
              type="button"
              class="btn btn-danger btn-sm"
              @click="deleteFormModal(videojuego.id)"
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
              <span v-if="Type == 'add'">Agregar videojuego</span>
              <span v-else>Editar videojuego</span>
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
            <form action="" id="formVideojuegos">
              <div class="row">
                <input name="id" type="hidden" v-model="fields.id" />
                <div class="col-12 mb-2">
                  <label for="nombreInput">Nombre</label>
                  <input
                    name="nombre"
                    type="text"
                    v-model="fields.nombre"
                    class="form-control"
                    id="nombreInput"
                    aria-describedby="nombre"
                  />
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-floating mb-3">
                    <label for="jugadoresInput">Jugadores</label>
                    <select
                      name="jugadores"
                      class="form-control"
                      id="jugadoresInput"
                      required
                      v-model="fields.jugadores"
                    >
                      <option value="" disabled selected>Selecciona...</option>
                      <option value="Individual">Individual</option>
                      <option value="Multijugador">Multijugador</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-floating mb-3">
                    <label for="materiaIdInput">Materia</label>
                    <select
                      name="materia_id"
                      class="form-control"
                      id="materiaIdInput"
                      v-model="fields.materia_id"
                      required
                      v-for="materia in materias"
                      :key="materia.id"
                    >
                      <option value="" disabled selected>Selecciona...</option>
                      <option :value="materia.id">
                        {{ materia.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div><label for="plataformasInput">Plataformas</label></div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      name="plataformas"
                      type="checkbox"
                      id="windowsInput"
                      value="Windows"
                      :checked="fields.plataformas == 'Windows' ? true : false"
                    />
                    <label class="form-check-label" for="windowsInput"
                      >Windows</label
                    >
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      name="plataformas"
                      type="checkbox"
                      id="macInput"
                      value="Mac"
                      :checked="fields.plataformas == 'Mac' ? true : false"
                    />
                    <label class="form-check-label" for="macInput">Mac</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      name="plataformas"
                      type="checkbox"
                      id="xboxInput"
                      value="Xbox"
                      :checked="fields.plataformas == 'Xbox' ? true : false"
                    />
                    <label class="form-check-label" for="xboxInput">Xbox</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      name="plataformas"
                      type="checkbox"
                      id="playstationInput"
                      value="Playstation"
                      :checked="
                        fields.plataformas == 'Playstation' ? true : false
                      "
                    />
                    <label class="form-check-label" for="playstationInput"
                      >Playstation</label
                    >
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      name="plataformas"
                      type="checkbox"
                      id="androidInput"
                      value="Android"
                      :checked="fields.plataformas == 'Android' ? true : false"
                    />
                    <label class="form-check-label" for="androidInput"
                      >Android</label
                    >
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div><label for="categoriaIdInput">Categorias</label></div>
                  <div
                    class="form-check form-check-inline"
                    v-for="categoria in categorias"
                    :key="categoria.id"
                  >
                    <input
                      class="form-check-input me-0 ms-0"
                      name="categoria_id"
                      type="checkbox"
                      v-model="fields.categoria_id"
                      :value="categoria.id"
                      :id="categoria.id"
                    />
                    <label class="form-check-label ms-2" :for="categoria.id">{{
                      categoria.name
                    }}</label>
                  </div>
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
    videojuegos: {
      type: [Object, Array],
      required: true,
    },
    materias: {
      type: [Object, Array],
      required: true,
    },
    categorias: {
      type: [Object, Array],
      required: true,
    },
  },
  data() {
    return {
      videojuegosTable: this.videojuegos,
      Type: "add",
      fields: {
        id: "",
        nombre: "",
        plataformas: "",
        jugadores: "",
        categoria_id: "",
        materia_id: "",
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
      this.fields.plataformas = "";
      this.fields.jugadores = "";
      this.fields.categoria_id = "";
      this.fields.materia_id = "";
      this.modal.hide();
    },
    addFormModal() {
      this.Type = "add";
      this.fields.nombre = "";
      this.fields.plataformas = "";
      this.fields.jugadores = "";
      this.fields.categoria_id = "";
      this.fields.materia_id = "";
      this.openModal();
    },
    editFormModal(videojuego) {
      this.Type = "edit";
      this.fields.id = videojuego.id;
      this.fields.nombre = videojuego.nombre;
      this.fields.plataformas = videojuego.plataformas;
      this.fields.jugadores = videojuego.jugadores;
      this.fields.categoria_id = videojuego.categoria_id;
      this.fields.materia_id = videojuego.materia_id;
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
            .post("/admin/videojuegos/delete", {
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
            .catch((err) => {});
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
      const form = document.getElementById("formVideojuegos");
      const formData = new FormData(form);

      if (this.Type == "add") {
        let count = this.videojuegosTable.length + 1;
        this.videojuegosTable.push({
          id: count,
          nombre: this.fields.nombre,
          plataformas: this.fields.plataformas,
          jugadores: this.fields.jugadores,
          categoria_id: this.fields.categoria_id,
          materia_id: this.fields.materia_id,
        });

        axios
          .post("/admin/videojuegos/save", formData)
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
        let upd_obj = this.videojuegosTable.findIndex(
          (obj) => obj.id == this.fields.id
        );
        this.videojuegosTable[upd_obj].nombre = this.fields.nombre;
        this.videojuegosTable[upd_obj].plataformas = this.fields.plataformas;
        this.videojuegosTable[upd_obj].jugadores = this.fields.jugadores;
        this.videojuegosTable[upd_obj].categoria_id = this.fields.categoria_id;
        this.videojuegosTable[upd_obj].materia_id = this.fields.materia_id;

        axios
          .post("/admin/videojuegos/update", formData)
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