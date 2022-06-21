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

1.Crear la carpeta donde desees guardar el proyecto.

2.En la consola, utilice el comando `cd` para dirigirse a la carpeta anteriormente creada.

3.Utilice el comando `git clone https://github.com/Bauty887/cuatroenlinea` para clonar la carpeta, donde están todos los archivos de nuestro juego.

4.Use `cd cuatroenlinea` una vez más para ingresar a la carpeta clonada.

# Ejecutar Docker Desktop
Antes de iniciarlizar la configuración de DDEV, es importante tener en cuenta que necesitamos que funcione correctamente Docker, esto se hace siguiendo la guia anterior.

# Configurar DDEV
Este programa al utilizar DDEV debe ser configurado manualmente por cada proyecto. Por ende, dentro de la misma carpeta vamos a colocar:

1. Primero corrobora que tengas correctamente instalado DDEV, mediante el comando `ddev` que se ingresa en la consola.
2. Una vez corroborado, ingresar `ddev config` esto nos pedirá que ingresemos: 

    -Proyect Name: puede ser cualquiera, si se deja en blanco será cuatroenlinea.

    -Docroot Location: este campo nos determinara la ubicación, dejarlo en blanco (sugerencia) para que los archivos del programa estén en el mismo directorio.

    -Proyect Type: en nuestro caso debe ser `laravel`.

3. Debemos instalar composer para ello ingresamos `ddev composer install` (Esto puede demorar un tiempo)
4. Crear el archivo de ambiente para el proyecto .env. Para ello utilizamos `cp .env.example .env`
5. Crear una clave de autenticación para el proyecto, basta con escribir `php artisan key:generate`
