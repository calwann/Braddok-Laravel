<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Concierge_collaborator;

class ConciergeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('concierge/index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dash()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collaborators($p = NULL)
    {
        $msg = $p['msg'];

        foreach (User::all() as $i => $val) {
            $users[] = "<option value=\"" . $val['id'] . "\">" . Controller::patent($val['patent']) . " - " . $val['name'] . " (" . $val['nickname'] . ")</option>";
        }

        return view('concierge/collaborators', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visitors()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vehicles()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reports()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createCollaborators(Request $request)
    {
        $data = $request->all();

        foreach ($data['usersId'] as $val) {
            Concierge_collaborator::create([
                'register_type' => $data['registerType'],
                'user_id' => $val,
                'date_time' => Controller::strToDate($data['date']) . " " . $data['time'] . ":00",
                '_status' => "active",
            ]);
        }

        return redirect()->route('concierge.collaborators')->with('status', 'Laçamento cadastrado.');
    }
}
