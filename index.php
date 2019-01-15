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
  echo "
  <hr>
  <pre>Nombre                       Apellido</pre>
  <hr>
  ";   
  echo $alumnos; 
  ?>
</body>  
</html>
