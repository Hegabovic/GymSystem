<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){

        return view('packages.index');
    }
    public function create(){
        
        return view('packages.create');
    }
    public function store(){}
    public function show(){
        return view('packages.show');
    }
    public function edit(){} 
    public function update(){}

  
}
