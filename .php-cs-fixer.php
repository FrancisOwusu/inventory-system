<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/resources',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        'concat_space' => ['spacing' => 'one'],
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
        ],
        'phpdoc_to_comment' => ['ignored_tags' => ['var']],
        'global_namespace_import' => true,
    ])
    ->setFinder($finder)
    ;
