<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserPhoto;
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

      $user = Auth::user();
      if($user->photo){
        $filename = Auth::user()->soeid."_new.png";
      }else{
        $filename = Auth::user()->soeid.".png";
      }

      $request->file('file')->storeAs('users/photo/', $filename, [
          'disk' => 'public',
          'visibility' => 'public'
      ]);
      // flash session for preview
      $request->session()->flash('filename', $filename);
      return response()->json([
          'success' => true
      ]);
    }

    public function confirmation(Request $request)
    {
      if ($request->session()->has('filename')) {
        $data['user'] = Auth::user();
        $data['filename'] = $request->session()->get('filename');
        return view('myna.confirmation', $data);
      }else{
        return redirect('/');
      }
    }

    public function store(Request $request)
    {
        $image_path = $request->image_path;
        $user = Auth::user();
        if($user->photo){
            if (strpos($image_path, '_new') !== false){
              Storage::disk('public')->delete(str_replace('_new','', $image_path));
              Storage::disk('public')->move($image_path, str_replace('_new','', $image_path));
            }
        }else{
            $user->photo = new UserPhoto;
            $user->image_path = $image_path;
            $user->save();
        }
        $request->session()->flash('filename', $user->photo->image_path);
        return redirect('thankyou');
    }

    public function thankyou(Request $request)
    {
        if ($request->session()->has('filename')) {
          $data['filename'] = $request->session()->get('filename');
          return view('myna.thankyou', $data);
        }else{
          return redirect('/');
        }
    }
}
