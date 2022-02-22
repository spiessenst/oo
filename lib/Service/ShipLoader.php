<?php



class ShipLoader
{

    private $pdo;


    public function __construct(PDO $pdo)
    {
        $this->pdo =$pdo;
    }


    /**
     * @return Ship[]
     */

   public function getSships()
    {

        $shipsData= $this->queryForShips();




        foreach ($shipsData as $shipData){

            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;

    }

    /**
     * @param $id
     * @return Ship|null
     */
    public function findOneById($id){

        $pdo = $this->getPDO();

        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$shipArray){
            return null;
        }

        return $this->createShipFromData($shipArray);

    }


    private function createShipFromData(array $shipData){

        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['strength']);

        return $ship;
    }


    private function queryForShips(){

        $pdo  =$this->getPDO();

        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $shipsArray;

    }

    /**
     * @return PDO
     */
    private function getPDO(){


        return $this->pdo;
    }

}