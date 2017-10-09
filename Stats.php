<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="js/script.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
</head>
<?php
  $conn=mysqli_connect('localhost','root','','sito_web') or die("Could not connect : " . mysqli_error($connessione)); 
  $query = "select count(*) as pAmmount, layout as pDate from sito_web group by layout";
  $stmt = mysqli_prepare($conn, $query);
  $result = array('num' => array(), 'layout' => array());
  if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $num, $layout);
      while (mysqli_stmt_fetch($stmt)) {
          $result['num'][] = $num;
          $result['layout'][] = (int)$layout;
      }
      mysqli_stmt_close($stmt);
    }
  $query = "select count(*) as num, id_modulo from componente group by id_modulo";
  $stmt = mysqli_prepare($conn, $query);
  $result2 = array('num' => array(), 'modulo' => array());
  if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $num2, $modulo);
      while (mysqli_stmt_fetch($stmt)) {
          $result2['num'][] = $num2;
          $result2['modulo'][] = (int)$modulo;
      }
      mysqli_stmt_close($stmt);
    }
  if(isset($_GET['from']) && isset($_GET['to'])){
  	if($_GET['from']=="" || $_GET['to']==""){
  		$query = "select count(*) as num, sito from visita group by sito";
  	}
  	else{
  		$query = "select count(*) as num, sito from visita where data >'".$_GET['from']."' AND data < '".$_GET['to']."' group by sito";
	}
  }
  else{
  	$query = "select count(*) as num, sito from visita group by sito";
  }
  $stmt = mysqli_prepare($conn, $query);
  $result3 = array('visitatori' => array(), 'sito' => array());
  if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $num3, $sito);
      while (mysqli_stmt_fetch($stmt)) {
          $result3['visitatori'][] = $num3;
          $result3['sito'][] = (int)$sito;
      }
      mysqli_stmt_close($stmt);
    }
?>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <a href="Home.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="Visualizza.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>VISUALIZZA</p>
  </a>
  <a href="Riepilogo.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-users w3-xxlarge"></i>
    <p>RIEPILOGO</p>
  </a>
  <a href="Aggiungi.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-plus w3-xxlarge"></i>
    <p>AGGIUNGI</p>
  </a>
  <a href="Assegna.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-laptop w3-xxlarge"></i>
    <p>ASSEGNA SITO</p>
  </a>
  <a href="Stats.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-bar-chart-o w3-xxlarge"></i>
    <p>STATS</p>
  </a>
  <a href="Logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-times w3-xxlarge"></i>
    <p>LOG OUT</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">TEMPLATES</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
    <a href="login.html" class="w3-bar-item w3-button" style="width:25% !important">LOG IN</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Administrator</span> Area</h1>
    <p>manage all the websites</p>
    <!--<img src="img/Bonzzu-Webworld_prev.jpg" alt="boy" class="w3-image" width="992" height="701">-->
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-32" id="about">
    <hr style="width:200px" class="w3-opacity">
      <h3>Visualizza le statistiche su...</h3>

          <div class="tab" width='100%'>
            <button class="tablinks" onclick="openTable(event, 'layout-usage')">Layout</button>
            <button class="tablinks" onclick="openTable(event, 'module-usage')">Moduli</button>
            <button class="tablinks" onclick="openTable(event, 'visitor')">Visitatori</button>
          </div>

          <div id="layout-usage" class="tabcontent" style="width:100%; height:600px;"></div>
          <div id="module-usage" class="tabcontent" style="width:100%; height:600px;"></div>
          <div id="visitor" class="tabcontent" style="width:100%; height:600px;">
          	<a href="#advancedSearch" data-toggle="modal" class="btn btn-warning">Advanced Search</a>
          	<div id="visitors" style="width:100%; height:600px;"></div>
          </div>

          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="advancedSearch" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Seleziona Date</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" name="Advanced" action="#" method="GET">
                                            <div class="form-group">
                                                <label for="from">From</label>
                                                <input type="Date" name="from" class="form-control" maxlength="10" id="from" placeholder="P.IVA">
                                            </div>
                                            <div class="form-group">
                                                <label for="to">To</label>
                                                <input type="Date" name="to" maxlength="15" placeholder="Nome" class="form-control" id="to">
                                            </div>
                                            <button type="submit" class="btn btn-default">Filtra</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
          
  <hr>
  
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>
<script>
function openTable(evt, tableName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    document.getElementById(tableName).style.display = "block";
    evt.currentTarget.className += " active";
}

$(document).ready( function() {

  $.ajax({
            type: "GET",
            url: "check.php",
            data: {},
            success: function(data){
              console.log(data);
              if(data==0){
                  window.location.replace("index.html");
              }
              else{
                if (!data=="A"){
                  window.location.replace("index.html");
                }    
              }
          }
  });
})

    $(function () { 
      var myChart = Highcharts.chart('layout-usage', {
          chart: {
              backgroundColor: {
                  radialGradient: [0, 0, 500, 500],
                  stops: [
                      [0, 'rgb(255, 255, 255)'],
                      [1, 'rgb(255, 250, 250)']
                      ]
              },
              borderWidth: 0,
              plotBackgroundColor: 'rgba(255, 255, 255, .9)',
              plotShadow: true,
              plotBorderWidth: 1,
              type: 'column'
          },
          title: {
              text: 'Layout Usage'
          },
          xAxis: {
              categories: <?php echo json_encode($result['layout'])?>
          },
          yAxis: {
              title: {
                  text: '# of websites'
              }
          },
          series: [{
              name: 'Layout',
              data: <?php echo json_encode($result['num']) ?>,
              color: '#FFDDAA'
          }]
      });
  });

    $(function () { 
      var myChart = Highcharts.chart('module-usage', {
          chart: {
              backgroundColor: {
                  radialGradient: { cx: 0.5, cy: 0.5, r: 0.5 },
                  stops: [
                      [0, 'rgb(255, 255, 255)'],
                      [1, 'rgb(250, 250, 255)']
                      ]
              },
              borderWidth: 0,
              plotBackgroundColor: 'rgba(255, 255, 255, .9)',
              plotShadow: true,
              plotBorderWidth: 1,
              type: 'bar'
          },
          title: {
              text: 'Module Usage'
          },
          xAxis: {
              categories: <?php echo json_encode($result2['modulo'])?>
          },
          yAxis: {
              title: {
                  text: '# of layouts'
              }
          },
          series: [{
              name: 'Module',
              data: <?php echo json_encode($result2['num']) ?>,
              color: '#DDDDFF'
          }]

      });
  });

    $(function () { 
      var myChart = Highcharts.chart('visitors', {
          chart: {
              type: 'line'
          },
          title: {
              text: 'Website Visitors'
          },
          xAxis: {
              categories: <?php echo json_encode($result3['sito'])?>
          },
          yAxis: {
              title: {
                  text: '# of visitors'
              }
          },
          series: [{
              name: 'Website',
              data: <?php echo json_encode($result3['visitatori']) ?>
          }]

      });
  });
</script>
</body>
</html>