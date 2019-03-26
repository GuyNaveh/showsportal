<?php

session_start();

if (empty($_SESSION['admin']) AND ($_SERVER["REQUEST_URI"]) == "/admin.php") {

	header("location: http://showsportal.live/");

}

?>

<!doctype html>
	<html lang="en">
	
		<head>
		
			<meta charset="utf-8">
			
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">		
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato|Merriweather">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

			
			
			<title>ShowsPortal</title>
			
			<link rel="shortcut icon" type="image/png" href="/favicon.png"/>

			<style>
						
				body {

				position: relative;

				}

				#homeJumbotron {

				height: 75vh;
				background-image: url(show2.jpg);
				background-position: center center;
				margin-top: 40px;
				text-align: center;
				}

				#searchJumbotron {

				height: 90vh;
				background-image: url(searchshow2.jpg);
				background-position: center center;
				margin-top: 50px;
				text-align: center;
				}

				#searchForm {

					background-color:rgba(255,255,255, 0.92);
					border-radius: 10px;
					border: 1px solid black;
					

				}

				#appSummary {

				margin-top: 50px;
				margin-bottom: 60px;

				}

				.centerElement {
				display:block;
				text-align:center;
				}

				#searchButtonText {

				font-size: 200%;
				font-weight: bold;
				margin: 5px;

				}

				#searchButton {

				padding:5px 50px 5px 50px;
				border: 2px solid grey;
				}

				#headline {

				font-family: 'Lato', sans-serif;
				color: black;
				opacity: 30%;
				font-size: 4rem;
				font-weight: 600;

				}

				#emailError, #passwordError, #nameError, #cityError,#phoneError, #secondStep, #finish, #loginError, #parameters, #orderReport, #addPlace, #addShow {

				display: none;

				}

				.progressbarText {

				font-size: 10px;

				}

				#progressbar {
				margin-bottom: 30px;
				overflow: hidden;
				counter-reset: step;
				}

				#progressbar li {
				list-style-type: none;
				color: #616161;
				text-transform: uppercase;
				font-size: 9px;
				width: 33.33%;
				float: left;
				position: relative;
				}

				#progressbar li:before {
				content: counter(step);
				counter-increment: step;
				width: 25px;
				line-height: 25px;
				display: block;
				font-size: 18px;
				color: #333;
				background: white;
				border-radius: 50%;
				margin: 0 auto 5px auto;
				}

				#progressbar li:first-child:after {

				content: none;
				}

				#progressbar li.active:before,
				#progressbar li.active:after {
				background: #7368f2;
				color: white;
				}

			</style>



		</head>
		
		<body data-spy="scroll" data-target="#navbar" data-offset="60">
		
        <?php if (!$_SESSION) { ?>
			
			<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" role="navigation" id="navbar">
				<div class="container">
					<a class="navbar-brand" href="#">ShowsPortal</a>
					<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
						&#9776;
					</button>
					<div class="collapse navbar-collapse" id="exCollapsingNavbar">
						<ul class="nav navbar-nav">
							<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
							<li class="nav-item"><a href="search.php" class="nav-link">Search</a></li>
						</ul>
						<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
							<li>
								<a class="btn btn-outline-secondary mr-2" href="#" role="button" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-pen"></i> Sign Up</a>
							</li>
							<li class="dropdown order-1">
								<button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle"><i class="fas fa-sign-in-alt"></i> Login <span class="caret"></span></button>
								<ul class="dropdown-menu dropdown-menu-right mt-2">
								   <li class="px-3 py-2">
								   <div id="loginError" class="alert alert-danger m-2" role="alert"></div>
									   <form class="form" id="loginForm" role="form">
											<div class="form-group">
												<input id="loginEmail" placeholder="Email" class="form-control form-control-sm" type="email">
											</div>
											<div class="form-group">
												<input id="loginPassword" placeholder="Password" class="form-control form-control-sm" type="password">
											</div>
											<div class="form-group">
												<button type="button" id="login" class="btn btn-primary btn-block">Login</button>
											</div>
											<div class="form-group text-center">
												<small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
											</div>
										</form>
									</li>
								</ul>
							</li>
						</ul>

					</div>
				</div>
			</nav>
			
			
			<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 				<div class="modal-dialog modal-dialog-centered" role="document">
 					<div class="modal-content">
						<div class="container">
							<h1 class="text-center mt-5"><i class="fas fa-user-plus"></i> Sign Up</h1>
							<hr class="my-4">

							<div style="position: relative; left: -15px;">
								<ul class="text-center" id="progressbar">
									<li class="active">Account Setup</li>
									<li id="2ndstep">Personal Details</li>
									<li id="3rdstep">Finish</li>
								</ul>
							</div>

							<form id="signup" method="post">
				
								<div id="error"></div>

								<div id="firstStep">
						
									<div class="input-group col-md-8 offset-md-2 mt-4">
										<div class="input-group-prepend">
											<span class="input-group-text"><span style="color:gray;"><i class="fas fa-envelope fa-lg"></i></span></span>
										</div>
										<input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email" aria-describedby="email">
									</div>

									<div id="emailError" class="alert alert-danger m-2" role="alert"></div>
						
									<div class="input-group col-md-8 offset-md-2 mt-4">
										<div class="input-group-prepend">
											<span class="input-group-text"><span style="color:gray;"><i class="fas fa-key fa-lg"></i></span></span>
										</div>
										<input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="password">
									</div>

									<div id="passwordError" class="alert alert-danger m-2" role="alert"></div>
						
									<div class="row">
										<div class="col text-center mt-5 mb-5">
											<button type="button" id="next-1" class="btn btn-outline-primary">Next</button>
										</div>
									</div>
								</div>

								<div id="secondStep">
									<div class="input-group col-md-8 offset-md-2 mt-5">
										<div class="input-group-prepend">
											<span class="input-group-text"><span style="color:gray;"><i class="fas fa-user fa-lg"></i></span></span>
										</div>
											<input type="text" class="form-control"  id="firstname" name="firstname" placeholder="First name" aria-label="firstname" aria-describedby="firstname">
											<input type="text" class="form-control"  id="lastname" name="lastname" placeholder="Last name" aria-label="lastname" aria-describedby="lastname">
										</div>

										<div id="nameError" class="alert alert-danger m-2" role="alert"></div>
						
									<div class="input-group col-md-8 offset-md-2 mt-4">
										<div class="input-group-prepend">
											<span class="input-group-text"><span style="color:gray;"><i class="fas fa-city fa-lg"></i></span></span>
										</div>
										<select id="city" class="custom-select" name="city" placeholder="City" aria-label="City" aria-describedby="city">
											<option value='City' selected>City</option>
											<?php

												include("connection.php");
												$sql = mysqli_query($link, "SELECT region_name FROM regions");
												$row = mysqli_num_rows($sql);

												while ($row = mysqli_fetch_array($sql)){
													echo "<option value='". $row['region_name'] ."'>" .$row['region_name'] ."</option>" ;
													}

											?>
											</select>	

									</div>

									<div id="cityError" class="alert alert-danger m-2" role="alert"></div>
						
									<div class="input-group col-md-8 offset-md-2 mt-4">
										<div class="input-group-prepend">
											<span class="input-group-text"><span style="color:gray;"><i class="fas fa-phone fa-lg"></i></span></span>
										</div>
										<input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number" aria-label="Phone" aria-describedby="phone">
									</div>

									<div id="phoneError" class="alert alert-danger m-2" role="alert"></div>
						
									<div class="row">
										<div class="col text-center mt-5 mb-5">
											<button type="button" id="prev-1" class="btn btn-outline-primary">Previous</button>
											<button type="submit" id="submit" name="submit" class="btn btn-outline-primary">Submit</button>
										</div>
									</div>
								</div>
								</form>
								<div id="finish">
										<div class="col-md-6 offset-md-3 mt-5 text-center">
											<h2 style="position: relative; left: -12px;">Congratulation!</h2>

											<div class="centerElement col-md-12  py-3">
											
												<p><i class="far fa-check-circle fa-5x"></i></p>
											
											</div>

											<p>You have been successfully registered to ShowsPortal</p>

											<div class="row">
												<div class="col text-center mt-3 mb-5">
													<button type="button" id="finishbtn" class="btn btn-outline-primary" data-dismiss="modal">Finish</button>
												</div>
											</div>

										</div>
								</div>								
				
							
						</div>
    				</div>
  				</div>
			</div>

            <?php  } else { ?>
            
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" role="navigation" id="navbar">
				<div class="container">
					<a class="navbar-brand" href="#">ShowsPortal</a>
					<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
						&#9776;
					</button>
					<div class="collapse navbar-collapse" id="exCollapsingNavbar">
						<ul class="nav navbar-nav">
							<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
							<li class="nav-item"><a href="search.php" class="nav-link">Search</a></li>
                        </ul>
                        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-user fa-lg"></i> Hello <?php echo $_SESSION['name']; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<?php if ($_SESSION['admin']){ ?>
										<a class="dropdown-item" href="admin.php">Admin Settings</a>
										<div class="dropdown-divider"></div>
									<?php } ?>
                                 <a class="dropdown-item"  onclick="logoutck(); href="javascript:void(0);"><input id="logout" class="btn btn-outline-secondary dropdown-item" type="button" onclick="logoutck();" value="Logout"/></a>
                                </div>
                            </li>
                        </ul>
							


					</div>
				</div>
            </nav>
            
     <?php } ?>