<!DOCTYPE html>
<html>
<head>
    <title>Laravel ChartJS Chart Example - ItSolutionStuff.com</title>
</head>
    
<body>
    <h1>Laravel ChartJS Chart Example - ItSolutionStuff.com</h1>
    <canvas id="myChart" height="100px"></canvas>
</body>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
  
<script type="text/javascript">
  
 // var labels =  {{ Js::from($labels) }};
   //var users =  {{ Js::from($data) }};
  
      const data = {
        labels: labels,
        datasets: [{
          label: 'My First dataset',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: users,
        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );


 




    
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($percentageData); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    // add more colors as needed
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    // add more colors as needed
                ],
                borderWidth: 1
            }]
        },
        options: {
            // add any additional options as needed
        }
    });



</script>








</html>


