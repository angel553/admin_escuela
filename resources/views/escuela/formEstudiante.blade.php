<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Escuela</title>
</head>
<body>
  @isset($estudiante)
      <form action="/estudiante/{{ $estudiante->id }}" method="POST" enctype="multipart/form-data"> {{-- update --}}                                                            
        @method('PATCH')                                                                                               
  @else
      <form action="/estudiante" method="POST" enctype="multipart/form-data">                            
  @endisset   
    @csrf     
    <label id="name"> Nombre: </label> 
      <input type="text" name="nombre" id="name"  value="{{ isset($estudiante) ? $estudiante->nombre : '' }}"> 
      @error('nombre')
        <div>{{ $message }}</div>
      @enderror
      <br><br>
    <label id="code"> Código: </label> 
      <input type="number" name="codigo" id="code" min="000000000" max="999999999" value="{{ isset($estudiante) ? $estudiante->codigo : '' }}">
      @error('codigo')
        <div>{{ $message }}</div>
      @enderror
      <br><br>
    <label id="carrer"> Carrera: </label> 
      <input type="text" name="carrera" id="carrer" value="{{ isset($estudiante) ? $estudiante->carrera : '' }}">
      @error('carrera')
        <div>{{ $message }}</div>
      @enderror
      <br><br>
    <label id="credit"> Créditos Cursados: </label> 
      <input type="number" name="creditos_cursados" id="credit" min="0" max="99" value="{{ isset($estudiante) ? $estudiante->creditos_cursados : '' }}">
      @error('creditos_cursados')
        <div>{{ $message }}</div>
      @enderror
      <br><br>      
    <label id="email"> Correo: </label> 
      <input type="email" name="correo" id="email" value="{{ isset($estudiante) ? $estudiante->correo : '' }}">    
      @error('correo')
        <div>{{ $message }}</div>
      @enderror
      <br><br>

    <label for="materia">Materias: </label>
    <select name="materia_id[]" multiple id="materia">                                        
      @foreach ($materias as $materia)
          <option value="{{ $materia->id }}" {{ isset($estudiante) && array_search($materia->id, $estudiante->materias->pluck('id')->toArray()) !== false ? ' selected' : '' }}>{{ $materia->nombre}} </option>
      @endforeach
      @error('materia_id')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </select>  
    <br><br>

    <button type="submit" style="background-color: #007bff;">Guardar</button>
  </form>
</body>
</html>