Pagina realizada por Cristian Camilo Vasquez de 04/12/2020 a 06/12/2020

Estructura de directorios:
* App:
** Controllers: Se encuentra los controladores de las clases de obtension de los datos a traves del API weather y el controlador de historial
** Models: Se encuentra el modelo de historial que se encarga de interactuar con la DB
* Config:
** Contiene los archivos de configuracion principal como credenciales de la API weather y credenciales de bases de datos asi como tambien la conexion a la DB.
* Core:
** Core contiene clases y traits que generan funciones basicas y concretas dentro de la plataforma para su funcionamiento
* Public:
** Js: Contiene los archivos javascript los cuales generan la conexion con los controladores mediante la funcion nativa Fetch
* Resources
** Views: Contiene la vista principal que es Main.php la cual se carga desde el index y History para ilustrar el historial de humedades.

* Herramientas utilizadas *
Solo he utilizado dos herramientas que hacen parte del grupo de dependencias de NPM los cuales se almacenan en node_modules
** Boostrap : Para los estilos del sitio
** Chart JS : Para graficar los datos obtenidos desde el API

* Herramientas de entorno y externas *
He utilizado XAMPP, PHP v > 7.0, Visual studio Code, POSTMAN, Yahoo Weather API Documentation, MySQL workbench

* Configuracion del archivo vhost en xampp *
Para correr el proyecto desde xampp 
He configurado el archivo vhost el cual se encuentra en xampp/apache/conf/extra/httpd-vhosts con la siguiente configuracion
<VirtualHost *:80>
   DocumentRoot "C:/xampp/htdocs/proyectoPrueba"
   ServerName   prueba.local
</VirtualHost>
Esto lo he hecho para configurar un host virtual localmente y en vez de cargar en el navegador "C:/xampp/htdocs/proyectoPrueba/"
queda solamente http://prueba.local/ esto afecta en el modo en el que se especifican las rutas en el proyecto por lo que se debe implementar.
Tambien se debe configurar el archivo host ubicado en windows y agregar 127.0.0.1 prueba.local.

* test sql *
En test.sql se encuentra el script de la tabla historial a traves de la base de datos test.

* Herramientas consideradas para el desarrollo *
SLIM PHP, PHPdoenv, TWIG PHP, Illuminate\Database