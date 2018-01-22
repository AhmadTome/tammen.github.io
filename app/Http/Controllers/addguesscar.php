<?php

namespace App\Http\Controllers;

use App\Body_vehicle_work;
use App\Damage;
use App\enter_city;
use App\enter_garage;
use App\enter_insurence_company;
use App\enter_personalInfo;
use App\Estimater;
use App\maintenance_vehicle_work;
use App\mechanic_vehicle_work;
use Illuminate\Http\Request;
use App\getCarInfo;
use App\carcost;

class addguesscar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carInfo=getCarInfo::all();
        $insuranceCompany=enter_insurence_company::all();
        $cities=enter_city::all();
        $Id = enter_personalInfo::all();
        $DamageType=Damage::all();
        $Estimater=Estimater::all();
        $Garage=enter_garage::all();


        return view('MainInput.carGuess')->with('carInfo',$carInfo)->with('insuranceCompany',$insuranceCompany)
            ->with('cities',$cities)->with('Id',$Id)->with('DamageType',$DamageType)->with('Estimater',$Estimater)
            ->with('Garage',$Garage);
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


    public function findCarInfoforGesscar(Request $request){

        $data=getCarInfo::select('ve_num','ve_used','ve_version','ve_produce_year','file_num','ve_body_num')->where('file_num',$request->id)->take(1500)->get();
        $data2=carcost::select('finalcost')->where('filrnumberhidden',$request->id)->take(100)->get();

        return response()->json(array('data'=>$data , 'data2'=>$data2));//then sent this data to ajax success
    }


    public function findCostforGuessCar(Request $request){
        $data =0.0;
        $mecha_work=mechanic_vehicle_work::select('mech_price')->where('filenumber',$request->id)->take(1500)->get();
        $maintinance_work=maintenance_vehicle_work::select('mawo_cost')->where('file_number',$request->id)->take(1500)->get();
        $body_work=Body_vehicle_work::select('partPrice')->where('file_number',$request->id)->take(1500)->get();

        foreach ($mecha_work as $value){
            $data = $data+($value->mech_price);
        }
        foreach ($maintinance_work as $value){
            $data = $data+($value->mawo_cost);
        }

        foreach ($body_work as $value){
            $data = $data+($value->partPrice);
        }


        return json_encode($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
