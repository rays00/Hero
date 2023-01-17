<?php

interface FightAble
{
    public function attack($damageGiven);
    public function defend($damageTaken);
}