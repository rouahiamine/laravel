<?php

namespace App\Http\Controllers;

use App\Models\Question;
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
    public function index(Request $request)
    {

        $questions = Question::inRandomOrder()->limit(3)->get();


        if($request->isMethod('get')){

            return view('home',compact('questions'));
        }
        if($request->isMethod('post')){

            $score = 0;

            //dump($request->all());
            //dd($request->radio3);
            //dd($questions);

            foreach($questions as $ques){
                if($ques->type == 0){
                    // Choix simple
                    $nameInput = "radio".$ques->id;
                    if($request->$nameInput == $ques->vrai){
                        $score++;
                    }
                }else{
                    // Choix Multiple
                    $TabVrai = explode(";",$ques->vrai);
                    count($TabVrai);

                    foreach($TabVrai as $repVrai){

                        $nameCheck = "check".$repVrai;

                        if(isset($request->$nameCheck)){
                            if($request->$nameCheck == $repVrai){
                                $score++;
                            }
                        }
                    }

                }
            }


            return redirect()->back()
            ->with('success', "Score  : $score.");

        }



    }




}
