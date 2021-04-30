<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Dorp;
use App\Models\Link;
use App\Models\Imagemanager;

class GuestController extends Controller {

    public function home() {
        return view('guest.home', [ 'dorpen' => Dorp::all(), 'image' => Imagemanager::all() ] );
    }

    public function browse() {
        return view('guest.browse', [ 'dorpen' =>  Dorp::all(),
            'evenementen' => Evenement::orderBy('start_date')->get(),
            'image' => Imagemanager::all()] );
    }

    public function show($dorp) {
        $dorp = Dorp::where('naam', '=', $dorp)->first();
        if (empty($dorp)) {
            return view('errors.404');
        }

        $ogImage = Imagemanager::where('dorp_id', '=', $dorp->id)->first();
        $Evenement = Evenement::where('dorp_id', '=', $dorp->id)->orderBy('start_date')->get();

        return view('guest.dorp', [ 'dorp' =>  $dorp,
            'dorpen' => Dorp::all(),
            'evenementen' => $Evenement,
            'image' => Imagemanager::all(),
            'ogImage' => $ogImage] );
    }

    public function showEvenement($dorp, $naam) {
        $dorp = Dorp::where('naam', '=', $dorp)->first();
        $naam = urldecode($naam);
        $evenement = Evenement::where('naam', '=', $naam)->first();
        if (empty($dorp) || empty($evenement)) {
            return view('errors.404');
        }
        $link = Link::where('evenement_id', '=', $evenement->id)->get();
        try {
            $image = Imagemanager::where('evenement_id', '=', $evenement->id)->first()->img;
        } catch (\Exception $e) {
            $image = 'static/default-thumbnail.jpg';
        }
        return view('guest.evenement', [ 'evenement' => $evenement,
            'linken' => $link,
            'image' => $image,
            'dorp' => $dorp,
            'evenementen' =>  Evenement::all(),
            'dorpen' =>  Dorp::all()]);
    }

    public function about() {
      return view('guest.about');
    }
}
