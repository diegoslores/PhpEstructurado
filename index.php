<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alumnos y Profesores</title>
  <link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
  <?php 
  $alumnos = [
    ['nombre'=> 'Eugenio', 'apellido' => 'Martínez', 'notas' => []],
    ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => []],
    ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => []],
    ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => []]
  ];
  
  imprimirAlumnos($alumnos);
   function imprimirAlumnos($datos){
    echo "
    <hr>
    <div class='nomApe'><pre>Nombre\t\tApellido</pre></div>
    <hr>
    <div class='lista'>
    <ol>
    ";       
    foreach($datos as $alumno){
      echo "<li><pre>".$alumno['nombre']. "\t\t" .$alumno['apellido']."</pre></li>";
    }; 
    echo "</ol></div><hr>";
    
  }
  ?>
</body>  
</html>
