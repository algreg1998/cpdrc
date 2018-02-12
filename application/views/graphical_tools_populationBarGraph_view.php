
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
                	<?php echo form_open(current_url_full(), 'class="form-horizontal"'); ?>
							         	<select name="month" class='form-control' style='width:15%; display: inline' >
							         		<option value="1"<?php if($month == 1){echo "selected";}?>>January</option>
							         		<option value="2"<?php if($month == 2){echo "selected";}?>>Febuary</option>
							         		<option value="3"<?php if($month == 3){echo "selected";}?>>March</option>
							         		<option value="4"<?php if($month == 4){echo "selected";}?>>April</option>
							         		<option value="5"<?php if($month == 5){echo "selected";}?>>May</option>
							         		<option value="6"<?php if($month == 6){echo "selected";}?>>June</option>
							         		<option value="7"<?php if($month == 7){echo "selected";}?>>July</option>
							         		<option value="8" <?php if($month == 8){echo "selected";}?>>August</option>
							         		<option value="9" <?php if($month == 9){echo "selected";}?>>September</option>
							         		<option value="10"<?php if($month == 10){echo "selected";}?>>October</option>
							         		<option value="11" <?php if($month == 11){echo "selected";}?>>November</option>
							         		<option value="12" <?php if($month == 12){echo "selected";}?>>December</option>
							         	</select>
							         	<select name="year" class='form-control' style='width:10%; display: inline' >
							         		<option value="2011" <?php if($year == 2011){echo "selected";}?>>2011</option>
							         		<option value="2012" <?php if($year == 2012){echo "selected";}?>>2012</option>
							         		<option value="2013" <?php if($year == 2013){echo "selected";}?>>2013</option>
							         		<option value="2014" <?php if($year == 2014){echo "selected";}?>>2014</option>
							         		<option value="2015" <?php if($year == 2015){echo "selected";}?>>2015</option>
							         		<option value="2016" <?php if($year == 2016){echo "selected";}?>>2016</option>
							         		<option value="2017"<?php if($year == 2017){echo "selected";}?>>2017</option>
                                            <option value="2018"<?php if($year == 2018){echo "selected";}?>>2018</option>
                                            <option value="2019"<?php if($year == 2019){echo "selected";}?>>2019</option>
                                            <option value="2020"<?php if($year == 2020){echo "selected";}?>>2020</option>
                                            <option value="2021"<?php if($year == 2021){echo "selected";}?>>2021</option>
                                            <option value="2022"<?php if($year == 2022){echo "selected";}?>>2022</option>
                                            <option value="2023"<?php if($year == 2023){echo "selected";}?>>2023</option>
                                            <option value="2024"<?php if($year == 2024){echo "selected";}?>>2024</option>
                                            <option value="2025"<?php if($year == 2025){echo "selected";}?>>2025</option>
                                            <option value="2026"<?php if($year == 2026){echo "selected";}?>>2026</option>
							         	</select>
				         	<button type="submit" class="btn btn-success">Submit</button>
				         <?php echo form_close(); ?>
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
        type: 'column'
    },
    title: {
        text: 'Population'
    },
    xAxis: {
        categories: [
            <?php
            foreach ($days as $key) {
            	echo $key.",";
            }
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'NO. OF DETENTION PRISONERS'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} inmates</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{

        name: '<?php echo $monthName;?>',
        data: [ <?php
   	foreach ($data as $key ) {
	        		echo $key."," ;
	        	}?> ]
    }]
	});
	 
});
</script>