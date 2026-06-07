<?php

namespace App\Support;

use App\Models\User;

class FinancialMask
{
    public const MASKED_PLACEHOLDER = '***';

    protected const FINANCIAL_FIELDS = [
        'precio_compra',
        'precio_venta',
        'costo_transporte',
        'costo_operativo',
        'costo_salmuera',
        'costo_mano_obra',
        'costos_quimicos',
        'monto',
        'total',
        'subtotal',
        'ganancia',
        'margen',
    ];

    public function apply(array $data, ?User $user): array
    {
        if ($user && $user->hasRole('admin')) {
            return $data;
        }

        return $this->maskArray($data);
    }

    public function maskValue(string $fieldName): string
    {
        return in_array($fieldName, self::FINANCIAL_FIELDS, true)
            ? self::MASKED_PLACEHOLDER
            : '';
    }

    public function isFinancialField(string $fieldName): bool
    {
        return in_array($fieldName, self::FINANCIAL_FIELDS, true);
    }

    public static function isFinancialFieldStatic(string $fieldName): bool
    {
        return in_array($fieldName, self::FINANCIAL_FIELDS, true);
    }

    protected function maskArray(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->maskArray($value);
            } elseif (is_string($key) && $this->isFinancialField($key) && $value !== null) {
                $data[$key] = self::MASKED_PLACEHOLDER;
            }
        }

        return $data;
    }
}
