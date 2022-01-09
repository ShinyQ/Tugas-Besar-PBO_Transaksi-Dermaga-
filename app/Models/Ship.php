<?php


namespace App\Models;

use ArrivalTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Ship implements ArrivalTime
{
    private $table = 'ships';
    private $number, $name, $arrivalTime;

    public static function get(): \Illuminate\Support\Collection
    {
        return DB::table('ships')->select('*')->get();
    }

    public static function getById($id)
    {
        return DB::table('ships')->select('*')->where('id', $id)->first();
    }

    public function save($id = null): bool
    {
        return DB::table('ships')->updateOrInsert(['id' => $id], [
            'number' => $this->getNumber(),
            'name' => $this->getName(),
            'arrivalTime' => $this->getArrivalTime(),
            'created_at' => Carbon::now()
        ]);
    }

    public static function delete($id) : bool
    {
        return DB::table('ships')->where('id', '=', $id)->delete();
    }

    /**
     * Ship constructor.
     * @param string $number
     * @param $name
     * @param $arrivalTime
     */
    public function __construct(string $number, $name, $arrivalTime)
    {
        $this->number = $number;
        $this->name = $name;
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * @param mixed $arrivalTime
     */
    public function setArrivalTime($arrivalTime): void
    {
        $this->arrivalTime = $arrivalTime;
    }




}
