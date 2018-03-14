@extends('layouts.main-layout')

@section('css')
<link href="{{ asset('css/components/profile-component.css') }}" rel="stylesheet"/>
@endsection

@section('content')

<div class="container">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="https://avatars1.githubusercontent.com/u/17306535?s=400&u=823ef75959d37a5f740998f65e3293067191628a&v=4">
        </div>
        <div class="useravatar">
            <img alt="" src="https://avatars1.githubusercontent.com/u/17306535?s=400&u=823ef75959d37a5f740998f65e3293067191628a&v=4">
        </div>
        <div class="card-info"> 
            <span class="card-title">Pamela Anderson</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3" style="padding-right: 0px;">
            <div class="sidebar">
                <div class="sidebar-nav"><i class="fa fa-id-card" aria-hidden="true"></i> Basic Information</div>
                <div class="sidebar-nav active"><i class="fa fa-code" aria-hidden="true"></i> Skills</div>
                <div class="sidebar-nav"><i class="fa fa-file-text-o" aria-hidden="true"></i> Other</div>
            </div>
        </div>
        <div class="col-sm-9" style="padding-left: 0px;">
            <div class="profile-info-container">
                <div class="ui form">
                    <label>Objective for applying</label>
                    <div>
                        {{\Auth::user()->name}}
                    </div>
                </div>

                <br />
            </div>
        </div>
    </div>
</div>

@endsection
