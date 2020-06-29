<?php

namespace App\Http\Controllers;

use App\Gkeeper;
use App\cars;
use Illuminate\Support\Facades\DB;
use file;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use UxWeb\SweetAlert\SweetAlert;
class GkeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $date =now()->format('Y-m-d');
        $Gs = Gkeeper::where('type','staff')->distinct()->count('idno');
        $Cs = Gkeeper::where('type','contract staff')->distinct()->count('idno');
        $It = Gkeeper::where('type','it')->distinct()->count('idno');
        $cars = cars::where('date',$date)->orderBy('date','desc')->take(5)->get();
        $staff = Gkeeper::all()->take(5); 
        $count = cars::where('date',$date)->distinct()->count('plate_no');
        return view('dashboard',compact('cars','count','Gs','staff','It','Cs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Staff Search
        return view('search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload = $request->file('upload');
        // dd($upload);
        
        //data upload using fast excel
        $users = (new FastExcel)->import($upload, function ($line) {
            $user = Gkeeper::where('name', '=', $line['name'])->first();
            if ($user === null) {
            // user doesn't exist
            return Gkeeper::create([
                'name' => $line['name'],
                'idno' => $line['idno'],
                'type' => $line['type'],
                'exp_date' => $line['exp_date'],
                'dept' => $line['dept']

            ]);
            SweetAlert::message('Your profile is up to date', 'Wonderful!');
            }else {
                return redirect('index')->with('message',$line['name'].' already exist');
            }
           
        });
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gkeeper  $gkeeper
     * @return \Illuminate\Http\Response
     */
    public function show(Gkeeper $gkeepe)
    {    
        $today = new Carbon;
        $expi = $today->today()->format('Y-m-d');
        // // Display all Staffs
       // $Staff = DB::table('gkeepers')->select('*')->all();
        //$Staff = Gkeeper::where('exp_date','!=','')->get();
        $Staff = Gkeeper::paginate(10);

        // if ($expi > $Staff->exp_date) {
        //     $status = 'expired';
        // }
        // else {
        //     $status = 'Active';
        // }
            return view('show',compact('Staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gkeeper  $gkeeper
     * @return \Illuminate\Http\Response
     */
    public function edit(Gkeeper $gkeeper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gkeeper  $gkeeper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gkeeper $gkeeper)
    {

            $staff = $gkeeper;
            
            return view('result',compact('staff'));
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gkeeper  $gkeeper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gkeeper $gkeeper)
    {
        //
    }
    
    
    public function search(Request $request, Gkeeper $gkeeper){
       $msg = '';
        
         $search = $request->input('search');
        $staff = Gkeeper::where('name',$search)
                                ->orwhere('idno', $search)
                                ->first();
        if ($staff) {
            
            //display user
            $today = new Carbon;
            $exp = $today->today()->format('Y-m-d');
            // dd($exp);
            if ($exp > $staff['exp_date']) {
                $status = 'expired';
            }
            else {
                $status = 'Active';
            }
            // echo '
            // <div class="card-body">
            //   <h6 class="card-category">'.$staff_search->type.'</h6>
            //   <h4 class="card-title">'.$staff_search->name.'</h4>
            //   <h4 class="card-title">'.$staff_search->idno.'</h4>
            //   <p class="card-description">
            //     '.$staff_search->dept.'              </p>
            //   <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
            // </div>';
            return view('result',compact('staff','status'));
            
        
        }else {
            $msg .= 'user doesn\'t exist ';
            alert()->info($msg,'Result');
            return redirect('/')->with('message',$msg);
        }
    }
}
