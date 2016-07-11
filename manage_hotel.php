<?php 
include_once 'config/functions.php'; 
session_start();
if(!isset($_SESSION['id'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GoFar | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.tableTools.css">
    <script type="text/javascript" language="javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/dataTables.tableTools.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/github.min.css">
    
    
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css">
         <script type="text/javascript" language="javascript" src="js/apps.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" language="javascript" src="js/dataTables.tableTools.js"></script>
        <script type="text/javascript" language="javascript" >
            $(document).ready(function() {
               var dataTable =  $('#employee-grid').DataTable( {
                dom: 'T<"clear">lfrtip',
                    "tableTools": {
                    "sSwfPath": "swf/copy_csv_xls_pdf.swf",
                        "sRowSelect": "multi",
                        "aButtons": [
                                "select_all", 
                                "select_none",
                            {
                                    "sExtends":    "collection",
                                    "sButtonText": "Export",
                                    "aButtons":    [ "csv", "xls", "pdf","print" ]
                            }
                        ]
                },
                processing: true,
                serverSide: true,
                ajax: "employee-grid-data2.php", // json datasource
                } );
            } );
        </script>
        
        
        
        
        
        
        <style>
            div.container {
    
                margin: 0 auto;
            }


        </style>
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


      <header class="main-header">

   
        <a href="index2.html" class="logo">

          <span class="logo-mini">GoFar</span>

          <span class="logo-lg">GoFar</span>
        </a>


        <nav class="navbar navbar-static-top" role="navigation">

     
         
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            
              

          
            
               <li class="dropdown user user-menu">
              
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                  <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              
                  <span class="hidden-xs"><?php echo fetch_user_full_name($_SESSION['id']);?></span>
                </a>
                <ul class="dropdown-menu">
                 
                  <li class="user-header">
                    <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo fetch_user_full_name($_SESSION['id']);?>
                      <small>Member since <?php echo fetch_user_registered_date($_SESSION['id']);?></small>
                    </p>
                  </li>
             
                  
                
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="login.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            
              
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar">

  
        <section class="sidebar">

      
          <div class="user-panel">
            <div class="pull-left image">
              <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo fetch_user_full_name($_SESSION['id']);?></p>
 
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="dashboard.php"><i class="fa fa-bar-chart"></i> <span>Dashboard</span></a></li>
            <li><a href="manage_trip.php"><i class="fa fa-car"></i> <span>Manage Trips</span></a></li>
            <li><a href="manage_reservation.php"><i class="fa fa-file-text-o"></i> <span>Manage Reservations</span></a></li>
            <li class="active"><a href="manage_hotel.php"><i class="fa fa-hotel"></i> <span>Manage Hotels</span></a></li>
             <li><a href="manage_users.php"><i class="fa fa-users"></i> <span>Manage Users</span></a></li>
             
          </ul> 
        </section>
       
      </aside>

        
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage
            <small>Hotels</small>
          </h1>

        </section>

     

  <!-- Modal Add -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Hotel</h4>
        </div>
        <div class="modal-body">
      
          <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hotel Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="name">
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Hotel Description</label>
                  <div class="col-sm-10">
                 <textarea class="form-control" rows="3" placeholder="description" id="inputDesc"></textarea>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputUpload" class="col-sm-2 control-label">Image</label>
                       <input type="file" id="upload_img">
                  </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Latitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLat" placeholder="-20.502977">
                  </div>
                </div>
              
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Longitude</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputLong" placeholder="57.407974">
                    </div>
                </div>
              
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Room Type</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputType" placeholder="type">
                    </div>
                </div>
              
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Hotel Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPrice" placeholder="1200">
                    </div>
                </div>
              
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Hotel Location</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputReg" placeholder="18:00">
                    </div>
                </div>
              
              
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Rating</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputRate" placeholder="3">
                    </div>
                </div>
                      
              
            </form>
               
   
          
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" id="proceed_trip" >Add</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- modal Add end -->


 <!-- Modal Edit-->
  <div class="modal fade" id="myModal_edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Hotel</h4>
        </div>
        <div class="modal-body">
          <p>Enter the ID of the hotel to be edited:</p>
           <div id='controls'><input type='text'> <button type="button" class="submit_edit">Search</button></div>
           <div id='hidden' style='display:none;'>
            <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hotel Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="name">
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Hotel Description</label>
                  <div class="col-sm-10">
                 <textarea class="form-control" rows="3" placeholder="description" id="inputDesc"></textarea>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputUpload" class="col-sm-2 control-label">Image</label>
                       <input type="file" id="upload_img">
                  </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Latitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLat" placeholder="-20.502977">
                  </div>
                </div>
              
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Longitude</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputLong" placeholder="57.407974">
                    </div>
                </div>
              
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Room Type</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputType" placeholder="type">
                    </div>
                </div>
              
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Hotel Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPrice" placeholder="1200">
                    </div>
                </div>
              
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Hotel Location</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputReg" placeholder="18:00">
                    </div>
                </div>
              
              
              <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Rating</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputRate" placeholder="3">
                    </div>
                </div>
                      
              
            </form>
               
           </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" id="submit_edit">Edit</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- modal Edit end -->

 <!-- Modal Delete-->
  <div class="modal fade" id="myModal_delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Hotel</h4>
        </div>
        <div class="modal-body" style="text-align:center;">
          <p>Enter the ID of the Hotel to be deleted:</p>
           <input type='text'>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" id="btn_delete">Delete</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- modal Delete end -->





        <!-- Main content -->
        <section class="content">
             <div class="row">
                

        <div class="container">
            <table id="employee-grid"  class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Hotel ID</td>
                        <td>Hotel Description</td>
                        <td>Hotel Price</td>
                        <td>Hotel Name</td>
                        <td>Hotel Region</td>
                        <td>Room Type</td>
                        <td>Hotel Rating</td>
                    </tr>
                </thead>    
            </table>
        </div> 


            </div><!-- /.row -->


  </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer"  style='text-align:center;'>
        <!-- To the right -->
        <div class="pull-right hidden-xs">

        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">GoFar</a></strong>
      </footer>
    </div>
    <!-- REQUIRED JS SCRIPTS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/dist/js/app.min.js"></script>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

    $("#myBtn_edit").click(function(){
        $("#myModal_edit").modal();
    });

  $("#myBtn_delete").click(function(){
        $("#myModal_delete").modal();
    });


});
</script>

  </body>
</html>














