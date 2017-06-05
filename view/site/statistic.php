<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>


<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: 'Статистика продаж за останній місяць',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(92, 184, 92, 0.15)',
                    'rgba(92, 184, 92, 0.15)',
                    'rgba(92, 184, 92, 0.15)',
                    'rgba(92, 184, 92, 0.15)',
                    'rgba(92, 184, 92, 0.15)',
                    'rgba(92, 184, 92, 0.15)'
                ],
                borderColor: [
                    'rgba(37, 86, 37, 1)',
                    'rgba(37, 86, 37, 1)',
                    'rgba(37, 86, 37, 1)',
                    'rgba(37, 86, 37, 1)',
                    'rgba(37, 86, 37, 1)',
                    'rgba(37, 86, 37, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>