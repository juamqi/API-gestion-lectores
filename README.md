# API REST para la Gestión de Lectores

Este proyecto consiste en una API REST desarrollada con Laravel para gestionar registros de lectores. La API permite realizar operaciones CRUD sobre la tabla `lectores` en la base de datos.

## Tecnologías utilizadas

- Laravel
- MySQL
- Postman (para pruebas)
- phpMyAdmin

## Endpoints disponibles

### 1. Obtener todos los lectores:
**GET** `/api/lectores`

Devuelve una lista con todos los lectores registrados.

### 2. Obtener un lector por ID:
**GET** `/api/lectores/{id}`

Devuelve la información del lector correspondiente al ID indicado.

### 3. Crear un nuevo lector:
**POST** `/api/lectores`

**Body (JSON):**
```json
{
  "nombre": "Juan",
  "apellido": "Pérez",
  "email": "juan@example.com"
  "direccion": "Av. Siempre Viva 123"
  "telefono": "1234567890"
}
```

**Validaciones:**
- `nombre`, `apellido` y `dni` son obligatorios.
- `email` debe ser un email válido y único.

### 4. Actualizar un lector:
**PUT** `/api/lectores/{id}`

**Body (JSON):**
```json
{
  "nombre": "Juan",
  "apellido": "Pérez",
  "email": "juan_actualizado@example.com"
  "direccion": "Av. Siempre Viva 123"
  "telefono": "1234567890"
}
```

Aplica las mismas validaciones que el POST.

### 5. Eliminar un lector:
**DELETE** `/api/lectores/{id}`

Elimina el lector con el ID especificado.

---

**Autor:** KASS, Juan Pablo Miguel
**Materia:** Programación III 
**Fecha de entrega:** 01/05/2025
