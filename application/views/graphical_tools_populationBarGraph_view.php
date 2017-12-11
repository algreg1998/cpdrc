
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Historical Graphical Tools 
            </h3>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Population
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-12">
                        </div>
                    </div>
                    <div class="col-lg-12" id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(function () {
		<?php
		        	foreach ($popu as $key ) {
		        		?>
	$("#container").highcharts({
			chart: {
		        plotBackgroundColor: null,
		        plotBorderWidth: null,
		        plotShadow: false,
		        type: 'pie'
		    },
		    title: {
		        text: 'Current Population( Male and Female Percentage)<br><b>Total Population: <?php echo $key->cnt; ?></b>'
		    },
		    tooltip: {
		        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		    },
		    plotOptions: {
		        pie: {
		            allowPointSelect: true,
		            cursor: 'pointer',
		            dataLabels: {
		                enabled: true,
		                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		                style: {
		                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		                }
		            }
		        }
		    },
		    series: [{
		        name: 'Population',
		        colorByPoint: true,
		        data: [
		        
		        		{
			            name: 'Male',
			            y: <?php echo $key->maleCnt; ?>
			        }, {
			            name: 'Female',
			            y: <?php echo $key->femaleCnt; ?>
			        }
		        ]
		    }]
	});
	 <?php	}
		       
		        ?>
});
</script>