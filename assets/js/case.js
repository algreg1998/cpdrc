$(function(){
	var dateAllowed = moment().subtract(18,'years').format('YYYY-MM-DD');
	var dateEnd = moment().add(1,'days').format('YYYY-MM-DD');
	var oldType = $("input[name=oldtype]").val();
	var selType = $("#type").val();
	typeSelection(selType);

	$("#type").change(function(){
		selType = $(this).val();
		typeSelection(selType);
	});
	
	$(".start_date").datetimepicker({
		viewMode: "years",
		format: "MM/DD/YYYY",
		maxDate: dateEnd,
		showClear:true

	});

	$("#release_date").datetimepicker({
		viewMode: "years",
		format: "MM/DD/YYYY",
		maxDate: dateEnd,
		showClear:true
	});

	// $("#court_order_number").autoNumeric({
	// 	pSign: 's',
	// 	aPad: false,
	// 	mDec:0,
	// 	vMin:0,
	// 	vMax:99999999,
	// 	aSep: ''
	// });

	$("#ps_years").autoNumeric({
		pSign: 's',
		aPad: false,
		aSign: ' year(s)',
		mDec:0,
		vMin:0,
		vMax:200
	});

	$("#ps_months").autoNumeric({
		pSign: 's',
		aPad: false,
		aSign: ' month(s)',
		mDec:0,
		vMin:0,
		vMax:11
	});

	$("#ps_days").autoNumeric({
		pSign: 's',
		aPad: false,
		aSign: ' day(s)',
		mDec:0,
		vMin:0,
		vMax:364
	});

	$("#caseForm").submit(function(event){
		if (oldType !== selType) {
			if (selType == 'Convict') {
				event.preventDefault();
				alertify.set({ labels: {
			        ok     : "Yes",
			        cancel : "No"
			    } });
			    alertify.confirm("<h4>Are you sure you want to proceed?</h4> <br>Note: You will not be able to change the inmate’s status later if you choose CONVICT.", function (e) {
			        if (e)
			        {
			           $("#caseForm")[0].submit();
			           return true;
			        }
			        else
			        {
			            return false;
			        }
			    });

			    return false;
			}else if (selType == 'Probation') {
				event.preventDefault();
				alertify.set({ labels: {
			        ok     : "Yes",
			        cancel : "No"
			    } });
			    alertify.confirm("<h4>Are you sure you want to proceed?</h4> <br>Note: You will not be able to change the inmate’s status to DETAINEE if you choose PROBATION.", function (e) {
			        if (e)
			        {
			           $("#caseForm")[0].submit();
			           return true;
			        }
			        else
			        {
			            return false;
			        }
			    });

			    return false;
			}
		}
	});
});

function typeSelection(selType){
	if (selType == 'Detainee' || selType == 'Probation') {
		$("#ps_years").attr("readonly",true);
		$("#ps_months").attr("readonly",true);
		$("#ps_days").attr("readonly",true);
		$("#court_order_number_wrap").hide();
		$("#courtOrder_number").attr("required",false);
	}else if(selType == 'Convict'){
		$("#ps_years").attr("readonly",false);
		$("#ps_months").attr("readonly",false);
		$("#ps_days").attr("readonly",false);
		$("#court_order_number_wrap").show();
		$("#courtOrder_number").attr("required",true);
	}
}