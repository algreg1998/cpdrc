$(function(){
	var pTable = $('#table-releases').DataTable({
        responsive: true,
        // "processing": true,
        // "serverSide": true,
        // "sServerMethod": "POST",
        // "ajax": BASE_URL+"search1/getinmates"
        // "columnDefs": [
        //     {
        //         "targets": [ 1 ],
        //         "visible": false,
        //         "searchable": false
        //     },
        //     {
        //         "targets": [ 2 ],
        //         "visible": false
        //     }
        // ]
    });

    $("body").on("click",".colorboxClose",function(){
        $.colorbox.close();
    });
});	