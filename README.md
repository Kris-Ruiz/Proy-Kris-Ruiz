# Proyecto Kris Ruiz

Este es un proyecto de gestión de talleres para la institución Kris Ruiz. Permite a los administradores gestionar participantes y talleres, así como a los usuarios inscribirse en los talleres disponibles.

## Requisitos

- PHP 8.0 o superior
- Composer
- Laravel 9.x
- Base de datos MySQL
- Servidor web (Apache o Nginx)
- Node.js y NPM (para la parte de frontend)

## Instalación

1. Clona el repositorio en tu máquina local:
   ```bash
   git clone https://github.com/tu_usuario/proyecto-kris-ruiz.git
   ```

2. Accede a la carpeta del proyecto:
   ```bash
   cd proyecto-kris-ruiz
   ```

3. Instala las dependencias de PHP con Composer:
   ```bash
   composer install
   ```

4. Copia el archivo `.env.example` a `.env` y configura tus credenciales de base de datos y otras variables de entorno:
   ```bash
   cp .env.example .env
   ```

5. Genera una nueva clave de aplicación de Laravel:
   ```bash
   php artisan key:generate
   ```

6. Ejecuta las migraciones para crear las tablas en la base de datos:
   ```bash
   php artisan migrate
   ```

7. Instala las dependencias de JavaScript y compila los assets:
   ```bash
   npm install
   npm run dev
   ```

8. Inicia el servidor de desarrollo de Laravel:
   ```bash
   php artisan serve
   ```

9. Accede a la aplicación desde tu navegador en `http://localhost:8000`.

## Estructura de carpetas

- `app/Http/Controllers`: Controladores de la aplicación
- `app/Models`: Modelos de Eloquent
- `database/migrations`: Migraciones de base de datos
- `resources/views`: Vistas de Blade
- `routes`: Rutas de la aplicación
- `public`: Archivos públicos accesibles desde la web

## Rutas importantes

- `/`: Página de inicio
- `/talleres`: Listado de talleres
- `/participantes`: Listado de participantes (solo para admin)
- `/login`: Página de inicio de sesión
- `/register`: Página de registro

## Autenticación

La aplicación utiliza el sistema de autenticación de Laravel. Puedes registrarte como nuevo usuario o iniciar sesión con un usuario existente.

## Inscripción a talleres

Los usuarios pueden inscribirse en los talleres disponibles. Al inscribirse, recibirán un correo de confirmación con los detalles del taller.

## Administración

Los administradores tienen acceso a funcionalidades adicionales, como la gestión de participantes y talleres.

## Configuración de Correos con Mailtrap

### Paso 1: Crear cuenta en Mailtrap
1. Ve a [Mailtrap.io](https://mailtrap.io) y crea una cuenta gratuita
2. Inicia sesión y ve a la sección "Email Testing"
3. Crea un nuevo proyecto o usa el proyecto "Default"
4. En el inbox, haz clic en "SMTP Settings" y selecciona "Laravel" en el menú desplegable de integraciones

### Paso 2: Configurar el archivo .env
Añade o actualiza las siguientes variables en tu archivo `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_username_de_mailtrap
MAIL_PASSWORD=tu_password_de_mailtrap
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@ejemplo.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Paso 3: Probar el envío de correos
1. Inicia sesión en la aplicación
2. Ve a la sección de talleres
3. Inscríbete en un taller
4. Verifica en tu inbox de Mailtrap que el correo de confirmación se haya recibido

### Solución de problemas comunes
- Si los correos no llegan, verifica que las credenciales en el `.env` sean correctas
- Asegúrate de que el servicio SMTP no esté bloqueado por tu firewall
- Verifica que la clase `TallerInscripcionMail` esté correctamente configurada
- Comprueba los logs en `storage/logs/laravel.log` para ver posibles errores