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
	0 => 'hotel_id', 
	1 => 'hotel_desc',
	2 => 'hotel_price',
	3 => 'hotel_name',
	4 => 'hotel_region',
	5 => 'room_type',
	6 => 'hotel_rating'
);




// getting total number records without any search
$sql = "SELECT hotel_id";
$sql.=" FROM hotel";
$query=mysqli_query($conn, $sql) or die("employee-grid-data2.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT hotel_id, hotel_desc,hotel_price,hotel_name,hotel_region,room_type,hotel_rating ";
$sql.=" FROM hotel WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( hotel_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR hotel_desc LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR hotel_price LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR hotel_name LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR hotel_region LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR room_type LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR hotel_rating LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data2.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data2.php: get employees");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["hotel_id"];
	$nestedData[] = $row["hotel_desc"];
	$nestedData[] = $row["hotel_price"];
	$nestedData[] = $row["hotel_name"];
	$nestedData[] = $row["hotel_region"];
	$nestedData[] = $row["room_type"];
	$nestedData[] = $row["hotel_rating"];
	
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