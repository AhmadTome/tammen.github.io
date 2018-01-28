<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('garage');
});

Route::get('/garage', function () {
    $garage=\App\enter_garage::all();
    return view('garage')->with('garage',$garage);
});

Route::get('/crossOff', function () {


    return view('crossOff');
});

Route::get('/addEstimater', function () {
$estimater=\App\Estimater::all();

    return view('addEstimater')->with('estimater',$estimater);
});

Route::get('/addDamage', function () {
$damage=\App\Damage::all();

    return view('addDamage')->with('damage',$damage);
});

Route::get('/addMaintinance', function () {


    return view('addMaintinance');
});

Route::get('/addInsuranceCompany', function () {
$ins=\App\enter_insurence_company::all();


    return view('addInsuranceCompany')->with('ins',$ins);
});

Route::get('/addTextStructure', function () {


    return view('addTextStructure');
});

Route::get('/addEstimatevalue', function () {


    return view('addEstimatevalue');
});

Route::get('/addAccedentSide', function () {


    return view('addAccedentSide');
});

Route::get('/dropStatment', function () {


    return view('StatementDropCar');
});

Route::get('/addpersonalInformation', function () {


    return view('MainInput.personalInformation');
});

Route::get('/addCarInformation', function () {


    return view('MainInput.CarInformation');
});

Route::get('/addMechParts', function () {

    $machpart=\App\enter_mechanic_part::all();
    return view('addMechParts')->with('machpart',$machpart);
});

Route::get('/addBodyParts', function () {


    return view('addBodyParts');
});

Route::get('/dropvalue', function () {


    return view('MainInput.dropvalue');
});

Route::get('/carCost', function () {


    return view('MainInput.carCost');
});

Route::get('/carGuess', function () {


    return view('MainInput.carGuess');
});

Route::get('/addCity', function () {


    return view('addCity');
});

Route::get('/addCertification', function () {

    $cert=\App\add_certificate::all();
    return view('addCertification')->with('cert',$cert);
});

Route::get('/BankDisclosure', function () {
    $carInfo = \App\getCarInfo::all();
    $Id =\App\enter_personalInfo::all();
    $estimatevalue = \App\enter_estimit_value::all();

    return view('MainInput.BankDisclosure')->with('carInfo',$carInfo)->with('Id',$Id)->with('estimatevalue',$estimatevalue);
});

Route::get('/CertificationInput', function () {
    $carInfo = \App\getCarInfo::all();
    $estimater =\App\Estimater::all();
    $certificate=\App\add_certificate::all();
    return view('MainInput.CertificationInput')->with('carInfo',$carInfo)->with('estimater',$estimater)->with('certificate',$certificate);
});


Route::get('/findEstimaterinfo','addCertification@estimaterinfo');

Route::get('/carGuess','addguesscar@index');

Route::get('/carCost','carcosts@index');
Route::post('calculateCarCost','carcosts@calculate');
Route::get('/findCarInfo','cartransaction@findCarInfo');
Route::get('/addcarTransaction','cartransaction@index');
Route::get('/dropvalue','dropvalueofcar@index');

Route::get('/findCarInfoforDropValue','dropvalueofcar@findCarInfoforDropValue');
Route::get('/findCarInfoforGuess','addguesscar@findCarInfoforGesscar');


Route::get('/findCostDropValue','dropvalueofcar@findCostDropValue');
Route::get('/findCostGuesscar','addguesscar@findCostforGuessCar');
Route::get('/findDropCostGuesscar','addguesscar@findDropPercantige');


Route::post('storDropValue','dropvalueofcar@store');

//garage transaction
Route::post('store','addgarage@store');
Route::get('/deletegarage','addgarage@destroy');
Route::get('/updategarage','addgarage@update');



Route::post('storeCrossOff','addcrossoff@store');

//Estimater transaction
Route::post('storeEstimater','addEstimater@store');
Route::get('/deleteEstimater','addEstimater@destroy');
Route::get('/updateEstimater','addEstimater@update');

