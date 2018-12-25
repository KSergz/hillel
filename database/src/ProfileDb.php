<?php
class ProfileDb
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Profile $profile)
    {
        if (empty($profile->getLastName()) &&
            empty($profile->getFirstName()) &&
            empty($profile->getUserId()) &&
            empty($profile->getCityId())) {
            echo '<p style="color: red; size: ledger">Для Профиля все поля должны быть запролнены!';
            return;
        }

        $result = $this->pdo->exec(sprintf(
            "INSERT INTO profile(`last_name`, `first_name`, `address`, `user_id`, `city_id`) VALUE ('%s', '%s', '%s', '%s', '%s')",
            $profile->getLastName(),
            $profile->getFirstName(),
            $profile->getAddress(),
            $profile->getUserId(),
            $profile->getCityId()

        ));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    public function edit(Profile $profile)
    {
        if (empty($profile->getId())) {
            echo '<p style="color: red; size: ledger">Обьект профиля нужно создать!';
            return;
        }

        if (empty($profile->getLastName ()) &&
            empty($profile->getFirstName ()) &&
            empty($profile->getUserId ()) &&
            empty($profile->getCityId ())) {
            echo '<p style="color: red; size: ledger">Для профиля все поля должны быть запролнены!';
            return;
        }

        $result = $this->pdo->exec(sprintf(
            "UPDATE profile SET `last_name`= '%s', `first_name`= '%s', `address`='%s', `user_id`='%s', `city_id`='%s' WHERE id = %s",
            $profile->getLastName (),
            $profile->getFirstName (),
            $profile->getAddress (),
            $profile->getUserId (),
            $profile->getCityId (),
            $profile->getId ()

        ));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    public function delete($id)
    {
        $result = $this->pdo->exec(sprintf("DELETE FROM profile WHERE id = %s", $id));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }


    /**
     * @return Profile[]
     */
    public function getAll()
    {
        $statement = $this->pdo->query("SELECT * FROM profile");
        $statement->setFetchMode(
            PDO::FETCH_CLASS,
            'Profile'
        );

        return $statement->fetchAll();
    }

    /**
     * @param $id
     * @return Profile
     */
    public function getProfile($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM profile WHERE id = %s", $id)
        );

        return $statement->fetchObject('Profile');
    }
}