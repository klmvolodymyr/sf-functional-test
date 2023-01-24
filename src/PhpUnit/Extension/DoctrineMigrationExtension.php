<?php

declare(strict_types=1);

namespace VolodymyrKlymniuk\SfFunctionalTest\FunctionalTest\PhpUnit\Extension;

use PHPUnit\Runner\BeforeFirstTestHook;
use VolodymyrKlymniuk\SfFunctionalTest\TestCase\ConsoleTestCase;

class DoctrineMigrationExtension implements BeforeFirstTestHook
{
    public function executeBeforeFirstTest(): void
    {
        print 'DoctrineMigrationExtension:' . PHP_EOL;
        print ConsoleTestCase::runConsoleCommand('doctrine:migration:migrate', ['--no-interaction'])->fetch();
    }
}