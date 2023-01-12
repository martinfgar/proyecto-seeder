1. Eliminamos las migraciones que no utilizaremos y el modelo User
2. Configuramos el .env para conectarnos con la base de datos
3. Creamos los modelos con artisan y modificamos los modelos y migraciones.
4. Creamos el comando de CrearStock y lo modificamos
5. Modificamos el fichero App/Console/Kernel.php
6. Modificamos el crontab: 
   * * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1