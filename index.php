<?php  session_start(); ?>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alumnos y Profesores</title>
  <link rel="stylesheet" type="text/css" href="./css.css" />
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
        ['nombre'=> 'Marta', 'apellido' => 'Carrera', 'notas' => []],
        ['nombre'=> 'Nacho', 'apellido' => 'Herrera', 'notas' => []],
        ['nombre'=> 'Anxo', 'apellido' => 'Iglesias', 'notas' => []]
      ];
    }
    //Con esta función iniciamos todo el aplicativo de gestión de alumnos. Pasando como parametro el array en el que guardamos los usuarios permitidos a login.
    init($usuarios);
    ?>
  </main>
</body>
</html>
<?php
//con esta función comprobamos que el usuario que se está logueando existe. en caso afirmativo se entra en el aplicativo. En caso cotrario seguira el formulario de login.
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
//Botones de selección de funcionalidades del aplicativo;
function imprimeBotones(){
  echo "<form action='index.php' method='POST'>
      <input type='submit' name='menu' value='Alumnos'>
      <input type='submit' name='menu' value='Matricular'>
      <input type='submit' name='menu' value='Examen'>
      <input type='submit' name='menu' value='Notas'>
      <input type='submit' name='menu' value='LogOut'>
    </form>";
}
//función de cerrar sesion.
function cerrarSesion(){
  if(isset($_POST['menu'])){
    if($_POST['menu']=='LogOut'){
      session_destroy();
      echo '<script>location.href="index.php"</script>';
    }
  }
}
//Esta función una vez dentro del aplicativo añade a cada iteración las ttres lineas de cabezera. Es para ahorrar lineas de código.
function headerInit(){
  imprimeBotones();
  $alumnos = $_SESSION['alumnos'];
  echo "</nav></header>
  <main class='cuerpo'>";
  return $alumnos;
}
//Función principal del programa. En ella se ejecutan todas las peticiones del usuario al pulsar un botón. Se le pasa como parámetro la lista de usuarios permitidos.
function init($usuarios){
  //En el primer if responde al botón de login. Si este es pulsado entra en la función validar.
  if (isset($_POST['login'])) {
    validar($usuarios);
  //Una vez dentro del aplicativo cuando pulsamos uno de los cinco botones del menú (isset menú) entra dentro de este if que esta compuesto con un switch en el que 
  //cada case responde ante cada botón del menú.
  }else  if(isset($_POST["menu"])){
    $alumnos = headerInit();
    switch($_POST["menu"]){
      case 'Alumnos':
      echo "<h3><pre>1.Listado de Alumnos</pre></h3>";
        imprimirAlumnos($_SESSION['alumnos']);
        break;
      case 'Matricular':
        formMatricularAlumno();
        break;
      case 'Examen':
        simuladorExamen();
        break;
      case 'Notas':
      echo "<h3><pre>4.Listado de Alumnos y Notas</pre></h3>";
        printAlumnosNotas($_SESSION['alumnos']);
        break;
      case 'LogOut':
        cerrarSesion();
        break;
    }
  //Una vez dentro del submenu matricular existe otro formulario que responde ante este if si pulsas el botón de añadir. Aqui se procesa el añadido de un nuevo alumno a la lista.
  }else  if(isset($_POST["addAlumn"])){
    $alumnos = headerInit();
    $_SESSION['alumnos'] = procesarDatosMatricula($alumnos);
    formMatricularAlumno();
    imprimirAlumnos($_SESSION['alumnos']);   
  //En el submenú de examen al pulsar el botón de generar notas entra en este if y ejecuta las funciones para generar un examen y añadir las notas a los alumnos.     
  }else  if(isset($_POST["generateExam"])){
    $alumnos = headerInit();
    $_SESSION['alumnos'] = addScore($alumnos);
    echo "<div class='generator'>";
    simuladorExamen();
    echo "<div class='tableGenerator'>"; 
    printAlumnosNotas($_SESSION['alumnos']);
    echo "</div></div>";       
  }else {
    //En caso de que los isset anteriores no existan se imprime el login.
      login();
  }
}
?>
