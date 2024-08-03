<div>
    <h1>Editar el registro de <?= $data['Nombre'] ?></h1>

    <form action="http://localhost/proyecto/?C=subcategoriaController&M=eddit" method="post">
        <input type="hidden" name="id_subcategoria" value=<?= $data['id_subcategoria']?>>
        <div>
            <label for="nombre">Nombre : </label>
            <input type="text" name="nombre" required value=<?= $data['nombre']?>>
        </div>
        <div>
            <label for="apaterno">Apellido paterno : </label>
            <input type="text" name="apaterno" required value=<?= $data['apaterno']?>>
        </div>
        <div>
            <label for="amaterno">Apellido materno : </label>
            <input type="text" name="amaterno" required value=<?= $data['amaterno']?>>
        </div>
        <div>
            <label for="correo">Correo : </label>
            <input type="email" name="correo" required value=<?= $data['correo']?>>
        </div>
        <div>
            <input type="submit" value="eddit">
        </div>
    </form>
</div>

<style>
        .body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>