<?= $cabecera ?>
<a class="btn btn-success mb-3" href="<?= base_url('crear'); ?>">Crear un libro</a>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Imagen</th>                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <!--Consulto la info que esta en el arreglo libros-->
            <?php foreach($libros as $libro): ?>
            <!--Imprimo la informacion-->
                <tr>
                    <td><?= $libro['id']; ?></td>
                    <td><?= $libro['nombre']; ?></td>
                    <!--Mostrar la imagen del libro-->
                    <td>
                        <img class="img-thumbnail"
                        src="<?=base_url()?>/uploads/<?=$libro['imagen'];?>" 
                        width="100" alt="">                    
                    </td>
                    
                    <td>
                        <a href="<?= base_url('editar/'.$libro['id']); ?>" class="btn btn-info" type="button">Editar</a>
                        <a href="<?= base_url('borrar/'.$libro['id']); ?>" class="btn btn-danger" type="button">Borrar</a>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
<?= $pie ?>