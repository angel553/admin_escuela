<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Escuela</title>
</head>
<body>
  <h2>Estudiantes</h2>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Código</th>
      <th>Carrera</th>
      <th>Créditos</th>
      <th>Correo</th>  
      <th>Accion</th>      
    </tr>
    @foreach ($estudiantes as $estudiante)
        <tr>
          <td>{{ $estudiante->nombre }} </td>
          <td>{{ $estudiante->codigo }} </td>
          <td>{{ $estudiante->carrera }} </td>
          <td>{{ $estudiante->creditos_cursados }} </td>
          <td>{{ $estudiante->correo }} </td>  
          <td><a href="/estudiante/{{$estudiante->id}}">Ver</a></td>        
          <td><a href="/estudiante/{{$estudiante->id}}/edit">Actualizar</a></td>        
          <td><a href="/estudiante/{{$estudiante->id}}">Eliminar</a></td>        
        </tr>
    @endforeach
    <a href="estudiante/create">Agregar</a>
  </table>
  <br><br>  

  <h2>Materias</h2>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Créditos</th>
      <th>Profesor</th>
      <th>Turno</th>
      <th>Disponible</th>        
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
    <a href="materia/create">Agregar</a>
  </table>
  <br><br>
</body>
</html>