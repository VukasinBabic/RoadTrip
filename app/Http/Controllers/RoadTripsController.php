<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Roadtrip;

class RoadTripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('user.roadtrip.index')->with('roadtrips', Roadtrip::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('user.roadtrip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           
            'name' => 'required|max:255',
            
            'file' => 'required|mimes:xml'
            
        ],
            
            [
                'file.mimes' => 'The file must be a file of type: gpx.'
                
            ]);
        
        $file = $request->file;
        
        $file_new_name = time().$file->getClientOriginalName();
        
        $file->move('uploads/gpx_files', $file_new_name);
        
        
        $road_trip = RoadTrip::create([
            
           'name' => $request->name,
            
           'file' => 'uploads/gpx_files/'.$file_new_name
            
        ]);
        
        return redirect()->back()->with('message', 'Successfully Created');
        
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $path = Roadtrip::find($id)->file;
        
        return view('user.roadtrip.map', compact('path'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
