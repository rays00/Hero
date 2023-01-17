<?php


class GameReferee
{
    public function outputStartingStats($gameOrder)
    {
        echo $gameOrder[0] . " will start. \n";
        echo sprintf("Speed comparison: %s -> %d %s -> %d\n", $gameOrder[0], $gameOrder[0]->getSpeed(),
            $gameOrder[1], $gameOrder[1]->getSpeed());
        echo sprintf("Luck comparison: %s -> %d %s -> %d\n", $gameOrder[0], $gameOrder[0]->getLuck(),
            $gameOrder[1], $gameOrder[1]->getLuck());
        echo sprintf("Health comparison: %s -> %d %s -> %d\n", $gameOrder[0], $gameOrder[0]->getHealth(),
            $gameOrder[1], $gameOrder[1]->getHealth());
        echo sprintf("Strength comparison: %s -> %d %s -> %d\n", $gameOrder[0], $gameOrder[0]->getStrength(),
            $gameOrder[1], $gameOrder[1]->getStrength());
        echo sprintf("Defence comparison: %s -> %d %s -> %d\n", $gameOrder[0], $gameOrder[0]->getDefence(),
            $gameOrder[1], $gameOrder[1]->getDefence());
    }

    public function determineStarter($orderus, $beast): array
    {
        $gameOrder = [$orderus, $beast];
        usort($gameOrder, function ($fighterA, $fighterB) {
            if ($fighterA->getSpeed() > $fighterB->getSpeed()) {
                return -1;
            } elseif ($fighterA->getSpeed() == $fighterB->getSpeed()) {
                if ($fighterA->getLuck() > $fighterB->getLuck()) {
                    return -1;
                }
            }
            return 1;
        });
        return $gameOrder;
    }
}