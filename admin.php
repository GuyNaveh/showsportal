<?php

    include("header.php");

?>

<div style="margin-bottom: 0;" class="jumbotron h-auto w-100 d-inline-block">
    <div class="container p-2 mt-3">

    <div class="row justify-content-center align-items-center">
        <div class="btn-group mb-3 mx-auto" role="group">
            <button type="button" id="getQuery" class="btn btn-secondary getQuery" value="1">Users</button>
            <button type="button" class="btn btn-secondary getQuery" value="2">Locations</button>
            <button type="button" class="btn btn-secondary getQuery" value="3">Shows</button>
        </div>
    </div>

    <div id="data" class="row justify-content-center align-items-center" style="min-height: 62.5vh;"></div>

        <div class="row justify-content-center align-items-center">
            <button id="orderReport" type="button" class="btn btn-secondary w-25" data-toggle="modal" data-target="">Order Report</button>
            <button id="addPlace" type="button" class="btn btn-secondary w-25" data-toggle="modal" data-target="#exampleModal">Add Place</button>
            <button id="addShow" type="button" class="btn btn-secondary w-25" data-toggle="modal" data-target="">Add Show</button>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="addPlaceForm" method="post">
                    <div class="form-group col-md-8 offset-md-2 mt-1">
                        <label>Place name:</label>
                        <input type="text" class="form-control" id="placeName" name="placeName" placeholder="Enter place name">
                    </div>
                    
                    <div class="input-group col-md-8 offset-md-2 mt-2">
                    <label>City:</label>
                    </div>
                    <div class="input-group col-md-8 offset-md-2">
                    <select  class="custom-select" id="location" name="location" placeholder="Location">
					<option value="" disabled selected>Enter City</option>
						<?php
							include("connection.php");
							$sql = mysqli_query($link, "SELECT region_name FROM regions");
							$row = mysqli_num_rows($sql);

							while ($row = mysqli_fetch_array($sql)){
								echo "<option value='".$row['region_name']."'>".$row['region_name']."</option>" ;
							}

							?>
					</select>	

					</div>

                    <div class="form-group col-md-8 offset-md-2 mt-2">
                        <label for="street">Street:</label>
                        <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street">
                    </div>

                    <div class="input-group col-md-8 offset-md-2 mt-2">
                       <label>Parking:</label>
                    </div>
                    <div class="form-group col-md-8 offset-md-2">
                        <select id="parking" class="custom-select" name="parking">
                            <option value="" disabled selected>Parking</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>        
                    
                    <div class="input-group col-md-8 offset-md-2 mt-2">
                       <label>Public Transportation:</label>
                    </div>
                    <div class="form-group col-md-8 offset-md-2">
                        <select id="publictrans" class="custom-select" name="publictrans">
                            <option value="" disabled selected>Public Transportation</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>  

                    <div class="input-group col-md-8 offset-md-2 mt-2">
                       <label>Places to Hangout near:</label>
                    </div>
                    <div class="form-group col-md-8 offset-md-2">
                        <select id="hangout" class="custom-select" name="hangout">
                            <option value="" disabled selected>Hangout</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>  

                    <div class="input-group col-md-8 offset-md-2 mt-2">
                       <label>Restaurants near by:</label>
                    </div>
                    <div class="form-group col-md-8 offset-md-2">
                        <select id="restaurants" class="custom-select" name="restaurants">
                            <option value="" disabled selected>Restaurants</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>  

                    <div class="input-group col-md-8 offset-md-2 mt-2">
                       <label>Quality of the seats::</label>
                    </div>
                    <div class="form-group col-md-8 offset-md-2">
                        <select id="seatquality" class="custom-select" name="seatquality">
                            <option value="" disabled selected>Seat's Quality</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>  
    
                <div class="modal-footer">
                     <button id="insertPlacebtn" type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>
            </div>
        </div>

    </div>
</div>
                        </div>
 


<?php include("footer.php"); ?>