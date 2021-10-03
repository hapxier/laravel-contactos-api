<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de contactos 
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crear">
                            <i class="far fa-plus-square"></i>
                        </button>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefo</th>
                                    <th>foto</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="directorio in arrayDirectorio" :key="directorio.id">
                                    <td v-text="directorio.nombre"></td>
                                    <td v-text="directorio.direccion"></td>
                                    <td v-text="directorio.telefono"></td>
                                    <td v-text="directorio.foto"></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" @click="editarModal(directorio)" data-toggle="modal" data-target="#editar">
                                            <i class="fas fa-edit"></i>
                                        </button> &nbsp;
                                        <button type="button" class="btn btn-danger btn-sm" @click="eliminarModal(directorio)" data-toggle="modal" data-target="#eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Crear-->
        <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="limpiarModal()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label">Nombre:(*)</label>
                            <div class="col-md-8" >
                                <input type="text" class="form-control" placeholder="Nombre" v-model="nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label" >Direccion:</label>
                            <div class="col-md-8" >
                                <input type="text" class="form-control" placeholder="Direccion" v-model="direccion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label" >telefono:(*)</label>
                            <div class="col-md-8" >
                                <input type="text" class="form-control" placeholder="Telefono" v-model="telefono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label" >Foto:</label>
                            <div class="col-md-8" >
                                <input type="text" class="form-control" v-model="foto">
                            </div>
                        </div>
                        
                        <!-- Errores -->
                        <div v-show="errorD" class="form-group row div-error">
                            <div class="text-danger">
                                <div v-for="error in errorMostrarMsjD" :key="error" v-text="error">
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="limpiarModal()">Close</button>
                    <button type="submit" class="btn btn-primary" @click="registrarDirectorio()">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal editar-->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="limpiarModal()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label">Nombre:(*)</label>
                            <div class="col-md-8" >
                                <input type="text" class="form-control" placeholder="Nombre" v-model="nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label" >Direccion:</label>
                            <div class="col-md-8" >
                                <input type="text" class="form-control" placeholder="Direccion" v-model="direccion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label" >telefono:(*)</label>
                            <div class="col-md-8" >
                                <input type="text" class="form-control" placeholder="Telefono" v-model="telefono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label" >Foto:</label>
                            <div class="col-md-8" >
                                <input type="text" class="form-control" v-model="foto">
                            </div>
                        </div>
                        
                        <!-- Errores -->
                        <div v-show="errorD" class="form-group row div-error">
                            <div class="text-danger">
                                <div v-for="error in errorMostrarMsjD" :key="error" v-text="error">
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="limpiarModal()">Close</button>
                    <button type="submit" class="btn btn-primary" @click="editarDirectorio()">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar-->
        <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="limpiarModal()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="text-center">
                            <label>Seguro que desea eliminar el registro?</label>   
                        </div>  
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="limpiarModal()">Cancelar</button>
                    <button type="submit" class="btn btn-primary" @click="eliminarDirectorio()">Confirmar</button>
                </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                nombre: '',
                direccion: '',
                telefono: '',
                foto: '',
                arrayDirectorio: [],
                errorD: 0,
                errorMostrarMsjD: [],
                idDirectorio: 0
            }
        },
        methods: {
            listarDirectorios(){
                let me = this;
                axios.get('/api/directorios').then(function (response) {
                    // console.log(response);
                    me.arrayDirectorio = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                });
            },
            registrarDirectorio(){
                if (this.validarDatos()) {
                    return;
                }

                let me = this;
                axios.post('/api/directorios',{
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                    'telefono': this.telefono,
                    'foto': this.foto
                }).then(function (response) {
                    me.limpiarModal();
                    $('#crear').modal('hide');
                    me.listarDirectorios();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            editarDirectorio(id){
                if (this.validarDatos()) {
                    return;
                }

                let me = this;
                axios.put('/api/directorios/'+this.idDirectorio,{
                    'nombre': this.nombre,
                    'direccion': this.direccion,
                    'telefono': this.telefono,
                    'foto': this.foto
                }).then(function (response) {
                    me.limpiarModal();
                    $('#editar').modal('hide');
                    me.listarDirectorios();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            eliminarDirectorio(){
                let me = this;
                axios.delete('/api/directorios/'+this.idDirectorio,{

                }).then(function (response) {
                    me.limpiarModal();
                    $('#eliminar').modal('hide');
                    me.listarDirectorios();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            editarModal(data = []){
                this.idDirectorio = data['id'];
                this.nombre = data['nombre'];
                this.direccion = data['direccion'];
                this.telefono = data['telefono'];
                this.foto = data['foto'];
                // console.log('MSJ'+ data);
            },
            eliminarModal(data = []){
        
                this.idDirectorio = data['id'];
                this.nombre = data['nombre'];
                // console.log('MSJ'+ data['id']);

            },
            validarDatos(){
                this.errorD=0;
                this.errorMostrarMsjD = [];

                if (!this.nombre) this.errorMostrarMsjD.push("El nombre no puede estar vacío.");
                if (!this.telefono) this.errorMostrarMsjD.push("El telefono no puede estar vacío.");
                if (this.errorMostrarMsjD.length) this.errorD = 1;

                return this.errorD;
            },
            limpiarModal(){
                this.nombre= '';
                this.direccion = '';
                this.telefono = '';
                this.foto = '';
                this.idDirectorio = 0;
            }
        },
        mounted() {
            this.listarDirectorios();
        }
    }
</script>
