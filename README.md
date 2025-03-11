# Prueba técnica D-Solutions

Prueba para vacante en D-Solutions

## Requerimientos de sistema

- Se requiere un servidor con reescritura de url activa
- PHP versión 7.4 o superior
- Composer
- Servidor web como Apache o PHP Built-in Server

## Clonar repositorio

https://github.com/heyfranks/prueba_tecnica

## Instalar dependencias
```php
composer install
```
## Iniciar servidor

```bash
cd prueba_tecnica
php -S localhost:8000 -t public
```

Luego abrir localhost:8000

## Alcances
- Lista de usuarios
- Acciones sobre usuario: Enviar email, simulación editar usuario
- Simulación de "editar" usuario, trayendo datos desde API externa y filtrando con funciones de php
- Validaciones de formularios en cliente (se escluye por api, ya que el "actualizar" no existe)
- Controles de error
    - 404: Simulado al presionar editar
    - Sin conexión: A través de herramientas de desarrollador
    - 500: Generar error forzado
    - Bloqueo de interfaz: Cambiar a 3G lenta
    - Otros: /public/assets/mensajes.js