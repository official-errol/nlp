<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Dataset;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $des = Dataset::where('is_deleted', 0)->get();
        return view('admin.index')
                    ->with('des', $des);
    }

    public function saveDataset(Request $request)
    {   

        $save = Dataset::create([
            'link'      => $request->link ?? "",
            'data'      => $request->data ?? "",
            'category'  => $request->category ?? ""

        ]);

        if($save ){
            return back()->with('save-success', 'Data added successfully.');
        }else{
            return back()->with('save-error', 'Something went wrong.');
        }
    }
}
