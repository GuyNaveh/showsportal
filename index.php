<?php include("header.php"); ?>
			
			<div class="jumbotron text-dark"  id="homeJumbotron">
			
				<h1 id="headline"><span style="font-size: 6rem; margin-right:3px;">S</span>hows <span style="font-size: 6rem;">P</span>ortal</h1>
				<p>The best shows and just for you!</p>
				<?php if (!$_SESSION) { ?>
				<hr class="my-4">
				<p>Want to use it? Join us!</p>

				<a class="btn btn-dark btn-lg" href="#" role="button" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-pen"></i> Sign Up</a>
				<?php } else { ?>

				<a href="#" class="btn btn-lg btn-dark h2 mt-3" id="searchButton"><i style="margin: 5px;" class="fas fa-search fa-2x"></i><span id="searchButtonText">&nbsp;Search</span></a>
				<?php } ?>
			</div>

			<?php if (!$_SESSION) { ?>
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<a href="#" class="btn btn-lg btn-dark h2" id="searchButton"><i style="margin: 5px;" class="fas fa-search fa-2x"></i><span id="searchButtonText">&nbsp;Search</span></a>
					</div>
				</div>
			</div>
			
			<div class="container" id="appSummary">
				<div class="raw text-center">
					  <div class="page-header">
						<h1 class="font-weight-bold">Why This Site Is Awesome</h1>      
					  </div>
					<p class="lead">Summary of the site and why its awesome</p>
				
				</div>
			</div>
			
			<div class="container" style="margin-bottom:100px;">
				<div class="card-deck">
					<div class="card">
						<img class="card-img-top" src="card1.jpg" alt="Card image cap">
						<div class="card-body">
							
							<h5 class="card-title"><i class="fas fa-guitar"></i> Best Shows</h5>
							<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						</div>
					</div>
					<div class="card">
						<img class="card-img-top" src="card2.jpg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><i class="fas fa-map-marker-alt"></i> Best Places</h5>
							<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
						</div>
					</div>
					<div class="card">
						<img class="card-img-top" src="card3.jpg" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><i class="fas fa-users"></i> For Everyone</h5>
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<footer class="page-footer font-small cyan darken-3 bg-light" id="contact">

				<div class="container py-4">

				  <div class="row">
				  
					  <div class="page-header py-4">
						<h2>Contact Us:</h2>      
					  </div>
					
					    <div class="col-md-12" style="font-size:120%">
							<p><i class="fas fa-map-marked-alt fa-lg"></i> Mivtsa Kadesh St 38, Tel-Aviv, Israel</p>
							<p><i class="fas fa-envelope fa-lg"></i> email@example.com</p>
							<p><i class="fas fa-phone fa-lg"></i> +972 03 888 8888</p>
						</div>
						
			</footer>

			<?php include("footer.php"); ?>