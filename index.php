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
    include('funciones.php');
    if(!isset($_SESSION['alumnos'])){
		  $_SESSION['alumnos'] = [
        ['nombre'=> 'Eugenio', 'apellido' => 'Martínez', 'notas' => []],
        ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => [0]],
        ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => []],
        ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => [0,5]]
      ];
    }
    //Si existe el usuario 'user' con pass '123' entra en el programa.
    if(isset($_POST['usuario'])){
      opciones();
    }else{
      login();
      print_r ($_SESSION['alumnos']);
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
          matricularAlumno($_SESSION['alumnos']);
          break;
        case 'Examen':
          simuladorExamen($_SESSION['alumnos']);
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
  $_SESSION['user'] = $_POST['usuario'];
  $_SESSION['pass'] = $_POST['contraseña'];
  if($_POST['usuario']=='user' and $_POST['contraseña']=='123'){
    imprimeBotones();
  }else if(($_POST['usuario']!='user' and $_POST['contraseña']!='123') or $_POST['usuario']!='user' or $_POST['contraseña']!='123'){
    echo '<div id="incompleto"><pre>Login Erroneo</pre></div>';
    login();
  }
}

//función de formulario de login
function login(){
  echo "<form class='login' action='index.php' method='POST'>
  <input type='text' name='usuario' placeholder='Introduce tu nombre'><br>
  <input type='password' name='contraseña' placeholder='introduce tu contraseña'><br>
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
//función de cerrar sesiones.
function cerrarSesion(){
  if(isset($_POST['menu'])){
    if($_POST['menu']=='LogOut'){
      session_destroy();
      echo '<script>location.href="index.php"</script>';
    }
  }
}
?>
