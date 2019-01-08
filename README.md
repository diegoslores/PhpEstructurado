# README

## Para qué es este repo?

Este repo plantea un ejercicio sencillo para quien se inicia en la programación.

Sin conocimientos sobre Programación Orienta a Objetos, pretende desde un enfoque de programación estructurada, implementar un aplicativo Web que solucione un problema de conocido contexto y que éste no plantee ningún esfuerzo de compresión. El contexto seleccionado es la gestión de realización de exámenes de alumnos y la gestión de sus notas por parte de un profesor. (Ejercicio didáctico).

Suponemos que ya existe una implementación de este aplicativo en Java y que se va a realizar en el contexto de un proyecto LAMP.

Está implementada una solución que prevé una interacción por Shell o consola de comandos. Esta es una demo de ese programa:

![Un gif con la demo del programa en ejecución](doc/resources/JavaEstructuradoAlumnos.gif)

También puedes ejecutarla en tu equipo desde la Shell con la siguiente instrucción (sitúate en la raiz del repo):

```Shell
java -jar doc/resources/Programa.jar
```

El programa representa un menú de 5 acciones que puede realizar un profesor: 

* La primera imprimir una lista de sus alumnos (el programa ya tiene una lista precargada de alumnos). 
* La segunda, añade un nuevo alumno pidiendo los datos necesarios (nombre y apellidos inicialmente). 
* La tercera simula un examen de los alumnos existentes (la simulación de las notas se realiza para evitar introducir estas notas manualmente para cada uno, recuerda que es un problema didáctico que no tiene por qué ajustarse a la realidad). En la shell se puede ver un submenú donde se parametriza la dificultad del examen para que las notas se ajusten a este.
	* _Si la dificultad es baja_: Se generará la nota (para cada alumno y con 2 decimales) con un nº aleatorio entre 5 y 10
	* _Si la dificultad es media_: Se generará la nota (para cada alumno y con 2 decimales) con un nº aleatorio entre 0 y 10
	* _Si la dificultad es alta_: Se generará la nota (para cada alumno y con 2 decimales) gerando un primer nº aleatorio entre 0 y 10, luego un segudo nº aleatorio también entre 0 y 10 y finalmente, la nota será el nº mínimo de ambos.
* La cuarta opción representa la lista de los alumnos junto con sus notas.
* La quinta opción cierra el aplicativo.


**Por tanto, en este ejercicio se va a realizar una aplicación web, que represente este mismo funcionamiento, pero representándose en una página web.**

## Concreciones sobre especificaciones


1. Para este caso (el aplicativo web), va a disponer de un sencillo formulario de login (usuario/password). Si las credenciales son correctas (asegúrate de que sean estas: usuario: `user` password: `123`) se tendrá acceso a las opciones que se han representado anteriormente.

2. Tu aplicativo debe ser accesible a través del recurso `index.php` existente en la raiz del repo.

No se dan más indicaciones que las que aquí se expresan. Este documento README puede actualizarse o evolucionar pero si no hay otra especificación tienes libertad para representar la información en la web como más te convenga. En cualquier caso, no contravengas ninguna indicación de estos requisitos. 

Algunas consideraciones: puedes utilizar un único fichero o más de uno. Puedes utilizar mecanismos en el entorno de cliente que estimes (javascript, web dinámica, bootstrap, etc.) pero este ejercicio se centrará en el diseño del backend y no en el entorno del cliente.

## Lo que se pretende aprender de este ejercicio

* Selección de herramientas de programación
* Declaración de variables. Tipo y ámbito.
* Uso de funciones. Principio de Reutilización del Código
* Programación estructurada y basada en lenguajes de marcas con código embebido
* Librerías
* Estructuras básicas de datos
* Inserción de código en páginas web
* Validación y correctitud de datos de entrada
* Estructuras básicas de control
* Bucles
* Entrada y salida de datos
* Operadores Aritmético-lógicos
* Introducción a mecanismos de autenticación

## Antes de ponerte a trabajar...

### Haz un fork del repositorio original

Haz un fork del repositorio original y configúralo de forma privada (la actividad propuesta es individual ;)
Habilita las issues e indica que es un proyecto Php.


### Clona el repositorio

```
git clone <url de tu fork>
```

### Compila el código fuente

```
* Sitúate en la carpeta que contiene la subcarpeta src
mkdir bin
javac -d bin/ src/*.java
```

### Ejecuta el programa

```
* Sitúate en la carpeta que contiene la subcarpeta src
cd bin
Java Programa
```

### Crea tu rama de trabajo

Crea tu propia rama de trabajo! Crea una nueva rama a partir de master que se llame como el nombre de tu usuario en el curso. Te recuerdo cómo:

```
git checkout -b <usuario>
```

Tu solución final deberá estar apuntada por esta rama. Puedes utilizar todas las ramas que quieras, pero **no trabajes en la master** y asegúrate, si tienes otras ramas que forman parte de tu solución, de combinarlas con tu rama con el nombre de tu usuario.

## Documenta tu trabajo

El repo debe contener una carpeta nombrada como `doc`. [Sigue las instrucciones](doc/README.md) de cómo documentar.

## Cuándo termines tu trabajo... o eso crees...

### Etiqueta tu versión

Cuando tengas un revisión de tu código que consideres estable, etiquétala de la forma que te indique el [mecanismo de versionado](doc/README.md). Modifica tambien el [changelog](doc/changelog.md) indicando las novedades de la versión.
Puedes hacer etiquetado de tu último commit de la siguiente manera:

```
# Si quieres hacer una etiqueta ligera (solo nombrar un commit
git tag <etiqueta>

# Si quieres hacer una etiqueta que contenga más información
git tag -a <etiqueta> -m 'El mensaje'
```

Si quieres poner una etiqueta a un commit anterior, pon su checksum al final de las instrucciones anteriores.

Recuerda enviar tus tags a tus repos remotos de la siguiente manera:

```
git push <remoto> <tag>
```

Consulta esta [fuente](https://git-scm.com/book/es/v2/Fundamentos-de-Git-Etiquetado) para más detalles.

## Estrategia de ramificación

Rama					| Uso
------------ 			| -------------
`master`	 			| Evolución del enunciado del ejercicio
`remote\usuario` 	| Evolución de la solución de cada alumno
`solución_x`			| Rama que representa una solución (puede derivar de master u otra rama)

### Changelog de enunciado:

Se irán etiquetando enunciados consolidados y entregados a alumnos:

Tag				| Descripción
------------ 	| -------------
`enum-v1`		| Enunciado inicial


### Snapshot actual del enunciado:

```Shell
├── README.md
├── doc
│   ├── README.md
│   ├── changelog.md
│   └── resources
│       ├── JavaEstructuradoAlumnos.gif
│       └── Programa.jar
└── index.php
```

## Contribution guidelines

* Writing tests
* Code review
* Other guidelines

## Who do I talk to?

* Repo owner or admin
* Other community or team contact