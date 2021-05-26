<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportImage
{
  public static function save(Request $request, $inputName = 'image' ,$name = '', $folderSave = 'public/trash'){
  
      // $request->validate([
      //   $inputName => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      // ]);

      $file = $request->file($inputName);
      $filename = $name .'.'. $file->getClientOriginalExtension();
      $file->storeAs($folderSave,$filename);

      return $filename;
  }

  public function saveDisk(Request $request, $inputName = 'image'){
    $path = Storage::disk('public')->put('image',$request->file($inputName));
    return asset($path);
  }
}
