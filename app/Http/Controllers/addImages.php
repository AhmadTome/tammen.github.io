<?php

namespace App\Http\Controllers;

use App\add_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class addImages extends Controller
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
$imagcount=1;
            if($request->hasFile('images')){
                foreach($request->file('images') as $file) {
                    $ext=$file->getClientOriginalExtension();
                    $date=date('Ymd_His');
                    $imagename =time().'_'.$date.'_'.($imagcount++).'.'.$ext ;
                    $file->move(public_path().'\uploads', $imagename);

                    $user=new add_image;
                    $user->im_vehicl_num=Input::get('carnumberhidden');
                    $user->file_number=Input::get('filrnumberhidden');
                    $user->im_photo_date=Input::get('pictureDate');
                    $user->path=public_path().'/uploads'.$imagename;
                    $user->save();
                }
            }



        else{
            return 'No image selected';
        }



return redirect()->to('addcarTransaction');


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
