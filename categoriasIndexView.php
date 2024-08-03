<div>
    <h1>Administración de categorias</h1>
    <h3>Welcome <?= isset($Nombre['nombre']) ? $Nombre['nombre'] : 'Invitado' ?></h3>
    <p>Administración de categorias</p>

    <h3><a href="http://localhost/proyecto?C=categoriasController&M=callInsertForm">Insertar nueva categoria</a></h3>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                
            </tr>
        </thead>
        <tbody>
        <?php if (isset($categorias) && !empty($categorias)): ?>
            <?php foreach ($categorias as $categorias): ?>
                <tr>
                    <td><?= $categorias['Nombre'] ?></td>
                    <td><?= $categorias['Descripcion'] ?></td>
                    
                    <td>
                        <button onclick="editar(<?= $usuario['idCategoria'] ?>)">Editar</button>
                        <button onclick="eliminar(<?= $usuario['idCategoria'] ?>)">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No hay categroias disponibles.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <script>
        function editar(ID) {
            window.location.href = "http://localhost/proyecto?C=categoriaController&M=callEdditForm&id=" + id;
        }

        function eliminar(ID) {
            if (confirm("¿Realmente quieres eliminar el registro " + ID + "?")) {
                window.location.href = "http://localhost/proyecto?C=categoriaController&M=delete&id=" + id;
            }
        }
    </script>
</div>
