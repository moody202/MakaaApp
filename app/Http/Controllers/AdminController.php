<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function ShowString(){
        return 'Mahmoud Ayoub';
    }

    public function getindex() {
        $view=[];
        $view['name']="Mahmoud";
        $view['id']=88;


        $go =new \stdClass;
        $go->name="Mahmoud";
        $go->id="66";
        $go->description="Mahmoud";


        return view('index', compact('go'));
    }
}
