<?php session_start(); ?>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alumnos y Profesores</title>
  <link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
  <header class="cabecera">
    <?php
    if(!isset($_SESSION['alumnos'])){
		$_SESSION['alumnos'] = [
   ['nombre'=> 'Eugenio', 'apellido' => 'Martínez', 'notas' => []],
   ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => []],
   ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => []],
   ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => []]
 ];
    if(isset($_GET['salir'])){
			if($_GET['salir']=="Salir"){
				session_destroy();
      	echo '<script>location.href="index.php"</script>';
      }
		}
    if(session_status() == PHP_SESSION_ACTIVE){
          imprimeBotonAlumnos();
          imprimeBotonMatricula();
          imprimeBotonExamen();
          imprimeBotonNotas();
          imprimeBotonsalir();
      echo "
      </header>
      <main class='cuerpo'>
      ";
    }else{
      if($_GET['nombre']=='user' and $_GET['contraseña']=='123'){
				$_SESSION['nombre'] = $_GET['nombre'];
				$_SESSION['contraseña'] = $_GET['contraseña'];
				echo "<p>Bienvenido ".$_SESSION['nombre']."! Tu id de sesión actual es: ".session_id()."</p>";
        imprimeBotonAlumnos();
        imprimeBotonMatricula();
        imprimeBotonExamen();
        imprimeBotonNotas();
        imprimeBotonsalir();
				return;
			}
			else if($_GET['nombre']!=NULL or $_GET['contraseña']!=NULL){
	 			echo '<div style="color:red; border:solid 1px;">Datos incompletos</div>';
			}
			Login();
    }
    ?>
  </main>
</body>
</html>
<?php

    //sesion array de Alumnos
    //sesion user
    //swith mismo name diferente value
    //validLogon(usuarios)

function login(){
  echo "
  <form class='login' action='index.php' method='GET'>
  <input type='text' name='nombre' placeholder='Introduce tu nombre'><br>
  <input type='text' name='contraseña' placeholder='introduce tu contraseña'><br>
  <input type='submit' value='Enviar'>
  </form>";
}
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
}
?>