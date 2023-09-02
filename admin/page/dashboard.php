<?php
extract($data['list_loai']);
// print_r($data['list_loai']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="tailwind.config.js"></script>
</head>
<body class="bg-gray-200">
    <div class="flex min-h-screen">
        <?php require "layout/sidebar.php"?>
        <div class="w-5/6">
        <?php require "layout/header.php"?>
            <div class="">
                <div class="bg-white rounded-xl m-3 h-16 pl-3 flex items-center">
                    <h1 class="font-medium text-3xl">Dashboard</h1>
                </div>
                <div class="flex gap-5">
                    <div class="rounded-lg bg-white w-1/2 p-5 h-40">
                        <span>Số lượng sản phẩm có trên shop</span>
                        <p class="text-5xl text-center">30</p>
                    </div>
                    <div class="rounded-lg bg-white w-1/2 p-5">
                        <span>Tổng số lượng sản phẩm đã bán ra</span>
                        <p class="text-5xl text-center">30</p>
                    </div>
                    <div id="piechart_3d">

                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../public/js/main.js"></script>
    <script>
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php 
            foreach($list_loai as $loai){
                $sl_sp=thong_ke_san_pham_by_loai($loai['id']);
                echo "['".$loai['name']."',".$sl_sp['sl_sp']."],";
            }    
            ?>
        ]);

        var options = {
          title: 'Thống kê sản phẩm theo danh mục',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }

    </script>
</body>
</html>