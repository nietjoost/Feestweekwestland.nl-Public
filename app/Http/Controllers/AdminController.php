<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Dorp;
use App\Models\Link;
//use Analytics;
//use Spatie\Analytics\Period;
//use Carbon\Carbon;
use App\Models\Imagemanager;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    /*
    public function dashboard() {
        $browser = Analytics::fetchTopBrowsers(Period::create(Carbon::now()->subYear(), Carbon::now()),10);
        $memory = round(memory_get_usage()/pow(1024,($i=floor(log(memory_get_usage(),1024)))),2).' ';
        $visitors = 0;
        $visitorsPageviews = 0;
        foreach (Analytics::fetchVisitorsAndPageViews(Period::days(600)) as $a) {
            $visitors += $a['visitors'];
            $visitorsPageviews += $a['pageViews'];
        }
        $dorpen = Dorp::all();
        $evenementen = Evenement::all();
        $linken = Link::all();
        return view('admin.dashboard', [ 'evenementen' => Evenement::all() ,
            'browser' => $browser,
            'memory' => $memory,
            'visitors' => $visitors,
            'views' => $visitorsPageviews,
            'dorpen' => $dorpen,
            'evenementen' => $evenementen,
            'linken' => $linken
        ]);
    } */
    public function dashboard() {
      $dorpen = Dorp::all();
      $evenementen = Evenement::all();
      $linken = Link::all();
        return view('admin.dashboardnone',[
            'dorpen' => $dorpen,
            'evenementen' => $evenementen,
            'linken' => $linken
        ]);
    }

    public function settings() {
        return view('admin.settings');
    }

    public function clearimage() {
        $counter = 0;
        $imgarray = array();
        foreach(glob(public_path('/img/') .'*') as $filename){
            array_push($imgarray,  basename($filename));
        }
        $images = Imagemanager::all();
        foreach($imgarray as $i) {
            if($i != 'static') {
                if(!Imagemanager::where('img', '=', $i)->exists()) {
                    Storage::delete('/img/' . $i);
                    $counter++;
                }
            }
        }

        return view('admin.settings', [ 'message' => "Images successfully optimized! $counter removed!" ]);
    }
}
