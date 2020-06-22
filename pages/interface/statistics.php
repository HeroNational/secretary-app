<?php 
    session_start();
    $index="statistics";
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
window.onload = function() {
menuHeight();
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Statistiques du mois"
	},
	data: [{
        type: "pie",
        //column,line,stepLine,spline,area,stepArea,splineArea,stackedColumn,stackedLine,bubble,scatter,stackedArea,stackedColumn100,stackedLine100,stackedArea100,candlestick,ohlc,rangeColumn,rangeArea,rangeSplineArea,boxAndWhisker,waterfall
        //bar, stackedBar, stackedBar100, rangeBar
        //pie, doughnut, funnel, pyramid
        startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 14,
		//indexLabel: "{label} : {y}%",
		indexLabel: " {y}%",
		dataPoints: [
			{ y: 40, label: "Livres" },
			{ y: 30, label: "Rapports de stage" },
			{ y: 10, label: "Epreuves" },
			{ y: 9, label: "Notes de service" },
			{ y: 1, label: "Carnet de discipline" },
			{ y: 1, label: "Devoir de classe" },
			{ y: 10, label: "Autres" }
		]
	}]
});
chart.render();

}
</script>
<!-- 
    <script>
window.onload = function () {
menuHeight();
var options = {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Monthly Sales Data"
	},
	axisX: {
		valueFormatString: "MMM"
	},
	axisY: {
		prefix: "$",
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
			name: "Actual Sales",
			showInLegend: true,
			xValueFormatString: "MMMM YYYY",
			yValueFormatString: "$#,##0",
			dataPoints: [
				{ x: new Date(2017, 0), y: 20000 },
				{ x: new Date(2017, 1), y: 25000 },
				{ x: new Date(2017, 2), y: 30000 },
				{ x: new Date(2017, 3), y: 70000, indexLabel: "High Renewals" },
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
			name: "Expected Sales",
			showInLegend: true,
			yValueFormatString: "$#,##0",
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
			name: "Profit",
			markerBorderColor: "white",
			markerBorderThickness: 2,
			showInLegend: true,
			yValueFormatString: "$#,##0",
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
 -->
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