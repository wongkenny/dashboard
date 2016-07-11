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
	0 => 'registration_id', 
	1 => 'fullname',
	2 => 'username',
	3 => 'mobile',
	4 => 'email',
	5 => 'gender',
	6 => 'registered_date'
);




// getting total number records without any search
$sql = "SELECT registration_id";
$sql.=" FROM registration";
$query=mysqli_query($conn, $sql) or die("employee-grid-data3.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT registration_id, fullname,username,mobile,email,gender,registered_date ";
$sql.=" FROM registration WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( registration_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR fullname LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR username LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR mobile LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR gender LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR registered_date LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data3.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data2.php: get employees");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["registration_id"];
	$nestedData[] = $row["fullname"];
	$nestedData[] = $row["username"];
	$nestedData[] = $row["mobile"];
	$nestedData[] = $row["email"];
	$nestedData[] = $row["gender"];
	$nestedData[] = $row["registered_date"];
	
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