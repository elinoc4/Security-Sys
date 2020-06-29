<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\cars;
use Session;
use UxWeb\SweetAlert\SweetAlert;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carst = cars::paginate(10);
        return view('cars',compact('carst'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
      
       
        $plate = $request->input('plate_no');
        $status = $request->input('status');
        $tally_no = $request->input('tally_no');
        $day = now()->format('Y-m-d');
        
        $carc = cars::where('plate_no',$plate)
                    ->where('status', $status)
                    ->where('tally_no', $tally_no)
                    ->where('date', $day)
                    ->first();
        if ($carc) 
        {
            alert()->warning('You have done this process before.', 'Stop!!!');
                return redirect('cars')->with('message','You have done this process before');
            }elseif (!$carc){
        
            
            $validated = $request->validated();
            
            cars::create($validated);
            $carst = cars::paginate(10);
            
           alert()->info('Done', 'CheckedIn');
          
            Session::flash('message', 'This is a message!'); 
            return view('cars',compact('carst'));
        }
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(cars $cars)
    {
        //
        return view('search_car');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, cars $cars)
    {
        //
        $tally = $request->input('search');
        $search = cars::where('tally_no',$tally)->get();
        return view('search_car','search');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(cars $cars)
    {
        //
    }
}
