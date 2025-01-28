<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="contacto" class="hide">
        <h2>Contacta con nosotros</h2>
        <p>solicite su cita</p>
        <form>
            <div>
                <label for="nombre">Nombre y apellidos*: </label>
                <input type="text" name="nombre" id="nombre" required placeholder="nombre completo">
            </div>
            <div>
                <label for="empresa">Nombre de la empresa: </label>
                <input type="text" name="empresa" id="empresa" placeholder="nombre de tu empresa">
            </div>
            <div>
                <label for="telefono">Teléfono: </label>
                <input type="tel" name="telefono" id="telefono" placeholder="nº tlfn.">
            </div>
            <div>
                <label for="correo">Correo*: </label>
                <input type="email" name="correo" id="correo" required placeholder="ejemplo@ejemplo.com">
            </div>
            <div>
                <label for="cita">Tipo de cita: </label><br>
                <input type="radio" value="presencial" name="cita" id="presencial"> <label>Presencial</label>
                <input type="radio" value="online" name="cita" id="online" checked> <label>Online</label>
            </div>
            <div>
                <label for="fecha y hora">Fecha y hora*: </label><input type="datetime-local" name="fecha" id="fecha" required>
            </div>
            <div>
                <label for="servivio">Servicio en el que esta interesado: </label>
            <select name="servicio" id="servicio">
                <option>Inicio digital</option>
                <option>Crecimiento web y marca</option>
                <option>Soluciones avanzadas personalizadas</option>
            </select> 
            </div>
            <div>
                <textarea id="mensaje" name="mensaje" placeholder="Más información..."></textarea>
            </div>
            <div class="boton">
                <button type="button" onclick="procesaDatos()">Solicite su cita</button>
            </div>
        </form>
        <div id="confirmacion">
            <h3>Confirmación cita</h3>
            <div>
                <p>Empresa: <span id="empresa_confirmacion"></span></p>
                <p>Cita confirmada para el dia <span id="dia_confirmacion"></span><span id="mes_confirmacion"></span> de <span id="anho_confirmacion"></span> a las: <span id="hora_confirmacion"></span><br>
                Modalidad: <span id="modalidad_confirmacion"></span><br>
                Solicita información sobre: <span id="servicio_confirmacion"></span><br>
                Información adicional: <span id="info_confirmacion"></span></p>
                <p>Le hemos enviado un correo de confirmación a:<br><span id="correo_confirmacion"></span></p>
                <p>Gracias,<span id="nombre_confirmacion"></span> le esperamos.</p>
            </div>
        </div>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/funciones.js" type="text/javascript"></script>
</html>