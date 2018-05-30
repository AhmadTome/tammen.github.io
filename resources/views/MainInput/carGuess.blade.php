<html>
<head>
    <title>تخمين المركبة</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/ico" href="{{ asset('img/photo2.png') }}">
    <link href="{{ asset('css/AdminCss/SuperadminStyles.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
    <link href="/select2-bootstrap-theme/select2-bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div class="container-fluid">
    <!-- Background pic -->
    <div class="BackImageSuperAd" ></div>
    <!-- End of Background pic -->

    <!--
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-right" >
                <a href="" class="btn btn-danger exit" title="Exit"><b>Exit</b></a>
            </div>
        </div>
    -->
    <div class="row headrDiv">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 " >
            @include('logodiv')

        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 " >
        @include('mainpar')
    </div>

    <div class="col-sm-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="BodyDiv col-lg-12 col-md-12 col-xs-12 col-sm-12 " >

        @if(session()->has('notif'))
            <div class="row">
                <div class="alert alert-success" dir="rtl">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{ session('notif') }}</strong>
                </div>
            </div>
        @endif

        @yield('content')
    </div>

    <!--Body-->
    <div class="BodyDiv col-lg-12 col-md-12 col-xs-12 col-sm-12 " >

    <div class="panel panel-default">
        <div class="panel-heading text-center PanelHeadingCss">ادخال تخمين مركبة</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal" method="post" action="storeEstimateCar">
                {{ csrf_field() }}

                <div class="form-group row col-lg-12 col-md-12 col-xs-12 col-sm-12 " dir="rtl">
                <div class="col-sm-2 pull-right text-left">
                    <select class="form-group-lg carInfo_select" id="carInfo_select">
                        <option selected disabled="">اختار رقم المركبة</option>
                        @foreach($carInfo as $car)
                            <option value="{{$car->file_num}}">{{$car->ve_num." | ".$car->file_num." | ".$car->ve_used." | ".$car->ve_version." | ".$car->ve_produce_year}}</option>

                        @endforeach
                    </select>
                </div>
                </div>

                <div class="form-group row col-lg-12 col-md-12 col-xs-12 col-sm-12 " dir="rtl">


                    <div class="col-sm-2 pull-right text-left">
                        <input type="text" class="form-control PanelBodyCssInput " name="filenumber" id="filenumber" placeholder="رقم الملف" readonly>
                    </div>
                    <div class="col-sm-2 pull-right text-left">
                        <input type="text" class="form-control PanelBodyCssInput " name="carused" id="carused" placeholder="استعمال المركبة" readonly>
                    </div>
                    <div class="col-sm-2 pull-right text-left">
                        <input type="text" class="form-control PanelBodyCssInput " name="carversion" id="carversion" placeholder="طراز المركبة" readonly>
                    </div>
                    <div class="col-sm-2 pull-right text-left">
                        <input type="text" class="form-control PanelBodyCssInput " name="producedyear" id="producedyear" placeholder="سنة الانتاج" readonly>
                    </div>
                    <div class="col-sm-2 pull-right text-left">
                        <input type="text" class="form-control PanelBodyCssInput " name="bodynumber" id="bodynumber" placeholder="رقم الشاصي" readonly >
                    </div>

                </div>

                <div  style="max-width: 1000px ;margin-bottom: -15px">
                    <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">   لحضرة : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="ToPerson" name="ToPerson" type="text"  placeholder="ادخل الاسم" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">   رقم الادعاء : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="ClaimNumber" name="ClaimNumber" type="text"  placeholder="ادخل رقم الادعاء" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">   مكان الفحص : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="checkplace" name="checkplace" type="text"  placeholder="ادخل مكان الفحص" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left" >شركة التأمين :</label>
                <div class="col-sm-4 pull-right text-left">
                    <select class="form-control " id="insuranceCompany_select">
                        <option selected disabled="">اختار شركة التأمين</option>
                        @foreach($insuranceCompany as $car)
                            <option value="{{$car->ins_name}}">{{$car->ins_num." | ".$car->ins_name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 pull-right text-left">
                    <input type="text" class="form-control PanelBodyCssInput " id="insuranceCompany" name="insuranceCompany" placeholder="" readonly required>
                </div>


            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left" > المحافظة :</label>
                <div class="col-sm-4 pull-right text-left">
                    <select class="form-control " id="City_select">
                        <option selected disabled="">اختار المدينة</option>
                        @foreach($cities as $item)
                            <option value="{{$item->city_name}}">{{$item->city_num." | ".$item->city_name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 pull-right text-left">
                    <input type="text" class="form-control PanelBodyCssInput " id="City" name="City" placeholder="" readonly required>
                </div>


            </div>

                    <div class="form-group row" dir="rtl">
                        <label class="control-label col-sm-2 pull-right text-left" > رقم الهوية :</label>
                        <div class="col-sm-4 pull-right text-left">
                            <select class="form-control " id="person_select">
                                <option selected disabled="">اختار رقم الهوية</option>
                                @foreach($Id as $item)
                                    <option value="{{$item->name}}">{{$item->id." | ".$item->name." | ".$item->address}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4 pull-right text-left">
                            <input type="text" class="form-control PanelBodyCssInput " id="personName" name="personName" placeholder="الاسم" readonly required>
                        </div>


                    </div>

                    <div class="form-group row" dir="rtl">
                        <label class="control-label col-sm-2 pull-right text-left">    اسم المؤمن : </label>
                        <div class="col-sm-8 pull-right">
                            <input class="form-control" id="InsurancePersonal" name="InsurancePersonal" type="text"  placeholder="ادخل  اسم المؤمن" required/>
                        </div>
                    </div>

                    <div class="form-group row" dir="rtl">
                        <label class="control-label col-sm-2 pull-right text-left">  ملاحظات : </label>

                        <div class="col-sm-8 pull-right">
                            <textArea  class="form-control PanelBodyCssInput" rows="5" id="personNote" name="personNote" placeholder="ادخل ملاحظات" required></textArea>
                        </div>
                    </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">    كشف اضرار : </label>
                <div class="col-sm-8 pull-right">

               <textarea class="form-control" rows="5" cols="80" placeholder="ادخل  كشف الاضرار" required id="coverDamage" name="coverDamage" ></textarea>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">  تاريخ التسجيل  : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="dateRegister" name="dateRegister" type="date" style="text-align: right" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">  تاريخ الحادث  : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="accidentDate" name="accidentDate" type="date" style="text-align: right" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">  تاريخ الفحص  : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="checkDate" name="checkDate" type="date" style="text-align: right" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">   رقم بوليصة التأمين : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="InsuranceNumber2" name="InsuranceNumber2" type="text"  placeholder="ادخل رقم بوليصة التأمين" readonly/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left" >  نوع الضرر :</label>
                <div class="col-sm-4 pull-right text-left">
                    <select class="form-control " id="damaeType_select">
                        <option selected disabled="">اختار نوع الضرر</option>
                        @foreach($DamageType as $item)
                            <option value="{{$item->dam_name}}">{{$item->dam_num." | ".$item->dam_name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 pull-right text-left">
                    <input type="text" class="form-control PanelBodyCssInput " id="damageType" name="damageType" placeholder="" readonly required>
                </div>


            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left" >  رقم المخمن :</label>
                <div class="col-sm-4 pull-right text-left">
                    <select class="form-control " id="GuessNumber_select">
                        <option selected disabled="">اختار اسم المخمن</option>
                        @foreach($Estimater as $item)
                            <option value="{{$item->nes_name}}">{{$item->nes_num." | ".$item->nes_name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 pull-right text-left">
                    <input type="text" class="form-control PanelBodyCssInput " id="GuessNumber" name="GuessNumber" placeholder="" readonly required>
                </div>


            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left" >  رقم الكراج :</label>
                <div class="col-sm-4 pull-right text-left">
                    <select class="form-control " id="garageNumber_select">
                        <option selected disabled="">اختار اسم الكراج</option>
                        @foreach($Garage as $item)
                            <option value="{{$item->gar_name}}">{{$item->gar_num." | ".$item->gar_name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 pull-right text-left">
                    <input type="text" class="form-control PanelBodyCssInput " id="garageNumber" name="garageNumber" placeholder="" readonly required>
                </div>


            </div>


            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">سعر المركبة   : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="carPrice" name="carPrice" type="number"  placeholder=" سعر المركبة" readonly required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">     سفريات : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="visit" name="visit" type="number"  placeholder="ادخل سفريات" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">تصوير  : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="photograper" name="photograper" type="number"  placeholder="ادخل تصوير  " required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">مصاريف مكتب : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="officeCost" name="officeCost" type="number"  placeholder="ادخل مصاريف المكتب" required/>
                </div>
            </div>


                    <div class="form-group row" dir="rtl">
                        <label class="control-label col-sm-2 pull-right text-left" >قيمة مبلغ الصيانة: </label>
                        <div class="col-sm-8 pull-right">
                            <input class="form-control" type="number" id="cost" name="cost" placeholder=" قيمة الأضرار المباشرة" readonly required />
                        </div>


                    </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">   مبلغ نسبة الهبوط : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="dropPercantigePrice" name="dropPercantigePrice" type="number"  placeholder=" مبلغ نسبة الهبوط" readonly required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">    نسبة الهبوط : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="dropPercantige" name="dropPercantige" placeholder="نسبة البوط" type="text" readonly required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left"> النسبة المئوية للمخمن : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="Guesspersantige" name="Guesspersantige" type="number"  placeholder="ادخل  النسبة المئوية للمخمن %" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left"> نسبة الضررالفني % : </label>
                <div class="col-sm-8 pull-right">

                    <input class="form-control" id="TechnicalDamage" name="TechnicalDamage" type="text"  placeholder=" نسبة الضرر الفني" readonly required/>

                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left"> ثمن الحطام : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="DebrisPrice" name="DebrisPrice" type="number"  placeholder="ادخل ثمن الحطام" required/>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left"> اجور زيارة : </label>
                <div class="col-sm-8 pull-right">
                    <input class="form-control" id="visitcost" name="visitcost" type="number"  placeholder="ادخل مبلغ الاجور الزائدة" required/>
                </div>
            </div>


            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">  وصف الضرر : </label>

                <div class="col-sm-8 pull-right">
                    <textArea  class="form-control PanelBodyCssInput" rows="5" id="DamegeDescription" name="DamegeDescription" placeholder="ادخل وصف الضرر" required></textArea>
                </div>
            </div>


            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">  ملاحظات : </label>

                <div class="col-sm-8 pull-right">
                    <textArea  class="form-control PanelBodyCssInput" rows="5" id="noteGuess" name="noteGuess" placeholder="ادخل ملاحظات" required></textArea>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">  ملاحظات تخمين المركبة: </label>

                <div class="col-sm-8 pull-right">
                    <textArea class="form-control PanelBodyCssInput" rows="5" id="noteGuessCar" name="noteGuessCar" placeholder=" ادخل ملاحظات تخمين المركبة" required></textArea>
                </div>
            </div>

            <div class="form-group row" dir="rtl">
                <label class="control-label col-sm-2 pull-right text-left">  المرفقات : </label>

                <div class="col-sm-8 pull-right">
                    <textArea class="form-control PanelBodyCssInput" rows="5" id="AttachmentsGuess" name="AttachmentsGuess" placeholder="ادخل المرفقات" required></textArea>
                </div>
            </div>


            <div class="form-group row" dir="rtl" >
                <label class="control-label col-sm-2 pull-right text-left">  شطب المركبة لحضرة :</label>
                <div class="col-sm-4 pull-right text-left">
                    <input type="crossOffNamer" class="form-control PanelBodyCssInput" value="مدير سلطة الترخيص المحترم" id="crossOffNamer" name="crossOffNamer" required>

                </div>
                <div class="col-sm-4 pull-right text-left">
                    <textArea type="crossOffNote" class="form-control PanelBodyCssInput" rows="5" id="crossOffNote" name="crossOffNote" required></textArea>
                </div>



            </div>
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-center pull-left" >
                            <input type="submit" name="submit" id="submit" class="btn btn-success " value="ادخال" />
                        </div>
                    </div>

            </div>
            </form>
        </div>



    </div>

    </div>




    <!-- end Body -->
    <!--footer-->
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 " >
        @include('footer');

    </div>
    <!--/footer-->



</div>

</body>
</html>
<style>
    .select2-selection {

        background-color: #fff;
        border: 0;
        border-radius: 0;
        color: #555555;
        font-size: 14px;

        min-height: 30px;
        text-align: right;
    }



    .select2-selection__arrow {
        margin: 1px;
    }
</style>
<script>
    $(document).ready(function () {

        $("#carInfo_select,#insuranceCompany_select,#City_select,#person_select,#damaeType_select,#GuessNumber_select,#garageNumber_select").select2({
            dropdownAutoWidth : true,
            theme: "classic"
        });

        $(document).on("change",".carInfo_select",function () {
            var file_nom=$(this).val();


            $.ajax({

                type:'get',
                url:'{!!URL::to('findCarInfoforGuess')!!}',
                data:{'id':file_nom},
                success:function(data) {
//console.log('success');

//console.log(data[0].ve_used);

                    //console.log(data);
                    $('#filenumber').val(data.data[0].file_num);
                    $('#carused').val(data.data[0].ve_used);
                    $('#carversion').val(data.data[0].ve_version);
                    $('#producedyear').val(data.data[0].ve_produce_year);
                    $('#bodynumber').val(data.data[0].ve_body_num);
                    $('#InsuranceNumber2').val(data.data[0].ve_insurence_num);

                    if(data.data2.length !=0) {
                        $('#carPrice').val(data.data2[0].finalcost);
                    }else{
                        $('#carPrice').val(0);
                    }

                }

            });

            $.ajax({

                type:'get',
                url:'{!!URL::to('findCostGuesscar')!!}',
                data:{'id':file_nom},
                success:function(data) {
                   $('#cost').val(data);

                    var carprice=$('#carPrice').val();
                    if(carprice !=0)
                    $('#TechnicalDamage').val(((data/carprice)*100).toFixed(2));
                    else
                    $('#TechnicalDamage').val("0");

                }




            });

            $.ajax({

                type:'get',
                url:'{!!URL::to('findDropCostGuesscar')!!}',
                data:{'id':file_nom},
                success:function(data) {

                    console.log(data);
                    $('#dropPercantige').val(data);

                    var dropPrice=((data/100) * $('#carPrice').val());
                    $('#dropPercantigePrice').val(dropPrice);
                }

            });


        });

        $(document).on("change","#insuranceCompany_select",function () {
           var data = $(this).val();
           $('#insuranceCompany').val(data);
        });

        $(document).on("change","#City_select",function () {
            var data = $(this).val();
            $('#City').val(data);
        });
        $(document).on("change","#person_select",function () {
            var data = $(this).val();
            $('#personName').val(data);
        });
        $(document).on("change","#damaeType_select",function () {
            var data = $(this).val();
            $('#damageType').val(data);
        });

        $(document).on("change","#GuessNumber_select",function () {
            var data = $(this).val();
            $('#GuessNumber').val(data);
        });

        $(document).on("change","#garageNumber_select",function () {
            var data = $(this).val();
            $('#garageNumber').val(data);
        });



    });


</script>