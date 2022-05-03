<?php

namespace App\Http\Controllers;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){

        $packages=Package::all();
       
        return view('packages.index',[
           
            'packages' => $packages,
        ]);
    }
    public function create(){
        
        return view('packages.create');
    }
    public function store(){
           $data = request()->all(); 
           Package::create([
               'name' => $data['name'],
               'price' => $data['price'],
               'number_of_sessions' => $data['number_of_sessions'],
   ]);
           return to_route('packages.index')->with('success', "package is created");
       }
    
       public function edit($packageId)
       {
           $package = Package::find($packageId);
           return view(
               'packages.edit',
               ['package'=>$package]
           );
       }
   
       public function update($postId)
       { 
           $data = request()->all();
   
           Package::where('id', $postId)->update([
               'name'=>$data['name'],
               'price'=>$data['price'],
               'number_of_sessions'=>$data['number_of_sessions'],
           ]);
   
           return to_route('packages.index');
          
       }
  
}
