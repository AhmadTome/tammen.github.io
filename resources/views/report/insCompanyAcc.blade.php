@extends('report.reportLayout')

@section('title','كشف حساب شركة التامين')

@section('content')

    <div class="text-center">
        <h3>
            <u>
                <b>
                    {{_t('ins_company_acc_title',$l)}}
                </b>
            </u>
        </h3>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <table class="table table-bordered">
                <tr>
                    <th width="30%">
                        {{_t('ins_company',$l)}}
                    </th>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-xs-4">
            <table class="table table-bordered">
                <tr>
                    <th width="50%">
                        {{_t('ins_company_num',$l)}}
                    </th>
                    <td>
                    
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>
                    {{_t('car_num',$l)}}
                </th>
                <th>
                    {{_t('file_num',$l)}}
                </th>
                <th>
                    {{_t('claim_num',$l)}}
                </th>
                <th>
                    {{_t('det',$l)}}
                </th>
                <th>
                    {{_t('det',$l)}}
                </th>
                <th>
                    {{_t('init_damage_detect',$l)}}
                </th>
                <th>
                    {{_t('travel',$l)}}
                </th>
                <th>
                    {{_t('picture',$l)}}
                </th>
                <th>
                    {{_t('disk_money',$l)}}
                </th>
                <th>
                    {{_t('surv_pay',$l)}}
                </th>
                <th>
                    {{_t('total',$l)}}
                </th>
                <th>
                    {{_t('reg_date',$l)}}
                </th>
            </tr>
            <tr>
                {{_td(12)}}
            </tr>
            <tr>
                <td style="visibility:hidden;">
                </td>
                <td style="visibility:hidden;">
                </td>
                <td style="visibility:hidden;">
                </td>
                <td style="visibility:hidden;">
                </td>
                <td style="visibility:hidden;">
                </td>
                <td>
                    {{_t('total_sum',$l)}}
                </td>
                {{_td(5)}}
            </tr>
        </table>
    </div>

@endsection