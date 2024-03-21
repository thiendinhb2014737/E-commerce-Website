
<div class="row" id="bg_tk">
    <h2>THỐNG KÊ SẢN PHẨM<h2>
            <div id="piechart" class=" justify-content-center"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                // Load google charts
                google.charts.load('current', { 'packages': ['corechart'] });
                google.charts.setOnLoadCallback(drawChart);

                // Draw the chart and set the chart values
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        <?php
                        $i = 1;
                        $tongdm = count($cartinfo);
                        foreach ($cartinfo as $item) {
                            extract($item);
                            if ($i == $tongdm)
                                $dauphay = "";
                            else
                                $dauphay = ",";
                            echo "['" . $item['tensp'] . "', " . $item['countsp'] . "]" . $dauphay;
                            $i += 1;
                        }
                        ?>
                    ]);

                    // Optional; add a title and set the width and height of the chart
                    var options = { 'title': 'Thống kê sản phẩm đã đặt hàng', 'width': 700, 'height': 400 };

                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            </script>
            <table id="piechart" class="table table-active table-hover">
                <tr id="tensp" >
                    <th class="col-3 col-sm-1">STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng sản phẩm</th>
                </tr>

                <?php
                if (isset($cartinfo) && (count($cartinfo) > 0)) {
                    $i = 1;
                    $tong = 0;
                    foreach ($cartinfo as $item) {
                        echo ' <tr>
                        <td class="col-3 col-sm-1">' . $i . '</td>
                        <td class="btn btn-secondary"><b>' . $item['tensp'] . '</b></td>
                        <td>' . $item['countsp'] . '</td>
                    </tr>';
                        $i++;
                    }
                }
                ?>
            </table>
</div>