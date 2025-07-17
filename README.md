# Flow Shop - E-commerce Open Source

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-orange.svg)](https://livewire.laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-4.x-38B2AC.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

🚧 **Proyecto en Construcción** 🚧

Flow Shop es una plataforma de e-commerce moderna y de código abierto construida con Laravel 12, Livewire 3 y Tailwind CSS. Diseñada para ser escalable, fácil de usar y completamente personalizable.

## ✨ Características

### 🛍️ Gestión de Productos
- Creación y edición de productos
- Gestión de imágenes múltiples por producto
- Sistema de precios con descuentos
- Categorización avanzada con grupos de categorías
- Control de estado activo/inactivo

### 🏷️ Sistema de Categorías
- Categorías organizadas en grupos
- Navegación jerárquica
- Filtrado por categorías

### 👤 Autenticación y Usuarios
- Sistema de registro y login
- Verificación de email
- Recuperación de contraseñas
- Perfiles de usuario personalizables

### 🎨 Interfaz Moderna
- Diseño responsive con Tailwind CSS
- Componentes Livewire interactivos
- UI moderna con Flowbite
- Navegación intuitiva

### 🔧 Panel de Administración
- Dashboard para gestión de productos
- Configuraciones de usuario
- Gestión de categorías

## 🛠️ Tecnologías Utilizadas

- **Backend**: Laravel 12.x
- **Frontend**: Livewire 3.x, Tailwind CSS 4.x
- **Base de Datos**: MySQL/PostgreSQL/SQLite
- **Autenticación**: Laravel Breeze
- **UI Components**: Flowbite
- **Build Tool**: Vite

## 📋 Requisitos del Sistema

- PHP 8.2 o superior
- Composer
- Node.js 18+ y npm
- Base de datos (MySQL, PostgreSQL, o SQLite)

## 🚀 Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/tu-usuario/flow-shop.git
cd flow-shop
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Instalar dependencias de Node.js
```bash
npm install
```

### 4. Configurar el entorno
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configurar la base de datos
Edita el archivo `.env` con tus credenciales de base de datos:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=flow_shop
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

### 6. Ejecutar migraciones y seeders
```bash
php artisan migrate
php artisan db:seed
```

### 7. Compilar assets
```bash
npm run build
```

### 8. Iniciar el servidor de desarrollo
```bash
php artisan serve
```

O usar el comando de desarrollo que incluye Vite:
```bash
composer run dev
```

## 📁 Estructura del Proyecto

```
flow-shop/
├── app/
│   ├── Http/Controllers/     # Controladores tradicionales
│   ├── Livewire/            # Componentes Livewire
│   ├── Models/              # Modelos Eloquent
│   └── Providers/           # Proveedores de servicios
├── database/
│   ├── migrations/          # Migraciones de base de datos
│   ├── seeders/            # Seeders para datos de prueba
│   └── factories/          # Factories para testing
├── resources/
│   ├── views/              # Vistas Blade
│   ├── css/               # Estilos CSS
│   └── js/                # JavaScript
└── routes/                 # Definición de rutas
```

## 🗄️ Modelos Principales

- **Product**: Gestión de productos con imágenes y categorías
- **Category**: Sistema de categorización
- **CategoryGroup**: Agrupación de categorías
- **ProductImages**: Gestión de imágenes de productos
- **User**: Sistema de usuarios y autenticación

## 🎯 Próximas Funcionalidades

- [ ] Carrito de compras
- [ ] Sistema de pagos
- [ ] Gestión de inventario
- [ ] Sistema de reseñas y calificaciones
- [ ] Panel de administración completo
- [ ] API REST para integraciones
- [ ] Sistema de cupones y descuentos
- [ ] Múltiples métodos de pago
- [ ] Sistema de notificaciones
- [ ] Optimización SEO

## 🤝 Contribuir

¡Las contribuciones son bienvenidas! Por favor, lee nuestras guías de contribución:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

### Guías de Contribución

- Sigue las convenciones de código de Laravel
- Escribe tests para nuevas funcionalidades
- Documenta cualquier cambio importante
- Mantén el código limpio y legible

## 🧪 Testing

Ejecutar los tests:
```bash
composer test
```

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.

## 🙏 Agradecimientos

- [Laravel](https://laravel.com) - El framework PHP elegante
- [Livewire](https://livewire.laravel.com) - Full-stack framework para Laravel
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS utility-first
- [Flowbite](https://flowbite.com) - Componentes UI para Tailwind CSS

## 📞 Contacto

- **Desarrollador**: [Tu Nombre]
- **Email**: tu-email@ejemplo.com
- **GitHub**: [@tu-usuario](https://github.com/tu-usuario)

---

⭐ Si este proyecto te resulta útil, ¡no olvides darle una estrella en GitHub! 