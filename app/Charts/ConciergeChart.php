<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Http\Controllers\Controller;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConciergeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $days = array();
        for ($i = 7; $i >= 0; $i--) {
            array_push($days, substr(Controller::addDateTime(Controller::cur_date(), "-" . $i . "days", "d/m/Y"), 0, -5));
        }

        $sql = "";
        for ($i = 7; $i >= 0; $i--) {
            $sql .= "
                    SELECT	COUNT(*) 
                    FROM	%TABLE% 
                    WHERE date(date_time) = date_sub(CURDATE(), interval " . $i . " DAY) ";

            if ($i != 0) {
                $sql .= " UNION ALL ";
            }
        }

        $collaborators = Controller::array_cut(collect(DB::select(str_replace('%TABLE%', 'concierge_collaborators', $sql)))->map(function ($x) {
            return (array) $x;
        })->toArray());

        $visitors = Controller::array_cut(collect(DB::select(str_replace('%TABLE%', 'concierge_visitors', $sql)))->map(function ($x) {
            return (array) $x;
        })->toArray());

        $vehicles = Controller::array_cut(collect(DB::select(str_replace('%TABLE%', 'concierge_vehicles', $sql)))->map(function ($x) {
            return (array) $x;
        })->toArray());

        return Chartisan::build()
            ->labels($days)
            ->dataset('Militares', $collaborators)
            ->dataset('Visitantes', $visitors)
            ->dataset('Viaturas', $vehicles);
    }
}