<div class="row border-2 padding">
        <table class="table table-bordered black-header">
            <thead>
                <tr>
                    <th>
                        {{_t('car_num',$l)}}
                    </th>
                    <th>
                        {{_t('file_num',$l)}}
                    </th>
                    <th>
                        {{_t('car_use',$l)}}
                    </th>
                    <th>
                        {{_t('model_type',$l)}}
                        
                    </th>
                    <th>
                        {{_t('production_year',$l)}}
                    </th>
                    <th>
                        {{_t('body_num',$l)}}
                    </th>
                    <th>
                        {{_t('production_date',$l)}}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{$car['ve_num']}}
                    </td>
                    <td>
                        {{$car['file_num']}}
                    </td>
                    <td>
                        {{$car['ve_used']}}
                    </td>
                    <td>
                        {{$car['ve_version']}}
                    </td>
                    <td>
                        {{$car['ve_produce_year']}}
                    </td>
                    <td>
                        {{$car['ve_body_num']}}
                    </td>
                    <td id="discount">
                        <input id="breakdown" type="text" value="">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>