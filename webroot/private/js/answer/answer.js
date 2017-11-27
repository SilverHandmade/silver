$(function(){
	$('#indexbtn').bind("click",function(){
		var re = new RegExp($('#indextxt').val());
		$('#qtable').each(function(){
			var Ntxt = $(this).find("#qtitle:eq(0)").html();
			var Atxt = $(this).find("#qcontent:eq(0)").html();

			alert(Atxt);
			Ntxt = Ntxt.replace("<a href=\"\">","");
			Ntxt = Ntxt.replace("</a>","");
			alert(Ntxt);
			if(Atxt.match(re) != null || Ntxt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	});
});
		var indextxt = $('#indextxt').val();
