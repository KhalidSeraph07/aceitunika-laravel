<?php

namespace App\Etl;

use PDO;

class DataMigrator
{
    public function __construct(
        protected PDO $source,
        protected PDO $target,
        protected bool $dryRun = false,
    ) {}

    public function migrateTable(string $tableName, array $columns): int
    {
        $colList = implode(',', array_map(fn($c) => "`{$c}`", $columns));
        $sourceRows = $this->source->query("SELECT {$colList} FROM {$tableName}")->fetchAll(PDO::FETCH_ASSOC);

        if ($this->dryRun) {
            return count($sourceRows);
        }

        $placeholders = implode(',', array_fill(0, count($columns), '?'));
        $stmt = $this->target->prepare("INSERT INTO `{$tableName}` ({$colList}) VALUES ({$placeholders})");

        $count = 0;
        foreach ($sourceRows as $row) {
            $stmt->execute(array_values($row));
            $count++;
        }

        return $count;
    }
}
