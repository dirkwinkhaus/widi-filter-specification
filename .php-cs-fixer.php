<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/test');

$config = new \PhpCsFixer\Config('default');
$config->setFinder($finder);

return $config;
