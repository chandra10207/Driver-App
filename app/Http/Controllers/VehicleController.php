<?php
namespace App\Http\Controllers;

use App\Models\AgiLog;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class VehicleController extends Controller
{
    public function index(){

        $vehicles = Vehicle::all();

        return view('vehicles.index',[
            'title' => 'Active Vehicle List',
            'vehicles' => Vehicle::all()->where('deleted_at', null),
        ]);

    }

    public function logCount(Vehicle $vehicle){
        ini_set('memory_limit', '2048M');
        
        $vehicle_agi_log = DB::table('agi_log')
        ->where('vehicle_id', $vehicle['id'])
        ->select(
            DB::raw('count(local_time) as count'),
            DB::raw('YEAR(local_time) year, MONTH(local_time) month')
            )
        ->groupby('year','month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

        return view('vehicles.log_count',[
            'title' => 'Log Count for '.$vehicle['name'],
            'vehicle_name' => $vehicle['name'],
            'vehicle_id' => $vehicle['id'],
            'vehicle_agi_logs' => $vehicle_agi_log
        ]);
    }

    public function lastInfo(Vehicle $vehicle){

        $vehicle_agi_log_recent = DB::table('agi_log')
        ->where('vehicle_id', $vehicle['id'])
        ->latest('local_time')->first();

        $location = '';

        if(!empty($vehicle_agi_log_recent->lat) && !empty($vehicle_agi_log_recent->lng))
        {
            $openstreetMapAPI = 'https://nominatim.openstreetmap.org/reverse?lat='. $vehicle_agi_log_recent->lat .'&lon='. $vehicle_agi_log_recent->lng .'&zoom=10&format=json';
            $response = Http::get($openstreetMapAPI);
            if($response->ok()){
                $response = Http::get($openstreetMapAPI)->json();
                $location = $response['display_name'];
            } 
        }

        return view('vehicles.last_info',[
            'title' => 'Last Info for '.$vehicle['name'],
            'vehicle_name' => $vehicle['name'],
            'vehicle_id' => $vehicle['id'],
            'vehicle_agi_log' => $vehicle_agi_log_recent,
            'location' => $location
        ]);

    }
}
