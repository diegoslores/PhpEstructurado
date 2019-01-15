//TODO: Realiza aquí la 

<html>
<head>
  <title>Alumnos y Profesores</title>
</head>
<body>
  <?php echo "<br/>hola<br/>"; 
  $alumnos = [
    ['nombre'=> 'Eugenio', 'apellido' => 'Martínez', 'notas' => []],
    ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => []],
    ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => []],
    ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => []],
    ['nombre'=> 'Valentina', 'apellido' => 'Iglesias', 'notas' => []]
  ];   
  echo $alumnos; 
  ?>
</body>  
</html>
