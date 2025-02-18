
# 📚 Repositorio de Recursos Escolares - Laravel App

Este es un proyecto desarrollado en Laravel que funciona como un repositorio de recursos escolares. Los usuarios pueden subir múltiples adjuntos en un mismo repositorio, definir la privacidad de sus recursos, gestionar eventos personales con FullCalendar. Además, los usuarios pueden estar vinculados a un centro educativo o ser independientes.

La aplicación usa Livewire para interactividad en tiempo real, Breeze para autenticación, MailHog para verificar la autentificación, y Policies para manejar permisos de acceso a los recursos.


## 📥 Instalación

1️⃣ Requisitos Previos
- XAMPP (o MySQL y PHP por separado)
- Composer
- Node.js

2️⃣ Clonar el Repositorio

```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio
```
3️⃣ Instalar Dependencias
```bash
composer install
npm install && npm run dev
```
4️⃣ Configurar Variables de Entorno
```bash
cp .env.example .env
```
En el archivo .env, configura la base de datos:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=escuela_db
DB_USERNAME=root
DB_PASSWORD=
```
Configura MailHog para pruebas de correo:

```bash
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="admin@escuela.com"
MAIL_FROM_NAME="Repositorio Escolar"
```
5️⃣ Generar Clave de la Aplicación

```bash
php artisan key:generate
```
6️⃣ Migrar y Poblar la Base de Datos
```bash
php artisan migrate --seed
```
Esto creará las tablas necesarias y agregará datos de prueba con los seeders.

7️⃣ Iniciar el Servidor

Si usas XAMPP, asegúrate de que Apache y MySQL estén activos. Luego, ejecuta:
```bash
php artisan serve
```
## 📌 Funcionalidades

✅ Usuarios pueden registrarse y autenticarse con Breeze

✅ Subida de archivos múltiples en un mismo repositorio

✅ Gestión de eventos personales con FullCalendar

✅ Control de privacidad en los recursos (públicos o privados)

✅ Usuarios pueden pertenecer a un centro educativo o ser independientes

✅ Visualización de recursos públicos de otros usuarios

✅ Envío de correos electrónicos usando MailHog

✅ Policies para gestionar permisos de acceso a los recursos
## 🖼 Capturas de Pantalla



## Autor

- [@alejandro14972](https://github.com/alejandro14972)

