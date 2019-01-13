<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\UserPhoto;
use DB;

class PhotoExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function headings(): array
    {
        return [
            'SOEID',
            'Photo Link',
            'Uploaded at'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $asset_url = asset("storage/");
        $result = UserPhoto::join('users', 'users.id', '=', 'user_photos.user_id')
              ->select('users.soeid', \DB::raw("CONCAT('$asset_url/', user_photos.image_path) as image_path"), \DB::raw('DATE_FORMAT(user_photos.created_at, "%W %M %e %Y, %H:%i") as uploaded_at'))
              ->get();
        return $result;
    }
}
