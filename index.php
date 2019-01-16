<html>
<head>
  <title>Alumnos y Profesores</title>
</head>
<body>
  <?php 
  $alumnos = [
    ['nombre'=> 'Eugenio', 'apellido' => 'Martínez', 'notas' => []],
    ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => []],
    ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => []],
    ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => []],
    ['nombre'=> 'Valentina', 'apellido' => 'Iglesias', 'notas' => []]
  ];
  
  imprimirAlumnos($alumnos);
   function imprimirAlumnos($datos){
    echo "
    <hr>
    <pre>Nombre       Apellido</pre>
    <hr><ol>
    ";       
    foreach($datos as $alumno){
      echo "<li><pre>".$alumno['nombre']."</pre></li>";
    }; 
    echo "</ol>";
    echo "<ol>";  
     
    foreach($datos as $alumno){
      echo "<li><pre>".$alumno['apellido']."</pre></li>";
    }; 
    echo "</ol>";
  }
  ?>
</body>  
</html>
