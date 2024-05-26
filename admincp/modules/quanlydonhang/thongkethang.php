<?php
    // Construct the SQL query
    $sql_thongke = "SELECT MONTH(tbl_cart_detail.thoigianmua) AS thang, YEAR(tbl_cart_detail.thoigianmua) AS nam, SUM(tbl_cart_detail.soluongmua * tbl_sanpham.giasanpham) AS tongdoanhthu
                    FROM tbl_cart_detail
                    INNER JOIN tbl_giohang ON tbl_cart_detail.code_cart = tbl_giohang.code_cart
                    INNER JOIN tbl_sanpham ON tbl_cart_detail.id_sanpham = tbl_sanpham.id_sanpham
                    WHERE tbl_giohang.cart_status = 3
                    GROUP BY MONTH(tbl_cart_detail.thoigianmua), YEAR(tbl_cart_detail.thoigianmua)";

    $result_thongke = mysqli_query($connect, $sql_thongke);

    // Prepare data for the chart
    $chart_labels = [];
    $chart_data = [];

    while ($row_thongke = mysqli_fetch_array($result_thongke)) {
        $thang = $row_thongke['thang'];
        $nam = $row_thongke['nam'];
        $tongdoanhthu = $row_thongke['tongdoanhthu'];
        $tongdoanhthu_formatted = number_format($tongdoanhthu, 0, '.', ',');

        // Establish a database connection
        $connect = mysqli_connect("localhost", "root", "", "shopvn");

        // Check if the connection was successful
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

    

        $chart_labels[] = "Tháng $thang năm $nam";
        $chart_data[] = $tongdoanhthu;
    }
?>
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.min.js"></script>
<iframe id="contentFrame" src="modules/quanlydonhang/thongke.php" height="200px" style="border: none; width: 100%;"></iframe>
<button id="export-btn">Export to File</button>
<!-- Create a canvas element for the chart -->
<canvas id="myChart"></canvas>

<script>
    // Get the chart data from PHP variables
    var chartLabels = <?php echo json_encode($chart_labels);?>;
    var chartData = <?php echo json_encode($chart_data);?>;

    // Create the chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Doanh thu',
                data: chartData,
                backgroundColor: 'rgba(255, 127, 36, 0.5)',
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            return value.toLocaleString('vi-VN') + 'ND';
                        },
                        fontColor: '#000' // Change the text color to dark gray
                    },
                    fontColor: '#000' // Change the axis label color to dark gray
                },
                x: {
                    fontColor: '#000' // Change the x-axis label color to dark gray
                }
            }
        }
    });
// Get the chart instance
// Get the chart instance
var chart = myChart;

// Get the export button element
var exportBtn = document.getElementById('export-btn');

// Add an event listener to the export button
exportBtn.addEventListener('click', function() {
    // Export the chart to a PNG image
    var pngUrl = chart.toBase64Image();
    var link = document.createElement('a');
    link.href = pngUrl;
    link.download = 'chart.png';
    link.click();

    // Export the chart to a PDF using jspdf
    var doc = new jsPDF();
    doc.addImage(chart.toBase64Image(), 'PNG', 0, 0);
    doc.save('chart.pdf', function() {
        alert('File has been saved!');
    });
});

</script>
