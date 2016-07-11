<?php 
include_once 'common/header.php'; 
include_once 'config/functions.php'; 
?>

      <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container1',
                    type: 'column',
                    marginRight: 130,
                    marginBottom: 25,
                       height: 350,
                    width:780

                },
                title: {
                    text: 'Registered Users',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: 'red'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                series: []
            }
           
            $.getJSON("data.php", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
               // options.series[1] = json[2];
               // options.series[2] = json[3];
                chart = new Highcharts.Chart(options);
            });
            
            $.get('stats.php?request='+'trip',function(data_trip,status_trip){
                console.log(data_trip);    
                if(status_trip){
                    $('h3.trip_number').text(data_trip);
                }
            });
            $.get('stats.php?request='+'reservation',function(data_reservation,status_reservation){
                console.log(data_reservation);    
                if(status_reservation){
                    $('h3.reservation_number').text(data_reservation);
                }
            });
            $.get('stats.php?request='+'hotel',function(data_hotel,status_hotel){
                console.log(data_hotel);    
                if(status_hotel){
                    $('h3.hotel_number').text(data_hotel);
                }
            });
            $.get('stats.php?request='+'user',function(data_user,status_user){
                console.log(data_user);    
                if(status_user){
                    $('h3.user_number').text(data_user);
                }
            });
            
            
            setInterval(function() {
                $.get('stats.php?request='+'trip',function(data_trip,status_trip){
                console.log(data_trip);    
                if(status_trip){
                    $('h3.trip_number').text(data_trip);
                }
            });
            $.get('stats.php?request='+'reservation',function(data_reservation,status_reservation){
                console.log(data_reservation);    
                if(status_reservation){
                    $('h3.reservation_number').text(data_reservation);
                }
            });
            $.get('stats.php?request='+'hotel',function(data_hotel,status_hotel){
                console.log(data_hotel);    
                if(status_hotel){
                    $('h3.hotel_number').text(data_hotel);
                }
            });
            $.get('stats.php?request='+'user',function(data_user,status_user){
                console.log(data_user);    
                if(status_user){
                    $('h3.user_number').text(data_user);
                }
            });
            }, 10000);
        });
        </script>



        <script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        $.getJSON("line_chart_data.php", function(json) {
        
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'line',
                    marginRight: 130,
                    marginBottom: 25,
                    height: 350,
                    width:1000
                },
                title: {
                    text: 'Users vs Reservations',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Amount'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                series: json
            });
        });
    
    });
    
});
        </script>
   
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
            <li class="active"><a href="dashboard.php"><i class="fa fa-bar-chart"></i> <span>Dashboard</span></a></li>
            <li><a href="manage_trip.php"><i class="fa fa-car"></i> <span>Manage Trips</span></a></li>
            <li><a href="manage_reservation.php"><i class="fa fa-file-text-o"></i> <span>Manage Reservations</span></a></li>
            <li><a href="manage_hotel.php"><i class="fa fa-hotel"></i> <span>Manage Hotels</span></a></li>
             <li><a href="manage_users.php"><i class="fa fa-users"></i> <span>Manage Users</span></a></li>
             
          </ul> 
        </section>
       
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control Panel</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
             <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 class='trip_number'></h3>
                  <p>Trips</p>
                </div>
                <div class="icon">
                  <i class="fa fa-briefcase"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3 class='reservation_number'><sup style="font-size: 20px"></sup></h3>
                  <p>Reservations</p>
                </div>
                <div class="icon">
                  <i class="fa fa-calendar-check-o"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3 class='hotel_number'></h3>
                  <p>Hotels</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3 class='user_number'></h3>
                  <p>Registered Users</p>
                </div>
                <div class="icon">
                 <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
<div id='map'>
<div id="container" style="min-width: 700px; height: 400px; margin: 0 auto; float:left;"></div>     

</div>  
<?php include_once 'common/footer.php'; ?>