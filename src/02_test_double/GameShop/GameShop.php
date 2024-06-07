<?php
declare(strict_types=1);

namespace exp\src\test_double;

class GameShop
{
    private array $selled_games;
    private int $sale_number;

    public function __construct()
    {
        $this->selled_games = [];
        $this->sale_number = 0;
    }

    public function sellGame( string $game_name, $write_log = true ): int
    {
        // do something
        // ...

        // log transaction
        if( $write_log ) {
            $this->logTransaction( $game_name );
        }

        return ++$this->sale_number;
    }

    public function logTransaction( string $game_name ): void
    {
        $this->selled_games[] = $game_name;

        // OR this function can call to an external service
    }

    public function getSaleNumber(): int
    {
        return $this->sale_number;
    }
}
