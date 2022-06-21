### Adaptación del ambiente de trabajo

##### Autor: Bautista Cortinas

# Trabajo sobre el juego Cuatro En Linea 

En el siguiente manual podrás ver los pasos a seguir para poder jugar al Cuatro en Línea.

# Programas
Para poder correr el juego se requiere de los siguientes programas:

-[DDEV](https://ddev.readthedocs.io/en/stable/#installation)

-[Docker Desktop](https://www.docker.com/products/docker-desktop/)

-[Git](https://git-scm.com/book/es/v2/Inicio---Sobre-el-Control-de-Versiones-Instalaci%C3%B3n-de-Git)

Cada hipervínculo te redirigirá a la página correspondiente para la instalación 

# Conseguir el código
Una vez instalado todos los programas mencionados anteriormente, puede descargar sin problemas el programa para poder avanzar.

Ese proceso lo puede hacer mediante el mismo github, o puede hacerlo mediante la clonación del repositorio. Esto se hace de la siguiente manera:

1. Crear la carpeta donde desees guardar el proyecto.

2. En la consola, utilice el comando `cd` para dirigirse a la carpeta anteriormente creada.

3. Utilice el comando `git clone https://github.com/Bauty887/cuatroenlinea` para clonar la carpeta, donde están todos los archivos de nuestro juego.

4. Use `cd cuatroenlinea` una vez más para ingresar a la carpeta clonada.

# Ejecutar Docker Desktop
Antes de iniciarlizar la configuración de DDEV, es importante tener en cuenta que necesitamos que funcione correctamente Docker, esto se hace siguiendo la guia anterior.

# Configurar DDEV
Este programa al utilizar DDEV debe ser configurado manualmente por cada proyecto. También cabe aclarar que tiene que estar en la carpeta que ha clonado/descargado obligatoriamente. Ahora, dentro de la misma carpeta vamos a ingresar:

1. Primero corrobora que tengas correctamente instalado DDEV, mediante el comando `ddev` que se ingresa en la consola.
2. Una vez corroborado, ingresar `ddev config` esto nos pedirá que ingresemos: 

    -Proyect Name: puede ser cualquiera, si se deja en blanco será cuatroenlinea.

    -Docroot Location: este campo nos determinara la ubicación, dejarlo en blanco (sugerencia) para que los archivos del programa estén en el mismo directorio.

    -Proyect Type: en nuestro caso debe ser `laravel`.

3. Debemos instalar composer para ello ingresamos `ddev composer install` (Esto puede demorar un tiempo)
4. Crear el archivo de ambiente para el proyecto .env. Para ello utilizamos `cp .env.example .env`
5. Crear una clave de autenticación para el proyecto, basta con escribir `php artisan key:generate`

# Ejecutar el juego

Si todo salió bien y no obtuvimos ningún mensaje de error podemos ahora ejecutar el comando `ddev start`.

Debemos aceptar los permisos y luego nos deberia devolver un mensaje similar al siguiente:
![image](https://user-images.githubusercontent.com/102709360/174707017-1fbee3d7-bd7b-4084-af57-83ccef5bb1c3.png)

Si todo salió como lo esperado te debería haber dejado un link el cual al copiarlo y agregarle al final `/jugar/1` a la URL podrás jugar al 4 en línea. 

En mi caso me quedo el link de la siguiente forma `https://4enlinea.ddev.site/jugar/1`, que al visualizarlo en el navegador quedaría de la siguiente forma:

![image](https://user-images.githubusercontent.com/102709360/174708769-4c997235-94ac-4d3c-bd82-fcad2e6c7cd7.png)

# Cerrar la aplicación
No se recomienda cerrar la terminal deteniendo los programas a la fuerza. Porque algunos procesos podrían persistir en segundo plano. La mejor forma de darle fin al programa utilizaremos el comando `ddev stop` con esto se nos indicará que se eliminan los contenedores.

Una vez el proyecto sea detenido podremos utilizar `exit` para poder cerrar Docker y el navegador.

Ante cualquier inconveniente se recomienda no hablarle al propietario de este documento ya que únicamente es una guía, se recomienda acudir a foros en internet. Gracias
