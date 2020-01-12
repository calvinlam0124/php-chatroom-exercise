<?php

/**
 * Config for PHP-CS-Fixer ver2
 */

$rules = [
    '@PSR2' => true,

    // addtional rules
    'array_syntax' => ['syntax' => 'short'],
    'blank_line_before_statement' => true,
    'no_extra_blank_lines' => true,
    'no_multiline_whitespace_before_semicolons' => true,
    'no_short_echo_tag' => true,
    'no_unused_imports' => true,
    'no_whitespace_in_blank_line' => true,
    'not_operator_with_successor_space' => true,
];

$excludes = [
    // add exclude project directory

    'vendor',
    'node_modules',
];

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude($excludes)
            ->notName('README.md')
            ->notName('*.xml')
            ->notName('*.yml')
    );