<?php

namespace App\Http\Controllers;

use App\Estimater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class addEstimater extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new Estimater;

        $user->nes_num=Input::get('IdNum');
        $user->nes_name=Input::get('name');
        $user->hebrow_estimater=Input::get('hebrow_name');
        $user->nes_authorization_num=Input::get('authNumber');
        $user->nes_signature=Input::get('signature');
        if($user->save()){
            session()->flash("notif","تم ادخال المخمن بنجاح ");
        }else{
            session()->flash("notif","لم يتم ادخال المخمن لحدوث خطأ في الادخال");

        }
        return redirect()->to('addEstimater');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $lastnum=$request->lastnum;
        $lastname=$request->lastname;

        $newnum=$request->num;
        $newname=$request->name;
        $newestimaterid=$request->estimaterid;
        $newsign=$request->sign;


        Estimater::where('nes_authorization_num', '=', $lastnum)
            ->where('nes_name','=',$lastname)
            ->update(array('nes_num' =>$newnum , 'nes_name'=>$newname ,'nes_authorization_num'=>$newestimaterid , 'nes_signature'=>$newsign,'hebrow_estimater'=>$request->hebrow ));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $num = $request->num;
        $name = $request->name;
        Estimater::where('nes_authorization_num','=',$num)->where('nes_name','=',$name)->delete();
        return response()->json();
    }
}
