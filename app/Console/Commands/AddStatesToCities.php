<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\State;
use Illuminate\Console\Command;

class AddStatesToCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:addStatesToCities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command only needs to be run once to make create the relation between cities and states';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cities = City::where('state_id',null)->get();
        $states = State::all();
        foreach($cities as $city) {
            $this->createCityStateRelations($city,$states);
        }
    }

    private function createCityStateRelations($city,$states)
    {
        $state = $states->filter(function ($state) use($city) {
            return $state->code == $city->description;
        })->first();

        $city->state()->associate($state);

        $city->save();
    }
}
