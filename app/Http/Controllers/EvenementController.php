<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Dorp;
use App\Models\Imagemanager;

class EvenementController extends Controller {
    public function __construct() {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.evenement.ecrud', ['dorpen' => Dorp::all() ,'evenementen' => Evenement::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.evenement.create', [ 'dorpen' => Dorp::pluck('naam', 'id') ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $evenement = new Evenement;
	    $evenement->naam = $request->naam;
	    $evenement->dorp_id = $request->dorp_id;
        $evenement->start_date = $request->start_date;
        $evenement->end_date = $request->end_date;
        $evenement->opmerking = $request->opmerking;
        $evenement->save();

        if($request->hasFile('avatar')) {
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(750,450)->save( public_path('/img/' . $filename ) );
            $image = new Imagemanager;
            $image->img = $filename;
            $image->evenement_id = $evenement->id;
            $image->save();
        }
        return view('admin.evenement.create', [ 'dorpen' => Dorp::pluck('naam', 'id'),
                'message' => 'Evenement added to the database']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $evenement = Evenement::find($id);
        return view('admin.evenement.edit',  [ 'evenement' => $evenement,
            'dorpen' => Dorp::pluck('naam', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $evenement = Evenement::find($id);
        $evenement->naam = $request->naam;
		$evenement->dorp_id = $request->dorp_id;
        $evenement->start_date = $request->start_date;
        $evenement->end_date = $request->end_date;
        $evenement->opmerking = $request->opmerking;
		$evenement->save();

        if($request->hasFile('avatar')) {
            try {
                $image = Imagemanager::where('evenement_id', '=', $id)->first();
                Storage::delete('/img/' . $image->img);
            } catch (\ErrorException $e) {
                $image = new Imagemanager;
            }
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(500,300)->save( public_path('/img/' . $filename ) );
            $image->img = $filename;
            $image->evenement_id = $evenement->id;
            $image->save();
        }
        return view('admin.evenement.edit',  [ 'evenement' => Evenement::find($id),
            'message' => 'Evenement successfully edited',
            'dorpen' => Dorp::pluck('naam', 'id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            Storage::delete('/img/' . Imagemanager::where('evenement_id', '=', $id)->first()->img);
            Imagemanager::where('evenement_id', '=', $id)->first()->delete();
        } catch (\ErrorException $e) {
        }
        Evenement::find($id)->delete();
        return redirect('admin/evn/');
    }
}
