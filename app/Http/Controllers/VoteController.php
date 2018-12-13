<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\VoteCategory;
use App\Models\User;
use App\Models\Vote;

class VoteController extends Controller
{
  public function __construct()
  {
      // empty
  }

  public function index()
  {
      $user_id = Auth::id();
      $categories = VoteCategory::all();
      $candidates = User::candidate()->orderBy('name')->get();
      return view('vote', compact('categories', 'candidates', 'user_id'));
  }

  public function result()
  {
      $user_id = Auth::id();
      $categories = VoteCategory::all();
      $candidates = User::candidate()->orderBy('name')->get();
      return view('result', compact('categories', 'candidates', 'user_id'));
  }

  public function create(Request $request)
  {
    // store voting
    $i = 0;
    $category_ids = $request->category_ids;
    $candidate_ids = $request->candidate_ids;
    foreach ($category_ids as $cat_id) {
      foreach ($candidate_ids[$cat_id] as $val) {
        Vote::create(['user_id' => Auth::id(), 'candidate_id' => $val, 'vote_category_id' => $cat_id]);
      }
    }
    Auth::logout();
    return response()->json(['success' => true]);
  }
}
