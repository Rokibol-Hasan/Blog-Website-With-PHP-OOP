<?php include "inc/header.php"; ?>

<?php

$dataPoints = array(
    array("x" => 10, "y" => 41),
    array("x" => 20, "y" => 35, "indexLabel" => "Lowest"),
    array("x" => 30, "y" => 50),
    array("x" => 40, "y" => 45),
    array("x" => 50, "y" => 52),
    array("x" => 60, "y" => 68),
    array("x" => 70, "y" => 38),
    array("x" => 80, "y" => 71, "indexLabel" => "Highest"),
    array("x" => 90, "y" => 52),
    array("x" => 100, "y" => 60),
    array("x" => 110, "y" => 36),
    array("x" => 120, "y" => 49),
    array("x" => 130, "y" => 41)
);

?>


<div class="container-fluid">
    <div class="row">
        <?php include "inc/indexnav.php"; ?>
        <div class="col-md-5 mt-5">
            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme: "light1", // "light1", "light2", "dark1", "dark2"
                        title: {
                            text: "Simple Column Chart with Index Labels"
                        },
                        axisY: {
                            includeZero: true
                        },
                        data: [{
                            type: "column", //change type to bar, line, area, pie, etc
                            //indexLabel: "{y}", //Shows y value on all Data Points
                            indexLabelFontColor: "#5A5757",
                            indexLabelPlacement: "outside",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();

                }
            </script>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="col-md-4 mt-5">
            <h4>Average Updates</h4>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cras justo odio
                    <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Dapibus ac facilisis in
                    <span class="badge badge-primary badge-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Morbi leo risus
                    <span class="badge badge-primary badge-pill">1</span>
                </li>
            </ul>
        </div>
    </div>
</div>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="dashboard.js"></script>

</body>

</html>