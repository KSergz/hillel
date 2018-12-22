<?php
class CountryDb
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function editCountry($id, $name, $phone_code, $code)
    {
        if (empty($name)) {
            echo '<p style="color: red; size: ledger">Поле Country name не должно быть пустым!';
            return;
        }
        $result = $this->pdo->exec(sprintf("UPDATE country SET `name`='%s', `phone_code`='%s', `code`='%s' WHERE id = %s", $name, $phone_code, $code,  $id));
        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }
    public function createCountry($name, $phone_code, $code)
    {
        if (empty($name)) {
            echo '<p style="color: red; size: ledger">Поле Country name  не должно быть пустым!';
            return;
        }
        $result = $this->pdo->exec(sprintf("INSERT INTO country(`name`, `phone_code`, `code`) VALUE ('%s', '%s', '%s')", $name, $phone_code, $code));
        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }
    /**
     * @return Country[]
     */
    public function getAllCountries()
    {
        $statement = $this->pdo->query("SELECT * FROM country");
        $statement->setFetchMode(
            PDO::FETCH_CLASS,
            'Country'
        );
        return $statement->fetchAll();
    }
    /**
     * @param $id
     * @return Country
     */
    public function getCountry($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM country WHERE id = %s", $id)
        );
        return $statement->fetchObject('Country');
    }

    public function deleteCountry($id)
    {
        $result = $this->pdo->exec (sprintf ("DELETE FROM country WHERE id = %s", $id));
        if ($result === false){
            var_dump ($this->pdo->errorInfo ());
        }
    }
}