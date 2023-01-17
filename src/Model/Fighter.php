<?php

require 'FightAble.php';

class Fighter implements FightAble
{
    private $health;
    private $strength;
    private $defence;
    private $speed;
    private $luck;
    private $rapidStrike;
    private $magicShield;

    const KIND_LABEL = [
        '0' => 'Orderus',
        '1' => 'Beast'
    ];
    private $kind;

    public function __construct(
        $health,
        $strength,
        $defence,
        $speed,
        $luck,
        $rapidStrike,
        $magicShield,
        $kind
    ) {
        $this->health = $health;
        $this->strength = $strength;
        $this->defence = $defence;
        $this->speed = $speed;
        $this->luck = $luck;
        $this->rapidStrike = $rapidStrike;
        $this->magicShield = $magicShield;
        $this->kind = $kind;
    }

    public function attack($damageGiven)
    {
        echo sprintf("%s is attacking\n", $this);
        $chances = rand(0, 100);
        if ($this->rapidStrike && $chances <= 10) {
            echo "Rapid Strike used \n";
            $damageGiven *= 2;
        }
        return $damageGiven;
    }

    public function defend($damageTaken)
    {
        $chances = rand(0, 100);
        if ($this->magicShield && $chances <= 20) {
            echo "Magic shield used\n";
            $damageTaken /= 2;
        }
        if ($chances <= $this->luck) {
            $damageTaken = 0;
        }
        $this->health -= $damageTaken;
        echo sprintf("%s took %d damage\n", $this, $damageTaken);
        if ($damageTaken == 0) {
            echo sprintf("%s got lucky, the enemy missed!\n", $this);
        }
        echo sprintf("%d health available for %s\n", $this->health, $this);
        return $this->health;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @return mixed
     */
    public function getRapidStrike()
    {
        return $this->rapidStrike;
    }

    /**
     * @return mixed
     */
    public function getMagicShield()
    {
        return $this->magicShield;
    }

    public function __toString()
    {
        return self::KIND_LABEL[$this->kind];
    }
}