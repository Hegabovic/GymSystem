<?php

namespace App\Http\Controllers;

use App\Contracts\PackageRepositoryInterface;
use App\Http\Requests\StorePackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PackageController extends Controller
{
    private PackageRepositoryInterface $packageRepository;
   
    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }
  
    public function index(): Factory|View|Application{

        $packages=$this->packageRepository->all();
       
        return view('packages.index',['packages' => $packages]);
    }
  
    public function create():Factory|View|Application{
        
        return view('packages.create');
    }
  
    public function store(StorePackageRequest $request): RedirectResponse
    {
        $this->packageRepository->create([
            "name" => $request->name,
            "price" => $request->price,
            "number_of_sessions" => $request->number_of_sessions
        ]);
        return to_route('packages.index');
    }
  
    public function edit($packageId)
    {
        $selectedPackage = $this->packageRepository->findById($packageId);
        return view('packages.edit', ['package' => $selectedPackage]);
    }

    public function update(StorePackageRequest $request)
    {
        $formData = $request->all();
        $updatedPackage = [
            "name" => $formData["name"],
            "price" => $formData["price"],
            "number_of_sessions" => $formData["number_of_sessions"]
        ];
        $this->packageRepository->update($request->id, $updatedPackage);

        return to_route('packages.index');
    }
    
    public function delete()
    {
        $packageId = request()->input('id');
        $result = $this->packageRepository->delete($packageId);
        if ($result > 0)
            return ["success" => true,"count"=> $result];

        else
            return ["success" => false, "count"=> $result,"message" => "Delete hasn't completed successfully."];
    }
 
}
