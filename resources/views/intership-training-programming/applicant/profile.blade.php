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

.first-column-tab h3 i{
    color: #4267b2;
}

.first-column-tab h3{
    border-bottom: 1px solid #e9ebee;
    padding: 1rem;    
}

.first-column-tab p{
    padding: 0 1rem;
}

.resume-content{
    padding-left: .6rem;
}
/*.i-icon-wrapper{
    position: relative;
    background: rgb(31, 89, 149);
    border-radius: 12.5px;
}
.i-icon-wrapper i{
    position: relative;
    color: #fff;
    font-size: 1rem!important;

}*/
.progress{
    border-radius: 0!important
}

#resume_update_btn{
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 0!important;
}

</style>
@endsection

@section('content')
<div class="container">

    <!-- Cover photo here -->
    <div class="fb-profile-block">
          <div class="fb-profile-block-thumb"><img class="fb-link-img" src="{{asset('img/default-opening.jpg')}}" alt="" title=""></div>
          <div class="profile-img"><a href="#"><img class="fb-link-img" src="http://santetotal.com/wp-content/uploads/2014/05/default-user.png" alt="" title=""></a></div>
          <div class="profile-name">
            <h2>{{$user->f_name}} {{$user->m_name}} {{$user->l_name}}</h2>
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
                        <p>
                            <span class="i-icon-wrapper">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                {{ $user->email}}
                            </span>
                            <span class="resume-content">
                            </span>
                        </p>
                    </div>
                <div>
                        <a href="{{route('resume_create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Update profile</a>
                <br>
                <br>
                </div>

                </div>
                {{-- @if(isset($application)) --}}
                <div class="col-lg-7 col-sm-7">
                        <div class="second-column-tab">
                            <div id="resume_update_btn">
                            </div>
                            <div style="margin: 1rem;">
                                <h3 style="margin-top: 1rem;">Skills</h3>
                                    <div class="row" id="skill_required">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                <div id="resume_update_btn">
                                </div>
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
});

function prep_del_batch(id){
    $('#delete_application').modal('show');
    $('#delete_application').data('id',id);
}

@if(\Auth::user()->resume()->first())
{{-- @if(isset($application)) --}}
    $(function(){
        {{-- 
        var skill_requirements = JSON.parse("{{json_encode(\Auth::user()->resume()->first()->skills)}}".replace(/&quot;/g,'"'));
        --}}
        var skill_requirements = JSON.parse("{{json_encode($application->skills)}}".replace(/&quot;/g,'"'));

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

    // $(document).ready( function(){
    //     window.percent = 0;
    //     window.progressInterval = window.setInterval( function(){
    //     if(window.percent < 100) {
    //         window.percent++;
    //         $('.progress').addClass('progress-striped').addClass('active');
    //         $('.progress .progress-bar:first').removeClass().addClass('progress-bar')
    //         .addClass ( (percent < 40) ? 'progress-bar-danger' : ((percent < 80) ? 'progress-bar-warning' : 'progress-bar-success' )) ;
    //         $('.progress .progress-bar:first').width(window.percent+'%');
    //         $('.progress .progress-bar:first').text(window.percent+'%');
    //     } else {
    //         window.clearInterval(window.progressInterval);
    //         // jQuery('.progress').removeClass('progress-striped').removeClass('active');
    //         //jQuery('.progress .progress-bar:first').text('Done!');
    //     }
    // }, 100 );
    // });

</script>

@endsection