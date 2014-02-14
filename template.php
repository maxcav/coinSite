<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="chart.js-master/Chart.js"></script>
	<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
	<style>
			canvas{
			}
		</style>
</head>
<body>

	<canvas id="canvas" height="450" width="600"></canvas>


	<script>
		var js_array = [<?php echo ''.implode(',', $data).'' ?>];
		console.log(js_array);

		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					data : js_array
				},
				
			]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	
	</script>

	<?php $js_array = json_encode($data);?>
	<?php echo $js_array?>

	<?php foreach ($data as $item):?>
	<div>
	<h2><?php echo $item ?></h2>
	


	
	
	</div>
	<?php endforeach;?> 
		
</body>
</html>