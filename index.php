<?php  session_start(); ?>
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
        'username'=>'user',
        'password'=>'123'
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
    init($usuarios);
    ?>
  </main>
</body>
</html>
<?php
function validar($value){
  if(!isset($_POST['usuario'])){
      if($_POST['username'] and $_POST['password'] and $_POST['username'] == $value[0]['username']and $_POST['password'] == $value[0]['password']){
        $_SESSION['usuario']=[
          'username'=>'user',
          'password'=>'123'
        ];
        imprimeBotones();
      }else{
        login();
    }    
  }else{
     login();
  }
}
//función de formulario de login
function login(){
  echo "<form class='login' action='index.php' method='POST'>
  <input type='text' name='username' placeholder='Introduce tu nombre'><br>
  <input type='password' name='password' placeholder='introduce tu contraseña'><br>
  <input type='submit' name='login' value='Enviar'>
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

function init($usuarios){
  if (isset($_POST['login'])) {
    validar($usuarios);
  }else  if(isset($_POST["menu"])){
    imprimeBotones();
    echo "</nav></header>
    <main class='cuerpo'>";
    $alumnos = $_SESSION['alumnos'];
    switch($_POST["menu"]){
      case 'Alumnos':
        imprimirAlumnos($_SESSION['alumnos']);
        break;
      case 'Matricular':
        formMatricularAlumno();
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
  }else  if(isset($_POST["AddAlumn"])){
    imprimeBotones();
    $alumnos = $_SESSION['alumnos'];
    echo "</nav></header>
    <main class='cuerpo'>";
    $_SESSION['alumnos'] = procesarDatosMatricula($alumnos);
    imprimirAlumnos($_SESSION['alumnos']);
        
  }else {
      login();
  }
}
/*}else if(($_POST['usuario']!='user' and $_POST['contraseña']!='123') or $_POST['usuario']!='user' or $_POST['contraseña']!='123'){
  echo '<div id="incompleto"><pre>Login Erroneo</pre></div>';
  login();
}*/
?>
