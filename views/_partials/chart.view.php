<div>
    <canvas class="embed-responsive" id="chart"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
<script>
    var ctx = document.getElementById("chart").getContext("2d");

    var dataset = <?= $chart ?>;

    new Chart(ctx, {
        type: 'doughnut',
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
</script>