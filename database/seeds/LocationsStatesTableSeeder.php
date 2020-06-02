<?php

use Illuminate\Database\Seeder;

use League\Csv\Reader;

class LocationsStatesTableSeeder extends Seeder
{
    public function run()
    {
        $csv = Reader::createFromPath(base_path('database/schema/states.csv'));
        $dataToInsert = collect($csv->fetchAssoc(['code', 'name', 'latitude', 'longitude']))->reject(function ($row) {
            return empty($row['code']);
        })->map(function ($row) {
            $row['code'] = (int)$row['code'];
            $row['id'] = $row['code'];
            $row['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
            $row['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
            return $row;
        });

        \DB::table('locations_states')->insert($dataToInsert->all());
    }

}
