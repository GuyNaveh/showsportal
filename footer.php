<?php  if (!$_SESSION['admin']) { ?>

<footer class="page-footer font-small cyan darken-3 bg-light pt-3">

					<div class="centerElement col-md-12 py-3">
						
						<div class="mb-5">

							<a class="ins-ic">
								<i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
							</a>
							
							<a class="fb-ic">
								<i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
							</a>
							
							<a class="tw-ic">
								<i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
							</a>

					  </div>
					  
					</div>

				  </div>

				</div>
			</footer>
			
			<?php } ?>		
			
			<footer>
			
			<div class="footer-copyright text-center py-3 bg-dark text-light w-auto">© 2019 Copyright: Guy Naveh & Dor Riger</div>

			</footer>
			
			<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
			<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
			<script src='//cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'></script>
			<script src="//cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
			

			<script type="text/javascript" src="functions.js"></script>

			<script>
			
			$(document).ready(function(){

				$("#parametersbtn").click(function(){
					$("#parameters").show();
					$("#constraints").hide();
				});

					$("#maxPrice").slider({
						tooltip: 'always'
					});
				
					$("#finishSearch").click(function(){
						$("#test").append($("#searchForm").serialize());
							
					});
				});
				$(document).ready(function(){
					$('.getQuery').click(function() {
						
							var val = $(this).val();

							$.ajax({
								url: "getdata.php",
								type: "POST",
								data: {
										data: val
								},                
								success: function (response) {

									$("#data").html(response);
									if (val == 1) {

									$("#orderReport").show();
									$("#addPlace").hide();
									$("#addShow").hide();

									} else if (val == 2) {

									$("#orderReport").hide();
									$("#addPlace").show();
									$("#addShow").hide();

									} else if (val == 3) {

									$("#orderReport").hide();
									$("#addPlace").hide();
									$("#addShow").show();

									} else {

									$("#orderReport").hide();
									$("#addPlace").hide();
									$("#addShow").hide();

									}
									
									}
						});



				});

				$(document).on('input', '#maxPrice', function() {
					$('#slider_value').html( $(this).val() );
				});

			});
			$(document).ready(function(){
					$('#insertPlacebtn').click(function() {
					$.ajax({
						type: 'post',
						url: 'insert_place.php',
						data: $('#addPlaceForm').serialize(),
						success: function () {
							
								}
						});
					});
				});

			</script>

		</body>

</html>