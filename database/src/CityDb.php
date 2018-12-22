<?php

class CityDb
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function editCity($id, $name, $countryId)
    {
        if (empty($name)) {
            echo '<p style="color: red; size: ledger">Поле name не должно быть пустым!';
            return;
        }
        $result = $this->pdo->exec(sprintf("UPDATE city SET `name`='%s', `country_id`='%s' WHERE id = %s", $name, $countryId,  $id));
        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }
    public function createCity($name, $countryId)
    {
        if (empty($name)) {
            echo '<p style="color: red; size: ledger">Поле name не должно быть пустым!';
            return;
        }
        $result = $this->pdo->exec(sprintf("INSERT INTO city(`name`, `country_id`) VALUE ('%s', '%s')", $name, $countryId));
        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }
    /**
     * @return City[]
     */
    public function getAllCities()
    {
        $statement = $this->pdo->query("SELECT * FROM city");
        $statement->setFetchMode(
            PDO::FETCH_CLASS,
            'City'
        );
        return $statement->fetchAll();
    }
    /**
     * @param $id
     * @return City
     */
    public function getCity($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM city WHERE id = %s", $id)
        );
        return $statement->fetchObject('City');
    }

    public function deleteCity($id)
    {
        $result = $this->pdo->exec (sprintf ("DELETE FROM city WHERE id = %s", $id));
        if ($result === false){
            var_dump ($this->pdo->errorInfo ());
        }
    }
}