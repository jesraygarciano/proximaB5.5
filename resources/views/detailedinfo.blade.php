@extends('layouts.app')

@section('content')
<style>
	
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#how-we-do{
 color:#ffffff;
}
#menuToggle{
	display: block;
    position: absolute;
    top: 35px;
    left: 50px;
    z-index: 5;
    -webkit-user-select: none;
    user-select: none;
}
#how-we-do h4{
    color: #fff;
	text-align:left !important;
}
#how-we-do .how-bg-img{
	background-image: url("http://gscampcebu.fullspeedtechnologies.com/assets/img/1.jpg");
	background-size: cover;
    background-repeat: no-repeat;
    padding: 277px 0; /*300 */
	filter:grayscale(100%);
}
#how-we-do:hover .how-bg-img{
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
	filter:grayscale(1%);
}
#how-we-do .how-contents{
	padding:40px 30px;
	background:#007b5e;
}

#how-we-do .how-contents ul{
	
}

#how-we-do .how-contents ul li{
	padding-left: 50px;
    position: relative;
	margin-bottom:26px;
}
#how-we-do .how-contents ul li:before{
	font-family: FontAwesome;
	content: "\f209";
    position: absolute;
    font-size: 39px;
    color: #ffffff;
    left: 0;
}

section .section-title{
	text-align:center;
	color:#007b5e;
	margin-bottom:35px; /*50px*/
	text-transform:uppercase;
}
#what-we-do{
	background:#ffffff;
}
#what-we-do .card{
	padding: 1rem!important;
	border: none;
	margin-bottom:1rem;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#what-we-do .card{
	-webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
	-moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
	box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}
#what-we-do .card:hover{
	-webkit-box-shadow: 13px 12px 14px -9px rgb(158, 158, 158);
	-moz-box-shadow: 13px 12px 14px -9px rgb(158, 158, 158);
	box-shadow: 13px 12px 14px -9px rgb(158, 158, 158);
}
#what-we-do .card .card-block{
	padding-left: 50px;
    position: relative;
}
#what-we-do .card .card-block a{
	color: #007b5e !important;
	font-weight:700;
	text-decoration:none;
}
#what-we-do .card .card-block a i{
	display:none;
}
#what-we-do .card:hover .card-block a i{
	display:inline-block;
	font-weight:700;
}
#what-we-do .card .card-block:before{
	font-family: FontAwesome;
    position: absolute;
    font-size: 39px;
    color: #007b5e;
    left: 0;
	-webkit-transition: -webkit-transform .2s ease-in-out;
    transition:transform .2s ease-in-out;
}
#what-we-do .card .block-1:before{
    content: "\f0e7";
}
#what-we-do .card .block-2:before{
    content: "\f0eb";
}
#what-we-do .card .block-3:before{
    content: "\f00c";
}
#what-we-do .card .block-4:before{
    content: "\f209";
}
#what-we-do .card .block-5:before{
    content: "\f0a1";
}
#what-we-do .card .block-6:before{
    content: "\f218";
}
#what-we-do .card:hover .card-block:before{
	-webkit-transform: rotate(360deg);
	transform: rotate(360deg);	
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
</style>
<!-- how we do section -->
<section id="how-we-do" class="p-0">
    <div class="container-fluid">
        <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 how-bg-img"></div>
			<nav role="navigation">
				<div id="menuToggle">
				  <input type="checkbox" />
		
				  <span></span>
				  <span></span>
				  <span></span>
				
				  <ul id="menu">
					<a href="{{ url('/') }}"><li>Home</li></a>
					<a href="{{ url('/contact') }}"><li>Contact</li></a>
					@if(!\Auth::check())
					<a href="{{ url('register') }}"><li>Register</li></a>
					<a href="{{ url('login') }}"><li>Login</li></a>
					@else
					<a href="{{ route('itp_applicant_profile') }}"><li>IT Profile</li></a>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><li>Logout</li></a>
					@endif
				  </ul>
				</div>
			  </nav>
            <div class="col-xs-12 col-sm-12 col-md-6 how-contents">
                <h4 class="section-title mb-2 h1">What we do</h4>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Having and managing a correct marketing strategy is crucial in a fast moving market.</p>
                <ul class="list-unstyled">
                    <li>Some quick example text to build on the card title and make the card's content.</li>
                    <li>Some quick example text to build on the card title and make the card's content.</li>
                    <li>Some quick example text to build on the card title and make the card's content.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
	<!-- ./how we do section -->
<!-- Services section -->
<section id="what-we-do">
	<div class="container-fluid">
		<h2 class="section-title mb-2 h1">What we do</h2>
		<p class="text-center text-muted h5">Having and managing a correct marketing strategy is crucial in a fast moving market.</p>
		<div class="row mt-5">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-1">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius error a culpa quis accusantium quos asperiores tempore minima dolores, sed. Assumenda officia exercitationem voluptatum aperiam nam amet consectetur, itaque, mollitia dolor ducimus adipisci fugit velit. Deleniti, ad, itaque. Nobis cum, sequi aliquid veniam iure nam obcaecati, aliquam voluptas possimus sint!</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-2">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum laudantium illum velit explicabo adipisci deserunt ab aliquid repellendus necessitatibus nostrum! Recusandae doloremque deserunt vero, iste velit facere, vitae sapiente nemo obcaecati odio, sit quae repellat autem magni aspernatur perspiciatis corporis nulla asperiores laborum cupiditate. Quisquam vero nihil omnis perspiciatis, magni.</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-3">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis asperiores et corporis consequatur, placeat fugiat quas aliquam nisi rerum provident quisquam ea dolorum nulla necessitatibus voluptates facilis labore commodi at vero sequi quibusdam totam qui doloremque sapiente. Quod perspiciatis odio nesciunt, sint, eligendi minus, totam iste recusandae rem dolorem non.</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-4">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur assumenda veniam eum consectetur tempora. Totam cupiditate eveniet odit reprehenderit optio, provident sit iure ducimus deserunt porro laborum illum exercitationem nam ex modi dolores, aliquam nihil. Nemo ea vitae aut iste ratione, distinctio nam fuga dolore maxime id, ad architecto.</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-5">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore nihil ea, sapiente, facilis necessitatibus culpa accusamus et iste delectus quia quisquam eos excepturi. Minus, quo rerum. Quibusdam iste repellendus, quaerat ullam. Deserunt nulla, inventore, porro ad dolore earum ullam repellendus ab sed et, dolorum! Ipsam non quasi doloremque mollitia architecto!</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div class="card">
					<div class="card-block block-6">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis molestias cupiditate alias modi odio quasi. Esse veritatis nulla nihil sunt, quo ipsam laborum, aspernatur, quasi quam consequatur ex, aliquid assumenda? Voluptatem vel quo a animi adipisci sequi quae quis doloribus, alias ipsum dolorum, iste suscipit, possimus eos esse in architecto!</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<!-- /Services section -->
@endsection