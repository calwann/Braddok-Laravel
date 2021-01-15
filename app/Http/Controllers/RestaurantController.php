<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//RestaurantController
class RestaurantController extends Controller {
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
        return view('restaurant/register');
    }

}
