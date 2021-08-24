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
                                    <td><a type="button" class="btn btn-primary mr-2 modal_edit" href="<?php echo base_url('/BuscarusuId?doc=') . $dato['id']; ?>"><i class="far fa-eye"></i></a><a class="btn btn-danger toastrDefaultSuccess desactivar" id="desactivar"><i class="fas fa-user-lock"></i></a></td>
    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <button id="ejecutar">Iniciar</button>   
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