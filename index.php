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
          ['nombre'=> 'Eugenio', 'apellido' => 'Martínez', 'notas' => [3,5]],
          ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => [3]],
          ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => [3]],
          ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => [3]]
        ];
    }
    //Si existe el usuario 'user' con pass '123' entra en el programa.
    if(isset($_POST['nombre'])){
      opciones();
    }else{
      login();
    }
    echo "
    </header>
      <main class='cuerpo'>
    ";
  //Mediante un switch ejecuto las diferentes opciones.
    if(isset($_POST["menu"])){
      switch($_POST["menu"]){
        case 'Alumnos':
          imprimirAlumnos($_SESSION['alumnos']);
          break;
        case 'Matricula':

          break;
        case 'Examen':

          break;
        case 'Notas':
          printAlumnosNotas($_SESSION['alumnos']);
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
  imprimeBotones();
}else if($_POST['nombre']==NULL or $_POST['contraseña']==NULL){
    echo '<div id="incompleto"><pre>Datos Incompletos</pre></div>';
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
      <input type='submit' name='menu' value='LogOut'>
    </form>";
}
//funciones de los botones
function imprimirAlumnos($datos){
  echo "
  <h3><pre>1.Listado de Alumnos</pre></h3>
  <div class='nomApe'><pre>Nombre\t\tApellido</pre></div>
  <div class='lista'>
  <ol>
  ";
  foreach($datos as $alumno){
    echo "<li><pre>".$alumno['nombre']. "\t\t" .$alumno['apellido']."</pre></li>";
  };
  echo "</ol></div>";
}
function printAlumnosNotas($datos){
  echo "
  <h3><pre>4.Listado de Alumnos y Notas</pre></h3>
  <div class='nomApeNota'><pre>Nombre\t\tApellido\t\tNotas</pre></div>
  <div class='lista'>
  <ol><pre>
  ";
  /*array_map(function($var){

  },$datos);*/
  foreach($datos as $alumno){
    echo "<li>".$alumno['nombre']."\t\t".$alumno['apellido']."</li><br/>";
  };
  echo "</pre></ol></div>";
}
/*
echo "<pre>" ;
echo "Product ID\tAmount";
array_map(function ($var) {
    echo "\n", $var['product_id'], "\t\t", $var['amount'];
}, $array);
*/
//funcion de cerrar sesiones.
function cerrarSesion(){
  //Para cerrar la sesión.
  if(isset($_POST['menu'])){
    if($_POST['menu']=="LogOut"){
      session_destroy();
      echo '<script>location.href="index.php"</script>';
    }
  }
}
?>
