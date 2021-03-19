CRUD con codeigniter 4 de una biblioteca visto en el canal de youtube Develoteca
https://www.youtube.com/watch?v=yr699_OD3-g&ab_channel=Develoteca

====================Extensiones recomendadas a instalar en visual studio code=============
* Bootstrap v4 Snippets
* CodeIgniter Spark

=====================================Base de datos===================================
+ Crear en phpmyadmin una base con el nombre bibliotecacodeigniter4 con una tabla llamada libros

 Models->Libro.php


=========================Instrucciones o pasos a seguir==================
* Para usar la extensión de spark, estando en el archivo Home.php se pude activar spark oprimiendo la tecla F1 ->Spark: Create Views y poner el nombre de la vista a crear, en este caso se llamará listar

* Presionar F1 y escribir Spark: Create Model y para el modelo poner Libro, enter. Nombre de la tabla: libros. No generar migraciones. Si crear un controlador para el modelo con el nombre de Libros, enter y se crearan dos archivos, los cuales son el controlador y el modelo.

* Para crear una ruta, F1 Spark: Create Route. Nombre de la ruta: listar; escribir Libros, que es el nombre del controlador a donde me va a llevar y el nombre de la funcion que sería index, llevándonos de forma automática a la dirección que dice Routes.php creando esta línea de código en la parte de abajo: $routes->get('listar', 'Libros::index'); 
Para comprobar que se haya creado lo anterior correctamente escribo el el navegador http://localhost/biblioteca/public/listar

* Ir a Config->Boot->production.php y cambiar la línea 10 donde dice ini_set('display_errors', '0'); (hay que cambiar el valor 0 por 1 para visualizar los errores)

* Uso de snippets: 
	b-table-header para la tabla de la vista listar
	b-form-enctype, b-form-group, b-form-file, b-card  para el formulario de la vista crear
	

