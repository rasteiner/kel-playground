<?php

use rasteiner\KEL\Compiler;
use Kirby\Cms\App as Kirby;

Kirby::plugin('rasteiner/k3-calculated-field', [
    'fields' => [
        'calculated' => [
            'props' => [
                'value' => function($data=false) {
                    try {
                        return (json_decode($data, true))['result'];
                    } catch (Exception $e) {
                        return $data;
                    }
                },
                'query' => function(string $query='') {
                    return $query;
                }
            ],
            'save' => function($data) : string {
                return json_encode(['result' => $data]);
            },
            'computed' => [
                'ast' => function() {
                    return (new Compiler())->parse($this->query);
                }
            ],
        ]
    ]
]);