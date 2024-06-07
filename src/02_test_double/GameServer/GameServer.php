<?php
declare(strict_types=1);

namespace exp\src\test_double;

class GameServer
{
    private array $services;

    public function __construct()
    {
        $this->services = [];
    }

    public function addService( $service ): void
    {
        $this->services[] = $service;
    }

    public function getGameList(): array
    {
        $games = [];
        foreach( $this->services as $service ) {
            $games = array_merge($games, $service->getGameList());
        }

        return $games;
    }

    public function clearAllServices(): void
    {
        $this->services = [];
    }
}