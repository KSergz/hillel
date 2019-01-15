<?php

namespace App\Controller;

use App\Model\Database\CityDb;
use App\Model\Database\CountryDb;
use App\Model\Country;
use App\Serves\ConnectDb;

class CitiesController extends Controller
{
    /**
     * @var CityDb
     */
    private $cityDb;

    /**
     * @var CountryDb
     */
    private $countryDb;

    public function __construct()
    {
        $this->cityDb = new CityDb(ConnectDb::get());
        $this->countryDb = new CountryDb(ConnectDb::get());
    }

    public function showAction()
    {
        $cities = $this->cityDb->getAll();
        $this->view(['cities' => $cities], 'cities/show_cities');

    }
}
