$(function(){

	$("#btnSave").click(function(){

		return performSubmit();
	});

	$(".btnRestore").click(function()
	{
		var red = $(this).attr("href");
	    var type = $(this).attr("data-type");
	    var item = $(this).attr("data-item");

	    alertify.set({ labels: {
            ok     : "Yes",
            cancel : "No"
        } });

		alertify.prompt("Are you sure you want to restore <strong>"+item+"</strong>?<br>Please provide a reason for restoring and list of documentation(s)", function (e, str) {
	        reason = str;

	        if (e) {
	            if (str == "") {
	                alertify.set({ labels: {
	                    ok     : "Close"
	                } });
	                alertify.alert("Please provide a reason for restoring and list of documentation(s)");
	                return false;
	            }else{
	                alertify.set({ labels: {
	                    ok     : "Yes, I'm sure",
	                    cancel : "Cancel"
	                } });
	                alertify.confirm("Are you really sure to delete this case?", function (e) {
	                    if (e) {

	                        alertify.set({ labels: {
	                            ok : "Ok"
	                        } });
	                
	                        window.location.href=red+'?reason='+reason;
	                    } else {
	                        alertify.set({ labels: {
	                            ok     : "Ok"
	                        } });
	                        alertify.alert("Case deletion process was terminated.");
	                    }
	                });
	            }
	        } else {
	 
	        }
	    }, "");

		return false;
	});



	$(".generalAlertify").click(function(){
	    var red = $(this).attr("href");
	    var type = $(this).attr("data-type");
	    var item = $(this).attr("data-item");
	    alertify.set({ labels: {
	        ok     : "Yes",
	        cancel : "No"
	    } });
	    alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
	        if (e) {
	            window.location.href = red;
	        } else {
	            return false;
	        }
	    });

	    return false;
	});
})


function performSubmit()
{
	if (
 		$("#case_no").val() !== ""
 	) {
 		alertify.set({ labels: {
 	        ok     : "Yes",
 	        cancel : "No"
 	    } });
 	    alertify.confirm("Are you sure you want to add case # "+$("#case_no").val()+"?", function (e) {
 	        if (e) {
 	        	$("#addCase").submit();
 	        } else {
 	            return false;
 	        }
 	    });
		
 		return false;
		}

		return true;
}