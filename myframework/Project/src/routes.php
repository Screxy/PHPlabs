<?php
    return [
        '~^hello/(.*)$~' => [\Controllers\MainController::class, 'sayHello'],
        '/^$/' => [\Controllers\MainController::class, 'main'],
        '~article/show/(\d*)~' => [\Controllers\ArticleController::class, 'show'],
    ];