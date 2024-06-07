<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
require_once (__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\GameStore;
use exp\src\practice\GameStudioService;
use PHPUnit\Framework\TestCase;

class GameStoreTest extends TestCase
{

    public function testGetSaleListWillThrowErrorWhenNotInSaleSeason() {
        $game_store_checker = new GameStore();

        $game_store_reflection = new ReflectionClass(GameStore::class);

        $sale_season_property = $game_store_reflection->getProperty('sale_season');
        $sale_season_property->setAccessible(true);
        $sale_season_property->setValue($game_store_checker, 1);

        $studio_service_property = $game_store_reflection->getProperty('studio_service');
        $studio_service_property->setAccessible(true);
        $studio_service_property->setValue($game_store_checker, new GameStudioService());

        $this->expectException(ErrorException::class);
        $game_store_checker->getSaleList(0);
    }

    /**
     * @throws ErrorException
     */
    public function testGetSaleListWillCallToServiceDuringSale() {
        //TODO: Test function getSaleList() will call to service in case of sale season

        //HINT: You need to:
        // - Fake GameStudioService
        // - Fake private property $studio_service (use reflection class)

        $game_store_checker = new GameStore();

        $game_store_reflection = new ReflectionClass(GameStore::class);

        $sale_season_property = $game_store_reflection->getProperty('sale_season');
        $sale_season_property->setAccessible(true);
        $sale_season_property->setValue($game_store_checker, 2);

        $studio_service_property = $game_store_reflection->getProperty('studio_service');
        $studio_service_property->setAccessible(true);

        $game_studio_service_mock = $this->createMock(GameStudioService::class);
        $studio_service_property->setValue($game_store_checker, $game_studio_service_mock);

        $game_studio_service_mock->expects($this->once())
            ->method('updateStudioList');
        $game_store_checker->getSaleList(2);
    }
}
