<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Escuela</title>
</head>
<body>
  <h2>Estudiante</h2>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Código</th>
      <th>Carrera</th>
      <th>Créditos Cursados</th>
      <th>Correo</th>  
      <th>Accion</th>      
    </tr>
    
    <tr>
      <td>{{ $estudiante->nombre }} </td>
      <td>{{ $estudiante->codigo }} </td>
      <td>{{ $estudiante->carrera }} </td>
      <td>{{ $estudiante->creditos_cursados }} </td>
      <td>{{ $estudiante->correo }} </td>              
      <td><a href="/estudiante/{{$estudiante->id}}/edit">Actualizar</a></td>        
      <td><a href="/estudiante/{{$estudiante->id}}">Eliminar</a></td>        
    </tr>
        
  </table>
  <br><br>  
</body>
</html>