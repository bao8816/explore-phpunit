<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
require_once (__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\PixelStudio;
use PHPUnit\Framework\TestCase;

class PixelStudioTest extends TestCase {
    private $pixel_studio;

    public function setUp(): void
    {
        $this->pixel_studio = new PixelStudio();
    }

    public function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function getSaleGamesData(): array {
        return [
            [
                SPRING_SEASON,
                [
                    'Game A in PixelStudio',
                    'Game B in PixelStudio'
                ]
            ],
            [SUMMER_SEASON, []],
            [FALL_SEASON, []],
            [WINTER_SEASON, []]
        ];
    }

    /**
     * @return void
     * @dataProvider getSaleGamesData
     */
    public function testGetSaleGamesReturnCorrectData(int $season, array $result) {
        $actual_result = $this->pixel_studio->getSaleGames($season);

        $this->assertEquals($result, $actual_result);
    }

    public function testGetStudioName() {
        $this->assertEquals('PixelStudio', $this->pixel_studio->getStudioName());
    }
}

// DONE
