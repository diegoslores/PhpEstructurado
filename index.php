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
  $usuarios = [
    [
      'nombre'=>'user',
      'contraseña'=>'123'
    ]
  ];
    if(!isset($_SESSION['alumnos'])){
		  $_SESSION['alumnos'] = [
        ['nombre'=> 'Eugenio', 'apellido' => 'Martínez', 'notas' => []],
        ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => [0]],
        ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => []],
        ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => [0,5]]
      ];
    }
    //Si existe el usuario 'user' con pass '123' entra en el programa.

    if(isset($_SESSION['usuario'])){
      imprimeBotones();
    }else{
      login();
    }
    echo "</nav></header>
      <main class='cuerpo'>";
  //Mediante un switch ejecuto las diferentes opciones.
    if(isset($_POST["menu"])){
      switch($_POST["menu"]){
        case 'Enviar':
          validar($usuarios);
          break;
        case 'Alumnos':
          imprimirAlumnos($_SESSION['alumnos']);
          break;
        case 'Matricular':
          formMatricularAlumno();
          break;
        case 'registroDatos':
          echo '<h1>jhghj</h1>';
          if($_GET['menu'] == "registroDatos"){
             if($_GET['nombre'] != NULL and $_GET['apellido'] != NULL ){
                 $_SESSION['alumnos'][] = ['nombre' => $_GET['nombre'], 'apellido' => $_GET['apellido']];
             }
          }
          print_r($_SESSION['alumnos']);
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

function validar($value){
  if(isset($_POST['usuario'])){
    if($_POST['usuario'] and $_POST['contraseña']){
      if($_POST['usuario'] == $value[0]['nombre']and $_POST['contraseña'] == $value[0]['contraseña']){
        $_SESSION['usuario']=[
          'nombre'=>'user',
          'contraseña'=>'123'
        ];
      }
    }
  }
}
//función de formulario de login
function login(){
  echo "<form class='login' action='index.php' method='POST'>
  <input type='text' name='usuario' placeholder='Introduce tu nombre'><br>
  <input type='password' name='contraseña' placeholder='introduce tu contraseña'><br>
  <input type='submit' name='menu' value='Enviar'>
  </form>";
}
//Botones de selección;
function imprimeBotones(){
  echo "<form action='index.php' method='POST'>
      <input type='submit' name='menu' value='Alumnos'>
      <input type='submit' name='menu' value='Matricular'>
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
/*}else if(($_POST['usuario']!='user' and $_POST['contraseña']!='123') or $_POST['usuario']!='user' or $_POST['contraseña']!='123'){
  echo '<div id="incompleto"><pre>Login Erroneo</pre></div>';
  login();
}*/
?>
