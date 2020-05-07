<?php
return [
    '~^articles/(\d+)$~' => [\Controllers\ArticlesController::class, 'view'],
    '~^$~' => [\Controllers\MainController::class, 'main']
];