# ZONA-NORTE
tp ecomerce Darkcode

Pasos para instalar el Proyecto
Descargar XAMP
Descargar el repositorio, en la carpeta htdocs

Ejecutar composer install para que composer descargue todas las carpetas y paquetes necesarios para correr Laravel.
Revisar que exista archivo .env. Si no está copiar el archivo .env-example y eliminar -example
Chequear que tenga valores la posicion APP_KEY. Si no está hay que crearla con el comando php artisan key:generate
Revisar la información de conexión a la db. Son las posicones DB_ .
Tener Creada una base de datos llamada darkcode o volver al punto 6.
