<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../vendor/autoload.php');

use exp\src\practice\GameStore;

$game_store = new GameStore(WINTER_SEASON);
try {
    var_dump($game_store->getSaleList(WINTER_SEASON));
} catch (ErrorException $e) {
    echo $e->getMessage();
}

