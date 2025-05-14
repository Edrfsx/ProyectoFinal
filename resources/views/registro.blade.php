<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('registrar') }}">
        @csrf
        <input type="text" id="usuario" name="usuario">
        <br>
        <input type="text" id="password" name="password">
        <br>
        <input type="number" id="trabajador_id" name="trabajador_id">
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>