<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//RestaurantController
class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //register
    public function index()
    {
        return view('restaurant/index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //register
    public function register()
    {
        for ($i = 0; $i <= 10; $i++) {
            $days[$i] = Controller::addDateTime(Controller::cur_date(), "+" . $i . "days", "d/m/Y");
        }

        return view('restaurant/register', compact('days'));
    }
}
