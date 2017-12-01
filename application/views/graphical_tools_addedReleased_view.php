
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
	$("#container").highcharts({
	    chart: {
			renderTo: "container"
		},
		navigation: {
            buttonOptions: {
                enabled: true
            }
        },
        exporting: {
		    buttons: {
		        exportButton: {
		            enabled: true
		        }    
		    }
		},
	    title: {
	        text: 'Population',
	    },
	    xAxis: {
	    	title: {
	            text: monthname
	        },
	        categories: [1]
	    },
	    yAxis: {
	        title: {
	            text: "No. of Detention prisoners"
	        },
	        minRange: 1,
			allowDecimals: false,
	        plotLines: [{
	            value: 0,
	            width: 1,
	            color: "#808080"
	        }]
	    },
	    tooltip: {
            shared: true,
            crosshairs: true,
            valueSuffix: ""
        },
	    series: [{
	        type: "spline",
	        name: "Remained",
	        data: [1, 5, 1, 2,1, 2, 1,5,1, 2, 1, 12,1, 1, 1, 2]
	    },{
	        type: "spline",
	        name: "Released",
	        data: [1, 2, 52, 5,64, 2, 1, 2,1, 2, 66, 2,1, 2, 1, 2]
	    }]
	});
});
	
</script>