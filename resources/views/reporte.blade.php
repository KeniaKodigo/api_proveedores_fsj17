<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>Productos por fechas</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nombre</th>
            <th>Fecha</th>
        </thead>
        <tbody>
            @foreach ($productos as $item)
                <tr>
                    <td></td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->fecha}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>