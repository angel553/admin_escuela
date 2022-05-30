<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Escuela</title>
</head>
<body>
  @isset($materia)
      <form action="/materia/{{ $materia[0]->id }}" method="POST" enctype="multipart/form-data"> {{-- update --}}                                                            
        @method('PATCH')                                                                                               
  @else
      <form action="/materia" method="POST" enctype="multipart/form-data">                            
  @endisset   
    @csrf     
    <label for="name"> Nombre: </label> 
      <input type="text" name="nombre" id="name" value="{{ isset($materia) ? $materia[0]->nombre : '' }}">
      <br><br>
      @error('nombre')
        <div>{{ $message }}</div>
      @enderror
    <label for="credits"> Créditos: </label> 
      <input type="number" name="creditos" id="credits" min="1" max="99" value="{{ isset($materia) ? $materia[0]->creditos : '' }}">
      <br><br> 
      @error('creditos')
        <div>{{ $message }}</div>
      @enderror   
    <label for="teacher"> Profesor: </label> 
      <input type="text" name="profesor" id="teacher" value="{{ isset($materia) ? $materia[0]->profesor : '' }}">
      <br><br>
      @error('profesor')
        <div>{{ $message }}</div>
      @enderror 
    <label for="turn"> Turno: </label> 
      <input type="text" name="turno" id="turn" value="{{ isset($materia) ? $materia[0]->turno : '' }}">    
      <br><br>    
      @error('turno')
        <div>{{ $message }}</div>
      @enderror 
    <label for="disp"> ¿Disponible? </label>
    @isset($materia)
      @if ($materia[0]->disponible == 1)
        <input type="checkbox" name="disponible" value= 1 id="disp" checked="true">
      @else
        <input type="checkbox" name="disponible" value= 0 id="disp">       
      @endif
      <br><br>        
    @endisset
      @error('disponible')
        <div>{{ $message }}</div>
      @enderror  
      
    {{-- @dd($estudiantes[0]->nombre);   --}}
    
    <label for="materia">Estudiantes: </label>
    <select name="estudiante_id[]" multiple id="materia"> 
      @foreach ($estudiantes as $estudiante)
          <option value="{{ $estudiante->id }}" {{ isset($materia) && array_search($estudiante->id, $materia->estudiantes->pluck('id')->toArray()) !== false ? ' selected' : '' }}>{{ $estudiante->nombre}} </option>
      @endforeach
      @error('estudiante_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </select>  
    <br><br>   
    <button type="submit" style="background-color: #007bff;">Guardar</button>
  </form>
</body>
</html>