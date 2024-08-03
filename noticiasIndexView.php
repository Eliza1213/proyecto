<div>
    <h1>Administración de Usuarios</h1>
    <h3>Welcome <?= isset($nombre['nombre']) ? $nombre['nombre'] : 'Invitado' ?></h3>
    <p>Administración de usuarios</p>

    <h3><a href="http://localhost/proyecto?C=noticiaController&M=callInsertForm">Insertar nuevo usuario</a></h3>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($noticias) && !empty($noticias)): ?>
            <?php foreach ($noticias as $noticia): ?>
                <tr>
                    <td><?= $noticia['nombre'] ?></td>
                    <td><?= $noticia['apaterno'] ?></td>
                    <td><?= $noticia['amaterno'] ?></td>
                    <td><?= $noticia['correo'] ?></td>
                    
                    <td>
                        <button onclick="editar(<?= $noticia['id_usuario'] ?>)">Editar</button>
                        <button onclick="eliminar(<?= $noticia['id_usuario'] ?>)">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No hay usuarios disponibles.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <script>
        function editar(ID) {
            window.location.href = "http://localhost/proyecto?C=noticiaController&M=callEdditForm&id_usuario=" + id_usuario;
        }

        function eliminar(ID) {
            if (confirm("¿Realmente quieres eliminar el registro " + ID + "?")) {
                window.location.href = "http://localhost/proyecto?C=noticiaController&M=delete&id_usuario=" + id_usuario;
            }
        }
    </script>
</div>
