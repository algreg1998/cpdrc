$(function(){
	var dateAllowed = moment().subtract(-18,'years').format('YYYY-MM-DD');
	var dateEnd = moment().add(7,'days').format('YYYY-MM-DD');
	var dateEnd2 = moment().format('YYYY-MM-DD');
	var status = $("#status").val();

	toggleStatus(status);

	$("#status").change(function(){
		status = $(this).val();
		toggleStatus(status);
	});

	$("#schedule").datetimepicker({
		viewMode: "years",
		format: "MM/DD/YYYY hh:mm A",
		minDate: dateEnd,
		showClear:true
	});

	$("#time_departed").datetimepicker({
		format: "hh:mm A",
		minDate: dateEnd2,
		showClear:true
	});

	$("#time_returned").datetimepicker({
		format: "hh:mm A",
		minDate: dateEnd2,
		showClear:true
	});

	$("#vehicle_no").autoNumeric({
		aPad:false,
		aSep:'',
		mDec:0,
		vMin:0
	});
});

function toggleStatus(status)
{
	if (status == 'Pending') {
		$("#timeInfo").hide();
	}else{
		$("#timeInfo").show();
	}
}