<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/app')      // O las carpetas donde tengas tu código
    ->in(__DIR__ . '/src');     // Agrega los directorios que quieras analizar

$config = new PhpCsFixer\Config();
return $config
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        // Puedes agregar más reglas aquí...
    ])
    ->setFinder($finder);
