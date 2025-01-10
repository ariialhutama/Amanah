<?php

namespace App\Imports;

use App\Models\Material;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MaterialImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        // dd($collection);
        $index = 1;
        foreach ($collection as $row) {
            if ($index > 1) {
                $material = new Material();
                $material->name = $row[1];
                $material->save();
                
            }
            $index++;
        }
    }
}
