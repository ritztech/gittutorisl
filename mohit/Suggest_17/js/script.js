/*
 cc:scriptime.blogspot.in
 edited by :midhun.pottmmal
*/
$(document).ready(function(){

	
	$(document).click(function(){
		//$("#ajax_response").fadeOut('slow');
	});

	
	$("#keyword").keyup(function(event){
		 //alert(event.keyCode);
		 var keyword = $("#keyword").val();
		 
		 //alert(keyword);
		 
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "suggest_17/name_fetch.php",
				   data: "data="+keyword,
				   success: function(msg){	
					if(msg != 0)
					  $("#ajax_response").fadeIn("slow").html(msg);
					else
					{
					  $("#ajax_response").fadeIn("slow");	
					  $("#ajax_response").html('<div style="text-align:left;">No Matches Found</div>');
					}
					//$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 
		 }
		 else
			$("#ajax_response").fadeOut("slow");
		
	});
	

});