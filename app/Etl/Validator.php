<?php

namespace App\Etl;

use PDO;

class Validator
{
    public function __construct(protected PDO $source, protected PDO $target) {}

    public function assertSameCount(string $tableName): bool
    {
        $srcCount = $this->source->query("SELECT COUNT(*) FROM {$tableName}")->fetchColumn();
        $tgtCount = $this->target->query("SELECT COUNT(*) FROM {$tableName}")->fetchColumn();

        if ((int)$srcCount !== (int)$tgtCount) {
            throw new \RuntimeException("Count mismatch on {$tableName}: source={$srcCount}, target={$tgtCount}");
        }

        return true;
    }
}
