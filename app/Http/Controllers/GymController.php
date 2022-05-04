<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function show()
    {
        $tableData=Gym::all();
        $gyms = Gym::all();
        return view('gyms.show_gym', ['gyms' => $gyms]);
    }

    public function delete()
    {
        $isDeleted=false;
        $data=request()->input('id');
        $record=Gym::find($data);
        if($record)
        {
            $isDeleted=$record->delete();
        }
        if($isDeleted)
        {
            return ['success' =>'true'];
        }else{
            return ['success' =>'false'];
        }
    }


    
}
