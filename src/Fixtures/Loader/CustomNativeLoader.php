<?php

declare(strict_types=1);

namespace VolodymyrKlymniuk\SfFunctionalTest\FunctionalTest\Fixtures\Loader;

use Faker\Factory as FakerGeneratorFactory;
use Faker\Generator as FakerGenerator;
use Nelmio\Alice\Faker\Provider\AliceProvider;
use \Nelmio\Alice\Loader\NativeLoader;
use VolodymyrKlymniuk\SfFunctionalTest\FunctionalTest\Fixtures\Faker\Provider\SymfonyUuidProvider;
use VolodymyrKlymniuk\SfFunctionalTest\Fixtures\Faker\Provider\UUIDProvider;

class CustomNativeLoader extends NativeLoader
{
    protected function createFakerGenerator(): FakerGenerator
    {
        $generator = FakerGeneratorFactory::create(static::LOCALE);
        $generator->addProvider(new AliceProvider());
        $generator->addProvider(new UUIDProvider());
        $generator->addProvider(new SymfonyUuidProvider());
        $generator->seed($this->getSeed());

        return $generator;
    }
}