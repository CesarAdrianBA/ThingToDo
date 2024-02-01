<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    <script src="JS/app.js" async></script>
    <title>Things To Do</title>
    <style>
        body {
    background-color: #303030; /* Gris oscuro */
    margin: 0;
    font-family: 'Arial', sans-serif;
    color: #333;
}

header {
    background-color: #e74c3c; /* Rojo */
    color: #fff;
    padding: 1em;
    text-align: center;
}

header button {
    background-color: #c0392b; /* Rojo más oscuro */
    color: #fff;
    padding: 0.5em 1em;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

header button:hover {
    background-color: #a93226; /* Rojo más oscuro al pasar el ratón */
}

.contenedor {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 2em;
}

.contenedor-items {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2em;
    margin-top: 2em;
}

.item {
    background-color: #ecf0f1; /* Blanco */
    border: 2px solid #c0392b; /* Rojo más oscuro */
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}

.item:hover {
    transform: scale(1.05);
}

.item img {
    width: 100%;
    max-height: 200px;
    object-fit: cover;
    border-radius: 8px 8px 0 0;
}

.item-info {
    padding: 1em;
    text-align: center;
}

.titulo-item {
    font-size: 1.5em;
    margin-bottom: 0.5em;
}

.precio-item {
    font-size: 1.2em;
    color: black; /* Rojo más oscuro */
}

.boton-item {
    background-color: #c0392b; /* Rojo más oscuro */
    color: #fff;
    padding: 0.5em 1em;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.boton-item:hover {
    background-color: #a93226; /* Rojo más oscuro al pasar el ratón */
}

.carrito {
    background-color: #ecf0f1; /* Blanco */
    border: 2px solid #c0392b; /* Rojo más oscuro */
    border-radius: 14px;
    overflow: hidden;
    max-width: 400px;
    margin-top: 2em;
    transition: transform 0.3s ease-in-out;
}

.carrito:hover {
    transform: scale(1.05);
}

.header-carrito {
    background-color: #e74c3c; /* Rojo */
    color: #fff;
    padding: 1em;
    text-align: center;
}

.imagen1 img {
    width: 30px;
    height: 30px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 0.5em;
}

.carrito-items,
.carrito-total {
    padding: 1em;
}

.fila {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5em;
}

.carrito-precio-total {
    font-weight: bold;
    font-size: 1.2em;
    color: #c0392b; /* Rojo más oscuro */
}

.btn-pagar {
    background-color: #c0392b; /* Rojo más oscuro */
    color: #303030;
    padding: 0.5em 1em;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.btn-pagar:hover {
    background-color: #a93226; /* Rojo más oscuro al pasar el ratón */
}

Th {
    text-align: center;
}

    </style>
</head>
<body>
    <header style="background-image: url(img/TTD.png);"><br><br><br><br><br><br><br><br>
        <button onclick="window.location.href='index.php '">Regresar</button>
    </header>
    <div class="contenedor">
        <div class="contenedor-items">
            <div class="item">
            <span class="titulo-item">Tema decorativo navideño</span>
                <img src="img/navidad.jpg" alt="" class="img-item">
                <span class="precio-item">$5,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Nuevos Colores Tematicos</span>
                <img src="img/Tematico.png" alt="" class="img-item">
                <span class="precio-item">$10,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Tema Hello decorativo Kitty</span>
                <img src="img/Kitty.webp" alt="" class="img-item">
                <span class="precio-item">$5,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Tema decorativo de Halo</span>
                <img src="img/Halo.webp" alt="" class="img-item">
                <span class="precio-item">$5,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Mascota de aplicación (Perro)</span>
                <img src="img/Dog.gif" alt="" class="img-item">
                <span class="precio-item">$6,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Mascota de aplicación (Gato)</span>
                <img src="img/Cat.gif" alt="" class="img-item">
                <span class="precio-item">$8,50</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
        </div>
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>
                    <div class="imagen1"></div>Tu Carrito
                </h2>
            </div>
            <div class="carrito-items">
                
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Total</strong>
                    <span class="carrito-precio-total">
                        $120.000,00
                    </span>
                </div>
                <button class="btn-pagar">Pagar<i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </div>
    </div>
</body>
</html>
