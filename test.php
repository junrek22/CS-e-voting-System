<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Chart Update</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart" width="400" height="200"></canvas>

    <script>
        // Initial data
        var initialData = [10, 20, 30, 40, 50];

        // Create the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
                datasets: [{
                    label: 'Dynamic Data',
                    data: initialData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Update data at regular intervals
        setInterval(function() {
            // Simulate new data
            var newData = initialData.map(function(value) {
                return value + Math.random() * 20;
            });

            // Update the chart's data
            myChart.data.datasets[0].data = newData;

            // Redraw the chart
            myChart.update();
        }, 2000); // Update every 2000 milliseconds (2 seconds)
    </script>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
            function Load(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            document.getElementById("records").innerHTML = this.responseText;
        }
        xhttp.open("GET", "process.php");
        xhttp.send();
        }
        setInterval(function(){
          Load();
        },1000);

        
    </script>
    <script>
function Click(){
    alert("HELLO WORLD");
}
</script>
</head>
<body onload="Load()">
    <div id="records"></div>
</body>
</html> -->