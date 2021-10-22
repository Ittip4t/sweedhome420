<?php

namespace App\Imports;

use Maatwebsite\Excel\Row;
// use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\OnEachRow;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
// use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ThaiPostalCodeImport implements WithMultipleSheets, OnEachRow
{
    public function sheets(): array
    {
        return [
            'TambonDatabase' => new ThaiPostalCodeImport(),
        ];
    }

    public function onRow(Row $row)
    {
        $direction = array(
            "ภาคเหนือ" => "North",
            "ภาคใต้" => "South",
            "ภาคกลาง" => "Central",
            "ภาคตะวันตก" => "West",
            "ภาคตะวันตกเฉียงเหนือ" => "Northwest",
            "ภาคตะวันตกเฉียงใต้" => "Southwest",
            "ภาคตะวันออก" => "East",
            "ภาคตะวันออกเฉียงเหนือ" => "Northeast",
            "ภาคตะวันออกเฉียงใต้" => "Northwest",
        );

        if ($row->getIndex() !== 1) {
            $postcode = explode("/", $row[6]);
            $province = DB::table('provinces')->upsert(
                [
                    ['id' => $row[13], 'lang' => "th", 'name' => "{$row[14]}", 'region' => $row[16]],
                    ['id' => $row[13], 'lang' => "en", 'name' => "{$row[15]}", 'region' => $direction[$row[16]]]
                ],
                ['id', 'lang'],
                ['name']
            );

            $district = DB::table('districts')->upsert(
                [
                    ['id' => $row[8], 'lang' => "th", 'name' => "{$row[9]}", 'name_short' => "{$row[11]}"],
                    ['id' => $row[8], 'lang' => "en", 'name' => "{$row[10]}", 'name_short' => "{$row[12]}"],
                ],
                ['id', 'lang'],
                ['name']
            );
            $subDistrict = DB::table('sub_districts')->upsert(
                [
                    ['id' => $row[0], 'lang' => "th", 'name' => "{$row[1]}", 'name_short' => "{$row[3]}"],
                    ['id' => $row[0], 'lang' => "en", 'name' => "{$row[2]}", 'name_short' => "{$row[4]}"],
                ],
                ['id', 'lang'],
                ['name']
            );
            foreach ($postcode as $val) {
                $thPostalCode = DB::table('thai_postal_codes')->upsert([['postal_code' => $val, 'district_id' => $row[8], 'province_id' => $row[13], 'sub_district_id' => $row[0]]], ['sub_district_id', 'postal_code'], ['postal_code']);
                // echo  "{$val}|{$row[14]} <br>";
            }
        }
    }
}
