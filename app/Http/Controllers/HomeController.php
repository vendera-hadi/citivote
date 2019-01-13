<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\User;
use App\Exports\VoteExport;
use App\Exports\PhotoExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use Faker\Generator as Faker;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['total_vote'] = Vote::count();
        $data['members'] = User::member()->paginate(50);
        return view('home', $data);
    }

    public function download()
    {
        return Excel::download(new VoteExport, 'vote_result.xlsx');
    }

    public function download_mna()
    {
        return Excel::download(new PhotoExport, 'mynextaspiration_result.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->storeAs('csv', 'import.csv');
        Excel::import(new UserImport($this->faker), $file);
        return redirect('admin')->with('success', 'Import success!');
    }

    public function reset_vote(Request $request)
    {
        Vote::truncate();
        $request->session()->flash('success', 'Vote reset successfully');
        return response()->json(['success' => true]);
    }

    public function reset_member(Request $request)
    {
        User::where('role_id',2)->delete();
        $request->session()->flash('success', 'Member reset successfully');
        return response()->json(['success' => true]);
    }
}
