<?php

namespace App\Etl;

class SchemaConverter
{
    public const TYPE_MAPPINGS = [
        'serial' => 'BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY',
        'int4' => 'INT',
        'int8' => 'BIGINT',
        'varchar' => 'VARCHAR',
        'text' => 'TEXT',
        'numeric' => 'DECIMAL',
        'timestamp' => 'DATETIME',
        'timestamptz' => 'DATETIME',
        'boolean' => 'TINYINT(1)',
        'jsonb' => 'JSON',
        'bytea' => 'BLOB',
        'uuid' => 'CHAR(36)',
    ];

    public function convertType(string $pgType, ?int $length = null): string
    {
        $base = self::TYPE_MAPPINGS[strtolower($pgType)] ?? strtoupper($pgType);
        return $length !== null ? "{$base}({$length})" : $base;
    }

    public function convertCreateTable(string $tableName, array $pgColumns): string
    {
        $lines = ["CREATE TABLE `{$tableName}` ("];
        $columnDefs = [];
        $primaryKeys = [];

        foreach ($pgColumns as $col) {
            $name = $col['name'];
            $type = $col['type'];
            $length = $col['length'] ?? null;
            $nullable = $col['nullable'] ?? true;
            $default = $col['default'] ?? null;

            $typeDef = $this->convertType($type, $length);
            $nullDef = $nullable ? 'NULL' : 'NOT NULL';
            $defaultDef = $default !== null ? "DEFAULT {$default}" : '';

            $columnDefs[] = "  `{$name}` {$typeDef} {$nullDef} {$defaultDef}";

            if ($col['primary'] ?? false) {
                $primaryKeys[] = "`{$name}`";
            }
        }

        if (!empty($primaryKeys)) {
            $columnDefs[] = "  PRIMARY KEY (" . implode(', ', $primaryKeys) . ")";
        }

        $lines[] = implode(",\n", $columnDefs);
        $lines[] = ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

        return implode("\n", $lines);
    }
}
