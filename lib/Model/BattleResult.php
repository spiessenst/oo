<?php

class BattleResult
{
    private $usedJediPowers;
    private $winningShip;
    private $losingShip;


public function __construct($usedJediPowers,Ship $winningShip  = null ,Ship $losingShip = null){

        $this->usedJediPowers = $usedJediPowers;
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;

}

    /**
     * @return Boolean
     */
    public function wereJediPowersUsed()
    {
        return $this->usedJediPowers;
    }

    /**
     * @return Ship/null
     */
    public function getWinningShip(): Ship
    {
        return $this->winningShip;
    }

    /**
     * @return Ship/null
     */
    public function getLosingShip(): Ship
    {
        return $this->losingShip;
    }


public function isThereAWinner(){

        return $this->getWinningShip() !== null;
}


}
