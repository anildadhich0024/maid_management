<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"  />
    <title>{{$emp_data->full_name}} Profile</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            font-family: 'Roboto', sans-serif;
        }

        div {
            display: block;
        }

        table,
        td,
        th {
            border: 1px solid rgb(218, 218, 218);
            padding: 8px;
            vertical-align: top;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            text-align: left;
        }


        @page {
            size: A4;

        }

        .water {
            position: absolute;
            z-index: -1;
            width: 100%;
            text-align: center;
            display: none;
        }

        .water img {
            max-width: 50%
        }
        i{
            font-size: 12px;
        }
        .display-none{
            display: none !important;
        }
        @media print {

            * {
                font-size: 12px;
            }
 .display-none{
     display: block !important;
 }
            div {
                page-break-after: avoid;
            }

            .water {
                display: block;
            }
            .a-others{
                margin-top: 80px !important;
            }
            .a-others-2{
                margin-top: 64px !important;
                font-size: 20px;
            }
            .lac{
                margin-top:50px !important;
                font-size: 20px;
            }
            .lac-2{
                margin-top:65px !important;
                font-size: 20px;
            }
            .lac-3{
                margin-top:165px !important;
                font-size: 20px;
            }
            table,
        td,
        th {
            font-size: 11px;
        }
        button{
            display:none;
        }
        }
        @page {
  @bottom-left {
    content: 'License No: 03C4432';
  }
}
    </style>
</head>

