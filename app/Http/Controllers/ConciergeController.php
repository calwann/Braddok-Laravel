<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Concierge_collaborator;
use App\Concierge_visitor;
use App\Http\Requests\CreateCollaboratorsConciergeRequest;
use App\Http\Requests\CreateVisitorConciergeRequest;
use App\Http\Requests\CreateVisitorsConciergeRequest;
use App\Visitor;

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
        $users = User::all('id', 'patent', 'name', 'nickname');
        foreach ($users as $user) {
            $user['patent'] = Controller::patent($user['patent']);
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
        $visitors = Visitor::all('id', 'name', 'identity');
        return view('concierge/visitors', compact('visitors'));
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
    public function createCollaborators(CreateCollaboratorsConciergeRequest $request)
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

        return redirect()->route('concierge.collaborators')->with('status', 'Laçamento de militares realizado.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVisitors(CreateVisitorsConciergeRequest $request)
    {
        $data = $request->all();

        foreach ($data['visitorsId'] as $val) {
            Concierge_visitor::create([
                'register_type' => $data['registerType'],
                'visitor_id' => $val,
                'date_time' => Controller::strToDate($data['date']) . " " . $data['time'] . ":00",
                '_status' => "active",
            ]);
        }

        return redirect()->route('concierge.visitors')->with('status', 'Laçamento de visitantes realizado.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVisitor(CreateVisitorConciergeRequest $request)
    {
        $data = $request->all();

        Visitor::create([
            'name' => strtoupper($data['name']),
            'birth' => Controller::strToDate($data['birth']),
            'phone' => $data['phone'],
            'identity' => $data['identity'],
            '_status' => "active",
        ]);

        return redirect()->route('concierge.visitors')->with('status', 'Novo visitante cadastrado.');
    }
}
