# SiteMetrosCuadrados - Plataforma de Bienes Raíces

## 1. Resumen del Proyecto

**SiteMetrosCuadrados** es una aplicación web completa construida con el framework Laravel, diseñada para funcionar como un portal de bienes raíces. Permite a los administradores y agentes inmobiliarios gestionar y publicar propiedades, y a los usuarios finales buscar, filtrar y consultar información sobre estas propiedades.

La plataforma incluye un panel de administración robusto para la gestión de todo el contenido, un portal para agentes, y una interfaz pública para los visitantes.

---

## 2. Características Principales

La aplicación se divide en dos áreas principales: el panel de administración y el sitio público.

### Funcionalidades del Panel de Administración

- **Gestión de Propiedades:**
  - Crear, leer, actualizar y eliminar (CRUD) listados de propiedades.
  - Asignar múltiples atributos: tipo de propiedad, ciudad, propósito (venta/alquiler), precio, área, número de habitaciones, baños, etc.
  - Subir múltiples imágenes por propiedad (imagen destacada, imagen de banner, galería de imágenes).
  - Subir un archivo PDF asociado a una propiedad.
  - Marcar propiedades como destacadas, urgentes o top.
- **Gestión de Agentes:**
  - Administrar los usuarios (agentes) que pueden publicar propiedades.
- **Gestión de Contenido y Taxonomías:**
  - Administrar tipos de propiedad (ej. Casa, Apartamento).
  - Administrar ciudades y ubicaciones.
  - Administrar "amenidades" (ej. Piscina, Gimnasio) y asignarlas a las propiedades.
  - Gestionar un sistema de Blog con categorías y comentarios.
- **Gestión de Usuarios y Comunicación:**
  - Visualizar y gestionar las reseñas de propiedades dejadas por los usuarios.
  - Ver listas de deseos (`wishlists`) de los usuarios.
- **Traducciones:**
  - Soporte para la traducción de contenido de propiedades a múltiples idiomas.

### Funcionalidades del Sitio Público

- **Búsqueda y Visualización de Propiedades:**
  - Ver listados de propiedades con galerías de imágenes, descripciones detalladas, características y ubicación en el mapa.
  - Filtrar propiedades por tipo, ciudad, propósito y otros atributos.
- **Interacción del Usuario:**
  - Dejar reseñas y calificaciones en las propiedades.
  - Añadir propiedades a una lista de deseos personal.
- **Blog Informativo:**
  - Leer artículos y noticias relacionadas con el sector inmobiliario.

---

## 3. Pila Tecnológica

- **Backend:**
  - [Laravel Framework](https://laravel.com/)
  - PHP
- **Frontend:**
  - HTML5 / CSS3
  - JavaScript
  - Laravel Mix para la compilación de assets.
- **Base de Datos:**
  - MySQL (configurable en el archivo `.env`).
- **Librerías PHP Clave:**
  - **Intervention/Image:** Para el procesamiento y guardado de imágenes.
  - **Maatwebsite/Excel:** Para funcionalidades de importación/exportación de datos (ej. Ciudades).

---

## 4. Instalación y Configuración Local

Sigue estos pasos para configurar el proyecto en un entorno de desarrollo local:

1.  **Clonar el repositorio:**
    ```bash
    git clone <URL_DEL_REPOSITORIO>
    cd SiteMetrosCuadrados
    ```

2.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Crear el archivo de entorno:**
    Copia el archivo de ejemplo `.env.example` y renómbralo a `.env`.
    ```bash
    cp .env.example .env
    ```

4.  **Generar la clave de la aplicación:**
    ```bash
    php artisan key:generate
    ```

5.  **Configurar la base de datos:**
    Abre el archivo `.env` y modifica las siguientes variables con tus credenciales de base de datos local:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_metroscuadrados
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Ejecutar las migraciones y seeders:**
    Esto creará la estructura de la base de datos y la llenará con datos iniciales si existen seeders.
    ```bash
    php artisan migrate --seed
    ```

7.  **Instalar dependencias de Node.js y compilar assets:**
    ```bash
    npm install
    npm run dev
    ```

8.  **Iniciar el servidor de desarrollo:**
    ```bash
    php artisan serve
    ```
    La aplicación estará disponible en `http://127.0.0.1:8000`.

---

## 5. Configuración para Producción en Hosting Compartido

Si la aplicación se despliega en un entorno de hosting compartido (como cPanel o DirectAdmin) donde el `Document Root` del servidor es `public_html` en lugar de la carpeta `public` de Laravel, es necesario realizar un ajuste para que la subida de archivos y las rutas públicas funcionen correctamente.

**Problema:** La función `public_path()` de Laravel resuelve la ruta a la carpeta `public` del proyecto, pero en el servidor esta carpeta no es accesible públicamente. Esto causa que los archivos subidos no se encuentren (error 404).

**Solución:** Se debe sobreescribir la ruta pública de Laravel para que apunte al `Document Root` correcto del servidor (ej. `public_html`).

1.  **Abrir el archivo `app/Providers/AppServiceProvider.php`**.
2.  **Añadir el siguiente código dentro del método `register()`**:

    ```php
    public function register()
    {
        $this->app->bind('path.public', function () {
            // Apunta a la carpeta public_html que está al mismo nivel que la carpeta del proyecto Laravel
            return dirname(base_path()) . '/public_html';
        });
    }
    ```

3.  **Limpiar la caché de configuración:** Después de subir el cambio al servidor, es crucial eliminar los archivos de caché de configuración para que Laravel aplique la nueva ruta. Eliminar los siguientes archivos si existen:
    *   `bootstrap/cache/config.php`
    *   `bootstrap/cache/services.php`
    *   `bootstrap/cache/packages.php`

Con esta configuración, cualquier parte de la aplicación que utilice `public_path()` (como los controladores que suben imágenes) resolverá a la ruta correcta, asegurando que los archivos sean accesibles desde la web.

---

## 6. Licencia

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
