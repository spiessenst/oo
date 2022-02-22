<?php

class Container
{

    private $configuration;

    private $pdo;

    private $shipLoader;

    private $battleManager;


    /**
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }


    /**
     * @return PDO
     */

    public function getPdo(){

        if($this->pdo === null){

        $this->pdo = new PDO( $this->configuration['db_dsn'] , $this->configuration['db_user'] , $this->configuration['db_pass']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    /**
     * @return ShipLoader
     */
    public function getShipLoader()
    {
        if($this->shipLoader === null) {

            $this->shipLoader = new ShipLoader($this->getPdo());

        }

        return $this->shipLoader;

    }

    /**
     * @return BattleManager
     */
    public function getBattleManager()
    {
        if($this->battleManager === null) {

            $this->battleManager = new battleManager();

        }

        return $this->battleManager;
    }




}