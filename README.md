# Prueba técnica Laravel con Docker

Este proyecto realizado para una prueba técnica es una aplicaciín web construida con Lravel. Incluye diferentes funcionalidades entre las que podemos destacar la autenticacón, gestión de clientes (mostrar ficha, creación de nuevos clientes, eliminar existentes, y actualizarlos) y sus hobbies, encontrando la opción visualizar listado de clientes según hobby.


## Necesitas

- Docker
- Docker Compose

## Instalación

1. Clona el repositorio:

```https://github.com/mteresacastro/Prueba-Tecnica.git```

2. Edita el archivo .env y configura tu base de datos y otras variables de entorno.
   
3. Construye y levanta los contenedores de Docker:
```docker-compose up -d```

4. Instala las dependencias de Composer dentro del contenedor:

```docker-compose exec app composer install```

5. Genera la clave de la aplicación:

```docker-compose exec app php artisan key:generate```

6. Ejecuta las migraciones y los seeders:

```docker-compose exec app php artisan migrate --seed```

7. Accede a la aplicación: La aplicación estará disponible en ```http://localhost:5000```.

## Uso

### Autenticación

- **Login**: `POST /login`
- **Logout**: `POST /logout`

### Rutas de Administración (requiere middleware `admin`)

- **Dashboard**: `GET /admin/dashboard`
- **Crear Cliente**: `GET /admin/create`
- **Guardar Cliente**: `POST /admin/dashboard`
- **Ver Clientes por Hobby**: `GET /admin/customers-by-hobby`
- **Generar PDF**: `GET /admin/generate-pdf`
- **Ver Cliente**: `GET /admin/{customer}`
- **Editar Cliente**: `GET /admin/{customer}/edit`
- **Actualizar Cliente**: `PATCH /admin/{customer}`
- **Eliminar Cliente**: `DELETE /admin/{customer}`

### Rutas de Cliente

- **Dashboard**: `GET /customer/dashboard`
- **Actualizar Dashboard**: `PATCH /customer/dashboard`

### API Endpoints

- **Obtener Clientes por Hobby**: `GET /api/customers-by-hobby/{hobby}`

## Colección de Postman

Para importar la colección de Postman con todas las rutas de la API y las rutas web:

1. Abre Postman.
2. Haz clic en “Importar” en la esquina superior izquierda.
3. Selecciona el archivo `Postman/Endpoints.json`.
4. La colección se importará y podrás ver todas las solicitudes organizadas en categorías.



