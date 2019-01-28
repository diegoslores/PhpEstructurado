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

 function matricularAlumno($array){
   echo "<h3><pre>2.Matricular Alumnos</pre></h3>
   <form class='formMatricula' action='index.php' method='POST'>
 	 <input type='text' name='nombre' placeholder='Introduce Nombre Alumno'>
 	 <input type='text' name='apellido' placeholder='Introduce Apellido Alumno'>
   <input type='submit' name='matricula' value='Enviar'/>
 	 </form>";

    if(isset($_POST['matricula'])){
      for($i=0; $i<count($array); $i++){
        if($array[$i]['nombre'] == $_POST['nombre'] && $array[$i]['apellido'] == $_POST['apellido']){
          echo "El alumno ya existe";
        }else{
          if(!$i){
            $array[] = [
              'nombre' => $_POST['nombre'],
              'apellido' => $_POST['apellido']
            ];
            return $array;
          }
        }
      }
    }
    print_r($array);
  }

 function simuladorExamen($array){
   echo "<h3><pre>3.Simulador de Examen</pre></h3>
   <label><pre>Nivel Facil</pre>
   <input name='facil' type='radio' value='facil' />
   </label><label><pre>Nivel Medio</pre>
   <input name='medio' type='radio' value='medio' />
   </label><label><pre>Nivel Alto</pre>
   <input name='alto' type='radio' value='alto' />
   </label>";
 }

 function printAlumnosNotas($datos){
   echo "<h3><pre>4.Listado de Alumnos y Notas</pre></h3>
   <div class='nomApeNota'><pre><span>Nombre  \t\t Apellido\tMedia\tNotas</span></pre></div>
   <table border=1>
   <ol><pre>";
   foreach ($datos as $alumno) {
     echo $alumno['nombre']."\t\t\t". $alumno['apellido']." \t";
     if($alumno['notas'] == NULL){
       echo "- ";
     }else{
       echo notaMedia($alumno["notas"])."\t";
     }
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
 	$media = $sumaNotas/$totalNotas;
 	return $media;
 }
?>
