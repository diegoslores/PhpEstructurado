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
  //La primera imprimir una lista de sus alumnos (el programa ya tiene una lista precargada de alumnos).
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
<?php/*
La segunda, añade un nuevo alumno pidiendo los datos necesarios (nombre y apellidos inicialmente).
La tercera simula un examen de los alumnos existentes (la simulación de las notas se realiza para evitar introducir estas notas manualmente para cada uno, recuerda que es un problema didáctico que no tiene por qué ajustarse a la realidad). En la shell se puede ver un submenú donde se parametriza la dificultad del examen para que las notas se ajusten a este.
Si la dificultad es baja: Se generará la nota (para cada alumno y con 2 decimales) con un nº aleatorio entre 5 y 10
Si la dificultad es media: Se generará la nota (para cada alumno y con 2 decimales) con un nº aleatorio entre 0 y 10
Si la dificultad es alta: Se generará la nota (para cada alumno y con 2 decimales) gerando un primer nº aleatorio entre 0 y 10, luego un segudo nº aleatorio también entre 0 y 10 y finalmente, la nota será el nº mínimo de ambos.
La cuarta opción representa la lista de los alumnos junto con sus notas.
La quinta opción cierra el aplicativo.
*/?>
