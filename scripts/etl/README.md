# ETL Postgres → MySQL

Script para migrar datos del schema PostgreSQL actual al nuevo schema MySQL 8.4.

## Uso (en cutover)

```bash
php artisan etl:migrate \
  --source=postgres \
  --target=mysql \
  --source-dsn="pgsql:host=...;dbname=aceitunika_v2" \
  --target-dsn="mysql:host=...;dbname=aceitunika_v3" \
  --dry-run
```

## Tests

```bash
./vendor/bin/pest tests/Unit/Etl
```

## Prerrequisitos

- Source DB accesible en modo lectura
- Target DB recién creada (sin tablas, las crea el script)
- Backup de source DB antes de ejecutar
- Ventana de mantenimiento acordada con stakeholders
