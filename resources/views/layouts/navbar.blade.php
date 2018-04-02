<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo_brand.png') }}" />
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right" style="margin: initial;">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else

                    @if(\Auth::check())

                    <li class="notification_li" id="notification_li">
                        <a href="#" id="notificationLink">
                            <i class="fa fa-bell"></i>
                        </a>
                        <div id="notification_count">
                            1
                        </div>
                        <div id="notificationContainer">
                            <div id="notificationTitle">Updates and notifications</div>
                                <div id="notificationsBody" class="notifications">
                                    <div class="noti-content">
                                        {{--  <h4>Updates</h4>  --}}
                                        <h5>Profile progress:</h5>
                                        <div class="progress progress-navbar">
                                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">60% profile complete</div>
                                        </div>

                                        <div id="navigation">
                                            <h5>Kindly fill-up the following categories:</h5>

                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-5 noti-flex" id="basic-info-noti">
                                                        <span class="noti-flex-sp">
                                                            Basic info
                                                        </span>

                                                        {{--  <span class="noti-flex-icon">
                                                                <i class="fa fa-globe"></i>
                                                        </span>  --}}

                                                    </div>
                                                    <div class="col-sm-5 noti-flex" id="education-noti">
                                                        <span class="noti-flex-sp">
                                                            Education
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-5 noti-flex" id="experiences-noti">
                                                        <span class="noti-flex-sp">
                                                            Experiences
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-5 noti-flex" id="awards-noti">
                                                            <span class="noti-flex-sp">
                                                                Awards..
                                                            </span>
                                                    </div>
                                                    <div class="col-sm-5 noti-flex" id="portfolio-noti">
                                                            <span class="noti-flex-sp">
                                                                Portfolio
                                                            </span>
                                                    </div>
                                                    <div class="col-sm-5 noti-flex" id="objective-noti">
                                                            <span class="noti-flex-sp">
                                                                Objective
                                                            </span>
                                                    </div>
                                                    <div class="col-sm-5 noti-flex" id="otherskills-noti">
                                                            <span class="noti-flex-sp">
                                                                Other Skills
                                                            </span>
                                                    </div>
                                                    <div class="col-sm-5 noti-flex" id="seminars-noti">
                                                            <span class="noti-flex-sp">
                                                                Seminars
                                                            </span>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(\Auth::user()->resume()->first())
                                <div id="notificationFooter"><a href="{{ route('user_profile') }}">See All</a></div>
                                @else
                                <div id="notificationFooter"><a href="{{ route('resume_create') }}">See All</a></div>
                                @endif
                        </div>
                    </li>
                    @endif

                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('itp_applicant_profile') }}">IT Profile</a></li>
                            @if(\Auth::user()->resume()->first())
                            <li><a href="{{ route('user_profile') }}">See Resume</a></li>
                            @else
                            <li><a href="{{ route('resume_create') }}">Create Resume</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    </nav>

    <script>
        $(document).ready(function(){
                    // $("#notificationLink").click(function(){
                        $("#notificationLink").css({"color" : "red"});
                        $("#notificationContainer").fadeToggle(300);
                        $("#notification_count").fadeOut("slow");
                // return false;
                // });

                //Document Click hiding the popup 
                $(document).click(function(){
                    $("#notificationContainer").hide();
                    $("#notificationLink").css({"color" : "#777"});

                });

                //Popup on click
                $("#notificationContainer").click(function(){
                    return false;
                });

                $("#notificationLink").click(function(){
                    $("#notificationContainer").fadeToggle(300);
                    $("#notification_count").fadeOut("slow");
                    $("#notificationLink").css({"color" : "red"});

                return false;
                });


    @if(\Auth::check())
    var editor = $('#navigation').profileEditor({
        'editHandlers':{
            'basic-info-noti':function(obj){
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
                                    preConfirm: swalRequired,
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
                                    text: 'Month ended',
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
                                    text: 'Year ended',
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
                                        obj.setEditButtonEdit($('#educational-backgrounds .list-group-item:last-child').find('.pr-edit-btn'))
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
            'add-experiences':function(obj){
                swal(
                    'Wanna Add Work Experience?',
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
                            });

                            var steps = [
                                {
                                    title: 'Company',
                                    preConfirm: swalRequired,
                                },
                                {
                                    
                                    title: 'Position',
                                    preConfirm: swalRequired,
                                },
                                {
                                    title: 'Responsibilities',
                                    preConfirm: swalRequired,
                                    input: 'textarea',
                                },
                                {
                                    title: 'Month',
                                    text: 'Month you started',
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
                                    text: 'Year you started',
                                    input: 'select',
                                    inputOptions: {
                                        @foreach(year_array() as $key => $value)
                                        '{{$key}}':'{{$value}}',
                                        @endforeach
                                    },
                                    preConfirm: swalRequired
                                },
                                {
                                    title: 'Month',
                                    text: 'Month it ended',
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
                                    text: 'Year it ended',
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
                                var __data = {
                                    ex_company:result.value[0],
                                    ex_postion:result.value[1],
                                    ex_explanation:result.value[2],
                                    ex_from_month:result.value[3],
                                    ex_from_year:result.value[4],
                                    ex_to_month:result.value[5],
                                    ex_to_year:result.value[6],
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
                                    url:"{{route('j_c_r_p_experience')}}",
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    type: 'PATCH',
                                    data:__data,
                                    success:function(data){
                                        // 
                                        console.log(data)
                                        addWorkExperience(data.experience);
                                        obj.setEditButtonEdit($('#work-experiences .list-group-item:last-child').find('.pr-edit-btn'))
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
        },
        'submitHandlers':{}
    });
    @endif


        });
    </script>