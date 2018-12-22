<?php
class City
{
    private $id;
    private $name;
    private $countryId;


    public function getId (): int 
    {
        return $this->id;
    }


    public function getName ()
    {
        return $this->name;
    }


    public function getCountryId ()
    {
        return $this->countryId;
    }


}