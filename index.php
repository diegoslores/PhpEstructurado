<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alumnos y Profesores</title>
  <link rel="stylesheet" type="text/css" href="newcss.css" />
</head>
<body>
  <header class="cabecera">
    <?php
    if($_POST['nombre']=="user" and $_POST['contraseña']=="123"){
        session_start();
        if(!isset($_SESSION['alumnos'])){
		      $_SESSION['alumnos'] = [
          ['nombre'=> 'Carlos', 'apellido' => 'Martínez', 'notas' => []],
          ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => []],
          ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => []],
          ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => []]
        ];
        imprimeBotonAlumnos();
        //imprimeBotonMatricula();
        //imprimeBotonExamen();
        //imprimeBotonNotas();
        //imprimeBotonsalir();
        }
  echo "
  </header>
  <main class='cuerpo'>
    ";
      if($_POST['alumnos']=="Alumnos"){
        imprimirAlumnos($alumnos);
      }
  }else{
      echo "
        <form action='index.php' method='POST'>
  			Introduce tu nombre:<input type='text' name='nombre'><br>
  			Introduce contraseña:<input type='text' name='contraseña'><br>
  			<input type='submit' value='Enviar'>
  			</form>";
        echo "
        </header>
        <main class='cuerpo'>
        ";
    }
    if(isset($_GET['salir'])){
			if($_GET['salir']=="Salir"){
				session_destroy();
				//Despues de destruir la sesión se repinta la página con la funcion header()
				header("Location: index.php");
			}
		}
    ?>
  </main>
</body>
</html>
<?php
//Botones de selección;
function imprimeBotonAlumnos(){
  echo "
    <form action='index.php' method='POST'>
      <input type='submit' name='alumnos' value='Alumnos'>
    </form>";
}
function imprimeBotonMatricula(){
  echo "
    <form action='index.php' method='POST'>
      <input type='submit' name='matricula' value='Matricula'>
    </form>";
}
function imprimeBotonExamen(){
  echo "
    <form action='index.php' method='POST'>
      <input type='submit' name='examen' value='Examen'>
    </form>";
}
function imprimeBotonNotas(){
  echo "
    <form action='index.php' method='POST'>
      <input type='submit' name='notas' value='Notas'>
    </form>";
}
function imprimeBotonsalir(){
  echo "
    <form action='index.php' method='POST'>
      <input type='submit' name='salir' value='Salir'>
    </form>";
}
function imprimirAlumnos($datos){
  echo "
  <div class='todo'>
  <h3><pre>1.Listado de Alumnos</pre></h3>
  <div class='nomApe'><pre>Nombre\t\tApellido</pre></div>
  <div class='lista'>
  <ol>
  ";
  foreach($datos as $alumno){
    echo "<li><pre>".$alumno['nombre']. "\t\t" .$alumno['apellido']."</pre></li>";
  };
  echo "</ol></div></div>";
}/*
La segunda, añade un nuevo alumno pidiendo los datos necesarios (nombre y apellidos inicialmente).
La tercera simula un examen de los alumnos existentes (la simulación de las notas se realiza para evitar introducir estas notas manualmente para cada uno, recuerda que es un problema didáctico que no tiene por qué ajustarse a la realidad). En la shell se puede ver un submenú donde se parametriza la dificultad del examen para que las notas se ajusten a este.
Si la dificultad es baja: Se generará la nota (para cada alumno y con 2 decimales) con un nº aleatorio entre 5 y 10
Si la dificultad es media: Se generará la nota (para cada alumno y con 2 decimales) con un nº aleatorio entre 0 y 10
Si la dificultad es alta: Se generará la nota (para cada alumno y con 2 decimales) gerando un primer nº aleatorio entre 0 y 10, luego un segudo nº aleatorio también entre 0 y 10 y finalmente, la nota será el nº mínimo de ambos.
La cuarta opción representa la lista de los alumnos junto con sus notas.
La quinta opción cierra el aplicativo.
*/?>
