<?php
include_once 'config/database.php';
$con=dbconnect();   // call function 


switch ($_POST['purpose']){
	case 'add_trip':
			$name=$_POST['name'];
			$address=$_POST['address'];
			$image=$_POST['upload'];
			$lat=$_POST['lat'];
			$long=$_POST['longi'];
			$type=$_POST['type'];
			$openTime=$_POST['open'];
			$closeTime=$_POST['close'];
			$package=$_POST['inputPackages'];
			$weightage=$_POST['inputWeightage'];
			$price=$_POST['inputPrice'];
			$rating=$_POST['inputRating'];
			$region=$_POST['inputRegion'];
			$category=$_POST['inputCategory'];
			$sql = "INSERT into `markers`(`name`, `address`, `image`, `lat`, `long`, `type`, `openTime`, `closeTime`, `package`, `weightage`, `price`, `rating`, `region`, `category`) VALUES
			('$name','$address','$image','$lat','$long','$type','$openTime','$closeTime','$package','$weightage','$price','$rating','$region','$category')";
		if ($con->query($sql) === TRUE) {
    echo "Record saved";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}		
	break;
	
	
	case 'edit_trip':
	
	$id=$_POST['id'];
	$sql = "SELECT * FROM markers where map_id='$id' limit 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();  
} else {
}
	
	
	echo '<form class="form-horizontal">';
                echo '<div class="form-group">';
                  echo '<label for="inputEmail3" class="col-sm-2 control-label">Trip Name</label>';
                  echo '<div class="col-sm-10">';
                    echo '<input type="text" class="form-control" id="inputName" placeholder="name" value='.$row['name'].'>';
                  echo '</div>';
                echo '</div>';
              
                echo '<div class="form-group">';
                  echo '<label for="inputPassword3" class="col-sm-2 control-label">Trip Address</label>';
                  echo '<div class="col-sm-10">';
                 echo '<textarea class="form-control" rows="3" placeholder="address" id="inputAddress" value='.$row['address'].'></textarea>';
                  echo '</div>';
               echo ' </div>';
              
                echo '<div class="form-group">';
                  echo '<label for="inputUpload" class="col-sm-2 control-label">Image</label>';
                        echo '<input type="text" class="form-control" id="image_upload" value='.$row['image'].' placeholder="flower.jpg">';
                  echo '</div>';

                 echo '<div class="form-group">';
                  echo '<label for="inputEmail3" class="col-sm-2 control-label">Latitude</label>';
                  echo '<div class="col-sm-10">';
                    echo '<input type="text" class="form-control" id="inputLat" value='.$row['lat'].' placeholder="-20.502977">';
                  echo '</div>';
                echo '</div>';
              
                echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Longitude</label>';
                    echo '<div class="col-sm-10">';
                      echo '<input type="text" class="form-control" value='.$row['long'].' id="inputLong" placeholder="57.407974">';
                    echo '</div>';
               echo ' </div>';
              
              echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Type</label>';
                    echo '<div class="col-sm-10">';
                      echo '<input type="text" class="form-control" value='.$row['type'].' id="inputType" placeholder="Safari">';
                    echo '</div>';
                echo '</div>';
              
              echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Opening Time</label>';
                    echo '<div class="col-sm-10">';
                      echo '<input type="text" class="form-control" value='.$row['openTime'].' id="inputOpen" placeholder="09:00">';
                    echo '</div>';
                echo '</div>';
              
              echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Closing Time</label>';
                    echo '<div class="col-sm-10">';
                      echo '<input type="text" class="form-control" value='.$row['closeTime'].' id="inputClose" placeholder="18:00">';
                    echo '</div>';
                echo '</div>';
              
              
              echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Packages</label>';
                    echo '<div class="col-sm-10">';
                      echo '<input type="text" class="form-control" value='.$row['package'].' id="inputPackages" placeholder="transport + lunch">';
                    echo '</div>';
                echo '</div>';
              
              echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Weightage</label>';
                    echo '<div class="col-sm-10">';
                     echo ' <input type="text" class="form-control"  value='.$row['weightage'].'  id="inputWeightage" placeholder="Light">';
                    echo '</div>';
                echo '</div>';
              
              
              echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Price</label>';
                    echo '<div class="col-sm-10">';
                     echo ' <input type="text" class="form-control" value='.$row['price'].' id="inputPrice" placeholder="5000">';
                    echo '</div>';
                echo '</div>';
              
              
              echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Rating</label>';
                    echo '<div class="col-sm-10">';
                      echo '<input type="text" class="form-control"  value='.$row['rating'].' id="inputRating" placeholder="4">';
                    echo '</div>';
                echo '</div>';
              
              
              echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Region</label>';
                    echo '<div class="col-sm-10">';
                      echo '<input type="text" class="form-control" value='.$row['region'].' id="inputRegion" placeholder="Savanne">';
                    echo '</div>';
                echo '</div>';
              
               echo '<div class="form-group">';
                    echo '<label for="inputEmail3" class="col-sm-2 control-label">Category</label>';
                    echo '<div class="col-sm-10">';
                      echo '<input type="text" class="form-control" value='.$row['category'].' id="inputCategory" placeholder="Land">';
                    echo '</div>';
                echo '</div>';
              
            echo '</form>';
	
	break;
	
	

	
	
	
	
	
	
	
	
	
}



?>