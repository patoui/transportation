<?php

use Illuminate\Database\Seeder;

class BackfillGTFSOCTranspo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = [
            'agency',
            'calendar',
            'calendar_dates',
            'routes',
            'stop_times',
            'stops',
            'trips',
        ];
        $path = storage_path('gtfs/octranspo/');
        $extension = '.txt';

        foreach ($files as $file) {
            if (Schema::hasTable($file)) {
                $items = $this->convertToAssociativeArray(
                    $path . $file . $extension
                );
                foreach ($items as $item) {
                    $exists = DB::table($file)
                        ->where($item)
                        ->first();
                    if (!$exists) {
                        DB::table($file)->insert($item);
                    }
                }
            }
        }
    }

    private function convertToAssociativeArray($fileWithPath)
    {
        $csv = array_map(
            'str_getcsv',
            $this->remove_utf_bom(file($fileWithPath))
        );
        array_walk($csv, function(&$a) use ($csv) {
          $a = array_combine($csv[0], $a);
        });
        array_shift($csv);
        return $csv;
    }


    private function remove_utf_bom($file)
    {
        if (!empty($file)) {
            $bom = pack('H*','EFBBBF');
            $file[0] = preg_replace("/^$bom/", '', $file[0]);
        }
        return $file;
    }
}
