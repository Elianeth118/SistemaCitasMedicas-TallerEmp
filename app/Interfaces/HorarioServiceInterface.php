<?php namespace App\Interfaces;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
interface HorarioServiceInterface{
    public function getAvailableIntervals($date,$doctorId);
    public function isAvailableInterval($date, $doctorId, Carbon $start);
   
}