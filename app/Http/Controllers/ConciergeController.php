<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Concierge_collaborator;
use App\Concierge_vehicle;
use App\Concierge_visitor;
use App\Concierge_visitor_vehicle;
use App\Http\Requests\CreateCollaboratorsConciergeRequest;
use App\Http\Requests\createVehicleConciergeRequest;
use App\Http\Requests\createVehiclesConciergeRequest;
use App\Http\Requests\CreateVehicleVisitorConciergeRequest;
use App\Http\Requests\CreateVisitorConciergeRequest;
use App\Http\Requests\CreateVisitorsConciergeRequest;
use App\Http\Requests\ReadReportsConciergeRequest;
use App\Log;
use App\Vehicle;
use App\Vehicle_visitor;
use App\Visitor;
use DateTime;
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
    public function dash($page)
    {
        if ($page < 1) {
            return redirect()->route('concierge.dash');
        }

        $pageIndexMax = 10;
        $pageIndex = ($page - 1) * $pageIndexMax;

        $sql = "
            # Visitantes
            select  count(*) total
            from    concierge_visitors
            where	id in (	select 		max(id)
                            from		concierge_visitors
                            group by	visitor_id)
            and     register_type = 1
            
            union all

            # Veículos
            select  count(*) total
            from    concierge_visitor_vehicles
            where	id in (	select 		max(id)
                            from		concierge_visitor_vehicles
                            group by	vehicle_visitor_id)
            and     register_type = 1
            
            union all

            # Viaturas
            select  count(*) total
            from    concierge_vehicles
            where	id in (	select 		max(id)
                            from		concierge_vehicles
                            group by	vehicle_id)
            and     register_type = 2
        ";

        $status = Controller::array_cut(collect(DB::select($sql))->map(function ($x) {
            return (array) $x;
        })->toArray());

        $sql = "
			select      v.id,
                        v.name,
                        v.identity,
                        YEAR(FROM_DAYS(datediff(CURDATE(), v.birth))) birth,
                        v.phone,
                        DATE_FORMAT(sub.date, '%d/%m/%Y - %H:%i:%s') date
                        from        visitors v
            left join   (select     id,
									register_type,
                                    visitor_id,
                                    date_time date,
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
            and         _status = 'active'
        ";

        $visitors_in = collect(DB::select($sql . "and sub.type = 'in'"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $sql = "
            select      v.id,
                        v.brand,
                        v.model,
                        v.license_plate,
                        v.type,
                        DATE_FORMAT(sub.date, '%d/%m/%Y - %H:%i:%s') date
                        from        vehicle_visitors v
            left join   (select     id,
                                    register_type,
                                    vehicle_visitor_id,
                                    date_time date,
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
            and         _status = 'active'
        ";

        $vehicle_visitors_in = collect(DB::select($sql . "and sub.type = 'in'"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $sql = "
            select      v.id,
                        v.brand,
                        v.model,
                        v.license_plate,
                        v.type,
                        sub.odometer,
                        DATE_FORMAT(sub.date, '%d/%m/%Y - %H:%i:%s') date
                        from        vehicles v
            left join   (select     id,
                                    register_type,
                                    vehicle_id,
                                    odometer,
                                    date_time date,
                                    case    when register_type = 1 then 'in'
                                            when register_type = 2 then 'out'
                                    end type
                        from        concierge_vehicles 
                        where		id in (	select 		max(id)
											from		concierge_vehicles
											group by	vehicle_id)
						) sub
            on          v.id = sub.vehicle_id
            where       1 = 1 
            and         _status = 'active'
        ";

        $vehicles_out = collect(DB::select($sql . "and sub.type = 'out'"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $sql = "
            SELECT 		patent,
                        name,
                        nickname,
                        case 	when l.log = 'create' then 'Cadastrou registro'
                                when l.log = 'delete' then 'Apagou registo'
                                when l.log = 'update' then 'Atualizou registo'
                                when l.log = 'login' then 'Acessou o sitema'
                                when l.log = 'logout' then 'Saiu do sistema'
                        END obs,
                        table_id,
                        case 	when l.table_used = 'concierge_collaborators' then 'Lançar Militares'
                                when l.table_used = 'concierge_visitors' then 'Lançar Visitantes'
                                when l.table_used = 'concierge_visitor_vehicles' then 'Lançar Veículos de Visitantes'
                                when l.table_used = 'visitors' then 'Cadastrar Visitante'
                                when l.table_used = 'vehicle_visitors' then 'Cadastrar Veículo de Visitante'
                                when l.table_used = 'concierge_vehicles' then 'Lançar Viaturas'
                                when l.table_used = 'vehicles' then 'Cadastrar Viatura'
                                else 'Página inicial'
                        END table_used,
                        DATE_FORMAT(l.updated_at, '%d/%m/%Y - %H:%i:%s') date
            FROM		logs l
            LEFT JOIN	users u ON l.user_id = u.id
            WHERE		table_used 	IN ('concierge_collaborators', 'concierge_vehicles', 
            							'concierge_visitors', 'concierge_visitor_vehicles', 
            							'vehicles','vehicle_visitors', 'visitors', 'users')
            ORDER BY 	l.updated_at DESC 
        ";
        if (isset($pageIndex)) {
            $sqlFiltered = $sql . " LIMIT " . $pageIndex . ", " . $pageIndexMax . " ";
        }

        $obs = collect(DB::select($sqlFiltered))->map(function ($x) {
            return (array) $x;
        })->toArray();

        /* if (empty($obs)) {
            return redirect()->route('concierge.dash');
        }*/

        $i = 0;
        foreach ($obs as $val) {
            $obs[$i]['patent'] = Controller::patent($val['patent']);
            $i++;
        }

        $pageMax = intval(Controller::rowCounter($sql) / $pageIndexMax) + 1;

        return view('concierge/dash', compact('status', 'obs', 'page', 'pageMax', 'visitors_in', 'vehicle_visitors_in', 'vehicles_out'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collaborators($p = NULL)
    {
        $sql = "
			select      id,
                        patent,
                        name,
                        nickname
            from        users
            where       1 = 1 
            and         _status = 'active'
        ";

        $users = collect(DB::select($sql))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $i = 0;
        foreach ($users as $user) {
            $users[$i]['patent'] = Controller::patent($user['patent']);
            $i++;
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
            and         _status = 'active'
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
            and         _status = 'active'
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
        $sql = "
			select      id,
                        patent,
                        name,
                        nickname
            from        users
            where       1 = 1 
            and         _status = 'active'
        ";

        $users = collect(DB::select($sql))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $i = 0;
        foreach ($users as $user) {
            $users[$i]['patent'] = Controller::patent($user['patent']);
            $i++;
        }

        $sql = "
            select      v.id,
                        v.brand,
                        v.model,
                        v.license_plate,
                        sub.type,
                        sub.odometer
            from        vehicles v
            left join   (select     id,
                                    register_type,
                                    vehicle_id,
                                    odometer,
                                    case    when register_type = 1 then 'in'
                                            when register_type = 2 then 'out'
                                    end type
                        from        concierge_vehicles 
                        where		id in (	select 		max(id)
											from		concierge_vehicles
											group by	vehicle_id)
						) sub
            on          v.id = sub.vehicle_id
            where       1 = 1 
            and         _status = 'active'
        ";

        $vehicles_in = collect(DB::select($sql . "and sub.type = 'in' or sub.type is null"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        $vehicles_out = collect(DB::select($sql . "and sub.type = 'out'"))->map(function ($x) {
            return (array) $x;
        })->toArray();

        return view('concierge/vehicles', compact('vehicles_in', 'vehicles_out', 'users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scripts()
    {
        return view('concierge/scripts');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reports()
    {
        return view('concierge/reports');
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
                'date_time' => Controller::strToDateTime($data['date'], $data['time']),
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

        if (
            !empty($data['visitorsInId']) && !empty($data['visitorsOutId']) ||
            !empty($data['vehicleVisitorsInId']) && !empty($data['vehicleVisitorsOutId'])
        ) {

            return redirect()->route('concierge.visitors')->with('status', 'Laçamento inválido.');
        } else if (!empty($data['visitorsInId']) && $data['registerType'] == '2' && empty($data['vehicleVisitorsOutId'])) {

            foreach ($data['visitorsInId'] as $val) {
                $table_id = Concierge_visitor::create([
                    'register_type' => $data['registerType'],
                    'visitor_id' => $val,
                    'date_time' => Controller::strToDateTime($data['date'], $data['time']),
                    '_status' => "active",
                ])->id;
                Controller::registerLog('concierge_visitors', $table_id, 'create');
            }

            if (!empty($data['vehicleVisitorsInId'])) {
                foreach ($data['vehicleVisitorsInId'] as $val) {
                    $table_id = Concierge_visitor_vehicle::create([
                        'register_type' => $data['registerType'],
                        'vehicle_visitor_id' => $val,
                        'date_time' => Controller::strToDateTime($data['date'], $data['time']),
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
                    'date_time' => Controller::strToDateTime($data['date'], $data['time']),
                    '_status' => "active",
                ])->id;
                Controller::registerLog('concierge_visitors', $table_id, 'create');
            }

            if (!empty($data['vehicleVisitorsOutId'])) {
                foreach ($data['vehicleVisitorsOutId'] as $val) {
                    $table_id = Concierge_visitor_vehicle::create([
                        'register_type' => $data['registerType'],
                        'vehicle_visitor_id' => $val,
                        'date_time' => Controller::strToDateTime($data['date'], $data['time']),
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
            'name' => mb_strtoupper($data['name'], 'UTF-8'),
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
            'license_plate' => mb_strtoupper($data['licensePlate'], 'UTF-8'),
            'type' => mb_strtoupper($data['type'], 'UTF-8'),
            'brand' => mb_strtoupper($data['brand'], 'UTF-8'),
            'model' => mb_strtoupper($data['model'], 'UTF-8'),
            '_status' => "active",
        ])->id;
        Controller::registerLog('vehicle_visitors', $table_id, 'create');

        return redirect()->route('concierge.visitors')->with('status', 'Novo veículo de visitante cadastrado.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVehicle(CreateVehicleConciergeRequest $request)
    {
        $data = $request->all();

        $table_id = Vehicle::create([
            'license_plate' => mb_strtoupper($data['licensePlate'], 'UTF-8'),
            'type' => mb_strtoupper($data['type'], 'UTF-8'),
            'brand' => mb_strtoupper($data['brand'], 'UTF-8'),
            'model' => mb_strtoupper($data['model'], 'UTF-8'),
            '_status' => "active",
        ])->id;
        Controller::registerLog('vehicles', $table_id, 'create');

        return redirect()->route('concierge.vehicles')->with('status', 'Nova viatura cadastrada.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVehicles(CreateVehiclesConciergeRequest $request)
    {
        $data = $request->all();

        if (!empty($data['vehiclesInId']) && !empty($data['vehiclesOutId'])) {
            return redirect()->route('concierge.vehicles')->with('status', 'Laçamento inválido.');
        } else if (!empty($data['vehiclesInId']) && $data['registerType'] == '2') {
            $table_id = Concierge_vehicle::create([
                'register_type' => $data['registerType'],
                'vehicle_id' => $data['vehiclesInId'],
                'user_id_boss' => $data['usersId_boss'],
                'user_id_driver' => $data['usersId_driver'],
                'odometer' => str_replace('.', '', $data['odometer']),
                'date_time' => Controller::strToDateTime($data['date'], $data['time']),
                '_status' => "active",
            ])->id;
            Controller::registerLog('concierge_vehicles', $table_id, 'create');
        } else if (!empty($data['vehiclesOutId']) && $data['registerType'] == '1') {
            $table_id = Concierge_vehicle::create([
                'register_type' => $data['registerType'],
                'vehicle_id' => $data['vehiclesOutId'],
                'user_id_boss' => $data['usersId_boss'],
                'user_id_driver' => $data['usersId_driver'],
                'odometer' => str_replace('.', '', $data['odometer']),
                'date_time' => Controller::strToDateTime($data['date'], $data['time']),
                '_status' => "active",
            ])->id;
            Controller::registerLog('concierge_vehicles', $table_id, 'create');
        } else {
            return redirect()->route('concierge.vehicles')->with('status', 'Laçamento inválido.');
        }

        return redirect()->route('concierge.vehicles')->with('status', 'Laçamento de viatura realizado.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function readReports(ReadReportsConciergeRequest $request)
    {
        $data = $request->all();

        if ($data['reportType'] == 'collaboratorsReport') {

            $sql = "
                select      case    when cc.register_type = '1' then 'Entrou'
                                    when cc.register_type = '2' then 'Saiu'
                            end register_type,
                            DATE_FORMAT(cc.date_time, '%d/%m/%Y - %H:%i:%s') date,
                            u.name,
                            u.nickname,
                            u.patent
                from        concierge_collaborators cc
                inner join  users u on u.id = cc.user_id
                where       1 = 1 
                and         cc._status = 'active'
                and         u._status = 'active'
                and         cc.date_time >= '" . Controller::strToDateTime($data['date'], $data['timeStart']) . "'
                and         cc.date_time <= DATE_ADD('" . Controller::strToDateTime($data['date'], $data['timeStart']) . "', INTERVAL 1 DAY)
                order by    cc.date_time
            ";

            $collaboratorsReport = collect(DB::select($sql))->map(function ($x) {
                return (array) $x;
            })->toArray();

            $i = 0;
            foreach ($collaboratorsReport as $val) {
                $collaboratorsReport[$i]['patent'] = Controller::patent($val['patent']);
                $i++;
            }

            return view('concierge/reports/collaboratorsReport', compact('collaboratorsReport'));

        } else if ($data['reportType'] == 'visitorReport') {

            $sql = "
                select      case    when cv.register_type = '1' then 'Entrou'
                                    when cv.register_type = '2' then 'Saiu'
                            end register_type,
                            DATE_FORMAT(cv.date_time, '%d/%m/%Y - %H:%i:%s') date,
                            v.name,
                            v.identity
                from        concierge_visitors cv
                inner join  visitors v on v.id = cv.visitor_id
                where       1 = 1 
                and         cv._status = 'active'
                and         v._status = 'active'
                and         cv.date_time >= '" . Controller::strToDateTime($data['date'], $data['timeStart']) . "'
                and         cv.date_time <= DATE_ADD('" . Controller::strToDateTime($data['date'], $data['timeStart']) . "', INTERVAL 1 DAY)
                order by    cv.date_time
            ";

            $visitorsReport = collect(DB::select($sql))->map(function ($x) {
                return (array) $x;
            })->toArray();

            $sql = "
                select      case    when cv.register_type = '1' then 'Entrou'
                                    when cv.register_type = '2' then 'Saiu'
                            end register_type,
                            DATE_FORMAT(cv.date_time, '%d/%m/%Y - %H:%i:%s') date,
                            vv.brand,
                            vv.model,
                            vv.license_plate
                from        concierge_visitor_vehicles cv
                inner join  vehicle_visitors vv on vv.id = cv.vehicle_visitor_id
                where       1 = 1 
                and         cv._status = 'active'
                and         vv._status = 'active'
                and         cv.date_time >= '" . Controller::strToDateTime($data['date'], $data['timeStart']) . "'
                and         cv.date_time <= DATE_ADD('" . Controller::strToDateTime($data['date'], $data['timeStart']) . "', INTERVAL 1 DAY)
                order by    cv.date_time
            ";

            $vehicleVisitorsReport = collect(DB::select($sql))->map(function ($x) {
                return (array) $x;
            })->toArray();

            return view('concierge/reports/visitorsReport', compact('visitorsReport', 'vehicleVisitorsReport'));

        } else if ($data['reportType'] == 'vehicleReport') {

            $sql = "
                select      case    when cv.register_type = '1' then 'Entrou'
                                    when cv.register_type = '2' then 'Saiu'
                            end register_type,
                            DATE_FORMAT(cv.date_time, '%d/%m/%Y - %H:%i:%s') date,
                            cv.odometer,
                            v.brand,
                            v.model,
                            v.license_plate,
                            u_1.name boss_name,
                            u_1.nickname boss_nickname,
                            u_1.patent boss_patent,
                            u_2.name driver_name,
                            u_2.nickname driver_nickname,
                            u_2.patent driver_patent
                from        concierge_vehicles cv
                inner join  vehicles v on v.id = cv.vehicle_id
                inner join  users u_1 on u_1.id = cv.user_id_boss
                inner join  users u_2 on u_2.id = cv.user_id_driver
                where       1 = 1 
                and         cv._status = 'active'
                and         v._status = 'active'
                and         u_1._status = 'active'
                and         u_2._status = 'active'
                and         cv.date_time >= '" . Controller::strToDateTime($data['date'], $data['timeStart']) . "'
                and         cv.date_time <= DATE_ADD('" . Controller::strToDateTime($data['date'], $data['timeStart']) . "', INTERVAL 1 DAY)
                order by    cv.date_time
            ";

            $vehiclesReport = collect(DB::select($sql))->map(function ($x) {
                return (array) $x;
            })->toArray();

            $i = 0;
            foreach ($vehiclesReport as $val) {
                $vehiclesReport[$i]['boss_patent'] = Controller::patent($val['boss_patent']);
                $vehiclesReport[$i]['driver_patent'] = Controller::patent($val['driver_patent']);
                $vehiclesReport[$i]['odometer'] = Controller::valueToStr($val['odometer'], false, 0);
                $i++;
            }

            return view('concierge/reports/vehiclesReport', compact('vehiclesReport'));

        } else {

            return redirect()->route('concierge.reports')->with('status', 'Dados inválidos.');

        }
    }
}
