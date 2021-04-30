<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Dorp;
use App\Models\Imagemanager;

class DorpController extends Controller {
    public function __construct() {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.dorp.dcrud', ['dorpen' => Dorp::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.dorp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $dorp = new Dorp;
		$dorp->naam = $request->naam;
        $dorp->save();
        if($request->hasFile('avatar')) {
    		$avatar = $request->file('avatar');
    		$filename = $request->naam . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(500, 860)->save( public_path('/img/' . $filename ) );

            $image = new Imagemanager;
            $image->img = $filename;
            $image->dorp_id = $dorp->id;
            $image->save();
    	}
        return view('admin.dorp.create', [ 'message' => 'Dorp added to the database' ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('admin.dorp.edit', [ 'dorp' => $dorp = Dorp::find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $dorp = Dorp::find($id);
        $dorp->naam = $request->naam;
        $dorp->save();

        if($request->hasFile('avatar')) {
            try {
                $image = Imagemanager::where('dorp_id', '=', $id)->first();
                Storage::delete('/img/' . $image->img);
            } catch (\ErrorException $e) {
                $image = new Imagemanager;
            }
            $avatar = $request->file('avatar');
            $filename = $request->naam . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(500, 860)->save( public_path('/img/' . $filename ));
            $image->img = $filename;
            $image->dorp_id = $dorp->id;
            $image->save();
        }
        return view('admin.dorp.edit', [ 'dorp' => Dorp::find($id),
            'message' => 'Dorp is successfully edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            Storage::delete('/img/' . Imagemanager::where('dorp_id', '=', $id)->first()->img);
            Imagemanager::where('dorp_id', '=', $id)->first()->delete();
        } catch (\ErrorException $e) {
        }
        Dorp::find($id)->delete();
        return redirect('admin/dorp/');
    }
}
