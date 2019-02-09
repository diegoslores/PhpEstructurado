<?php
/*
 * Para no hacer los archivos demasiado largos en líneas, aquí en 'funciones.php' van todas
 * las funciones que se llaman al pulsar los botones excepto la de cerrar sesion.
 */

 function imprimirAlumnos($datos){
   echo "<h3><pre>1.Listado de Alumnos</pre></h3>
   <div class='nomApe'><pre><span>Nombre  \t\t Apellido</pre></span></div>
   <div class='lista'><ol>";
   foreach($datos as $alumno){
     echo "<li><pre>".$alumno['nombre']."\t\t\t".$alumno['apellido']."</pre></li>";
   };
   echo "</ol></div>";
 }

 function formMatricularAlumno(){
   echo "<h3><pre>2.Matricular Alumnos</pre></h3>
   <form class='formMatricula' action='index.php' method='POST'>
 	 <input type='text' name='name' placeholder='Introduce Nombre Alumno'>
 	 <input type='text' name='surname' placeholder='Introduce Apellido Alumno'>
   <input type='submit' name='addAlumn' value='Añadir'/>
 	 </form>";
 }

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

 function simuladorExamen(){
   echo "<h3><pre>3.Simulador de Examen</pre></h3>
   <form class='formExam' action='index.php' method='POST'>
   <label><pre>Nivel Facil</pre>
   <input name='exam' type='radio' value='1' checked/>
   </label><label><pre>Nivel Medio</pre>
   <input name='exam' type='radio' value='2' />
   </label><label><pre>Nivel Alto</pre>
   <input name='exam' type='radio' value='3' />
   </label>
   <input type='submit' name='generateExam' value='Generar Nota'/>
   </form>";
 }
 function rand_float($st_num,$end_num,$mul){
  if ($st_num>$end_num) return false;
    return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
  }

  function getMinValue($float1, $float2){
    if ($float1 < $float2) { 
      return $float1;  
    }else{
      return $float2;
    }
  }

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

 function printAlumnosNotas($datos){
   echo "<h3><pre>4.Listado de Alumnos y Notas</pre></h3>
   <div class='nomApeNota'><pre><span>Nombre  \t\t Apellido\tMedia\tNotas</span></pre></div>
   <table border=1>
   <ol><pre>";
   foreach ($datos as $alumno) {
     echo $alumno['nombre']."\t\t\t". $alumno['apellido']." \t";
     //si no existe nota asociada al alumno en lugar de calcular la media pone una raya.
     if($alumno['notas'] == NULL){
       echo "- ";
     }else{
       echo notaMedia($alumno["notas"])."\t";
     }
    //imprime las notas separadas por una barra vertical.
   	foreach($alumno['notas'] as $nota){
       echo "$nota | ";
     }
     	echo "<br /><br />";
   }
     echo "</ol></div>";
 }
 //función calcular notas medias almacenadas en un array.
 function notaMedia($notas){
 	$sumaNotas = array_sum($notas);
 	$totalNotas = count($notas);
 	$media = round($sumaNotas/$totalNotas,2);
 	return $media;
 }
?>
