#!/usr/bin/env php
<?php

use Illuminate\Console\Application;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

try {
    require_once __DIR__.'/vendor/autoload.php';

    $container = new Container();
    $dispatcher = new Dispatcher();
    $app = new Application($container, $dispatcher, '0.1');
    $app->setName('Calculator');

    $app->run(new ArgvInput(), new ConsoleOutput());
} catch (Throwable $e) {
}
