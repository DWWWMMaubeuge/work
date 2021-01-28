<?php
 
$dataPoints = array(
	array("label"=> "Carrossiers automobiles", "y"=> 590),
	array("label"=> "Geomètres", "y"=> 261),
	array("label"=> "Régleurs", "y"=> 158),
    array("label"=> "Développeurs WEB", "y"=> 72),
	array("label"=> "Couvreurs", "y"=> 191),
	array("label"=> "Charpentier bois", "y"=> 573),
	array("label"=> "Peintres en carroserie", "y"=> 126)
);

$dataPoints2 = array(
	array("label"=> "Oui", "y"=> 261),
	array("label"=> "Non", "y"=> 590)
);

$dataPoints3 = array(
	array("label"=> "Ninja", "y"=> 4500),
	array("label"=> "Pirate", "y"=> 10000)
);

$dataPoints4 = array(
	array("label"=> "Ordinateur", "y"=> 15741),
    array("label"=> "Smartphone", "y"=> 25454),
);
	
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
    exportEnabled: true,
    backgroundColor: "#304056",
    theme: "dark2",
	title:{
        text: "Nombre d'apprenants actuel dans les formations",
	},
	/* subtitles: [{
		text: "Currency Used: Thai Baht (฿)"
	}], */
	data: [{
		type: "pie",
		showInLegend: true,
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		highlightEnabled: true,
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart2 = new CanvasJS.Chart("chart2Container", {
	animationEnabled: true,
    exportEnabled: true,
    backgroundColor: "#304056",
    theme: "dark1",
	title:{
		text: "Le parking est-il assez grand ?"
	},
	/* subtitles: [{
		text: "Currency Used: Thai Baht (฿)"
	}], */
	data: [{
		type: "pie",
		showInLegend: true,
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		highlightEnabled: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();

var chart3 = new CanvasJS.Chart("chart3Container", {
	animationEnabled: true,
    exportEnabled: true,
    backgroundColor: "#304056",
    theme: "dark1",
	title:{
        text: "Ninja ou pirate ?",
        maxWidth: 300
	},
	/* subtitles: [{
		text: "Currency Used: Thai Baht (฿)"
	}], */
	data: [{
		type: "pie",
		showInLegend: true,
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		highlightEnabled: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();

var chart4 = new CanvasJS.Chart("chart4Container", {
	animationEnabled: true,
    exportEnabled: true,
    backgroundColor: "#304056",
    theme: "dark1",
	title:{
        text: "Ordinateur ou smartphone ?",
        maxWidth: 300
	},
	/* subtitles: [{
		text: "Currency Used: Thai Baht (฿)"
    }], */
    axisX:{
        labelWrap: false,
        valueFormatString: " ",
        tickLength: 0
    },
    axisY:{
        valueFormatString: " ",
        tickLength: 0
    },
	data: [{
		type: "pie",
		showInLegend: true,
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
        highlightEnabled: true,
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();
 
}
</script>
</head>
<body style="background-color: grey;">
<div id="chartContainer" style="height: 370px; width: 90%; margin: 2.5% auto;"></div>
<div id="chart2Container" style="height: 370px; width: 50%; margin: 2.5% auto;"></div>
<div style="display: flex; flex-direction: row">
    <div id="chart3Container" style="height: 370px; width: 45%; margin: 2.5% auto;"></div>
    <div id="chart4Container" style="height: 370px; width: 45%; margin: 2.5% auto;"></div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

function hideMessages() {
    var x = document.getElementsByClassName("canvasjs-chart-credit");
    var i;
    for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
    }
}

setInterval(() => {
    hideMessages();
}, 15);

</script>
</body>
</html>