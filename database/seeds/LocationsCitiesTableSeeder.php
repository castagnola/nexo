<?php

use Illuminate\Database\Seeder;

use League\Csv\Reader;

class LocationsCitiesTableSeeder extends Seeder
{
    public function run()
    {
        $csv = Reader::createFromPath(base_path('database/schema/cities.csv'));
        $dataToInsert = collect($csv->fetchAssoc(['code', 'name', 'location_state_id', 'location_state_name', 'latitude', 'longitude']))->reject(function ($row) {
            return empty($row['code']);
        })->map(function ($row) {
            $row['code'] = (int)$row['code'];
            $row['location_state_id'] = (int)$row['location_state_id'];
            $row['id'] = $row['code'];
            $row['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
            $row['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
            unset($row['location_state_name']);
            return $row;
        });

        \DB::table('locations_cities')->insert($dataToInsert->all());
    }

}
