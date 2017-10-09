<!DOCTYPE html>
<html>
<head>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <title></title>
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
    mysqli_stmt_bind_result($stmt, $num, $layout);
      while (mysqli_stmt_fetch($stmt)) {
          $result2['num'][] = $num;
          $result2['modulo'][] = (int)$layout;
      }
      mysqli_stmt_close($stmt);
    }
  $query = "select count(*) as num, sito from visita group by sito";
  $stmt = mysqli_prepare($conn, $query);
  $result3 = array('visitatori' => array(), 'sito' => array());
  if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $num, $layout);
      while (mysqli_stmt_fetch($stmt)) {
          $result3['visitatori'][] = $num;
          $result3['sito'][] = (int)$layout;
      }
      mysqli_stmt_close($stmt);
    }
?>
<body>
<div>
  <table>
  <tr><td>
  <div id="layout-usage" style="width:50%; height:400px;"></div>
  </td><td>
  <div id="module-usage" style="width:50%; height:400px;"></div>
  </td></tr>
  <tr><td colspan="2">
  <div id="visitors" style="width:100%; height:400px;"></div>
  </td></tr></table>

  <script>
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
  </script>
  <script>
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
  </script>
  <script>
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