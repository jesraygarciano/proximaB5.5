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

                                        <div>
                                            <h5>Kindly fill-up the following categories:</h5>
                                            <ul>
                                                <li>Basic Info</li>
                                                <li>Education</li>
                                                <li>Accomplishments</li>
                                                <li>Experiences</li>
                                                <li>Summary of Skills</li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="notificationFooter"><a href="#">See All</a></div>
                        </div>
                    </li>                
                    @endif
                    
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
                        });
                    </script>

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