<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTIFRESH</title>
    <link rel="stylesheet" href="app/view/style.css">

</head>
<body>
    <header class="header">
        <h1>NOTICIAS PERSONALIZADAS</h1>
        <nav class="navbar">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="http://localhost/proyecto?C=usuarioController&M=callLoginForm">Login</a></li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <?php include_once($vista); ?>
    </section>
    <footer class="footer">
        <h3>EQUIPO 6_TIC'S</h3>
    </footer>
</body>
</html>

<style>
body {
    font-family: 'Times New Roman', serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f2f2f2; /* Light gray background */
    color: #333;
    line-height: 1.6;
    background-image: url('https://www.transparenttextures.com/patterns/soft-paper.png'); /* Soft paper texture */
}

header {
    background-color: #b0e0e6; /* Powder blue */
    color: #333;
    padding: 20px 0;
    text-align: center;
    border-bottom: 5px solid #87cefa; /* Light sky blue */
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
    font-family: 'Lobster', cursive; /* Cursive font for header */
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
    color: #87cefa; /* Light sky blue */
}

.hero {
    padding: 80px 20px;
    background-color: #87cefa; /* Light sky blue */
    color: white;
    text-align: center;
    border-bottom: 5px solid #b0e0e6; /* Powder blue */
    background-image: url('https://www.transparenttextures.com/patterns/black-linen.png'); /* Linen texture */
}

.hero h2 {
    font-size: 3rem;
    margin-bottom: 10px;
    font-family: 'Lobster', cursive; /* Cursive font */
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 30px;
    color: #333;
    background-color: #b0e0e6; /* Powder blue */
    text-decoration: none;
    border-radius: 30px;
    transition: background-color 0.3s, color 0.3s;
    font-family: 'Times New Roman', serif;
}

.btn:hover {
    background-color: #87cefa; /* Light sky blue */
    color: white;
}

main {
    padding: 40px 0;
    background-color: #f2f2f2; /* Light gray background */
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
    color: #87cefa; /* Light sky blue */
    font-family: 'Lobster', cursive;
}

.features {
    display: flex;
    flex-direction: column;
    text-align: center;
    gap: 20px;
}

.feature {
    background-color: #ffffff; /* White */
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid #b0e0e6; /* Powder blue */
}

.feature h3 {
    margin-top: 0;
    color: #87cefa; /* Light sky blue */
}

footer {
    background-color: #b0e0e6; /* Powder blue */
    color: #333;
    text-align: center;
    padding: 20px 0;
    border-top: 5px solid #87cefa; /* Light sky blue */
}

footer .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}


</style>