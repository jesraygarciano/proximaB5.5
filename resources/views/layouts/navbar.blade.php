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
                                            <div class="progress-bar progress-bar-striped active profile-progress" role="progressbar" style="width: {{\Auth::user()->profileProgress()}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="val">{{\Auth::user()->profileProgress()}}</span>% profile complete</div>
                                        </div>

                                        <div class="text-primary"><center>The more information you provide for us, the higher is your chance to be qualified.</center></div>
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
        $(document).ajaxSuccess(function(ev,req) {
            if(req.responseJSON.profile_progess){
                console.log('profile updated')
                $('.profile-progress').css('width',req.responseJSON.profile_progess+'%');
                $('.profile-progress .val').html(req.responseJSON.profile_progess);
            }
        });
        $('.info-tip .header .info-close').click(function(){
            $(this).closest('.info-tip').remove();
        });
    });

    
    $(document).ready(function(){
        // $("#notificationLink").click(function(){
            $("#notificationLink").css({"color" : "red"});
            $("#notificationContainer").fadeToggle(300);
            $("#notification_count").fadeOut("slow");
            setNotificationBackdrop();
        // return false;
        // });

        //Document Click hiding the popup 
        // $(document).click(function(){
        //     $("#notificationContainer").hide();
        //     $("#notificationLink").css({"color" : "#777"});
        // });

        //Popup on click
        // $("#notificationContainer").click(function(ev){
        //     return false;
        // });

        $("#notificationLink").click(function(){

            if(!$('.notification-backdrop').length){
                $("#notificationContainer").fadeToggle(300);
                $("#notification_count").fadeOut("slow");
                $("#notificationLink").css({"color" : "red"});
                setNotificationBackdrop();
            }

        // return false;
    });

    function setNotificationBackdrop(){
        var div = document.createElement('div');
        $(div).addClass('notification-backdrop');
        $(div).css({'position':'fixed', 'z-index':'1','width':'100%','height':'100%', top:'0px', left:'0px'});
        $('body').append(div);
        
        $(div).click(function(){
            $("#notificationContainer").hide();
            $("#notificationLink").css({"color" : "#777"});
            $(div).remove();
        });
    }

        });
    </script>