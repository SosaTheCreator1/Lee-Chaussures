Pasos

- Bajar github descktop
    - Clonar el repositorio repositorio = https://github.com/Drubban/Lee-Chaussures.git
- tener version superior (v.8.0) de xampp
- entrar a variables del entorno y en path configurar "C:\xampp\php\"
- abrir una terminal como administrador en power shell 
    - ejecutar los siguientes comandos:
        - Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows'))
        - composer global require laravel/installer
    - En otra terminal de powershell abriran la direccion del repositorio clonado:
        - cd E:\Data\GithubProjekts\Lee-Chaussures
        - npm install
        - composer install 
        - php artisan key:generate
        - php artisan serve


Estandares
    La especificación de Commits Convencionales es una convención ligera sobre los mensajes de commits. Proporciona un conjunto sencillo de reglas para crear un historial de commits explícito; lo que hace más fácil escribir herramientas automatizadas encima del historial. Esta convención encaja con SemVer, al describir en los mensajes de los commits las funcionalidades, arreglos, y cambios de ruptura hechos.

Especificación
    - Los commits DEBEN iniciarse con un prefijo de tipo que consiste en un sustantivo, feat, fix, etc., seguido del ámbito OPCIONAL, !OPCIONAL, y dos puntos y un espacio REQUERIDO.
    - El tipo feat DEBE ser usado cuando un commit agrega una nueva funcionalidad a la aplicación o librería.
    - El tipo fix DEBE ser usado cuando el commit representa una corrección a un error en el código de la aplicación (bug).
    - Un ámbito PUEDE ser añadido después de un tipo. Un ámbito DEBE consistir en un sustantivo que describa una sección de la base del código encerrado entre paréntesis, ej., fix(parser)
    - Una descripción DEBE ir inmediatamente después de los dos puntos y el espacio del prefijo de tipo/ámbito. La descripción es resúmen corto de los cambios realizados en el código, ej., fix: array parsing issue when multiple spaces were contained in string..
    - Un cuerpo de commit más extenso PUEDE agregarse después de la descripción corta, dando información contextual adicional acerca de los cambios en el código. El cuerpo DEBE iniciar después de una línea en blanco después de la descripción.
    - Un cuerpo de commit es de forma-libre y PUEDE consistir de cualquier número de párrafos separados por una nueva línea.
    - Una o más notas al pie PUEDEN ser añadidas una línea en blanco después del cuerpo. Cada nota al pie DEBE consistir de una palabra clave, seguida ya sea por un separador :<espacio> o <espacio>#, seguido por un valor cadena (string) (esto está inspirado por la convención git trailer).
    - Una palabra clave de una nota al pie DEBE usar `` en lugar de caracteres de espacios en blanco, ej., Acked-by (esto ayuda a diferenciar la sección de la nota al pie de un cuerpo multi párrafo). Se hace una excepción para `BREAKING CHANGE`, que también PUEDE ser usada como palabra clave.
    - Una nota al pie PUEDE contener espacios y líneas en blanco, y el parseo DEBE terminar cuando se observe el siguiente separador/clave.
    - Los cambios de ruptura DEBEN ser indicados en el prefijo de tipo/ámbito de un commit, o como una entrada en la nota al pie.
    - Si se incluye como una nota al pie, un cambio de ruptura DEBE consistir del texto en mayúsculas BREAKING CHANGE, seguido de dos puntos, y una descripción, ej., BREAKING CHANGE: environment variables now take precedence over config files.
    - Si se incluye en el prefijo de tipo/ámbito, cambios de ruptura DEBEN ser indicados por un ! inmediatamente después de :. Si ! es usado, BREAKING CHANGE: PUEDE ser omitido de la sección de la nota al pie, y la descripción del commit DEBERÁ ser usada para describir el cambio de ruptura.
    - Tipos diferentes a feat y fix PUEDEN ser usados en los mensajes de commit, ej., docs: updated ref docs..
    - Las unidades de información que componen Commits Convencionales NO DEBEN ser tratados como implementadores sensitivos de caso, con la excepción de BREAKING CHANGE que DEBE ir en mayúsculas.
    - BREAKING-CHANGE DEBE ser sinónimo de BREAKING CHANGE, cuando se usa en una nota al pie.
    - Cada que se modifique o cree archivos blade, api o php solo se subiran esos archivos, evitar subir principalmente el archivo .env


Tipos
    - El primer elemento es el tipo de commit refiriéndose al contenido del commit. Basados en la convención establecida por Angular son los siguientes:
    - feat: cuando se añade una nueva funcionalidad.
    - fix: cuando se arregla un error.
    - chore: tareas rutinarias que no sean específicas de una feature o un error como por ejemplo añadir contenido al fichero .gitignore o instalar una dependencia.
    - test: si añadimos o arreglamos tests.
    - docs: cuando solo se modifica documentación.
    - build: cuando el cambio afecta al compilado del proyecto.
    - ci: el cambio afecta a ficheros de configuración y scripts relacionados con la integración continua.
    - style: cambios de legibilidad o formateo de código que no afecta a funcionalidad.
    - refactor: cambio de código que no corrige errores ni añade funcionalidad, pero mejora el código.
    - perf: usado para mejoras de rendimiento.
    - revert: si el commit revierte un commit anterior. Debería indicarse el hash del commit que se revierte.

Ambito
    El campo ámbito es opcional y sirve para dar información contextual como por ejemplo indicar el nombre de la feature a la que afecta el commit.

Descripción
    Breve descripción del cambio cumpliendo lo siguiente:
        - usa imperativos, en tiempo presente: “añade” mejor que “añadido” o “añadidos”
        - la primera letra siempre irá en minúscula
        - no escribir un punto al final