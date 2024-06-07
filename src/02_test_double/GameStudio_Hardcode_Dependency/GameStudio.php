<?php
declare(strict_types=1);

namespace exp\src\test_double;

class GameStudio
{
    public function __construct()
    {
    }

    public function produceNewGame(): array
    {
        $dev = new DeveloperService();
        $designer = new DesignerService();

        return [
            'code' => $dev->devTheGame(),
            'design' => $designer->designTheGame()
        ];
    }
}
