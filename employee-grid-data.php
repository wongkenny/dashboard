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
	0 => 'map_id', 
	1 => 'name',
	2 => 'address',
	3 => 'type',
	4 => 'openTime',
	5 => 'closeTime',
	6 => 'price'
);




// getting total number records without any search
$sql = "SELECT map_id";
$sql.=" FROM markers";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT map_id, name, address, type, openTime, closeTime, price ";
$sql.=" FROM markers WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( map_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR name LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR address LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR type LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR openTime LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR closeTime LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR price LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["map_id"];
	$nestedData[] = $row["name"];
	$nestedData[] = $row["address"];
	$nestedData[] = $row["type"];
	$nestedData[] = $row["openTime"];
	$nestedData[] = $row["closeTime"];
	$nestedData[] = $row["price"];
	
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