// Damage transaction
Route::post('storeDamage','addDamage@store');
Route::get('/deletedamage','addDamage@destroy');
Route::get('/updatedamage','addDamage@update');




Route::post('storeMaintinance','addMaintinance@store');

// insyrance company transaction
Route::post('storeInsurancecompany','addInsuranceCompany@store');
Route::get('/deleteInsuranceCompany','addInsuranceCompany@destroy');
Route::get('/updateInsuranceCompany','addInsuranceCompany@update');



Route::post('storeTextStructure','addTextStructure@store');
Route::post('storeEstimatevalue','addEstimatevalue@store');
Route::post('storeAccedentSide','addAccedentSide@store');
Route::post('storepersonalInformation','addpersonalInformation@store');
Route::post('storeCarInformation','addcarInformation@store');
Route::post('storeMaintinancework','addmaintinancework@store');
Route::post('storeMechanicwork','addMechanicwork@store');
Route::post('storeBodywork','addBodywork@store');


Route::post('storeMechanicParts','addMechanicPart@store');
Route::get('/deletemechpart','addMechanicPart@destroy');
Route::get('/updatemechpart','addMechanicPart@update');





Route::post('storeBodyParts','addBodyPart@store');
Route::post('saveimage','addImages@store');
Route::post('storeDropStatment','addDropStatment@store');
Route::post('storeCity','addCity@store');

//certification constant input transaction
Route::post('storeCertificat','enter_certificate@store');
Route::get('/deletecert','enter_certificate@destroy');
Route::get('/updatecert','enter_certificate@update');




Route::post('storeEstimateCar','addguesscar@store');
Route::post('storBankinfo','addbankinfo@store');

Route::post('storeCertification','addCertification@store');


//Route::get('/addInsuranceCompany','addInsuranceCompany@findCarInfoforGesscar');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => '/report'],function(){
    
    Route::get('/car','ReportController@car');

    Route::get('/insurance','ReportController@insurance');

    Route::get('/insurance/benifiter','ReportController@insuranceBenifiter');

    Route::get('/car/parts','ReportController@carParts');

    Route::get('/car/bank','ReportController@bank');
    
    //تقرير بيانات مركبة
    Route::get('/carInfo/{fileId}/{l?}','ReportController@carInfo');
    
    //تقرير حساب فايل
    Route::get('/fileAccount/{fileId}/{l?}','ReportController@fileAccount');

    //تقرير حساب فايل / ملف شخصي
    Route::get('/personalFileAccount/{fileId}/{l?}','ReportController@personalFileAccount');

    //تقرير شطب مركبة
    Route::get('/carDestroy/{fileId}/{l?}','ReportController@carDestroy');

    //تقرير ثمن المركبة
    Route::get('/carPrice/{fileId}/{l?}','ReportController@carPrice');

    //تقرير ثمن المركبة مع حطام
    Route::get('/carPriceWithRek/{fileId}/{l?}','ReportController@carPriceWithRek');

    //دائرة الترخيص
    Route::get('/licence/{fileId}/{l?}','ReportController@licence');

    //تقرير أضرار أولي
    Route::get('/initialDamageReport/{fileId}/{l?}','ReportController@initialDamage');

    //كشف زيارات المركبة
    Route::get('/carVisit/{fileId}/{l?}','ReportController@carVisit');

    //حساب شركة التامين
    Route::get('/insCompanyAcc','ReportController@insCompanyAcc');

    //حساب شركة التامين للمستفيد
    Route::get('/insCompanyUser','ReportController@insCompanyUser');

    //تقرير قطع غيار هيكل
    Route::get('/bodyPartChange/{l?}','ReportController@bodyPartChange');

    //تقرير قطع غيار ميكانيك
    Route::get('/mechPartChange/{l?}','ReportController@mechPartChange');

    //أعمال مركبة
    Route::get('/carWork/{l?}','ReportController@carWork');

    //شهادة
    Route::get('/degree/{fileId}/{l?}','ReportController@degree');

    //شهادة بنك
    Route::get('/bankStmnt/{l?}','ReportController@bankStmnt');
});