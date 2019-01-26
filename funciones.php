<?php
/*
 * Para no hacer los archivos demasiado largos en líneas, aquí en 'funciones.php' van todas 
 * las funciones que se llaman al pulsar los botones excepto la de cerrar sesion.
 */ 
 
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