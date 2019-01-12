<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MynaController extends Controller
{
    public function index()
    {
        $data = [];
        return view('myna.upload', $data);
    }

    public function upload(Request $request)
    {
      if (! $request->hasFile('file') || ! $request->file('file')->isValid()) {
          return response()->json([
              'success' => false
          ]);
      }

      $request->file('file')->storeAs('users/photo/', Auth::user()->soeid.".png", [
          'disk' => 'public',
          'visibility' => 'public'
      ]);
      // flash session for preview
      $request->session()->flash('upload_success',true);
      return response()->json([
          'success' => true
      ]);
    }

    public function confirmation(Request $request)
    {
      if ($request->session()->has('upload_success')) {
        $data = [];
        return view('myna.confirmation', $data);
      }else{
        return redirect('/');
      }
    }
}
