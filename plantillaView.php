<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTICIAS PERSONALIZADAS</title>
    <link rel="stylesheet" href="app/view/style.css">

</head>
<body>
    <header class="header">
        <h1>Noticias de alto impacto</h1>
        <nav class="navbar">
            <ul>
                <li><a href="http://localhost/proyecto">INICIO</a></li>
                <li><a href="http://localhost/proyecto?C=noticiaController&M=Llamarusuario">USUARIOS</a></li>
                <li><a href="http://localhost/proyecto?C=categoriasController&M=Llamarcategoria">CATEGORIAS</a></li>
                <li><a href="http://localhost/proyecto?C=subcategoriaController&M=Llamarsubcategoria">SUBCATEGORIAS</a></li>
                <li><a href="http://localhost/proyecto?C=usuarioController&M=logedout">CERRAR SECCIÓN</a></li>
            </ul>
       
    </header>
    <section class="container">
        <?php include_once($vista); ?>
    </section>
    <footer class="footer">
        <h3>Informate sobre aquello que te interesa</h3>
    </footer>
</body>
</html>

<style>
body {
    font-family: 'Georgia', serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f7f0f0; /* Very light pink background */
    color: #333;
    line-height: 1.6;
    background-image: url('https://www.transparenttextures.com/patterns/linen.png'); /* Subtle linen texture */
}

header {
    background-color: #f5b3b3; /* Light pastel pink */
    color: #333;
    padding: 20px 0;
    text-align: center;
    border-bottom: 5px solid #e6a0a0; /* Slightly darker pink */
}

header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

header h1 {
    margin: 0;
    font-size: 2.5rem;
    font-family: 'Pacifico', cursive; /* Cursive font for header */
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: #e6a0a0; /* Slightly darker pink */
}

.hero {
    padding: 80px 20px;
    background-color: #e6a0a0; /* Slightly darker pink */
    color: white;
    text-align: center;
    border-bottom: 5px solid #f5b3b3; /* Light pastel pink */
    background-image: url('https://www.transparenttextures.com/patterns/diagonal-stripes.png'); /* Vintage diagonal stripes texture */
}

.hero h2 {
    font-size: 3rem;
    margin-bottom: 10px;
    font-family: 'Pacifico', cursive; /* Cursive font */
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 30px;
    color: #333;
    background-color: #f5b3b3; /* Light pastel pink */
    text-decoration: none;
    border-radius: 30px;
    transition: background-color 0.3s, color 0.3s;
    font-family: 'Courier New', monospace;
}

.btn:hover {
    background-color: #e6a0a0; /* Slightly darker pink */
    color: white;
}

main {
    padding: 40px 0;
    background-color: #f7f0f0; /* Very light pink */
}

main .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

section {
    padding: 40px 0;
}

section h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #e6a0a0; /* Slightly darker pink */
    font-family: 'Pacifico', cursive;
}

.features {
    display: flex;
    flex-direction: column;
    text-align: center;
    gap: 20px;
}

.feature {
    background-color: #fff0f0; /* Very light pink */
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid #f5b3b3; /* Light pastel pink */
}

.feature h3 {
    margin-top: 0;
    color: #e6a0a0; /* Slightly darker pink */
}

footer {
    background-color: #f5b3b3; /* Light pastel pink */
    color: #333;
    text-align: center;
    padding: 20px 0;
    border-top: 5px solid #e6a0a0; /* Slightly darker pink */
}

footer .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Media Queries for Responsive Design */

@media (max-width: 1200px) {
    header .container {
        flex-direction: column;
        text-align: center;
    }

    nav ul {
        flex-direction: column;
        margin-top: 10px;
    }

    nav ul li {
        margin-left: 0;
        margin-bottom: 10px;
    }
}

@media (max-width: 768px) {
    .hero h2 {
        font-size: 2.5rem;
    }

    .hero p {
        font-size: 1rem;
    }

    .btn {
        padding: 8px 20px;
        font-size: 0.9rem;
    }

    .features {
        flex-direction: column;
    }

    .feature {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    header h1 {
        font-size: 1.8rem;
    }

    nav ul {
        flex-direction: column;
    }

    nav ul li {
        margin-bottom: 5px;
    }

    .hero h2 {
        font-size: 2rem;
    }

    .hero p {
        font-size: 0.9rem;
    }

    .btn {
        padding: 6px 15px;
        font-size: 0.8rem;
    }

    .feature {
        padding: 10px;
    }
}



</style>