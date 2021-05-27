<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sistema\Company;
use App\Services\ImportImage;

class CompanyController extends Controller
{
  public function index() {
    $company = Company::get();

    return view('admin.company.index', compact('company'));
  }

  public function store(Request $request){
    try {
      $company = new Company();
      $company->id_sucursal = 1;
      $company->nombre = $request->input('nombre');
     
      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'public/photo_grupo';
        $company->imagen = ImportImage::save($request, 'image', $filename, $folder);
      }

      $company->save();

      return back()->with('success','Se ha creado correctamente.');
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
