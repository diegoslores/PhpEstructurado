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
    }
    //Si existe el usuario 'user' con pass '123' entra en el programa.
    if(isset($_POST['nombre'])){
      opciones();
    }else{
      login();
    }
  //Mediante un switch ejecuto las diferentes opciones.
    if(isset($_POST["menu"])){
      switch($_POST["menu"]){
        case 'Alumnos':
          imprimirAlumnos($_SESSION['alumnos']);
          break;
        case 'Matricula':
          imprimirAlumnos($_SESSION['alumnos']);
          break;
        case 'Examen':
          imprimirAlumnos($_SESSION['alumnos']);
          break;
        case 'Notas':
          imprimirAlumnos($_SESSION['alumnos']);
          break;
        case 'Salir':
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
  if($_POST['nombre']=='user' and $_POST['contraseña']=='123'){
    $_SESSION['user'] = $_POST['nombre'];
    $_SESSION['pass'] = $_POST['contraseña'];
  echo "<p>Bienvenido ".$_SESSION['user']."! Tu id de sesión actual es: ".session_id()."</p>";
  imprimeBotones();
  echo "
  </header>
  <main class='cuerpo'>
  ";
  }else if($_POST['nombre']!=NULL or $_POST['contraseña']!=NULL){
    echo '<div style="color:red; border:solid 1px;">Datos incompletos</div>';
    login();
  }
}
//funcion de formulario de login
function login(){
  echo "
  <form class='login' action='index.php' method='POST'>
  <input type='text' name='nombre' placeholder='Introduce tu nombre'><br>
  <input type='text' name='contraseña' placeholder='introduce tu contraseña'><br>
  <input type='submit' value='Enviar'>
  </form>";
}
//Botones de selección;
function imprimeBotones(){
  echo "
    <form action='index.php' method='POST'>
      <input type='submit' name='menu' value='Alumnos'>
      <input type='submit' name='menu' value='Matricula'>
      <input type='submit' name='menu' value='Examen'>
      <input type='submit' name='menu' value='Notas'>
      <input type='submit' name='menu' value='Salir'>
    </form>";
}
//funciones de los botones
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
//funcion de cerrar sesiones.
function cerrarSesion(){
  //Para cerrar la sesión.
  if(isset($_POST['menu'])){
    if($_POST['menu']=="salir"){
      session_destroy();
      echo '<script>location.href="index.php"</script>';
    }
  }
}
?>
