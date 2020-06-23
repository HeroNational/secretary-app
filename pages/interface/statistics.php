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
<title>Statistiques</title>
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
<script src="../../js/jquery.canvasjs.min.fr.js"></script>
</body>
</html>