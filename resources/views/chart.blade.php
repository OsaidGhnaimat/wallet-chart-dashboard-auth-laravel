<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          @foreach ($monthly as $item)
            [ "{{ $item->month }}", {{ $item->total_amount }} ], 
        @endforeach
        ]);

        var options = {
          title: 'My monthly income'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      function drawChart2() {

var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  @foreach ($yearly as $item)
    [ "{{ $item->year }}", {{ $item->total_amount }} ], 
@endforeach
]);

var options = {
  title: 'My yearly income'
};

var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

chart.draw(data, options);
}

function drawChart3() {

var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  @foreach ($daily as $item)
    [ "{{ $item->day }}", {{ $item->total_amount }} ], 
@endforeach
]);

var options = {
  title: 'My daily income'
};

var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

chart.draw(data, options);
}


    </script>
  </head>
  <body>
      <div id="container-charts" style="width: 100%; height: 100vh; display:flex;  " >
            <div id="piechart" style="width: 500px; height: 500px; "></div>
            <div id="piechart2" style="width: 500px; height: 500px;"></div>
            <div id="piechart3" style="width: 500px; height: 500px; "></div>
      </div>

  </body>
</html>
