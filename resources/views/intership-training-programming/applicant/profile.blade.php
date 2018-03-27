@extends('layouts.main-layout')

@section('css')
<style type="text/css">
    /* USER PROFILE PAGE */
    .card {
        /*margin-top: 20px;*/
        padding: 30px;
        background-color: rgba(214, 224, 226, 0.2);
        -webkit-border-top-left-radius:5px;
        -moz-border-top-left-radius:5px;
        border-top-left-radius:5px;
        -webkit-border-top-right-radius:5px;
        -moz-border-top-right-radius:5px;
        border-top-right-radius:5px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .card.hovercard {
        position: relative;
        /*padding-top: 0;*/
        overflow: hidden;
        text-align: center;
        background-color: #fff;
        background-color: rgba(255, 255, 255, 1);
    }
    .card.hovercard .card-background {
        height: 130px;
    }
    .card-background img {
        -webkit-filter: blur(7px);
        -moz-filter: blur(7px);
        -o-filter: blur(7px);
        -ms-filter: blur(7px);
        filter: blur(7px);
        margin-left: -100px;
        margin-top: -200px;
        min-width: 130%;
    }
    .card.hovercard .useravatar {
        position: absolute;
        top: 45px;
        left: 0;
        right: 0;
    }
    .card.hovercard .useravatar img {
        width: 100px;
        height: 100px;
        max-width: 100px;
        max-height: 100px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: 5px solid rgba(255, 255, 255, 0.5);
    }
    .card.hovercard .card-info {
        position: absolute;
        bottom: 14px;
        left: 0;
        right: 0;
    }
    .card.hovercard .card-info .card-title {
        padding:0 5px;
        font-size: 20px;
        line-height: 1;
        color: #d8d8d8;
        background-color: rgba(255, 255, 255, 0.1);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    .card.hovercard .card-info {
        overflow: hidden;
        font-size: 12px;
        line-height: 20px;
        color: #737373;
        text-overflow: ellipsis;
    }
    .card.hovercard .bottom {
        padding: 0 20px;
        margin-bottom: 17px;
    }
    .btn-pref .btn {
        -webkit-border-radius:0 !important;
    }

    #batch-cont{
        /*margin: 2rem;*/
        padding: 3.5rem 0rem;
        background: #fff;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
        border: 1px solid #dddddd;
        position: relative;    
    }

    #batch-cont .edit-bttn{
        position: absolute;
        top: 10px;
        right: 10px;
        width: 0px;
        overflow: hidden;
        display: block;
        transition: 200ms ease all;
    }

    #batch-cont:hover .edit-bttn{
        opacity: 1;
        width: 30px;
    }

    .app-basic-info{
        /*
        margin: 2rem 2rem 0rem 2rem;
        padding: 3.5rem 0px 0 0;
        background: #fff;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
        border: 1px solid #dddddd;
        position: relative;
        */
        margin: 1rem 0rem 0rem 1rem;
        padding: 3.5rem 0px 0 0;
        background: #fff;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
        border: 1px solid #dddddd;
        position: relative;
    }

    #app-batch-number{
        padding: .5rem 2rem;
        position: absolute;
        background: #1679a3;
        top: 0;
        left: -1px;
        color: #fff;
    }
    .app-objt-p{
        padding: 1rem;
    }
    #app-batch-border-left{
        background: #1679a3;
        height: 100%;
        width: 9px;
        position: absolute;
        top: 0;
        right: 0;    
    }
    .app-basic-info-2{
        height: 100px;
    }

    .bar-success {  background-color: #5cb85c;}
    .bar-info {    background-color: #5bc0de;}
    .bar-warning {    background-color: #f0ad4e;}
    .bar-danger {  background-color: #d9534f;}


    /*Facebook cover photo and Profile*/

    .fb-profile-block {
    margin: auto;
    position: relative;
    /*width: 850px;*/
    width: 1170px;
    }
    .fb-link-img{
        width: 100%;
        height: auto;
    }
    .fb-profile-block-thumb{
    display: block;
    height: 315px;
    overflow: hidden;
    position: relative;
    text-decoration: none;
    }
    .fb-profile-block-menu {
    border: 1px solid #d3d6db;
    border-radius: 0 0 3px 3px;
    }
    .profile-img a{
        bottom: 15px;
        box-shadow: none;
        display: block;
        left: 15px;
        padding:1px;
        position: absolute;
        height: 160px;
        width: 160px;
        background: rgba(210, 198, 198, 0.3) none repeat scroll 0 0;
        z-index:9;
    }
    .profile-img img {
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.07);
    height:158px;
    padding: 5px;
    width:158px;
    }
    .profile-name {
    bottom: 60px;
    left: 205px;
    position: absolute;
    }
    .profile-name h2 {
    color: #fff;
    font-size: 24px;
    font-weight: 600;
    line-height: 30px;
    max-width: 275px;
    position: relative;
    text-transform: capitalize;
    }
    .fb-profile-block-menu{
    height: 44px;
    position: relative;
    /*width:850px;*/
    width: 1170px;
    overflow:hidden;
    }
    .block-menu {
    clear: right;
    padding-left: 205px;
    }
    .block-menu ul{
        margin:0;
        padding:0;
        }
    .block-menu ul li{
        display:inline-block;
        }
    .block-menu ul li a {
    border-right: 1px solid #e9eaed;
    float: left;
    font-size: 14px;
    font-weight: bold;
    height: 42px;
    line-height: 3.0;
    padding: 0 17px;
    position: relative;
    vertical-align: middle;
    white-space: nowrap;
    color:#4b4f56;
    text-transform:capitalize;
    }

    .block-menu ul li:first-child a{
        border-left: 1px solid #e9eaed;
    }

    .second-column-tab, .first-column-tab{
        margin-bottom: 1rem;
        background: #fff;
        border: 1px solid #dddfe2;
        box-shadow: 2px 0 #dedede;
        position: relative;
        padding-bottom: 1rem;
    }

    .first-column-tab h3 i, .second-column-tab h3 i {
        color: #4267b2;
        margin: 0 .5rem 0px 0;
    }

    .first-column-tab h3, .second-column-tab h3{
        border-bottom: 1px solid #e9ebee;
        padding: 1rem;
    }

    .first-column-tab p{
        padding: 0 1rem;
    }

    .resume-content{
        padding-left: .6rem;
    }
    .i-icon-wrapper{
        /* position: relative;
        background: rgb(31, 89, 149);
        border-radius: 12.5px; */
    }
    .i-icon-wrapper i{
        /* position: relative; */
        color: #4267b2;
        /* font-size: 1rem!important; */

    }
    .progress{
        border-radius: 0!important;
        border: 1px solid #bfbebe;
        height: 30px;    
    }
    .progress-bar{
        padding-top: 4px;
    }

    #resume_update_btn{
        position: absolute;
        top: 0;
        right: 0;
        border-radius: 0!important;
    }
    .pr-edit-btn{
        font-size: 1.3rem;
        color: #187aa4;
        position: absolute;
        top: 12px;
        right: 22px;
        cursor: pointer;
    }
    .second-column-tab .pr-edit-btn, .first-column-tab .pr-edit-btn{
        font-size: 1.3rem;
        color: #187aa4;
        position: absolute;
        top: 12px;
        right: 22px;
        width: 0px;
        overflow: hidden;
        display: block;
        transition: 200ms ease all;        
        cursor: pointer;
    }
    .second-column-tab:hover .pr-edit-btn, .first-column-tab:hover .pr-edit-btn{
        opacity: 1;
        width: 30px;
    }

    .swal-wide{
    width:850px !important;
    }
</style>
@endsection

@section('content')
<div class="container">

    <!-- Cover photo here -->
    <div class="fb-profile-block">
          <div class="fb-profile-block-thumb">
              <img class="fb-link-img" src="{{asset('img/default-opening.jpg')}}" alt="" title="">
          </div>
            <div class="profile-img">
              <a href="#">
                    @if(!empty($resume->photo))
                        <img class="fb-link-img" src="{{$resume->photo}}" alt="{{$resume->f_name}}" title="{{$resume->f_name}}" />
                    @else
                        <img class="fb-link-img" src="http://santetotal.com/wp-content/uploads/2014/05/default-user.png" alt="" title="">
                    @endif
              </a>
            </div>
          <div class="profile-name">
            <h2>{{$resume->f_name}} {{$resume->m_name}} {{$resume->l_name}}</h2>
          </div>
          <div class="fb-profile-block-menu">
               <div class="block-menu" style="background: #fff">
                    <ul class="nav nav-tabs" style="background: #fff">
                       <li class="active"><a data-toggle="tab" href="#home">Resume</a></li>
                       <li><a data-toggle="tab" href="#application1">Application</a></li>
                    </ul>
               </div>
          </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <br />
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="first-column-tab">
                        <h3>
                            <i class="fa fa-globe"></i>
                            Basic info
                        </h3>
                        <span class="pr-edit-btn" id="basic-info">
                                <i class="fa fa-edit"></i>
                        </span>
                        
                        <p>
                            <span class="i-icon-wrapper">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </span>
                            <span class="resume-content">
                                <a href="mailto:{{$resume->email}}" class="email" target="_blank">
                                    {{$resume->email}}
                                </a>
                            </span>
                        </p>

                        <p>
                            <span class="i-icon-wrapper">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                            <span class="resume-content phone_number">
                                {{$resume->phone_number}}
                            </span>
                        </p>
                        <p>
                            <span class="i-icon-wrapper">
                                <i class="fa fa-birthday-cake"></i>
                            </span>
                            <span class="resume-content formated_birthdate">
                                {{$resume->formated_birthdate}}
                            </span>
                        </p>

                        <p>
                            <span class="i-icon-wrapper">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </span>
                            <span class="resume-content address1">
                                {{$resume->address1}}
                                {{$resume->address2}}
                                {{$resume->city}}
                                {{$resume->country}}
                                {{$resume->postal}}
                            </span>
                        </p>
                        <p style="padding-bottom: 1rem;">
                            <span class="i-icon-wrapper">
                                <i class="fa fa-language"></i>
                            </span>
                            <span class="resume-content spoken_language">
                                {{$resume->spoken_language}}
                            </span>
                        </p>
                    </div>

                    <div class="first-column-tab">
                        <h3>
                        <i class="fa fa-graduation-cap"></i>
                            Education
                        </h3>

                        <span class="pr-edit-btn" id="add-education">
                                <i class="fa fa-plus"></i>
                        </span>

                        <ul class="list-group list-group-flush" id="educational-backgrounds">
                            @foreach($resume->educations as $education)
                            <li class="list-group-item">
                                <span id="education-{{$education->id}}">{{$education->ed_university}}</span>
                                <div class="pull-right pr-edit-btn" id="edit-education" data-id="{{$education->id}}" style="cursor:pointer;">
                                    <i class="fa fa-edit"></i>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <h5>Profile progress:</h5>
                    @if(empty($resume->f_name))
                        <div class="progress progress-navbar">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30% profile complete</div>
                        </div>
                    @elseif(!empty($resume->f_name) && !empty($resume->summary))
                        <div class="progress progress-navbar">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">40% profile complete</div>
                        </div>
                    @else
                        <h1>Bago mahuli ang lahat</h1>
                    @endif

                </div>
                {{-- @if(isset($application)) --}}
                <div class="col-lg-7 col-md-7">
                        <div class="second-column-tab">
                                <h3>
                                    <i class="fa fa-code"></i>
                                    Featured Skills
                                </h3>
                                    <div class="row" id="skill_required" style="margin: .5rem;">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                <span class="pr-edit-btn" id="add-skill">
                                        <i class="fa fa-plus"></i>
                                </span>
                        </div>

                        <div class="second-column-tab">
                                <h3>
                                    <i class="fa fa-star"></i>
                                    Experiences
                                </h3>
                                <span class="pr-edit-btn" id="experiences">
                                        <i class="fa fa-edit"></i>
                                </span>

                                <p style="padding: 1rem;">
                                    {{ $resume->summary }}
                                </p>
                        </div>

                        <div class="second-column-tab">
                            <h3>
                                <i class="fa fa-trophy"></i>
                                Awards/Certificate
                            </h3>
                            <span class="pr-edit-btn" id="awards-cert">
                                    <i class="fa fa-edit"></i>
                            </span>
                            <p style="padding: 1rem;">
                                {{ $resume->awards }}
                            </p>
                        </div>

                        <div class="second-column-tab">
                            <h3>
                                <i class="fa fa-briefcase"></i>
                                Portfolio Websites
                            </h3>
                            <span class="pr-edit-btn" id="portfolio">
                                    <i class="fa fa-edit"></i>
                            </span>
                            <p style="padding: 1rem;">
                                {{ $resume->websites }}
                            </p>
                        </div>

                        <div class="second-column-tab">
                            <div>
                                <h3>
                                    <i class="fa fa-address-card"></i>                                    
                                    Objective
                                </h3>
                                <span class="pr-edit-btn" id="objective">
                                        <i class="fa fa-edit"></i>
                                </span>                            
                                <p style="padding: 1rem;">
                                    {{$resume->summary}}                                
                                </p>
                            </div>
                        </div>

                        <div class="second-column-tab">
                            <div>
                                <h3>
                                    <i class="fa fa-asterisk"></i>
                                    Other Skills
                                </h3>
                                <span class="pr-edit-btn" id="other-skills">
                                        <i class="fa fa-edit"></i>
                                </span>                                
                                <p style="padding: 1rem;">
                                    {{$resume->other_skills}}                                
                                </p>
                            </div>
                        </div>

                        <div class="second-column-tab">
                            <div>
                                <h3>
                                    <i class="fa fa-plus-circle"></i>
                                    Seminars Attended
                                </h3>
                                <span class="pr-edit-btn" id="seminars">
                                        <i class="fa fa-edit"></i>
                                </span>                            
                                <p style="padding: 1rem;">
                                    {{$resume->seminars_attended}}                                
                                </p>
                            </div>
                        </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>

        <div class="tab-pane fade" id="application1">
            <br>
            <a href="{{route('itp_create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Application</a>
            <br>
            <br>
            <div class="row">
                <?php $apps = 0; ?>
                @foreach($applications as $application)
                    @if($application->trainingBatch)
                    <?php $apps++; ?>
                    <div class="col-lg-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $application->trainingBatch->name }}</div>
                            <div class="panel-body">
                                <b> Training Date : </b> {{ $application->trainingBatch->startdate }}
                                <br>
                                <b> Status : </b>
                                <?php
                                    switch ($application->status) {
                                        case 'under_consideration':
                                            echo '<span class="label label-primary">Under Consideration</span>';
                                            break;
                                        case 'approved':
                                            echo '<span class="label label-success">Approved</span>';
                                            break;
                                        case 'declined':
                                            echo '<span class="label label-default">Declined</span>';
                                            break;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @if($apps < 1)
                <div class="col-lg-4 col-sm-6">
                    <div class="alert alert-info" role="alert">
                        <strong>You don't have application yet.</strong>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="first-column-tab" style="padding:15px;margin-top: 1rem;">
        <h5>Application History</h5>
        <table class="table table-bordered" id="applications-table" style="width: 100%;">
            <thead>
                <tr>
                    <th>Training Batch</th>
                    <th>Training Start Date</th>
                    <th>Submitted Date</th>
                    <th>Options</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="ui mini modal" id="delete_application">
    <div class="header">Delete Batch</div>
    <div class="content">
        <p>Are you sure you want to delete this batch?</p>
    </div>
    <div class="actions">
        <div class="ui negative button">
            No
        </div>
        <div class="ui delete positive right labeled icon button">
            Yes
            <i class="checkmark icon"></i>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    var editor = $('#home').profileEditor({
        'editHandlers':{
            'basic-info':function(obj){
                swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })
                $.ajax({
                    'url':"{{route('json_get_resume')}}",
                    type:'GET',
                    data:{},
                    success:function(resume){
                        // 
                        obj.resume = resume;
                        swal(
                            'Update Basic Info?',
                            'Click OK',
                            'question').then((result) => {
                                if(result.value)
                                {
                                    swal.setDefaults({
                                        input: 'text',
                                        confirmButtonText: 'Next &rarr;',
                                        showCancelButton: true,
                                        progressSteps: ['1', '2', '3', '4', '5', '6', '7', '8'],
                                        customClass: 'swal-wide',
                                    })

                                    var steps = [
                                        {
                                            title: 'First Name',
                                            preConfirm: swalRequired,
                                            inputValue: obj.resume.f_name,
                                        },
                                        {
                                            
                                            title: 'Middle Name',
                                            inputValue: obj.resume.m_name,
                                        },
                                        {
                                            title: 'Last Name',
                                            preConfirm: swalRequired,
                                            inputValue: obj.resume.l_name,
                                        },
                                        {
                                            title: 'Email',
                                            input: 'email',
                                            inputValue: obj.resume.email,
                                        },
                                        {
                                            title: 'Phone Number',
                                            preConfirm: swalRequired,
                                            inputValue: obj.resume.phone_number,
                                            onOpen: function() {
                                                $('.swal2-modal .swal2-input').prop('type','number').css('max-width','initial');
                                            },
                                        },
                                        {
                                            title: 'Birthdate',
                                            className: "red-bg",
                                            inputValue: obj.resume.birth_date.split(' ')[0],
                                            preConfirm: swalRequired,
                                            onOpen: function() {
                                                $('.swal2-modal .swal2-input').prop('type','date');
                                            },
                                        },
                                        {
                                            title: 'Address',
                                            preConfirm: swalRequired,
                                            inputValue: obj.resume.address1,
                                        },
                                        {
                                            title: 'Spoken Languages',
                                            showLoaderOnConfirm: true,
                                            inputValue: obj.resume.spoken_language,
                                            preConfirm: swalRequired,
                                            allowOutsideClick: () => !swal.isLoading(),
                                            preConfirm: swalRequired,
                                        },
                                    ]

                                    swal.queue(steps).then((result) => {
                                    swal.resetDefaults()

                                    if (result.value) {
                                        var data = {
                                            f_name:result.value[0],
                                            m_name:result.value[1],
                                            l_name:result.value[2],
                                            email:result.value[3],
                                            phone_number:result.value[4],
                                            birth_date:result.value[5],
                                            address1:result.value[6],
                                            spoken_language:result.value[7],
                                            _method: "PATCH"
                                        };
                                        swal({
                                            title: 'Saving',
                                            text: 'Please wait...',
                                            onOpen: () => {
                                                swal.showLoading()
                                            },
                                            allowOutsideClick: () => !swal.isLoading()
                                        })
                                        $.ajax({
                                            url:"{{route('j_e_r_p_basic')}}",
                                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                            type: 'PATCH',
                                            data:data,
                                            success:function(_data){
                                                // 
                                                console.log(obj.current_panel)
                                                fillInfos($('#'+obj.current_panel).closest('.first-column-tab'),data)
                                                swal({
                                                    title: 'All done!',
                                                    html:
                                                        '',
                                                    confirmButtonText: 'Ok'
                                                })
                                            }
                                        });
                                    }
                                    })
                                }
                        });
                    }
                });
            },
            'add-education':function(obj){
                swal(
                    'Add Education Background?',
                    'Click OK',
                    'question').then((result) => {
                        if(result.value)
                        {
                            swal.setDefaults({
                                input: 'text',
                                confirmButtonText: 'Next &rarr;',
                                showCancelButton: true,
                                progressSteps: ['1', '2', '3', '4', '5', '6', '7'],
                                customClass: 'swal-wide',
                            })

                            var steps = [
                                {
                                    title: 'University',
                                    preConfirm: swalRequired,
                                },
                                {
                                    
                                    title: 'Field of study',
                                },
                                {
                                    title: 'Program of study',
                                    preConfirm: swalRequired,
                                },
                                {
                                    title: 'Montn',
                                    text: 'Month you started studying',
                                    input: 'select',
                                    inputOptions: {
                                        @foreach(month_array() as $key => $value)
                                        '{{$key}}':'{{$value}}',
                                        @endforeach
                                    },
                                    preConfirm: swalRequired
                                },
                                {
                                    title: 'Year',
                                    text: 'Year you started studying',
                                    input: 'select',
                                    inputOptions: {
                                        @foreach(year_array() as $key => $value)
                                        '{{$key}}':'{{$value}}',
                                        @endforeach
                                    },
                                    preConfirm: swalRequired
                                },
                                {
                                    title: 'Montn',
                                    text: 'Month you it ended',
                                    input: 'select',
                                    inputOptions: {
                                        @foreach(month_array() as $key => $value)
                                        '{{$key}}':'{{$value}}',
                                        @endforeach
                                    },
                                    preConfirm: swalRequired
                                },
                                {
                                    title: 'Year',
                                    text: 'Year you it ended',
                                    input: 'select',
                                    inputOptions: {
                                        @foreach(year_array() as $key => $value)
                                        '{{$key}}':'{{$value}}',
                                        @endforeach
                                    },
                                    preConfirm: swalRequired
                                },
                            ]

                            swal.queue(steps).then((result) => {
                            swal.resetDefaults()

                            if (result.value) {
                                var data = {
                                    ed_university:result.value[0],
                                    ed_program_of_study:result.value[1],
                                    ed_field_of_study:result.value[2],
                                    ed_from_month:result.value[3],
                                    ed_from_year:result.value[4],
                                    ed_to_month:result.value[5],
                                    ed_to_year:result.value[6],
                                    resume_id:{{$resume->id}},
                                    _method: "PATCH"
                                };
                                swal({
                                    title: 'Saving',
                                    text: 'Please wait...',
                                    onOpen: () => {
                                        swal.showLoading()
                                    },
                                    allowOutsideClick: () => !swal.isLoading()
                                })
                                $.ajax({
                                    url:"{{route('j_c_r_p_educational_background')}}",
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    type: 'PATCH',
                                    data:data,
                                    success:function(_data){
                                        // 
                                        addEducationalBackground(_data.education);
                                        swal({
                                            title: 'All done!',
                                            html:
                                                '',
                                            confirmButtonText: 'Ok'
                                        })
                                    }
                                });
                            }
                            })
                        }
                });
            },
            'edit-education':function(obj){
                swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })
                $.ajax({
                    'url':"{{route('j_g_r_education')}}",
                    type:"GET",
                    data:{id:obj.id},
                    success:function(_data){
                        swal(
                            'Edit Education Background?',
                            'Click OK',
                            'question').then((result) => {
                                if(result.value)
                                {
                                    swal.setDefaults({
                                        input: 'text',
                                        confirmButtonText: 'Next &rarr;',
                                        showCancelButton: true,
                                        progressSteps: ['1', '2', '3', '4', '5', '6', '7'],
                                        customClass: 'swal-wide',
                                    })

                                    var steps = [
                                        {
                                            title: 'University',
                                            preConfirm: swalRequired,
                                            inputValue: _data.ed_university,
                                        },
                                        {
                                            
                                            title: 'Field of study',
                                            inputValue: _data.ed_field_of_study,
                                            preConfirm: swalRequired,
                                        },
                                        {
                                            title: 'Program of study',
                                            preConfirm: swalRequired,
                                            inputValue: _data.ed_program_of_study,
                                        },
                                        {
                                            title: 'Montn',
                                            text: 'Month you started studying',
                                            input: 'select',
                                            inputValue: _data.ed_from_month,
                                            inputOptions: {
                                                @foreach(month_array() as $key => $value)
                                                '{{$key}}':'{{$value}}',
                                                @endforeach
                                            },
                                            preConfirm: swalRequired
                                        },
                                        {
                                            title: 'Year',
                                            text: 'Year you started studying',
                                            input: 'select',
                                            inputValue: _data.ed_from_year,
                                            inputOptions: {
                                                @foreach(year_array() as $key => $value)
                                                '{{$key}}':'{{$value}}',
                                                @endforeach
                                            },
                                            preConfirm: swalRequired
                                        },
                                        {
                                            title: 'Montn',
                                            text: 'Month you it ended',
                                            input: 'select',
                                            inputValue: _data.ed_to_month,
                                            inputOptions: {
                                                @foreach(month_array() as $key => $value)
                                                '{{$key}}':'{{$value}}',
                                                @endforeach
                                            },
                                            preConfirm: swalRequired
                                        },
                                        {
                                            title: 'Year',
                                            text: 'Year you it ended',
                                            input: 'select',
                                            inputValue: _data.ed_to_year,
                                            inputOptions: {
                                                @foreach(year_array() as $key => $value)
                                                '{{$key}}':'{{$value}}',
                                                @endforeach
                                            },
                                            preConfirm: swalRequired
                                        },
                                    ]

                                    swal.queue(steps).then((result) => {
                                    swal.resetDefaults()

                                    if (result.value) {
                                        var __data = {
                                            id:_data.id,
                                            ed_university:result.value[0],
                                            ed_program_of_study:result.value[1],
                                            ed_field_of_study:result.value[2],
                                            ed_from_month:result.value[3],
                                            ed_from_year:result.value[4],
                                            ed_to_month:result.value[5],
                                            ed_to_year:result.value[6],
                                            resume_id:{{$resume->id}},
                                            _method: "PATCH"
                                        };
                                        swal({
                                            title: 'Saving',
                                            text: 'Please wait...',
                                            onOpen: () => {
                                                swal.showLoading()
                                            },
                                            allowOutsideClick: () => !swal.isLoading()
                                        })
                                        $.ajax({
                                            url:"{{route('j_e_r_p_educational_background')}}",
                                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                            type: 'PATCH',
                                            data:__data,
                                            success:function(data){
                                                // 
                                                console.log(obj.current_panel)
                                                console.log($('#education-'+_data.id));
                                                $('#education-'+_data.id).html(__data.ed_university);
                                                swal({
                                                    title: 'All done!',
                                                    html:
                                                        '',
                                                    confirmButtonText: 'Ok'
                                                })
                                            }
                                        });
                                    }
                                    })
                                }
                        });
                    }
                });
            },
            'add-skill':function(obj){
                swal({
                    title: 'Select Language/Technology',
                    html:'<select id="swal-language-select" class="ui fluid normal dropdown">'
                        +'            <option value="">Select</option>'
                        +'            <option value="PHP">PHP</option>'
                        +'            <option value="Ruby">Ruby</option>'
                        +'            <option value="Java">Java</option>'
                        +'            <option value="C++">C++</option>'
                        +'            <option value="Python">Python</option>'
                        +'            <option value="Swift">Swift</option>'
                        +'            <option value="Go">Go</option>'
                        +'            <option value="C#">C#</option>'
                        +'            <option value="Javascript">Javascript</option>'
                        +'            <option value="Node.js">Node.js</option>'
                        +'            <option value="versioncontrol">version control</option>'
                        +'            <option value="CSSframework">CSS framework</option>'
                        +'            <option value="CSSpreprocessors/postprocessors">CSS preprocessors/postprocessors</option>'
                        +'            <option value="Cloudhosting">Cloud hosting</option>'
                        +'            <option value="Mobileappprogramming">Mobile app programming</option>'
                        +'            <option value="Database">Database</option>'
                        +'            <option value="otherlanguages">Other Languages</option>'
                        +'            <option value="othertools">Other tools</option>'
                        +'</select>',
                    preConfirm: function () {
                        return [
                        $('#swal-language-select').val(),
                        ]
                    },
                    onOpen:()=>{
                        // 
                        $('.swal2-modal .dropdown').dropdown();
                    }
                }).then((result) => {
                    if(result.value)
                    {
                        swal({
                            title: 'Saving',
                            text: 'Please wait...',
                            onOpen: () => {
                                swal.showLoading()
                            },
                            allowOutsideClick: () => !swal.isLoading()
                        })
                        $.ajax({
                            url:"{{route('j_g_skills_categories')}}",
                            type: 'GET',
                            data:{resume_id:{{$resume->id}}, language:result.value[0]},
                            success:function(_data){
                                // 
                                console.log(_data)
                                var html = '<select id="swal-category-select" class="ui fluid normal dropdown multi-select" multiple>'
                                    + '<option value="">Select</option>';
                                for(var x in _data.resume_skills){
                                    var selected = '';
                                    $.grep(_data.user_skills, function(v,i){
                                        if(v.resume_skill_id == _data.resume_skills[x].id)
                                        selected = 'selected';
                                    });

                                    html += '<option '+selected+' value="'+_data.resume_skills[x].category+'">'+_data.resume_skills[x].category+'</option>';
                                }
                                swal({
                                    title: 'Select Language/Technology',
                                    html:html,
                                    preConfirm: function () {
                                        return [
                                        $('#swal-category-select').val(),
                                        ]
                                    },
                                    onOpen:()=>{
                                        // 
                                        $('.swal2-modal .dropdown').dropdown();
                                    }
                                }).then(result=>{
                                    console.log(result);
                                    swal({
                                        title: 'Saving',
                                        text: 'Please wait...',
                                        onOpen: () => {
                                            swal.showLoading()
                                        },
                                        allowOutsideClick: () => !swal.isLoading()
                                    })

                                    $.ajax({
                                        url:"{{route('j_e_r_p_skills')}}",
                                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                        type: 'PATCH',
                                        data:{skills:result.value[0]},
                                        success:function(_data){
                                            // 
                                            console.log(_data)
                                            swal({
                                                title: 'All done!',
                                                html:
                                                    '',
                                                confirmButtonText: 'Ok'
                                            })
                                        }
                                    });
                                });
                            }
                        });
                    }
                });
            }
        },
        'submitHandlers':{}
    });

    var table = $('#applications-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('itp/applicant/json/itp') !!}',
        columns: [
            { data: 'batch_name', name: 'batch_name', },
            { data: 'start_date', name: 'start_date', },
            { data: 'created_at', name: 'created_at', },
            {
                searchable: false,
                "orderable": false,
                "render": function ( data, type, row ) {
                    return '<a href="{{route('itp_create')}}/'+row['id']+'" title="edit" class="btn btn-primary btn-xs">'
                    +'Edit <i class="fa fa-edit"></i>'
                    +'</a> '
                    +'<a type="button" onclick="prep_del_batch('+row['id']+')" title="delete" class="btn btn-danger btn-xs">'
                    +'Delete <i class="fa fa-trash"></i>'
                    +'</a>';
                },
            }
        ],
        order: [[ 1, 'asc' ]]
    });

    $('#delete_application .delete').click(function(){
        $.ajax({
            url:"{{route('json_delete_itp_application')}}",
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            type:"POST",
            data:{id:$('#delete_application').data('id')},
            success:function(data){
                table.ajax.reload();
            },
            error:function(){}
        });
    });

    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");   
    });

    function swalRequired(inputValue){
        return new Promise((resolve) => {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showValidationError("You need to write something!");
            }
            resolve()
        })
    }

    function addEducationalBackground(data){
        var html = '<li class="list-group-item">'
                    +'    <span id="education-'+data.id+'>'+data.ed_university+'</span>'
                    +'    <div class="pull-right pr-edit-btn" id="edit-education" data-id="'+data.id+'" style="cursor:pointer;">'
                    +'        <i class="fa fa-edit"></i>'
                    +'    </div>'
                    +'</li>'
        $('#educational-backgrounds').append(html);
    }
});

