<div>
    <canvas class="embed-responsive" id="chart"></canvas>
</div>

<div>
    <canvas class="embed-responsive" id="daysChart"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
<script>
    var ctx = document.getElementById("chart").getContext("2d");
    var ctx2 = document.getElementById("daysChart").getContext("2d");

    var dataset = <?= $chart ?>;
    var daysDataset = <?= $daysChart ?>

    new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: dataset.data,
                backgroundColor: dataset.colors,
                label: 'All Stock'
            }],
            labels: dataset.labels
        },
        options: {
            title: {
                display: true,
                text: 'All Goods And their stock Chart'
            }
        }
    })

    new Chart(ctx2, {
        type: 'bar',
        data: {
            datasets: [{
                data: daysDataset.data,
                backgroundColor: daysDataset.colors,
                borderColor: daysDataset.colors,
                label: 'All Stock Sold per day in the last week'
            }],
            labels: daysDataset.labels
        },
        options: {
            title: {
                display: true,
                text: 'All Stock Sold per day in the last week'
            }
        }
    })
</script>