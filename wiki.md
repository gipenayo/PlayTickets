##BIENVENIDO A UNA EXPERIENCIA UNICA EN PLAYTICKETS##

# 1 
Como primer paso moficamos el archivo Dockerfile en la siguiente ruta ../entorno_1/Dockerfiles/php-apache/Dockerfile unas lineas para que sea 100% funcional para nuestro proyecto, a continuacion como debiaria quedarle completo.

----------------------------------

# Puedo elegir la version de php que voy a instalar
FROM php:7.4-apache
# Puedo elegir la las librerias
RUN apt-get update && apt-get install --yes --no-install-recommends \
    zlib1g-dev \
    libzip-dev \
    unzip \    
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libssl-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && \
	apt-get upgrade -y && \
	apt-get install -y git

RUN echo "date.timezone = America/Argentina/Buenos_Aires" > /usr/local/etc/php/php.ini
RUN echo "session.cookie_lifetime=120" >> /usr/local/etc/php/php.ini
RUN echo "session.gc_maxlifetime=120" >> /usr/local/etc/php/php.ini

----------------------------------------- 
# 2
Copie el archivo .env dentro del entorno_1 que tambien estara adjuntado en el mail.

# 3
Cree una base de datos nueva con el nombre PlayTickets e importe la base que le enviamos por mail, con el archivo llamado playtickets.sql .

# 4 
Con los pasos anteriores desde github.com en el respositorio de Practicas-Profesionalizantes-2023/TicketRun clonara desde la consola con el comando git clone.

# 5
Con todos los pasos realizados exitosamente esta preparado para vivir la experiencia de PlayTickets, podra navegar como administrador ingresando desde la barra de navegación con el mail admin@admin.com la password admin1234. Donde el dicho rol accedera a una pestaña que podra:
* Agregar una nueva función, que lo hara completando todos los campos e incluida la imagen que cumpla con las siguientes condiciones (Valido .jpg, .png, .jpeg y no debe superar los 2MB).
* Ver funciones disponibles, tendra un detallado de las funciones disponibles donde podra ver las fechas por si un show tiene mas de una fecha, editar donde si o si tiene que cargar nuevamente la imagen, o eliminar (No se eliminara solo cambiara de estado en la base de datos).
* Ver usuarios registrados donde tendra un historial de los usuarios registrado y tendra una busqueda por si quiere buscar algun dato de un usario en particular sin mostrar datos sencibles.
* Historial de todas las compras realizadas, que sera una muetra del historial de todos los tickets ordenes de compra realizadas, de todos los usuarios.

# 6
Como usuario usted podrá ingresar y ver los show dispnibles sin necesidad de registrarse, cuando se decida en realizar una reserva se le abrira un formulario para que complete con sus datos, donde tendra que poner un mail para poder verificarlo, una vez recibido ese mail tendra que aceptar el link que se le envia para que se pueda cambiar correctamente el estado en la base de datos y le permita logearse de forma correcta y poder proceder en la reserva. Se le mostraran una seleccion de ascientos. Elije, confirma le mostrara un codigo QR que se lo descargara y cuando sea utilizado en el momento del evento, dejara registro que ese qr ya fue utilizado por lo tanto lo puede usar una sola vez. Desde la barra de navegacion cuando usted se encuentra logueada podra acceder a cambiar algun dato que haya escrito mal, execpto datos sensibles, y tambien podra observar un historial con todas las reservas hechas. Como tambien podra recuperar su contraseña en caso de olvidarla, por supuesto usando el mail que uso para registrarse. 

# 7
Para poder scannear el codigo QR desde su celular, deberá identificar la dirección IP donde este conectado su equipo, podrá hacerlo desde la terminal ubuntu utilizando el comando ifconfing y si no le aparece en la terminal debera ingresar a los apartados de redes de su pc y ver las propiedades del wifi donde este conectado. Una vez verificado el IP deberá ingresar a la carpeta controller e ingresar al archivo llamado "generate_qr.php" y en la linea 9 debera cambiar la IP por la suya, como ejemplo deberá quedarle [ $url = "http://'su IP':8080/TicketRun/view/conf_qr.php?id=".$id; ] . Una vez cambiado en ese archivo deberá ingresar al archivo conf_reserve.php y en la linea 12 repetir los pasos anteriores.

