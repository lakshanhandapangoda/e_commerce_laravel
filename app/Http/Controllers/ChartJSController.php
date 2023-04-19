<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use DB;
use Illuminate\Support\Collection;

class ChartJSController extends Controller
{
        /**
     * Write code on Method
     *
     * @return response()
     */
    public function generatePieChartData()
    {
        $users = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('2022'))
                    ->groupBy(DB::raw("Month(created_at)"),DB::raw("created_at"))
                    ->get();
        $data = $users->pluck('count', 'month_name');
        $total = $data->sum();
        $labels = $data->keys();
        $percentageData = $data->map(function ($count) use ($total) {
            return round(($count / $total) * 100, 2);
        });
       
        return compact('labels', 'percentageData');
    }

    public function chart()
{
    $chartData = $this->generatePieChartData();
    return view('chart', $chartData);
}

    
    
}

