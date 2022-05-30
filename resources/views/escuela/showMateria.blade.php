<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Escuela</title>
</head>
<body>
  <h2>Materias</h2>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Créditos</th>
      <th>Profesor</th>
      <th>Turno</th>
      <th>Disponible</th>  
      <th>Accion</th>      
    </tr>
    
    <tr>
      <td>{{ $materia[0]->nombre }} </td>
      <td>{{ $materia[0]->creditos }} </td>
      <td>{{ $materia[0]->profesor }} </td>
      <td>{{ $materia[0]->turno }} </td>
      <td>{{ $materia[0]->disponible }} </td>       
      <td><a href="/materia/{{$materia[0]->id}}/edit">Actualizar</a></td>        
      <td><a href="/materia/{{$materia[0]->id}}">Eliminar</a></td>        
    </tr>
        
  </table>
  <br><br>  
</body>
</html>