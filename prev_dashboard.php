<?php 
include_once 'common/header.php'; 
?> 
<script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container1',
                    type: 'column',
                    marginRight: 130,
                    marginBottom: 25,
                     height: 300,
                    width:700

                },
                title: {
                    text: 'Project Requests',
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
                        text: 'Requests'
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
                series: []
            }
           
            $.getJSON("data.php", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                options.series[2] = json[3];
                chart = new Highcharts.Chart(options);
            });
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
                    height: 300,
                    width:700
                },
                title: {
                    text: 'Revenue vs. Overhead',
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


           <script src="assets/js/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>

    <div class="page-content">

        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                
				<div class="cell size-x200" id="cell-sidebar" style="background-color: white; height: 100%; border-right: 2px solid rgb(234, 234, 234);">
                    <p class='sidebar-title'>MAIN NAVIGATION</p>
					<ul class="sidebar">
                        <li class="active"><a href="#">
                            <span class="mif-chart-bars icon"></span>
                            <span class="title">Dashboard</span>
                        </a></li>
                        <li><a href="manage_trip.php">
                            <span class="mif-automobile icon"></span>
                            <span class="title">Manage Trips</span>

                        </a></li>
                        <li><a href="#">
                            <span class="mif-file-text icon"></span>
                            <span class="title">Manage Reservations</span>

                        </a></li>
                        <li><a href="#">
                            <span class="mif-users icon"></span>
                            <span class="title">Manage Users</span>
             
                        </a></li>
                        
                    </ul>
                </div>
				
                <div class="cell auto-size padding20" id="cell-content" style='background-color: #ECF0F5;'>

            <section class='content-header'><h1>Dashboard <p>Control panel</p></h1></section>

                <div class="row cells3">
                    <div class="col3-row" style="width:31%; background:#00C0EF; margin-right:10px; margin-left:0px;">
						<div class='inner'>
						<div class='stats_icon'><span class="mif-suitcase mif-4x"></div>
						<h3>150<h3>
						<h6>Trips</h6>
						</div>
						<div class='more_1'>
						<a href='#'class='more_info'>more info<span class="mif-chevron-right mif-lg"></a>
						</div>
					</div>
                   <div class="col3-row" style="width:31%; background:#00A65A; margin-right:10px; margin-left:10px;   margin: auto;">
						<div class='inner'>
						<div class='stats_icon'><span class="mif-event-available mif-4x"></div>
						<h3>621<h3>
						<h6>Reservations</h6>
						</div>
						<div class='more_2'>
						<a href='#'class='more_info'>more info<span class="mif-chevron-right mif-lg"></span></a>
						</div>
					</div>
                    <div class="col3-row" style="width:31%; background:#F39C12; margin-right:0px; margin-left:10px;">
						<div class='inner'>
							<div class='stats_icon'><span class="mif-user-plus mif-4x"></div>
						<h3>725<h3>
						<h6>Users</h6>
						
						</div>
						<div class='more_3'>
						<a href='#'class='more_info'>more info<span class="mif-chevron-right mif-lg"></a>
						</div>
					</div>
                </div>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto; margin-top: 50px; float:left;"></div>
<div id="container1" style="min-width: 400px; height: 400px; float:right; margin-top: 50px;"></div>

                </div>

            </div>
            <div class='footer' style='background-color:red; width:100%; height:100px;'> this is a text </div>
        </div>

        

  
    </div>

</body>


</html>