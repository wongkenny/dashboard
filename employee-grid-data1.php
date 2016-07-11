<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip planner";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'reservation_id', 
	1 => 'user_id',
	2 => 'map_id',
	3 => 'hotel_id',
	4 => 'trip_plan_name',
	5 => 'start_date',
	6 => 'end_date'
);




// getting total number records without any search
$sql = "SELECT reservation_id";
$sql.=" FROM reservation";
$query=mysqli_query($conn, $sql) or die("employee-grid-data1.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT reservation_id, user_id, map_id, hotel_id, trip_plan_name, start_date, end_date ";
$sql.=" FROM reservation WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( reservation_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR user_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR map_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR hotel_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR trip_plan_name LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR start_date LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR end_date LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data1.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data1.php: get employees");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["reservation_id"];
	$nestedData[] = $row["user_id"];
	$nestedData[] = $row["map_id"];
	$nestedData[] = $row["hotel_id"];
	$nestedData[] = $row["trip_plan_name"];
	$nestedData[] = $row["start_date"];
	$nestedData[] = $row["end_date"];
	
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>