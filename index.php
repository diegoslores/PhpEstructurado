<?php session_start(); ?>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alumnos y Profesores</title>
  <link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
  <header>
    <h2><pre>..::ACADEMIA SANCLEMENTE::..</pre></h2>

  <nav class="cabecera">
    <?php
    if(!isset($_SESSION['alumnos'])){
		  $_SESSION['alumnos'] = [
        ['nombre'=> 'Eugenio', 'apellido' => 'Martínez', 'notas' => [5]],
        ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => [6]],
        ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => [4]],
        ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => [7]]
      ];
    }
    //Si existe el usuario 'user' con pass '123' entra en el programa.
    if(isset($_POST['usuario'])){
      opciones();
    }else{
      login();
    }
    echo "</nav></header>
      <main class='cuerpo'>";
  //Mediante un switch ejecuto las diferentes opciones.
    if(isset($_POST["menu"])){
      switch($_POST["menu"]){
        case 'Alumnos':
          imprimirAlumnos($_SESSION['alumnos']);
          break;
        case 'Matricula':
          matricularAlumno();
          break;
        case 'Examen':
          simuladorExamen();
          break;
        case 'Notas':
          printAlumnosNotas($_SESSION['alumnos']);
          break;
        case 'LogOut':
          cerrarSesion();
          break;
      }
    }
    ?>
  </main>
</body>
</html>
<?php
function opciones(){
  if($_POST['usuario']=='user' and $_POST['contraseña']=='123'){
    $_SESSION['user'] = $_POST['usuario'];
    $_SESSION['pass'] = $_POST['contraseña'];
    imprimeBotones();
  }else if(($_POST['usuario']!='user' and $_POST['contraseña']!='123') or $_POST['usuario']!='user' or $_POST['contraseña']!='123'){
    echo '<div id="incompleto"><pre>Login Erroneo</pre></div>';
    login();
  }
}

//funciones de los botones
function imprimirAlumnos($datos){
  echo "<h3><pre>1.Listado de Alumnos</pre></h3>
  <div class='nomApe'><pre><span>Nombre  \t Apellido</pre></span></div>
  <div class='lista'><ol>";
  foreach($datos as $alumno){
    echo "<li><pre>".$alumno['nombre']."\t\t".$alumno['apellido']."</pre></li>";
  };
  echo "</ol></div>";
}
function matricularAlumno(){
  echo "<h3><pre>2.Matricular Alumnos</pre></h3>
  <form class='formMatricula' action='index.php' method='GET'>
	 	<input type='text' name='nombre' placeholder='Introduce Nombre Alumno'>
	 	<input type='text' name='apellido' placeholder='Introduce Apellido Alumno'>
 		<input type='submit' value='Enviar'/>
	</form>";
  if($_GET['nombre'] == NULL || $_GET['apellido'] == NULL ){
			echo "<h3 style='color:red;'>Rellena los campos.</h3>";
		}else{echo "hola";}
}
function simuladorExamen(){
  echo "<h3><pre>3.Simulador de Examen</pre></h3>
  <div class='nomApe'><pre>Simulando...</pre></div>
  <ol>";
}
function printAlumnosNotas($datos){
  echo "<h3><pre>4.Listado de Alumnos y Notas</pre></h3>
  <div class='nomApeNota'><pre><span>Nombre  \t Apellido\tMedia\tNotas</span></pre></div>
  <table border=1>
  <ol><pre>";
  foreach ($datos as $alumno) {
  	echo $alumno['nombre']."\t\t". $alumno['apellido']." \t";
    echo notaMedia($alumno["notas"])."\t";
  	 foreach($alumno['notas'] as $nota){
  		echo "$nota | ";
  	 }
    	echo "<br /><br />";
  }
    echo "</ol></div>";
}
//funcion de formulario de login
function login(){
  echo "<form class='login' action='index.php' method='POST'>
  <input type='text' name='usuario' placeholder='Introduce tu nombre'><br>
  <input type='text' name='contraseña' placeholder='introduce tu contraseña' autocomplete='off'><br>
  <input type='submit' value='Enviar'>
  </form>";
}
//Botones de selección;
function imprimeBotones(){
  echo "<form action='index.php' method='POST'>
      <input type='submit' name='menu' value='Alumnos'>
      <input type='submit' name='menu' value='Matricula'>
      <input type='submit' name='menu' value='Examen'>
      <input type='submit' name='menu' value='Notas'>
      <input type='submit' name='menu' value='LogOut'>
    </form>";
}
//funcion de cerrar sesiones.
function cerrarSesion(){
  if(isset($_POST['menu'])){
    if($_POST['menu']=="LogOut"){
      session_destroy();
      echo '<script>location.href="index.php"</script>';
    }
  }
}
function notaMedia($notas){
  if($notas=NaN){
    return $media="0";
  }else{
	  $sumaNotas = array_sum($notas);
	  $totalNotas = count($notas);
	  $media = $sumaNotas/$totalNotas;
	  return $media;
  }
}
?>
