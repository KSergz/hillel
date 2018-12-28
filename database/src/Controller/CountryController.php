<?php
class CountryController
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct (PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function showAction()
    {
        var_dump ('showAction');
    }

    public function editAction()
    {
        var_dump ('editAction');
    }

    public function createAction()
    {
        var_dump ('createAction');
    }

    public function deleteAction()
    {
        var_dump ('deleteAction');
    }

}