<h1 class="w-100 text-center text-primary mt-3">Thống kê tài chính</h1>
<?php
// echo '<pre>';
// print_r($bills);
// echo '</pre>';


// Bar chart
$dataChart = [];
foreach ($bills as $key => $value) {
    foreach ($value as $key1 => $value1) {
        if ($key1 == 'bill_cost') {
            $dataChart[$key][$key1] = $value1;
        }
        if ($key1 == 'created_at') {
            $month = explode("-", $value1)[1];
            $month = (int) $month;
            $dataChart[$key][$key1] = $month;
        }
    }
}
for ($i = 0; $i < count($dataChart); $i++) {
    for ($j = $i + 1; $j < count($dataChart); $j++) {
        if ($dataChart[$i]['created_at'] == $dataChart[$j]['created_at']) {
            $dataChart[$i]['bill_cost'] += $dataChart[$j]['bill_cost'];
            array_splice($dataChart, $j, 1);
            $j = $i;
        }
    }
}

// echo '<pre>';
// print_r($dataChart);
// echo '</pre>';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="chart-box d-flex justify-content-center m-auto" style="width: 80%; margin-bottom: 120px !important;">
    <canvas id="myChart"></canvas>
</div>

<script>
    const labels = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6 ',
        'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
    ];
    let dataChart = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var i = 0;
    <?php
    foreach ($dataChart as $value) {
    ?>
        dataChart.splice(<?php echo ($value['created_at'] - 1) ?>, 1, <?php echo $value['bill_cost'] ?>);
    <?php
    }
    ?>
    // console.log(dataChart);
    const data = {
        labels: labels,
        datasets: [{
            label: 'Doanh thu',
            data: dataChart,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    // title: {
                    //     display: true,
                    //     text: 'Tháng'
                    // }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Doanh thu (VNĐ)'
                    }
                }
            },
        },
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
<br>

<?php
echo '<pre>';
print_r($typeServiceChart);
echo '</pre>';
?>

<h1 class="text-center text-primary">Biểu đồ tỉ lệ mua vé của các dịch vụ</h1>
<div class="chart-box d-flex justify-content-center m-auto" style="width: 30%; margin-bottom: 120px !important;">
    <canvas id="myChart1"></canvas>
</div>
<script>
    let labelDChart = [];
    let dataDChart = [];
    <?php
    foreach ($typeServiceChart as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if ($key1 == 'escate_name') {
    ?>
                labelDChart.push(<?php echo '"' . $value1 . '"' ?>)
            <?php
            } else if ($key1 == 'count') {
            ?>
                dataDChart.push(<?php echo $value1 ?>)
    <?php
            }
        }
    }
    ?>
    // console.log(dataDChart);
    // console.log(labelDChart);
    const data1 = {
        labels: labelDChart,
        datasets: [{
            label: 'My First Dataset',
            data: dataDChart,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };
    const config1 = {
        type: 'doughnut',
        data: data1,
    };
    const myChart1 = new Chart(
        document.getElementById('myChart1'),
        config1
    );
</script>