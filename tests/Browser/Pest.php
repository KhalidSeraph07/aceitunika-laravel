<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

uses(DuskTestCase::class, DatabaseMigrations::class)->in('.');
