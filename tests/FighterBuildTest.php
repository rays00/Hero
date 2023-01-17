<?php
use PHPUnit\Framework\TestCase;

final class FighterBuildTest extends TestCase
{
    public function testFighterBuild(): void
    {
        $fighter1 = new Fighter(
            rand(70, 100),
            rand(70, 80),
            rand(45, 55),
            rand(40, 50),
            rand(10, 30),
            true,
            true,
            0
        );
        $fighter2 = new Fighter(
            rand(60, 90),
            rand(60, 90),
            rand(40, 60),
            rand(40, 60),
            rand(25, 45),
            false,
            false,
            1
        );

        /*
         * Orderus
         */

        $this->assertEquals(
            'Orderus',
            $fighter1
        );
        $this->assertLessThanOrEqual(
            '50',
            $fighter1->getSpeed()
        );
        $this->assertLessThanOrEqual(
            '100',
            $fighter1->getHealth()
        );
        $this->assertLessThanOrEqual(
            '80',
            $fighter1->getStrength()
        );
        $this->assertLessThanOrEqual(
            '55',
            $fighter1->getDefence()
        );
        $this->assertLessThanOrEqual(
            '30',
            $fighter1->getLuck()
        );

        /*
         * Beast
         */

        $this->assertEquals(
            'Beast',
            $fighter2
        );
        $this->assertLessThanOrEqual(
            '60',
            $fighter2->getSpeed()
        );

        $this->assertLessThanOrEqual(
            '90',
            $fighter2->getHealth()
        );
        $this->assertLessThanOrEqual(
            '90',
            $fighter2->getStrength()
        );
        $this->assertLessThanOrEqual(
            '60',
            $fighter2->getDefence()
        );
        $this->assertLessThanOrEqual(
            '45',
            $fighter2->getLuck()
        );

    }

    public function testWhoStarts(): void
    {
        $fighter1 = new Fighter(
            75,
            76,
            46,
            45,
            15,
            true,
            true,
            0
        );
        $fighter2 = new Fighter(
            70,
            65,
            45,
            50,
            30,
            false,
            false,
            1
        );
        $gameReferee = new GameReferee();
        $this->assertEquals([$fighter2, $fighter1], $gameReferee->determineStarter($fighter1, $fighter2));
    }

    public function testWhoStartsByLuck(): void
    {
        $fighter1 = new Fighter(
            75,
            76,
            46,
            45,
            15,
            true,
            true,
            0
        );
        $fighter2 = new Fighter(
            70,
            65,
            45,
            45,
            30,
            false,
            false,
            1
        );
        $gameReferee = new GameReferee();
        $this->assertEquals([$fighter2, $fighter1], $gameReferee->determineStarter($fighter1, $fighter2));
    }
}