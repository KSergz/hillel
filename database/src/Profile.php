<?php
class Profile
{
    private $id;
    private $last_name;
    private $first_name;
    private $address;
    private $user_id;
    private $city_id;


    public function getId()
    {
        return $this->id;
    }


    public function getLastName()
    {
        return $this->last_name;
    }


    public function getFirstName()
    {
        return $this->first_name;
    }


    public function getAddress()
    {
        return $this->address;
    }


    public function getUserId()
    {
        return $this->user_id;
    }


    public function getCityId()
    {
        return $this->city_id;
    }

    public function update($last_name, $first_name, $address, $user_id, $city_id )
    {
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->address = $address;
        $this->user_id = $user_id;
        $this->city_id = $city_id;
    }
}