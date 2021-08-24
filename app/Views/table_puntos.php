<!-- Begin Page Content -->
         <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h2 class="m-0 font-weight-bold text-primary">Rangos Puntaje</h2>
                            <p class="mb-4">El contenido de esta tabla indica los rangos que se generan segun el puntaje que acumule segun el numero de expercias que reliza y este genera un descuento que se podra utilizar para las conocer nuevas experiencia en el eje cafetero .</p>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nivel</th>
                                            <th>Puntos Requeridos</th>
                                            <th>Valor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datos as $dato) {?>
                                        <tr>
                                          
                                            <td class="doc"><?php echo $dato['id']; ?></td>
                                            <td><?php echo $dato['Nivel']; ?></td>
                                            <td><?php echo $dato['puntos']; ?></td>
                                            <td><?php echo $dato['valor']; ?></td>
                                            <th><a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarRango">Editar <i class="far fa-edit"></a></th>       
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
            </div>
            <!-- End of Main Content -->

            <script >

                $(document).ready(iniciar);

                function iniciar(){
                    var doc = $(this).parents("tr").find("doc").text();

                    $.ajax({
                        url: '<?php echo base_url('/Puntos/BuscarNivel'); ?>',
                        type: 'POST',
                        dataType: "json",
                        data: {
                        doc: doc
                        },
                    }).done(function(data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                        $('#name_nivel').val(data[i].Nivel);
                        $('#puntos_req').val(data[i].puntos);
                        $('#val_puntos').val(data[i].valor);
                        
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    });
                    $(".act_cambios").click(actualizarest);
                        
                    })
                }  
        
      
   
   </script>

           

        