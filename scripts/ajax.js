

/*
	* Data Insert Module
*/


$(document).on('submit','#insertForm',function(e) {
	e.preventDefault();
	var name = $(this).attr('name');
    var formData = new FormData(this);
	
	$.ajax( {
		method:"POST",
		url: "includes/scripts.inc.php?name="+name,
	    data:formData,
	    processData: false,
	    contentType: false,
		beforeSend:function(){
			$('button[type="submit"]').attr('disabled','disabled').text('Saving..');
		},
		success: function(data){
			//$('#insertForm').find('input').val('')
			//$('#insertForm').find('textarea').val('');
			//$('#insertForm').find('select').val('');
			$('button[type="submit"]').removeAttr('disabled').text('Save');
			$('#alertBox').html(data).fadeIn();
		}
	}); 
});


/*
	* Data Update Module
*/


$(document).on('submit','#updateForm',function(e) {
	e.preventDefault();
	var formData = new FormData(this);
	var name=$(this).attr('name');
	var id= $(this).attr('rel');

	$.ajax({
		method:"POST",
		url: "includes/scripts.inc.php?name="+name+"&id="+id,
		data:formData,
		cache:false,
		contentType: false,
		processData: false,
		beforeSend:function(){
			$('button[type="submit"]').attr('disabled','disabled');
		},
		success: function(data){
			$('button[type="submit"]').removeAttr('disabled');
			$('#alertBox').html(data).fadeIn();
		}
	});
});


/*
	* Data Delete Module
*/

$(document).on('click', '.userActivate', function(e){
	var el=$(this);
	var name=$(this).attr('name');
	var id=$(this).attr('rel');
	 $.ajax({
	 method:"GET",
	 url: "includes/scripts.inc.php",
	 data:{tableName:name,id:id,role:'user_activate'},
 
	 success: function(data){
	el.find('.iconRole').attr('class', data);


 }});
});


/*
	* Data Transfer Approval
*/

$(document).on('click', '.transferApproval', function(e){
	var el=$(this);
	var name=$(this).attr('name');
	var id=$(this).attr('rel');
	var action=$(this).attr('alt');
	 $.ajax({
	 method:"GET",
	 url: "includes/scripts.inc.php",
	 data:{tableName:name,id:id,role:'transfer_approval',action:action},
  	dataType: 'JSON',
 
	 success: function(data){
	$('#pending_value_'+data[0]['user_id']+'').html(data[0]['approval_text']);

 }});
});





$(document).on('click','.delete',function(e) {
	var el = $(this);
	var id = $(this).attr('id');
	var name = $(this).attr('name');

	if ($('#confirmBox').css("display") == "none") {
		$('#confirmBox').fadeIn();
		$('#confirmBox').find('button').on('click', function(){

			if( $(this).val() == 1 ) {
				$.ajax({	
					type: "GET",
					url: "includes/scripts.inc.php", 
					data:{deleteId:id, deleteData:name},			
					dataType: "html",				  
					success: function(data) {
						$("#showTable").html(data); 
						$('#alertBox').html(data).fadeIn();
						el.parents('tr').remove();
					}
				});
			}

			$('#confirmBox').fadeOut(); 
		})
	}
 
});


/*
	* Alert Message Fade Module
*/


 window.setInterval(function(){
 	 if ($('#alertBox').css("display") == "block") {
	   $('#alertBox').fadeOut();
   }
   }, 3000);



/* ransom

  // get query string value from url
var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = window.location.search.substring(1),
		sURLVariables = sPageURL.split('&'),
		sParameterName,
		i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
		}
	}
};

*/