<body>

    <div style="position: relative; z-index: 100; overflow: hidden">
        <div class="water">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
            <img src="{{ asset('public/images/logo-watermark.png') }}" alt="">
        </div>
        <div style="display: block; padding: 5px 15px; max-width: 1200px; margin: 0 auto;">
            <div style="display: block; text-align: center;">
                <img src="{{asset('images/logo-pdf.jpg')}}" style="max-width: 100%;" alt="">
            </div>
            <div style="display: block; padding: 15px 0px;">
                <h3>Ref No.: MMS001</h3>
            </div>
            <div style="display: block; padding: 5px 0px;text-align: center;">
                <h1 style="font-weight: bolder;">BIO-DATA OF FOREIGN DOMESTIC WORKER (FDW) </h1>
                <p>Please ensure that you run through the information within the biodata as it is an important document
                    to help
                    you select a suitable FDW</p>

            </div>
            <div style="display: block; padding: 15px 0px; max-width: 1200px; margin: 0 auto;">
                <h3>(A) PROFILE OF FDW</h3>
            </div>
            <div style="display: inline-block; vertical-align: top; width: 55%;">
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Name:</b>
                        {{$emp_data->full_name}}</span>
                </div>
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Date of
                            birth:</b>{{date('d M Y', strtotime($emp_data->emp_dob))}}</span>
                </div>
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Age:</b>{{$emp_data->emp_age}}</span>
                </div>
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Place of
                            birth:</b>{{$emp_data->birth_place}}</span>
                </div>
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Height &
                            weight:</b>{{$emp_data->emp_height}} CM & {{$emp_data->emp_weight}} KG</span>
                </div>
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Nationality:</b>{{$emp_data->country_data->misc_title}}
                    </span>
                </div>
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Residential
                            address
                            in home country:</b> {{$emp_data->home_address}}</span>
                </div>
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; padding-top: 20px;"></span>
                </div>
                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Name of port /
                            airport to be repatriated to:</b> {{$emp_data->airport_name}}</span>
                </div>

                <div style="display: block; margin-bottom: 8px;">

                    <span style="display:block;border-bottom: 1px solid #ccc; "><b
                            style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Contact number
                            in
                            home country:</b> {{$emp_data->mobile_number}} </span>
                </div>

            </div>
            <div style="display: inline-block; vertical-align: top; width: 43%; text-align: center; ">
                <h3>FDW Code: {{$emp_data->emp_code}}</h3><br>
                <img src="{{asset('storage/employee_photo')}}/{{$emp_data->emp_photo}}" style="max-width: 55%;" alt="">
                <h3>Expected Salary: SGD{{$emp_data->expected_salary}} </h3>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Religion:</b>
                    {{$emp_data->religion_title}}
                </span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Education level:</b>
                    {{$emp_data->education_data->misc_title}}
                </span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Number of
                        siblings:</b> {{$emp_data->sibling_no}} </span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Age of siblings:</b>
                    {{$emp_data->sibling_age}}
                </span>
            </div>

            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Marital status:</b>
                    {{array_search($emp_data->marital_status,config('constant.MARITAL_STATUS'))}}
                </span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Number of
                        children:</b> {{$emp_data->child_count}}</span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Age(s) of children
                        (if any):</b> {{$emp_data->child_age}}</span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;"><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Ranking of work
                        referencces(1 being the most preferred):</b></span>
                <div style="display: block; margin-top:5px;">
                    @php
                    $work_pref = isset($record_data) ? explode(',',$record_data->work_prefrence) : '';
                    @endphp
                    @foreach($work as $key => $rec)
                    <span>[@if(!empty($record_data) && in_array($rec->misc_id,$work_pref)) <i class="fa fa-check"
                            aria-hidden="true"></i> @else &nbsp; @endif] {{$rec->misc_title}}</span>
                    @endforeach
                </div>

            </div>

        </div>

        <div class="a-margin" style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <h3>(A2) Medical History/Dietary Restrictions</h3>
        </div>
        <div style="display: block; padding: 5px 15px; max-width: 1200px; margin: 0 auto;">
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Allergies(if
                        any):</b>{{$emp_data->allergies_detail}}
                </span>
            </div>
            <div style="display: block; margin-bottom: 8px;">
                <span style="display:block;"><b>Past and existing illnesses (including chronic ailments and illnesses
                        requiring medication):</b> </span>

                <div style="display: inline-block; vertical-align: top; width: 48%;">
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;"></span><span
                            style="text-align:center;border: 0px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">Yes</span><span
                            style="border: 0px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">No</span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Mental illness</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_1 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_1 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Epilepsy</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_6 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_6 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Asthma</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_2 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_2 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Diabetes</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_7 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_7 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Hypertension</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_3 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_3 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                </div>
                <div style="display: inline-block; vertical-align: top; width: 48%;">
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;"></span><span
                            style="text-align:center;border: 0px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">Yes</span><span
                            style="border: 0px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">No</span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Tuberculosis</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_8 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_8 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Heart disease</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_4 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_4 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Malaria</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_9 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_9 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">
                        <span style="width: 50%; display: inline-block;">Operations</span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_5 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                        <span
                            style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                            @if($emp_data->ill_no_5 != 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                        </span>
                    </div>
                    <div style="display: block; margin: 10px 0px;">

                        <span style="display:block;border-bottom: 1px solid #ccc; "><b
                                style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Other</b>{{$emp_data->existing_illnesses_other}}</span>
                    </div>
                </div>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Physical
                        disablities:</b> {{$emp_data->disabilities_detail}}</span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Dietary
                        restrictions:</b> {{$emp_data->dietary_detail}}</span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><b>Food handling preferences: </b>
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->food_type_1 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif</span> No pork
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle; margin-left: 50px;">
                        @if($emp_data->food_type_2 == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif</span>No Beef
                    <span
                        style="text-align:center; border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle; margin-left: 50px;">
                        @if(!empty($emp_data->food_type_3)) <i class="fa fa-check" aria-hidden="true"></i> @endif</span>
                    Other <span
                        style="display:inline-block;border-bottom: 1px solid #ccc; min-width: 150px;">{{$emp_data->food_type_3}}</span>
                </span>
            </div>
        </div>
        <div class="lac display-none" style="display: block; text-align: right; margin-top: 30px">
             <b>License No: 03C4432</b>
        </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <h3>(A3) Others</h3>
        </div>
        <div style="display: block; padding: 5px 15px; max-width: 1200px; margin: 0 auto;">
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;"><b style="background-color: #fff;position:relative;">Preference for rest
                        day:
                        <span
                            style="display:inline-block;border-bottom: 1px solid #ccc; text-align:center; min-width: 150px;">{{$emp_data->rest_day}}</span>rest
                        day(s) per month.</b></span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block;border-bottom: 1px solid #ccc; "><b
                        style="background-color: #fff;position:relative; padding: 7px 7px 7px 0px;">Any other
                        remarks:</b>{{$emp_data->any_other_remark}}</span>
            </div>
        </div>
        <div class="lac"  style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <h2>(B) SKILLS OF FDW</h2>
        </div>
        <div class="lac" style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <h3>(B1) Method of Evaluation of Skills</h3>
        </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <p style="margin-bottom: 30px;">Please indicate the method(s) used to evalute the FDW's skill(can tick more
                than
                one):</p>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->fwd_declaration == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif</span> Based on FDW's declaration, no
                    evalutions/observation by Singapore EA or overseas training centre/EA </span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><span
                        style="text-align:center; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;"></span>
                    Interviewed by SIngapore EA </span>
            </div>
            <div style="display: block; margin-bottom: 8px; padding-left: 30px;">

                <span style="display:block; ">
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->tel_interview_ea == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                    </span>
                    Interviewed via telephone/teleconference</span>
            </div>
            <div style="display: block; margin-bottom: 8px; padding-left: 30px;">

                <span style="display:block; ">
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->video_interview_ea == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif
                    </span>
                    Interviewed via videoconference</span>
            </div>
            <div style="display: block; margin-bottom: 8px; padding-left: 30px;">

                <span style="display:block; ">
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->person_interview_ea == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif
                    </span>
                    Interviewed in person</span>
            </div>
            <div style="display: block; margin-bottom: 8px; padding-left: 30px;">

                <span style="display:block; ">
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->observation_interview_ea == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif
                    </span>
                    Interviewed in person and also made observation of FDW in the areas of work listed in table</span>
            </div>
            <div class="lac" style="display: block; margin-bottom: 8px;">
                <table>
                    <tr>
                        <th>S/No</th>
                        <th>Areas of Work</th>
                        <th>Willingness <br>Yes/No</th>
                        <th>Experience<br>Yes/No if yes, state the no. of years</th>
                        <th>Assessment/Observation<br>Please state qualitative observations of FDW and/ or rate the FDW
                            (Indicate N.A. of no evalution was done) Poor......Excellent..N.A, 1 2 3 4 5 N.A</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Care of infants/children<br>Please Specify age range: <span
                                style="border-bottom: 1px solid #ccc; display: block; padding: 5px 0px; min-width: 220px;">{{$emp_data->infants_age_sin}}</span>
                        </td>
                        <td align="center">{{$emp_data->willing_sin_1}}</td>
                        <td align="center">{{$emp_data->exp_sin_1}}</td>
                        <td align="cneter">{{$emp_data->rat_sin_1}}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Case of elderly </td>
                        <td align="center">{{$emp_data->willing_sin_2}}</td>
                        <td align="center">{{$emp_data->exp_sin_2}}</td>
                        <td align="cneter">{{$emp_data->rat_sin_2}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Case of Disabled</td>
                        <td align="center">{{$emp_data->willing_sin_3}}</td>
                        <td align="center">{{$emp_data->exp_sin_3}}</td>
                        <td align="cneter">{{$emp_data->rat_sin_3}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>General housework </td>
                        <td align="center">{{$emp_data->willing_sin_4}}</td>
                        <td align="center">{{$emp_data->exp_sin_4}}</td>
                        <td align="cneter">{{$emp_data->rat_sin_4}}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Cooking <br>
                            Please specify cuisines:
                            <span
                                style="border-bottom: 1px solid #ccc; display: block; padding: 5px 0px; min-width: 220px;">{{$emp_data->cooking_sin}}</span>
                        </td>
                        <td align="center">{{$emp_data->willing_sin_5}}</td>
                        <td align="center">{{$emp_data->exp_sin_5}}</td>
                        <td align="cneter">{{$emp_data->rat_sin_5}}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Language abilities (spoken)<br>
                            Please specify:
                            <span
                                style="border-bottom: 1px solid #ccc; display: block; padding: 5px 0px; min-width: 220px;">{{$emp_data->language_sin}}</span>
                        </td>
                        <td align="center"></td>
                        <td align="center">{{$emp_data->exp_sin_6}}</td>
                        <td align="cneter">{{$emp_data->rat_sin_6}}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Other skill, if any <br>
                            Please Specify:
                            <span
                                style="border-bottom: 1px solid #ccc; display: block; padding: 5px 0px; min-width: 220px;">{{$emp_data->other_skill_sin}}</span>
                        </td>
                        <td align="center">{{$emp_data->willing_sin_7}}</td>
                        <td align="center">{{$emp_data->exp_sin_7}}</td>
                        <td align="cneter">{{$emp_data->rat_sin_7}}</td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="lac-3 display-none"  style="display: block; text-align: right; margin-top: 30px">
            <b>License No: 03C4432</b>
       </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">

            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;"><i
                            class="fa fa-check" aria-hidden="true"></i></span> Interviewed by overseas training centre /
                    EA:<span
                        style="display:inline-block;border-bottom: 1px solid #ccc; min-width: 150px; text-align:center;">{{$emp_data->ea_center}}</span>(Please
                    state name of foreigntraining centre / EA:) State if the third party is certified (e.g. ISO9001) or
                    audited periodically by the EA:<span
                        style="display:inline-block;border-bottom: 1px solid #ccc; min-width: 150px; text-align:center;">{{$emp_data->ea_center}}</span></span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><span
                        style="text-align:center; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;"></span>
                    Interviewed by SIngapore EA </span>
            </div>
            <div style="display: block; margin-bottom: 8px; padding-left: 30px;">

                <span style="display:block; ">
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->tel_interview_tr == 'Yes') <i class="fa fa-check" aria-hidden="true"></i> @endif
                    </span>
                    Interviewed via telephone/teleconference</span>
            </div>
            <div style="display: block; margin-bottom: 8px; padding-left: 30px;">

                <span style="display:block; ">
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->video_interview_tr == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif
                    </span>
                    Interviewed via videoconference</span>
            </div>
            <div style="display: block; margin-bottom: 8px; padding-left: 30px;">

                <span style="display:block; ">
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->person_interview_tr == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif
                    </span>
                    Interviewed in person</span>
            </div>
            <div style="display: block; margin-bottom: 8px; padding-left: 30px;">

                <span style="display:block; ">
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->observation_interview_tr == 'Yes') <i class="fa fa-check" aria-hidden="true"></i>
                        @endif
                    </span>
                    Interviewed in person and also made observation of FDW in the areas of work listed in table</span>
            </div>
            <div style="display: block; margin-bottom: 8px;">
                <table>
                    <tr>
                        <th>S/No</th>
                        <th>Areas of Work</th>
                        <th>Willingness <br>Yes/No</th>
                        <th>Experience<br>Yes/No if yes, state the no. of years</th>
                        <th>Assessment/Observation<br>Please state qualitative observations of FDW and/ or rate the FDW
                            (Indicate N.A. of no evalution was done) Poor......Excellent..N.A, 1 2 3 4 5 N.A</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Care of infants/children<br>Please Specify age range: <span
                                style="border-bottom: 1px solid #ccc; display: block; padding: 5px 0px; min-width: 220px;">{{$emp_data->infants_age_ea}}</span>
                        </td>
                        <td align="center">{{$emp_data->willing_ea_1}}</td>
                        <td align="center">{{$emp_data->exp_ea_1}}</td>
                        <td align="cneter">{{$emp_data->rat_ea_1}}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Case of elderly </td>
                        <td align="center">{{$emp_data->willing_ea_2}}</td>
                        <td align="center">{{$emp_data->exp_ea_2}}</td>
                        <td align="cneter">{{$emp_data->rat_ea_2}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Case of Disabled</td>
                        <td align="center">{{$emp_data->willing_ea_3}}</td>
                        <td align="center">{{$emp_data->exp_ea_3}}</td>
                        <td align="cneter">{{$emp_data->rat_ea_3}}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>General housework </td>
                        <td align="center">{{$emp_data->willing_ea_4}}</td>
                        <td align="center">{{$emp_data->exp_ea_4}}</td>
                        <td align="cneter">{{$emp_data->rat_ea_4}}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Cooking <br>
                            Please specify cuisines:
                            <span
                                style="border-bottom: 1px solid #ccc; display: block; padding: 5px 0px; min-width: 220px;">{{$emp_data->cooking_ea}}</span>
                        </td>
                        <td align="center">{{$emp_data->willing_ea_5}}</td>
                        <td align="center">{{$emp_data->exp_ea_5}}</td>
                        <td align="cneter">{{$emp_data->rat_ea_5}}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Language abilities (spoken)<br>
                            Please specify:
                            <span
                                style="border-bottom: 1px solid #ccc; display: block; padding: 5px 0px; min-width: 220px;">{{$emp_data->language_ea}}</span>
                        </td>
                        <td align="center"></td>
                        <td align="center">{{$emp_data->exp_ea_6}}</td>
                        <td align="cneter">{{$emp_data->rat_ea_6}}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Other skill, if any <br>
                            Please Specify:
                            <span
                                style="border-bottom: 1px solid #ccc; display: block; padding: 5px 0px; min-width: 220px;">{{$emp_data->other_skill_ea}}</span>
                        </td>
                        <td align="center">{{$emp_data->willing_ea_7}}</td>
                        <td align="center">{{$emp_data->exp_ea_7}}</td>
                        <td align="cneter">{{$emp_data->rat_ea_7}}</td>
                    </tr>
                </table>
            </div>

        </div>
        <div style="display: block; padding: 0px 15px 10px 15px; max-width: 1200px; margin: 0 auto;">
            <h2>(C) EMPLOYMENT HISTORY OF THE FDM</h2>
        </div>
        <div style="display: block; padding: 0px 15px 10px 15px; max-width: 1200px; margin: 0 auto;">
            <h3>(C1) Employment History Overseas</h3>

        </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <table>
                <tr>
                    <th style="width:268px">Date
                        <span style="width: 199px;
                  display: block;
                  text-align: Center;
                  border-top: 1px solid #ccc;
                  padding-top: 9px;
                  padding-right: 86px;
                  margin: 10px -85px 0px -8px;">
                            <span
                                style="padding: 10px; border-right: 1px solid #ccc;width: 100px;margin: -8px 0px;display: inline-block;">From
                            </span>
                            <span style="padding: 10px 20px; ">To</span>
                        </span>
                    </th>
                    <th>Country(including FDW's home country)</th>
                    <th>Employer</th>
                    <th>Work Duties</th>
                    <th>Remarks</th>
                </tr>
                <tr>
                    <td>
                        <span
                            style="padding: 10px; border-right: 1px solid #ccc;width: 100px;margin: -8px 0px;display: inline-block;">{{!empty($emp_data->start_date_1)
                            ? date('d-m-Y', strtotime($emp_data->start_date_1)) : ''}} </span>
                        <span style="padding: 10px 20px; ">{{!empty($emp_data->start_date_1) ? date('d-m-Y',
                            strtotime($emp_data->end_date_1)) : ''}}</span>
                    </td>
                    <td>{{$emp_data->country_dtl_1}}</td>
                    <td>{{$emp_data->emp_dtl_1}}</td>
                    <td>{{$emp_data->work_dtl_1}}</td>
                    <td>{{$emp_data->remark_dtl_1}}</td>
                </tr>
                <tr>
                    <td>
                        <span
                            style="padding: 10px; border-right: 1px solid #ccc;width: 100px;margin: -8px 0px;display: inline-block;">{{!empty($emp_data->start_date_2)
                            ? date('d-m-Y', strtotime($emp_data->start_date_2)) : ''}} </span>
                        <span style="padding: 10px 20px; ">{{!empty($emp_data->start_date_2) ? date('d-m-Y',
                            strtotime($emp_data->end_date_2)) : ''}}</span>
                    </td>
                    <td>{{$emp_data->country_dtl_2}}</td>
                    <td>{{$emp_data->emp_dtl_2}}</td>
                    <td>{{$emp_data->work_dtl_2}}</td>
                    <td>{{$emp_data->remark_dtl_2}}</td>
                </tr>
                <tr>
                    <td>
                        <span
                            style="padding: 10px; border-right: 1px solid #ccc;width: 100px;margin: -8px 0px;display: inline-block;">{{!empty($emp_data->start_date_3)
                            ? date('d-m-Y', strtotime($emp_data->start_date_3)) : ''}} </span>
                        <span style="padding: 10px 20px; ">{{!empty($emp_data->start_date_3) ? date('d-m-Y',
                            strtotime($emp_data->end_date_3)) : ''}}</span>
                    </td>
                    <td>{{$emp_data->country_dtl_3}}</td>
                    <td>{{$emp_data->emp_dtl_3}}</td>
                    <td>{{$emp_data->work_dtl_3}}</td>
                    <td>{{$emp_data->remark_dtl_3}}</td>
                </tr>
            </table>

        </div>

        <div class="lac-3" style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
           <div style="display: block; text-align: right"> <b class="display-none">License No: 03C4432</b></div>
            <h3>(C2) Employment History in Singapore</h3>

        </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><b>Previus working experience in Singapore: </b>
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">
                        @if($emp_data->sing_exp == 'No')<i class="fa fa-check" aria-hidden="true"></i> @endif</span> No
                    <span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle; margin-left: 50px;">@if($emp_data->sing_exp
                        == 'Yes')<i class="fa fa-check" aria-hidden="true"></i> @endif</span>Yes</span>
                <p>(The EA is required to obtain the FDW's employment history from MOM and furnish the employer with the
                    employment history of the EDW. The employer may also verify the EDW's employment history in
                    SIngapore
                    through WPOL using SingPass)</p>
            </div>
        </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <h3>(C3) Feedback from previous employers in SIngapore</h3>

        </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <p>Feedback wa not obtained by the EA from the previous employers. If feedback was obtained (attach
                testmonial
                if possible),Please indicate the feedback in the table below:</p>
            <table>
                <tbody>
                    <tr>
                        <th style="width: 220px;">
                        </th>
                        <th>Feedback</th>

                    </tr>
                    <tr>
                        <td>{{$emp_data->fdb_emp_1}}</td>
                        <td>{{$emp_data->fdb_dtl_1}}</td>
                    </tr>
                    <tr>
                        <td>{{$emp_data->fdb_emp_2}}</td>
                        <td>{{$emp_data->fdb_dtl_2}}</td>
                    </tr>
                    <tr>
                        <td>{{$emp_data->fdb_emp_3}}</td>
                        <td>{{$emp_data->fdb_dtl_3}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <h2>(D) AVAILABILITY OF FDW TO BE INTERVIEWED BY PROSPECTIVE EMPLOYER</h2>
        </div>
        <div style="display: block; padding: 10px 15px; max-width: 1200px; margin: 0 auto;">
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">@if($emp_data->fdw_no_interview
                        == 'Yes')<i class="fa fa-check" aria-hidden="true"></i> @endif</span>
                    FDW is not available for interview </span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">@if($emp_data->fdw_tel_interview
                        == 'Yes')<i class="fa fa-check" aria-hidden="true"></i> @endif</span>
                    FDW can be interviewed by phone</span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">@if($emp_data->fdw_video_interview
                        == 'Yes')<i class="fa fa-check" aria-hidden="true"></i> @endif</span>
                    FDW can be interviewed by video-conference</span>
            </div>
            <div style="display: block; margin-bottom: 8px;">

                <span style="display:block; "><span
                        style="text-align:center;border: 1px solid #ccc; display: inline-block; padding: 0px 3px; min-width:14px; min-height:16px; margin-right: 5px; vertical-align: middle;">@if($emp_data->fdw_per_interview
                        == 'Yes')<i class="fa fa-check" aria-hidden="true"></i> @endif</span>
                    FDW can be interviewed in person</span>
            </div>
        </div>
        <div style="display: block; padding:0px 15px; max-width: 1200px; margin: 0 auto;">
            <h2>(E) OTHER REMARKS</h2>
        </div>
        <div style="display: block; padding: 15px; max-width: 1200px; margin: 0 auto;">
            <div style="display: block; margin-bottom: 8px;">
                <span
                    style="display:block;border-bottom: 1px solid #ccc; padding-top: 10px;">{{$emp_data->other_remark}}</span>
            </div>

            <div style="display: inline-block; vertical-align: top; width: 48%; margin-top:10px;">
                <div style="display: block; margin-bottom: 8px;">
                    <span style="display:block;border-bottom: 1px solid #ccc; ">{{$emp_data->full_name}}</span><br>
                    FDW Name and Signature<br>
                    Date: {{date('d M Y', strtotime($emp_data->created_at))}}
                </div>


            </div>
            <div style="display: inline-block; vertical-align: top; width: 48%; margin-top:30px;">
                <span style="display:block;border-bottom: 1px solid #ccc; ">{{$emp_data->emp_code}}</span><br>
                EA Peronnel Name and Registration Number<br>
                Date: {{date('d M Y', strtotime($emp_data->created_at))}}
            </div>
            <p>I have gone through the page biodata of the this FDW and confirm that i would like to employ her </p>
            <div style="display: inline-block; vertical-align: top; width: 48%; margin-top:30px;">
                <span style="display:block;border-bottom: 1px solid #ccc; ">{{$emp_data->full_name}}</span><br>
                Employer Name and NRIC No.<br>
                Date: {{date('d M Y', strtotime($emp_data->created_at))}}
            </div><br><br>
            <p><b>IMPORTANT NOTES FOR EMPLOYERS WHEN USING THE SERVICES OF AN EA</b></p><br>
            <ul style="margin-left: 15px;">
                <li>Do consider asking for an FDW eho is able to communicate in a language you require, and interview
                    her (in person/phone/videoconfernce) to ensure that she can communicate adequately.</li>
                <li>Do consider requesting for an FDW who has a proven ability to perform the chores you require, for
                    example, performing household chores(especially if she is required to hang laundy from a high-rise
                    unit), cooking and caring for young children or the elderly.</li>
                <li>Do work together with the EA to ensure that a suitable FDQ is matched to you according to your needs
                    and requirements. </li>
                <li>You may wish to pay special attention to your prospective FDW's employment history and feedback from
                    the FDW's previous employer(s) before employing her.</li>
            </ul>
            <div style="height: 5px; background-color: #000; display: block; margin-bottom: 10px;margin-top: 10px;">

            </div>

            <div style="display: inline-block; width: 48%; vertical-align: top; text-align: center;"><i
                    class="fas fa-map-marker-alt" style="font-size: 40px;"></i><br>
                <p>865 Moutbatten Road<br>#01-62 Katong Shopping Centre S437844<br>☏ 6345 9978


                </p>
            </div>
            <div style="display: inline-block; width: 48%; vertical-align: top; text-align: center;"><i
                    class="fas fa-map-marker-alt" style="font-size: 40px;"></i><br>
                <p>170 Upper Bukit Timah Road
                    <br>#01-29 Bukit Timah Shopping S88179
                    <br>☏ 6466 6136



                </p>
            </div><br><br><br>
            <div style="display: inline-block; text-align: center; width: 32%; vertical-align: middle;">
                <i class="fa fa-link" aria-hidden="true"></i>

                fb.com/MaidManagementServices
            </div>

            <div style="display: inline-block; text-align: center;width: 32%; vertical-align: middle;">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                info@maidms.com.sg
            </div>
            <div style="display: inline-block; text-align: center;width: 32%; vertical-align: middle;">
                <i class="fa fa-globe" aria-hidden="true"></i>
                www.maidms.com.sg/
            </div>
            <br>
            <div style="text-align:center">
                <button style="
    background-color: #c40808;
    padding: 11px 15px;
    outline: 0;
    border: 0;
    cursor: pointer;
    color: #fff;
    border-radius: 5px;
    margin-top: 20px;
    min-width: 120px;" onclick="window.print()">Print</button>
            </div>
            <br>
        </div>
    </div>

</body>

</html>
