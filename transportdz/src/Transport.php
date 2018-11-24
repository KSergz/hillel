<?php
 abstract class Transport
{
    private $name;
    private $weight;
    private $carrying;
    private $carryingCurrent;
    private $fuelType;
    private $typeOfMovement;
    protected $action = 'без бвижения';

    protected $move = false;
    protected $fuelConsumption;//Расход топлива в л/км
    protected $distance;
    protected $fuelCurrent = 0;
    protected $capacityTank;
   // public $fuelUse ;


    public function __construct (string $name,
                                 int $weight,
                                 int $carrying,
                                 string $fuelType,
                                 string $typeOfMovement,
                                 int $capacityTank,
                                 int $fuelConsumption,
                                 int $distance)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->carrying = $carrying;
        $this->carryingCurrent = 0;
        $this->fuelType = $fuelType;
        $this->typeOfMovement = $typeOfMovement;
        $this->capacityTank = $capacityTank;
        $this->fuelConsumption = $fuelConsumption;
        $this->distance = $distance;
    }

    public function beginMovement()
    {
        $this->move = true;
        $this->action = 'в движении';
        $fuelUse=0;
        $this->distance * $this->fuelConsumption = $fuelUse;
        $this->fuelCurrent -= $fuelUse;
        $this->action = "Расходовано топлива: {$fuelUse} л";


    }

    public function stopMovement()
    {
        $this->move = false;
        $this->action = 'остановка';
    }

    public function fuelling($fuel)
    {
       if (($this->fuelCurrent)<0 or ($this->fuelCurrent + $fuel) > $this->capacityTank)
       {
           throw new Exception('Недопустимое количество топлива');
       }
        $this->fuelCurrent += $fuel;

        if ($this->move) {
            throw new \Exception('Необходимо остановиться!');
        }

        $this->action = "Заправка:{$fuel} л";
    }

    public function loading(int $massa)
    {

        if (($this->carrying - $this->carryingCurrent - $massa) < 0) {
            throw new \Exception('Такой груз не поместится!');
        }

        $this->carryingCurrent += $massa;

        if ($this->move) {
            throw new \Exception('Необходимо остановиться!');
        }

        $this->action = "загрузка: {$massa} т";
    }
    public function unloading(int $massa)
    {
        $this->carryingCurrent -= $massa;

        $this->action = "разгрузка: {$massa} т";
    }

    public function getAction()
    {
        return $this->action;
    }
}