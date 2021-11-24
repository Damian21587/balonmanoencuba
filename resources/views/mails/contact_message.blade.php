<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo mensaje de contacto</title>
</head>
<body>
<p>Un usuario ha enviado un mensaje a través del formulario de contacto:</p>
<ul>
    <li>Nombre del Usuario: {{ $datos['name'] }}</li>
    <li>Correo del Usuario: {{ $datos['email'] }}</li>
    <li>Mensaje: {{ $datos['message'] }}</li>
</ul>
</body>
</html>