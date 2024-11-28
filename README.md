# Locations API

Este proyecto es una API construida con Laravel que permite gestionar y obtener información sobre sedes (locations). A continuación, se detallan los pasos necesarios para instalar, configurar y ejecutar la aplicación, así como las pruebas correspondientes.

## **Requisitos Previos**
Antes de comenzar, asegúrate de tener instalado:
- PHP 8.2 o superior
- Composer
- MySQL o SQLite
- Laravel Installer (opcional)

## **Instalación**

### **1. Clonar el repositorio**
Clona el repositorio del proyecto en tu máquina local:
```bash
git clone https://github.com/carlosferrerhernandez/locations-api.git
cd locations-api
```

### **2. Instalar dependencias del backend**
Ejecuta el siguiente comando para instalar las dependencias de Laravel:
```bash
composer install
```

### **3. Configurar variables de entorno**
Copia el archivo `.env.example` y renómbralo como `.env`:
```bash
cp .env.example .env
```
Luego, ajusta las siguientes variables en el archivo `.env`:

#### **Configuración de la base de datos:**
Si usas MySQL:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=locations
DB_USERNAME=root
DB_PASSWORD=tu_password
```

#### **Configuración de la API Key:**
Asegúrate de agregar tu clave API:
```dotenv
API_KEY=tu_api_key
```

### **4. Generar la clave de la aplicación**
Ejecuta este comando para generar la clave única de la aplicación:
```bash
php artisan key:generate
```

### **5. Ejecutar migraciones**
Crea las tablas necesarias en la base de datos:
```bash
php artisan migrate
```

### **6. Sembrar datos iniciales (opcional)**
Si necesitas datos iniciales para pruebas o desarrollo, corre:
```bash
php artisan db:seed
```

## **Ejecución de la Aplicación**

### **1. Iniciar el servidor**
Ejecuta el siguiente comando para iniciar el servidor de desarrollo de Laravel:
```bash
php artisan serve
```

### **2. Acceder a la API**
La API estará disponible en: `http://127.0.0.1:8000`.

#### **Endpoint de prueba:**
```http
GET /api/locations
Headers:
  X-API-KEY: tu_api_key
```

## **Ejecución de Pruebas**

### **1. Configurar una base de datos de prueba**
En el archivo `.env`, configura una base de datos separada para las pruebas. Si usas MySQL:
```dotenv
APP_ENV=testing
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=locations_test
DB_USERNAME=root
DB_PASSWORD=tu_password
```

### **2. Ejecutar migraciones para pruebas**
Asegúrate de ejecutar las migraciones en la base de datos de pruebas antes de correr las pruebas:
```bash
php artisan migrate --database=mysql
```

### **3. Ejecutar pruebas unitarias**
Ejecuta las pruebas definidas en el proyecto:
```bash
php artisan test
```

#### **Pruebas Incluidas**
- Verificación de que la API Key es requerida.
- Verificación de que una API Key inválida devuelve un error.
- Prueba de que las locaciones se devuelven correctamente.
- Prueba de respuesta vacía cuando no hay locaciones en la base de datos.

## **Comandos Útiles**

- **Verificar estándares de código con PHP CodeSniffer:**
  ```bash
  composer check:cs
  ```

- **Corregir problemas de estilo automáticamente:**
  ```bash
  composer fix:cs
  ```

- **Formatear el código con Laravel Pint:**
  ```bash
  composer pint
  ```

- **Análisis estático con PHPStan:**
  ```bash
  composer analyse:phpstan
  ```

## **Contribuciones**

Si deseas contribuir al proyecto:
1. Crea un fork del repositorio.
2. Crea una nueva rama para tu funcionalidad:
   ```bash
   git checkout -b nueva-funcionalidad
   ```
3. Envía un Pull Request.

## **Licencia**

Este proyecto está licenciado bajo la [MIT License](LICENSE).

Con estas instrucciones, tus pruebas unitarias están completamente documentadas, junto con las configuraciones necesarias para el entorno de pruebas. Si necesitas más aclaraciones o modificaciones, ¡avísame! 🚀