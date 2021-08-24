<!-- Begin Page Content -->
<div class="container-fluid">

                   

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">Historial de Experiencias</h2>
        <p class="mb-4">El contenido de esta tabla indica los rangos que se generan segun el puntaje que acumule segun el numero de expercias que reliza y este genera un descuento que se podra utilizar para las conocer nuevas experiencia en el eje cafetero .</p>
    </div>
    <div class="card-body">
        <div class="table-responsive mt-4">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Experiencia</th>
                        <th>Valor</th>
                        <th>Fecha</th>
                    </tr>
                </thead>

                <tbody>
                        <?php foreach ($datos as $dato) {?>
                    <tr>
                        <td><?php echo $dato['id']; ?></td>
                        <td><?php echo $dato['usuario_id']; ?></td>
                        <td><?php echo $dato['id_nivel']; ?></td>
                        <td><?php echo $dato['acum_point']; ?></td>
                        <td><?php echo $dato['fecha_insert']; ?></td>
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