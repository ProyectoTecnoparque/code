<!-- Begin Page Content -->
<div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                
            <h2 class="m-0 font-weight-bold text-primary">Listas de Usuarios</h2>

            </div>
            <div class="card-body">
                <div class="table-responsive mt-4">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Tipo de Usuario</th>
                                <th>Dirección</th>
                                <th>Genero</th>
                                <th>Departamento</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <!-- <input type="hidden" value="<?php echo $dato['id']; ?>"> -->
                                    <td class="doc"><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['documento']; ?></td>
                                    <td><?php echo $dato['nombres'] . ' ' . $dato['apellidos']; ?></td>
                                    <td><?php echo $dato['email']; ?></td>
                                    <td><?php echo $dato['tipo_usuario']; ?></td>
                                    <td><?php echo $dato['direccion']; ?></td>
                                    <td><?php echo $dato['genero']; ?></td>
                                    <td><?php echo $dato['departamento']; ?></td>
                                    <td><?php echo $dato['estado']; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary mr-2 modal_edit" href="<?php echo base_url('/BuscarusuId?doc=') . $dato['id']; ?>"><i class="far fa-eye"></i></a>
                                        <a class="btn btn-danger toastrDefaultSuccess desactivar" id="desactivar"><i class="fas fa-user-lock"></i></a>
                                        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarRango">Editar <i class="far fa-edit"></i></a>
                                    </td>
    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  <!-- Modal Editar datos de la tabla de niveles (Nombre,puntos Requeridos y Valor)-->
  <div class="modal fade" id="editarRango" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarRangoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="editarRangoLabel">Editar Datos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                        <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name_nivel" id="name_nivel" placeholder="Nombre del Nivel">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-certificate"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-4">
                                
                                <input type="text" class="form-control" id="puntos_req" name="puntos_req" placeholder="Ingrese el nuevo datos">
                                <div class="input-group-append mr-2">
                                    <div class="input-group-text">
                                        <span> <i class="fas fa-coins"></i></span>
                                        
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="val_puntos" name="val_puntos" placeholder="Ingrese el nuevo datos">
                                    <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-hand-holding-usd"></span>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                        </div>
                        
                    </div>
                </div>
                       
                <!-- /.container-fluid  Fin Modal-->
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
 <script type="text/javascript">
   $(document).ready(iniciar);

    function iniciar(){
        $("#ejecutar").click(inactivarusuario);

    }
    function inactivarusuario(){
        alert ("ups!");
    }
   
</script>