function prep_del_batch(id){
    $('#delete_application').modal('show');
    $('#delete_application').data('id',id);
}

{{--  Sweet Alert  --}}

    $('#skills-info').click(function(){
        swal.setDefaults({
        input: 'text',
        confirmButtonText: 'Next &rarr;',
        showCancelButton: true,
        progressSteps: ['1', '2', '3']
        })

        var steps = [
        {
            title: 'Question 1',
            text: 'Chaining swal2 modals is easy'
        },
        'Question 2',
        'Question 3'
        ]

        swal.queue(steps).then((result) => {
        swal.resetDefaults()

        if (result.value) {
            swal({
            title: 'All done!',
            html:
                'Your answers: <pre>' +
                JSON.stringify(result.value) +
                '</pre>',
            confirmButtonText: 'Lovely!'
            })
        }
        })
    });


// {{--  Accomplishments  --}}
$('#accomplishments').click(function(){

// const {value: text} = await swal({
//   input: 'textarea',
//   inputPlaceholder: 'Type your message here',
//   showCancelButton: true
// })

if (text) {
  swal(text)
}
});


{{--  End Sweet alert  --}}

@if(\Auth::user()->resume()->first())
{{-- @if(isset($application)) --}}
    $(function(){
        var skill_requirements = JSON.parse("{{json_encode(\Auth::user()->resume()->first()->skills)}}".replace(/&quot;/g,'"'));
        {{-- 
        var skill_requirements = JSON.parse("{{json_encode($application->skills)}}".replace(/&quot;/g,'"'));
        --}}

        var skills_container = $('#skill_required');
        skills_container.find('.col-md-4').html('');
        var language_added = [];
        var x = 0;

        for(var i = 0; i < skill_requirements.length; i++){
            if(x > 2){
                x = 0;
            }

            var lang = skill_requirements[i].language.toLowerCase() == 'c++' ? 'cplus2' : (skill_requirements[i].language.toLowerCase() == "c#" ? 'csharp' : (skill_requirements[i].language.toLowerCase() == 'node.js' ? 'node-js' : skill_requirements[i].language.toLowerCase()) );

            if(language_added.includes(lang)){
                skills_container.find('.'+lang).parent().find('.body').append('<div class="ellipsis">'+skill_requirements[i].category+'</div>');
            }
            else
            {
                skills_container.find('.col-md-4').eq(x).append(
                    '<div class="job-card">'
                    +'    <div class="header ellipsis '+lang+'">'+skill_requirements[i].language+'</div>'
                    +'    <div class="body"><div class="ellipsis">'+skill_requirements[i].category+'</div> </div>'
                    +'</div>'
                );
                language_added.push(lang)
                x++;
            }
        }

        if(skill_requirements.length < 1){
            skill_requirements.html('<div class="col-md-4" style="color:gray;">No skill requirements.</div>');
        }
    });
@endif

</script>

@endsection

@section('scripts')
<script src="{{ asset('js/profile_editor.js') }}"></script>
@endsection