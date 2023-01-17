<?php

require 'Fighter.php';
require 'GameReferee.php';

class Game
{
    /**
     * @var Fighter
     */
    private Fighter $orderus;
    /**
     * @var Fighter
     */
    private Fighter $beast;
    /**
     * @var GameReferee
     */
    private GameReferee $gameReferee;

    public function __construct()
    {
        $this->orderus = new Fighter(
            rand(70, 100),
            rand(70, 80),
            rand(45, 55),
            rand(40, 50),
            rand(10, 30),
            true,
            true,
            0
        );
        $this->beast = new Fighter(
            rand(60, 90),
            rand(60, 90),
            rand(40, 60),
            rand(40, 60),
            rand(25, 45),
            false,
            false,
            1
        );
        $this->gameReferee = new GameReferee();
    }

    public function run()
    {
        $numbersOfTurns = 20;
        $noOneDied = true;
        $gameOrder = $this->gameReferee->determineStarter($this->orderus, $this->beast);
        $this->gameReferee->outputStartingStats($gameOrder);
        while ($numbersOfTurns > 0 && $noOneDied) {
            $attacker = $gameOrder[0];
            $defender = $gameOrder[1];
            $damage = $attacker->attack($attacker->getStrength() - $defender->getDefence());
            $defenderLife = $defender->defend($damage);
            if ($defenderLife <= 0) {
                $noOneDied = false;
                echo sprintf("%s has won!\n", $attacker);
            }
            $temp = $gameOrder[0];
            $gameOrder[0] = $gameOrder[1];
            $gameOrder[1] = $temp;
            $numbersOfTurns--;
        }
    }
}