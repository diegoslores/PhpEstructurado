<?php
/*
 * Para no hacer los archivos demasiado largos en líneas, aquí en 'funciones.php' van todas
 * las funciones que se llaman al pulsar los botones excepto la de cerrar sesion.
 */

 //Función que mediante un for each recorre el array de alumnos y los imprime en una tabla.
 function imprimirAlumnos($datos){
  echo "<table id='tableAlumnos'>
    <tbody><tr> <th>Nombre</th><th>Apellido</th>";  
    foreach($datos as $alumn){
      echo "<tr> <td> ".$alumn["nombre"]." </td><td> ".$alumn["apellido"]." </td> ";     
    }
    echo "</tbody></table>";
  }
   
//Formulario pat¡ra matricular alumnos.
 function formMatricularAlumno(){
   echo "<h3><pre>2.Matricular Alumnos</pre></h3>
   <form class='formMatricula' action='index.php' method='POST'>
 	 <input type='text' name='name' placeholder='Introduce Nombre Alumno'>
 	 <input type='text' name='surname' placeholder='Introduce Apellido Alumno'>
   <input type='submit' name='addAlumn' value='Añadir'/>
 	 </form>";
 }

 //Array que coge los datos de matrícula y los mete en el array de alumnos.
 function procesarDatosMatricula($array){
   if(isset($_POST['addAlumn'])){
      if(!empty($_POST['name']) and !empty($_POST['surname'])){
          $array[] = [
            'nombre' => $_POST['name'],
            'apellido' => $_POST['surname'],
            'notas' => []
          ];
      }
    }
    return $array;
 }

 //Formulario para seleccionar el nivel de dificultas del examen que generará notas.
 function simuladorExamen(){
   echo "<h3><pre>3.Simulador de Examen</pre></h3>
   <form class='formExam' action='index.php' method='POST'>
   <label><span>Nivel Facil</span>
   <input name='exam' type='radio' value='1' checked/>
   </label>
   <label><span>Nivel Medio</span>
   <input name='exam' type='radio' value='2' />
   </label>
   <label><span>Nivel Alto</span>
   <input name='exam' type='radio' value='3' />
   </label>
   <label><br/>
   <input type='submit' name='generateExam' value='Generar Nota'/>
   </label>
   </form>";
 }

 // Función para generar notas de forma aleatoria. se le pasa dos valores (nota mínima y nota máxina) y un tercero como múltiplo para redondeos.
 function rand_float($st_num,$end_num,$mul){
  if ($st_num>$end_num) return false;
    return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
  }

 //Para el examen difícil hay que generar dos notas y compararlas para elegir la menor. Eso se hace con esta función.
  function getMinValue($float1, $float2){
    if ($float1 < $float2) { 
      return $float1;  
    }else{
      return $float2;
    }
  }

 //función de generación de notas en función del nivel de dificultad elegido. Se aplica las dos funciones anteriores para que salga un valor u otro.
 function addScore($array){
  if(isset($_POST['generateExam'])){
    foreach($array as $k => &$item){
      if($_POST['exam']==1){
        $item['notas'][]=rand_float(5,10,100);
      }else if ($_POST['exam']==2){
        $item['notas'][]=rand_float(0,10,100);
      }else {
        $item['notas'][]=getMinValue(rand_float(0,10,100),rand_float(0,10,100));
      }
    }
  }
  return $array;
 }

 //Función para imprimir todos los datos del alumno, incluidas notas y medias en una tabla.
 function printAlumnosNotas($datos){
  //Se imprime la cabecera de la tabla.
  echo "<table id='tablaexamenes'>
    <tbody><tr> <th>Nombre</th><th>Apellido</th>";
    //Con este for se imprime el número de nota que se va a representar debajo, nota1, nota2 ....
    echo "<th> Nota Media </th>";
    for ($i = 1; $i <= count($datos[0]["notas"]); $i++) {
      echo "<th> Nota".$i."</th>";
    }
    echo "</tr>";
    //En este bucle se empieza a recorrer el array de alumnos y a imprimir cada dato, nombre, apellido, cada nota que tenga y la media final. Cada uno debajo de su cabecera.
    foreach($datos as $alumn){
      echo "<tr> <td> ".$alumn["nombre"]." </td><td> ".$alumn["apellido"]." </td> ";
      
      if($alumn['notas'] == NULL){        
        echo "<td> - </td>";        
      }else{
        echo "<td>".notaMedia($alumn["notas"])."</td>";
      } 
      foreach($alumn["notas"] as $nota){
        echo "<td> ".$nota."</td>";
      }
      echo"</tr>";
    }
      echo "</tbody></table>";
  }
  //Función que calcula la nota media del array de notas del alumno.
  function notaMedia($notas){
    $sumaNotas = array_sum($notas);
    $totalNotas = count($notas);
    $media = round($sumaNotas/$totalNotas,2);
    return $media;
  }
?>
