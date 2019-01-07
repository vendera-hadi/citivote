<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Vote;
use DB;

class VoteExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function headings(): array
    {
        return [
            'Category',
            'Campaign Name',
            'Total Vote'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $result = Vote::join('users', 'users.id', '=', 'votes.candidate_id')
              ->join('vote_categories', 'vote_categories.id', '=', 'votes.vote_category_id')
              ->select(\DB::raw("REPLACE(vote_categories.name,'<br>', ' ') as category"), 'users.nickname as name', \DB::raw('count(votes.id) as total'))
              ->groupBy('vote_categories.name','users.nickname')->get();
        return $result;
    }
}
