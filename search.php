<?php include("header.php"); ?>

    <div  class="jumbotron h-auto w-100 d-inline-block" id="searchJumbotron">
        <div class="container">

            <div  id="searchForm" class="input-group col-md-6 offset-md-3 my-2 pb-4 pt-3 centerElement ">

                <h2>Search Show</h2>
            
                <div id="constraints">
                <h4>Constraints</h4>
                    <label class="mt-3">Show type:</label>
                        <div class="row">
                            <div class="input-group col-md-8 offset-md-2">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><span style="color:gray;"><i class="fas fa-question fa-lg"></i></span></span>
                            </div>
                                <select id="showType" class="custom-select" name="showType" placeholder="Show Type" aria-label="showType" aria-describedby="showType">
                                <option value="" disabled selected>Type</option>
                                    <?php

                                        include("connection.php");

                                        $sql = mysqli_query($link, "SELECT type_id as id, type_name as description FROM show_type");
                                        $row = mysqli_num_rows($sql);

                                            while ($row = mysqli_fetch_array($sql)){
                                                echo "<option value='". $row['id'] ."'>" .$row['description'] ."</option>" ;
                                            }
                                        ?>
                                    </select>

                            </div>
                        </div>

                        <label class="mt-3">Location:</label>
                        <div class="row">
                            <div class="input-group col-md-8 offset-md-2">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><span style="color:gray;"><i class="fas fa-city fa-lg"></i></span></span>
                            </div>
                                <select id="location" class="custom-select" name="location" placeholder="Location" aria-label="location" aria-describedby="location">
                                <option value="" disabled selected>Location</option>
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
                        </div>

                        <label class="mt-3">Date:</label>
                    <div class="row">

                        <div class="input-group col-md-10 offset-md-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span style="color:gray;"><i class="fa fa-calendar fa-lg"></i></span></span>
                                </div>
                                <input class="form-control" data-provide="datepicker" placeholder="MM/DD/YY">
                                <div class="input-group-prepend">
                                        <span class="input-group-text"><span style="color:gray;">to</span></span>
                                </div>
                                <input class="form-control" data-provide="datepicker" placeholder="MM/DD/YY">
                        </div>

                    </div>

                    <label class="mt-3">Max Price:</label>
                    <div class="row">

                        <div class="col-md-8 offset-md-2">
                        <?php

                            include("connection.php");
                            $result = mysqli_query($link, "SELECT MAX(price) FROM shows");
                            $row =mysqli_fetch_array($result,MYSQLI_NUM);

                        ?>
                            <input id="maxPrice" type="range" class="custom-range" min="0" max="<?php echo $row[0];?>" step="1" value="<?php echo $row[0];?>">
                        </div>
                        <div class="col-md-1 float-left"><span id="slider_value"><?php echo $row[0];?></span></div>
                    </div>            
                
                    <div class="row">
                        <div class="col text-center my-3">
                            <button type="button" id="parametersbtn" class="btn btn-primary">Continue to Parameters</button>
                        </div>
                    </div>
                </div>

                <div id="parameters">
                    <h4>Parameters</h4>
                    <label class="mt-3">Parking:</label>
                        <div class="row">
                            
                            <div class="col text-center mt-1 mb-2">

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="parking1" name="parking" class="custom-control-input">
                                    <label class="custom-control-label" for="parking1">1</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="parking2" name="parking" class="custom-control-input">
                                    <label class="custom-control-label" for="parking2">2</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="parking3" name="parking" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="parking3">3</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4" name="parking" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline4">4</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline5" name="parking" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline5">5</label>
                                </div>

                            </div>
    
                    </div>
                    <label class="mt-3">Public Transportation:</label>
                        <div class="row">
                            
                            <div class="col text-center my-1">

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="publicTransport1" name="publicTransport" class="custom-control-input">
                                    <label class="custom-control-label" for="publicTransport1">1</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="publicTransport2" name="publicTransport" class="custom-control-input">
                                    <label class="custom-control-label" for="publicTransport2">2</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="publicTransport3" name="publicTransport" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="publicTransport3">3</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="publicTransport4" name="publicTransport" class="custom-control-input">
                                    <label class="custom-control-label" for="publicTransport4">4</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="publicTransport5" name="publicTransport" class="custom-control-input">
                                    <label class="custom-control-label" for="publicTransport5">5</label>
                                </div>
                                
                            </div>
    
                    </div>
                    <label class="mt-3">Places to Hangout near:</label>
                        <div class="row">
                            
                            <div class="col text-center my-1">

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="hangout1" name="hangout" class="custom-control-input">
                                    <label class="custom-control-label" for="hangout1">1</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="hangout2" name="hangout" class="custom-control-input">
                                    <label class="custom-control-label" for="hangout2">2</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="hangout3" name="hangout" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="hangout3">3</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="hangout4" name="hangout" class="custom-control-input">
                                    <label class="custom-control-label" for="hangout4">4</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="hangout5" name="hangout" class="custom-control-input">
                                    <label class="custom-control-label" for="hangout5">5</label>
                                </div>
                                
                            </div>
    
                    </div>
                    <label class="mt-3">Restaurants near by:</label>
                        <div class="row">
                            
                            <div class="col text-center my-1">

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="restaurants1" name="restaurants" class="custom-control-input">
                                    <label class="custom-control-label" for="restaurants1">1</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="restaurants2" name="restaurants" class="custom-control-input">
                                    <label class="custom-control-label" for="restaurants2">2</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="restaurants3" name="restaurants" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="restaurants3">3</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="restaurants4" name="restaurants" class="custom-control-input">
                                    <label class="custom-control-label" for="restaurants4">4</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="restaurants5" name="restaurants" class="custom-control-input">
                                    <label class="custom-control-label" for="restaurants5">5</label>
                                </div>
                                
                            </div>
    
                    </div>
                    <label class="mt-3">Quality of the seats:</label>
                        <div class="row">
                            
                            <div class="col text-center mt-1 mb-3">

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="seatQuality1" name="seatQuality" class="custom-control-input">
                                    <label class="custom-control-label" for="seatQuality1">1</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="seatQuality2" name="seatQuality" class="custom-control-input">
                                    <label class="custom-control-label" for="seatQuality2">2</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="seatQuality3" name="seatQuality" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="seatQuality3">3</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="seatQuality4" name="seatQuality" class="custom-control-input">
                                    <label class="custom-control-label" for="seatQuality4">4</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="seatQuality5" name="seatQuality" class="custom-control-input">
                                    <label class="custom-control-label" for="seatQuality5">5</label>
                                </div>
                                
                            </div>
    
                    </div>

                    <div class="row">
                        <div class="col text-center my-3">
                            <button type="click" id="finishSearch" class="btn btn-primary">Search</button>
                            <p id="test"></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

<?php include("footer.php"); ?>