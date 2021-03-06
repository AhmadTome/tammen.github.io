<?php

namespace App\Http\Controllers;

use App\enter_city;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class addCity extends Controller
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
        $user=new enter_city;
        $user->city_num=Input::get('IdDamNum');
        $user->city_name=Input::get('damName');
        $user->city_hebrow_name=Input::get('city_hebrow_name');
        if($user->save()){
            session()->flash("notif","تم ادخال المدينة بنجاح ");
        }else{
            session()->flash("notif","لم يتم ادخال المدينة لحدوث خطأ في الادخال");
        }
        return redirect()->to('addCity');

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
        $hebrowname=$request->hebrowname;


        enter_city::where('city_num', '=', $lastnum)
            ->where('city_name','=',$lastname)
            ->update(array('city_num' =>$newnum , 'city_name'=>$newname,'city_hebrow_name'=>$hebrowname ));



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
        enter_city::where('city_num','=',$num)->where('city_name','=',$name)->delete();
        return response()->json();
    }
}
