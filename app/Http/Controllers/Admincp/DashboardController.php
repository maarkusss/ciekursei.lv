<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use App\Models\Visitors\Visitors;

class DashboardController extends Controller
{
    /**
     * Show the admincp dashboard page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admincp.dashboard')->with([
            'data' => $this->getStatistics(),
            'chart_data' => $this->getChartData(),
        ]);
    }

    public function api()
    {
        return view('admincp.api');
    }

    public function getChartData()
    {
        for ($i = strtotime(date('Y-m-d', strtotime('-7days'))); $i <= strtotime(date('Y-m-d')); $i = $i + 86400) {
            $chart['visitors'][date('Y-m-d', $i)] = Visitors::whereDate('created_at', date('Y-m-d', $i))->count();
        }

        return $chart;
    }

    public function getStatistics()
    {
        $array['visitors']['today'] = Visitors::whereDate('created_at', now())->count();
        $array['visitors']['yesterday'] = Visitors::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->count();

        if ($array['visitors']['yesterday'] == 0) {
            $array['visitors']['percentage'] = number_format(($array['visitors']['today'] - $array['visitors']['yesterday']) * 100, 2);
        } else {
            $array['visitors']['percentage'] = number_format(($array['visitors']['today'] - $array['visitors']['yesterday']) / $array['visitors']['yesterday'] * 100, 2);
        }

        if ($array['visitors']['today'] < $array['visitors']['yesterday']) {
            $array['visitors']['color'] = 'text-red-500';
        } elseif ($array['visitors']['today'] == $array['visitors']['yesterday']) {
            $array['visitors']['color'] = 'text-gray-500';
        } else {
            $array['visitors']['color'] = 'text-green-500';
        }

        return $array;
    }
}
