<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EtlMigrateCommand extends Command
{
    protected $signature = 'etl:migrate
        {--source=postgres : Source DB type}
        {--target=mysql : Target DB type}
        {--source-dsn= : Source DSN string}
        {--target-dsn= : Target DSN string}
        {--tables=* : Specific tables to migrate (default: all in order)}
        {--dry-run : Simulate without writing}
        {--skip-validate : Skip post-migration validation (dangerous)}';

    protected $description = 'Migrate data from source DB to target DB with type conversions';

    public function handle(): int
    {
        $this->info('ETL migration starting...');
        $this->info("Source: {$this->option('source')}");
        $this->info("Target: {$this->option('target')}");

        if ($this->option('dry-run')) {
            $this->warn('DRY RUN MODE - no changes will be written');
        }

        $tables = $this->option('tables') ?: $this->getDefaultTableOrder();

        $this->info('Tables to migrate (in order):');
        foreach ($tables as $i => $table) {
            $this->line("  " . ($i + 1) . ". {$table}");
        }

        if (!$this->option('dry-run')) {
            $this->error('Real migration not yet implemented. This Foundation only provides the skeleton.');
            $this->error('Full implementation: see sub-project cutover-etl.');
            return self::FAILURE;
        }

        return self::SUCCESS;
    }

    protected function getDefaultTableOrder(): array
    {
        return [
            'tipos_envase', 'calibres', 'vendedores', 'supervisores', 'conductores',
            'personal', 'maquina', 'turnos', 'gastos_entrada', 'filas', 'cuadrantes',
            'users', 'roles', 'permissions',
        ];
    }
}
