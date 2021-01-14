# ZONA-NORTE
## TP ecomerce Darkcode

## Pasos para instalar el Proyecto
1. Descargar XAMP y prender el apache.
2. Clonar el proyecto dentro de la carpeta <span style="background:yellow;">C:\xampp\htdocs</span>
3. Correr el scrip `tp_db.sql` que crea una base de datos desde MySQL Workbench
4. En caso de no usar MySQL con <span style="background:yellow;">PHPMyAdmin</span> en `http://localhost/phpmyadmin/`
5. Visualizar el proyecto en un navegador web

## Configuracion de la base de Datos en MySQL Workbench

- En el archivo `Modelo\dbMysql.php` modificar las variables.

````php
function __construct()
{   //Gestionar la conexión a DB
	$dsn = "mysql:host=localhost;dbname=tp_db;port=3306";
	$user = "root";
	$pass = "";
}
````

&nbsp;
<h1 align="center" >SPRINTS DEL TP</h1>

### Sprint 1
Fecha de entrega: Viernes 17/5

#### Objetivo
Contar con un formulario de registración y login completamente funcionales. Poder identificar desde el front-end la condición de "usuario logueado".

### Sprint 2
Fecha de entrega: Viernes 31/5
#### Objetivo
El objetivo del sprint consiste en modificarlo el código de nuestro sitio entregado en el sprint anterior para que en vez de manejarse con soportes JSON lo haga con una base de datos MySQL. Es necesario incluir en la entrega un archivo .sql que permita crear la base de datos.

### Sprint 3 - OOP
Fecha de entrega: Miércoles 3/7
#### Objetivo
Siguiendo la guía de migración que hicimos en clase cada proyecto deberá migrar a Programación Orientada a Objetos. Es decir que las funciones que hoy tenemos dentro del archivo funciones.php deben quedar distribuidas como métodos de clases. Si todo está migrado correctamente al eliminar el archivo funciones.php el sistema seguirá funcionando sin problemas.

Las instancias a migrar son: registro, login y home page para identificar que un usaurio está logueado.

### Sprint 4 - Migracion a Laravel
Fecha de entrega: Lunes 5/8
#### Objetivo
El objetivo del sprint consiste en migrar todo el proyecto a Laravel un framework de PHP para escalar el proyecto y aumentarle funcionalidad.

Recordemos que Laravel usa MVC, Link del proyecto:
[Migracion Laravel](https://github.com/gianpieryup/Darkcode)
