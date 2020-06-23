<?php 
    session_start();
    $index="help";
    $_SESSION['index']=$index;
    include("../../includes/header.php");
    if(isset($_SESSION['status'])){
        if($_SESSION['status']==false){
            header("LOCATION: ../../");
        } 
    }else{
        header("LOCATION: ../../");
    }
    $exist=1;
?>
<script>
    window.onload = function () {
    menuHeight();
    var options = {
	    exportEnabled: true,
        animationEnabled: true,
        theme: "light1",
        title: {
            text: "Travail d'ingenieur"
        },
        axisX: {
            valueFormatString: "MMM"
        },
        axisY: {
            prefix: "",
            suffix: " lignes",
            labelFormatter: addSymbols
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        data: [
            {
                type: "column",
                name: "Daniel",
                showInLegend: true,
                xValueFormatString: "MMMM YYYY",
                yValueFormatString: "#,##0",
                dataPoints: [
                    { x: new Date(2017, 0), y: 20000 },
                    { x: new Date(2017, 1), y: 25000 },
                    { x: new Date(2017, 2), y: 30000 },
                    { x: new Date(2017, 3), y: 70000, indexLabel: "Maximum" },
                    { x: new Date(2017, 4), y: 40000 },
                    { x: new Date(2017, 5), y: 60000 },
                    { x: new Date(2017, 6), y: 55000 },
                    { x: new Date(2017, 7), y: 33000 },
                    { x: new Date(2017, 8), y: 45000 },
                    { x: new Date(2017, 9), y: 30000 },
                    { x: new Date(2017, 10), y: 50000 },
                    { x: new Date(2017, 11), y: 35000 }
                ]
            },
            {
                type: "line",
                name: "Martin",
                showInLegend: true,
                yValueFormatString: "#,##0",
                dataPoints: [
                    { x: new Date(2017, 0), y: 32000 },
                    { x: new Date(2017, 1), y: 37000 },
                    { x: new Date(2017, 2), y: 40000 },
                    { x: new Date(2017, 3), y: 52000 },
                    { x: new Date(2017, 4), y: 45000 },
                    { x: new Date(2017, 5), y: 47000 },
                    { x: new Date(2017, 6), y: 42000 },
                    { x: new Date(2017, 7), y: 43000 },
                    { x: new Date(2017, 8), y: 41000 },
                    { x: new Date(2017, 9), y: 42000 },
                    { x: new Date(2017, 10), y: 50000 },
                    { x: new Date(2017, 11), y: 45000 }
                ]
            },
            {
                type: "area",
                name: "Karl",
                markerBorderColor: "white",
                markerBorderThickness: 2,
                showInLegend: true,
                yValueFormatString: "#,##0",
                dataPoints: [
                    { x: new Date(2017, 0), y: 4000 },
                    { x: new Date(2017, 1), y: 7000 },
                    { x: new Date(2017, 2), y: 12000 },
                    { x: new Date(2017, 3), y: 40000 },
                    { x: new Date(2017, 4), y: 20000 },
                    { x: new Date(2017, 5), y: 35000 },
                    { x: new Date(2017, 6), y: 33000 },
                    { x: new Date(2017, 7), y: 20000 },
                    { x: new Date(2017, 8), y: 25000 },
                    { x: new Date(2017, 9), y: 16000 },
                    { x: new Date(2017, 10), y: 29000 },
                    { x: new Date(2017, 11), y: 20000 }
                ]
            },
            {
                type: "spline",
                name: "Jordan",
                markerBorderColor: "blue",
                markerBorderThickness: 2,
                showInLegend: true,
                yValueFormatString: "#,##0",
                dataPoints: [
                    { x: new Date(2017, 0), y: 40200 },
                    { x: new Date(2017, 1), y: 7000 },
                    { x: new Date(2017, 2), y: 1000 },
                    { x: new Date(2017, 3), y: 40070 },
                    { x: new Date(2017, 4), y: 20000 },
                    { x: new Date(2017, 5), y: 3500 },
                    { x: new Date(2017, 6), y: 35000 },
                    { x: new Date(2017, 7), y: 45000 },
                    { x: new Date(2017, 8), y: 25470 },
                    { x: new Date(2017, 9), y: 16000 },
                    { x: new Date(2017, 10), y: 29680 },
                    { x: new Date(2017, 11), y: 45000 }
                ]
            }]
    };
    $("#chartContainer").CanvasJSChart(options);

    function addSymbols(e) {
        var suffixes = ["", "K", "M", "B"];
        var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

        if (order > suffixes.length - 1)
            order = suffixes.length - 1;

        var suffix = suffixes[order];
        return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
    }

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        e.chart.render();
    }


    }
</script>
</head>


<body onunload="menuHeight()">

    <div class="ui grid stackable ">
        <?php 
            include("../../includes/menu.php");
        ?>
        <div class="ui three wide column"></div>
        <div>
            <div id="chartContainer" class="ui sixteen wide column center aligned middle aligned    "  style="margin-left:10px;position:sticky;top:120px; max-width:700px;"></div>
        </div>
    <?php 
        include("../../includes/footer.php");
    ?>
    </div>

</body>
<script src="../../js/jquery.canvasjs.min.js"></script>
</body>
</html>