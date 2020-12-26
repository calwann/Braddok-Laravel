<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Concierge_collaborator;
use App\Concierge_visitor;
use App\Concierge_visitor_vehicle;
use App\Http\Requests\CreateCollaboratorsConciergeRequest;
use App\Http\Requests\CreateVehicleVisitorConciergeRequest;
use App\Http\Requests\CreateVisitorConciergeRequest;
use App\Http\Requests\CreateVisitorsConciergeRequest;
use App\Log;
use App\Vehicle_visitor;
use App\Visitor;
use Illuminate\Support\Facades\DB;

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
        $sql = "
			select      v.id,
                        v.name,
                        v.identity,
                        sub.type
            from        visitors v
            left join   (select     id,
									register_type,
                                    visitor_id,
                                    case    when register_type = 1 then 'in'
                                            when register_type = 2 then 'out'
                                    end type
                        from        concierge_visitors
						where		id in (	select 		max(id)
											from		concierge_visitors
											group by	visitor_id)
						) sub
            on          v.id = sub.visitor_id
            where       1 = 1 
        ";

        $visitors_in = collect(DB::select($sql . "and sub.type = 'in'"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $visitors_out = collect(DB::select($sql . "and sub.type = 'out' or sub.type is null"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $sql = "
            select      v.id,
                        v.brand,
                        v.model,
                        v.license_plate,
                        sub.type
            from        vehicle_visitors v
            left join   (select     id,
                                    register_type,
                                    vehicle_visitor_id,
                                    case    when register_type = 1 then 'in'
                                            when register_type = 2 then 'out'
                                    end type
                        from        concierge_visitor_vehicles 
                        where		id in (	select 		max(id)
											from		concierge_visitor_vehicles
											group by	vehicle_visitor_id)
						) sub
            on          v.id = sub.vehicle_visitor_id
            where       1 = 1 
        ";

        $vehicle_visitors_in = collect(DB::select($sql . "and sub.type = 'in'"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $vehicle_visitors_out = collect(DB::select($sql . "and sub.type = 'out' or sub.type is null"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        return view('concierge/visitors', compact('visitors_in', 'visitors_out', 'vehicle_visitors_in', 'vehicle_visitors_out'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vehicles()
    {
        $users = User::all('id', 'patent', 'name', 'nickname');
        foreach ($users as $user) {
            $user['patent'] = Controller::patent($user['patent']);
        }

        $vehicles_in = array();
        $vehicles_out = array();
        $last_odometer = 10000;

        return view('concierge/vehicles', compact('vehicles_in', 'vehicles_out', 'users', 'last_odometer'));
    
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
            $table_id = Concierge_collaborator::create([
                'register_type' => $data['registerType'],
                'user_id' => $val,
                'date_time' => Controller::strToDate($data['date']) . " " . $data['time'] . ":00",
                '_status' => "active",
            ])->id;
            Controller::registerLog('concierge_collaborators', $table_id, 'create');
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

        if (!empty($data['visitorsInId']) && !empty($data['visitorsOutId']) ||
            !empty($data['vehicleVisitorsInId']) && !empty($data['vehicleVisitorsOutId'])) {

            return redirect()->route('concierge.visitors')->with('status', 'Laçamento inválido.');

        } else if (!empty($data['visitorsInId']) && $data['registerType'] == '2' && empty($data['vehicleVisitorsOutId'])) {
            
            foreach ($data['visitorsInId'] as $val) {
                $table_id = Concierge_visitor::create([
                    'register_type' => $data['registerType'],
                    'visitor_id' => $val,
                    'date_time' => Controller::strToDate($data['date']) . " " . $data['time'] . ":00",
                    '_status' => "active",
                ])->id;
                Controller::registerLog('concierge_visitors', $table_id, 'create');
            }

            if (!empty($data['vehicleVisitorsInId'])) {
                foreach ($data['vehicleVisitorsInId'] as $val) {
                    $table_id = Concierge_visitor_vehicle::create([
                        'register_type' => $data['registerType'],
                        'vehicle_visitor_id' => $val,
                        'date_time' => Controller::strToDate($data['date']) . " " . $data['time'] . ":00",
                        '_status' => "active",
                    ])->id;
                    Controller::registerLog('concierge_visitor_vehicles', $table_id, 'create');
                }
            }
        } else if (!empty($data['visitorsOutId']) && $data['registerType'] == '1' && empty($data['vehicleVisitorsInId'])) {
            
            foreach ($data['visitorsOutId'] as $val) {
                $table_id = Concierge_visitor::create([
                    'register_type' => $data['registerType'],
                    'visitor_id' => $val,
                    'date_time' => Controller::strToDate($data['date']) . " " . $data['time'] . ":00",
                    '_status' => "active",
                ])->id;
                Controller::registerLog('concierge_visitors', $table_id, 'create');
            }

            if (!empty($data['vehicleVisitorsOutId'])) {
                foreach ($data['vehicleVisitorsOutId'] as $val) {
                    $table_id = Concierge_visitor_vehicle::create([
                        'register_type' => $data['registerType'],
                        'vehicle_visitor_id' => $val,
                        'date_time' => Controller::strToDate($data['date']) . " " . $data['time'] . ":00",
                        '_status' => "active",
                    ])->id;
                    Controller::registerLog('concierge_visitor_vehicles', $table_id, 'create');
                }
            }
        } else {
            return redirect()->route('concierge.visitors')->with('status', 'Laçamento inválido.');
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

        $table_id = Visitor::create([
            'name' => strtoupper($data['name']),
            'birth' => Controller::strToDate($data['birth']),
            'phone' => $data['phone'],
            'identity' => $data['identity'],
            '_status' => "active",
        ])->id;
        Controller::registerLog('visitors', $table_id, 'create');

        return redirect()->route('concierge.visitors')->with('status', 'Novo visitante cadastrado.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVehicleVisitor(CreateVehicleVisitorConciergeRequest $request)
    {
        $data = $request->all();

        $table_id = Vehicle_visitor::create([
            'license_plate' => strtoupper($data['licensePlate']),
            'type' => $data['type'],
            'brand' => strtoupper($data['brand']),
            'model' => strtoupper($data['model']),
            '_status' => "active",
        ])->id;
        Controller::registerLog('vehicle_visitors', $table_id, 'create');

        return redirect()->route('concierge.visitors')->with('status', 'Novo veículo de visitante cadastrado.');
    }
}
