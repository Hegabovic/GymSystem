<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();

        return view('packages.index')->with(['packages'=>$packages]);
    }

    public function create()
    {

        return view('packages.create');
    }

    public function store()
    {
    }

    public function show()
    {
        return view('packages.show');
    }

    public function edit()
    {
    }

    public function update()
    {
    }
}
