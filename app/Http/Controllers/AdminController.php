<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $questions = Question::all();
        return view('admin.home',compact('questions'));
    }


    public function create()
    {
        return view('admin.create');
    }
    public function add(Request $request)
    {
        $request->validate([
            'enonce' => 'required',
            'reps' => 'required',
            'type' => 'required',
            'type' => 'required',
        ]);

        $product = Question::create($request->all());
        return redirect('/admin/home')
        ->with('success', 'Question ajouter avec succée');
    }



}
