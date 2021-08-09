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
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        <?php foreach ($datos as $dato) {?>
                                        <tr>
                                            <td><?php echo $dato['id']; ?></td>
                                            <td><?php echo $dato['Nivel']; ?></td>
                                            <td><?php echo $dato['puntos']; ?></td>
                                            <td><?php echo $dato['valor']; ?></td>
                                            
                                        </tr>
                                         <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           

        