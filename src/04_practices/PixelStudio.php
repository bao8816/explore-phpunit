<?php
declare(strict_types=1);

namespace exp\src\practice;

require_once ('Constant.php');

class PixelStudio
{
    private int $sale_season;

    public function __construct()
    {
        $this->sale_season = SPRING_SEASON;
    }

    public function getSaleGames(int $season): array
    {
        if ($this->sale_season != $season) {
            return [];
        }

        return [
            'Game A in PixelStudio',
            'Game B in PixelStudio'
        ];
    }

    public function getStudioName(): bool|string
    {
        $classname_with_namespace = explode('\\', get_class($this));
        return end($classname_with_namespace);
    }
}
