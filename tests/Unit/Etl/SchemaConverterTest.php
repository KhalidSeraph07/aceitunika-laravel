<?php

use App\Etl\SchemaConverter;

it('converts serial to auto_increment', function () {
    $conv = new SchemaConverter();
    expect($conv->convertType('serial'))->toContain('AUTO_INCREMENT');
});

it('converts jsonb to json', function () {
    $conv = new SchemaConverter();
    expect($conv->convertType('jsonb'))->toBe('JSON');
});

it('converts varchar with length', function () {
    $conv = new SchemaConverter();
    expect($conv->convertType('varchar', 50))->toBe('VARCHAR(50)');
});

it('generates CREATE TABLE statement', function () {
    $conv = new SchemaConverter();
    $ddl = $conv->convertCreateTable('test', [
        ['name' => 'id', 'type' => 'serial', 'nullable' => false, 'primary' => true],
        ['name' => 'nombre', 'type' => 'varchar', 'length' => 100, 'nullable' => false],
    ]);

    expect($ddl)
        ->toContain('CREATE TABLE `test`')
        ->toContain('`id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL')
        ->toContain('`nombre` VARCHAR(100) NOT NULL')
        ->toContain('ENGINE=InnoDB');
});
