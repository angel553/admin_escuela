<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Escuela</title>
</head>
<body>
  <h1>Estudiantes</h1>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Código</th>
      <th>Carrera</th>
      <th>Créditos</th>
      <th>Correo</th>        
    </tr>
    @foreach ($estudiantes as $estudiante)
        <tr>
          <td>{{ $estudiante->nombre }} </td>
          <td>{{ $estudiante->codigo }} </td>
          <td>{{ $estudiante->carrera }} </td>
          <td>{{ $estudiante->creditos_cursados }} </td>
          <td>{{ $estudiante->correo }} </td>
        </tr>
    @endforeach
  </table>
  <br>  
  <a href="estudiante/create">Agregar</a>
</body>
</html>