<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
require_once (__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\GameStudioService;
use exp\src\practice\MonicaStudio;
use exp\src\practice\PixelStudio;
use PHPUnit\Framework\TestCase;

class GameStudioServiceWrapper extends GameStudioService {
    public $studio_list;
    public function __construct() {
        return parent::__construct();
    }

}

class GameStudioServiceTest extends TestCase
{
    public function provideData() {
        return [
            [new PixelStudio(), 0],
            [new MonicaStudio(), 1]
        ];
    }
    /**
     * @dataProvider provideData
     */
    public function testGetSaleGamesWillCallToStudioListWithCorrectParameters($studio, $index) {
        //TODO: Test function getSaleGames() will call to studios with correct parameter

        //Code here
        $game_studio_service_wrapper = new GameStudioServiceWrapper();
        $game_studio_service_wrapper->getSaleGames(1);
        $this->assertEquals($studio->getSaleGames(1), $game_studio_service_wrapper->studio_list[$index]->getSaleGames(1));
    }

    public function testGetSaleGamesWillReturnCorrectData() {
        //TODO: Test function getSaleGames() will return data that returned from studios

        //HINT: fake $studio_list returned data & check it
    }

    public function testNotifyNewCampaignWillUpdateStudioList() {
        //TODO: Test function notifyNewCampaign() will call to function updateStudioList()
    }

    public function testUpdateStudioListWillThrowError() {
        //TODO: Test function updateStudioList() will throw error as default
    }
}
