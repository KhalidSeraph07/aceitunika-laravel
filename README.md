# Aceitunika v2 — Laravel Edition

> Migración del sistema aceitunika v2 (Next.js + PostgreSQL) a Laravel 12 + Blade + Livewire + MySQL 8.4.

## Estado

🚧 **Foundation** — sub-proyecto inicial con esqueleto, auth, RBAC, UI shell y patrones cross-cutting. Los 8 módulos de negocio se entregan en sub-proyectos posteriores.

## Stack

- **Backend:** Laravel 12 (PHP 8.3)
- **Frontend:** Blade + Livewire 3 + TailwindCSS v4
- **DB:** MySQL 8.4 LTS
- **Auth:** Breeze + Spatie Permission v8
- **Auditoría:** Spatie ActivityLog v4
- **Tests:** Pest 3 + Dusk (corren en CI)
- **CI:** GitHub Actions

## Setup local

### Requisitos

- PHP 8.3+
- Composer 2.5+
- Node 20+
- MySQL 8.4 LTS

### Pasos

```bash
# 1. Clonar
git clone https://github.com/KhalidSeraph07/aceitunika-laravel.git
cd aceitunika-laravel

# 2. Instalar dependencias
composer install
npm install

# 3. Configurar .env
cp .env.example .env
php artisan key:generate

# 4. Crear DB y usuario MySQL
mysql -u root -p
> CREATE DATABASE aceitunika_v3 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
> CREATE USER 'aceitunika_laravel'@'localhost' IDENTIFIED BY '123456';
> GRANT ALL ON aceitunika_v3.* TO 'aceitunika_laravel'@'localhost';

# 5. Editar .env con credenciales
# DB_DATABASE=aceitunika_v3
# DB_USERNAME=aceitunika_laravel
# DB_PASSWORD=123456

# 6. Migrar y seedear
php artisan migrate:fresh --seed

# 7. Build assets
npm run build

# 8. Servir
php artisan serve
# -> http://127.0.0.1:8000
```

## Login inicial

- **Email:** `admin@aceitunika.test`
- **Password:** `Admin123!`

⚠️ Esta password es solo para desarrollo local. En producción, generar una nueva y guardar en `DB_PASSWORD` de un secret manager.

## Tests

```bash
# Unit + Feature (42 tests)
./vendor/bin/pest

# E2E con Dusk (corre en CI; local puede requerir ChromeDriver)
php artisan dusk:chrome-driver
php artisan serve &
php artisan dusk
```

## Estructura

```
aceitunika-laravel/
├── app/
│   ├── Actions/             # Single-purpose action classes
│   ├── DTOs/                # Data Transfer Objects
│   ├── ValueObjects/        # Kilos, Calibre
│   ├── Models/              # Eloquent (User + 11 catalogos)
│   ├── Http/
│   │   ├── Middleware/      # FinancialMask
│   │   └── Requests/        # Form Requests
│   ├── Support/             # FinancialMask, DateHelper, Exceptions
│   ├── Rules/               # 4 custom validation rules
│   ├── Etl/                 # ETL script classes
│   └── Console/Commands/    # EtlMigrateCommand
├── database/
│   ├── migrations/          # Breeze + Spatie + 11 catalog tables
│   ├── seeders/             # Roles, AdminUser, Catalogs
│   └── factories/
├── resources/
│   ├── views/
│   │   ├── layouts/         # app, guest
│   │   ├── components/      # 8 shared Blade components
│   │   ├── livewire/        # Breeze auth pages
│   │   └── modules/         # 8 module placeholders
│   └── css/
├── routes/                  # web + auth
├── tests/
│   ├── Unit/                # 28 unit tests
│   ├── Feature/             # 14 feature tests
│   └── Browser/             # 5 Dusk tests (run in CI)
├── scripts/etl/             # ETL reference docs
├── .github/workflows/ci.yml # GitHub Actions
└── .env.example
```

## Roadmap

Sub-proyectos planeados (en orden recomendado):

1. ✅ `foundation` (este repo)
2. ⏭️ `auth-module-2` — gestión de usuarios desde UI
3. ⏭️ `insumos-module`
4. ⏭️ `prestamos-module`
5. ⏭️ `ventas-module`
6. ⏭️ `historial-module`
7. ⏭️ `entradas-module` (crítico)
8. ⏭️ `almacen-module`
9. ⏭️ `curado-module`
10. ⏭️ `dashboard-module`
11. ⏭️ `reportes-module`
12. ⏭️ `cutover-etl` — implementación completa del ETL

## Licencia

Propietario — Corporación Costa Verde.
