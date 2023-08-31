<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Reporte de Productos por fecha</h1>
        <form action="{{ route('reporte') }}" method="post">
            @csrf
            <label for="">Fecha Inicio</label>
            <input type="date" name="fecha_inicio">

            <label for="">Fecha Final</label>
            <input type="date" name="fecha_final">

            <input type="submit" value="Generar Reporte">
        </form>

        
    </div>
</body>
</html>