$(function(){
	$('#indexbtn').bind("click",function(){

		var re = new RegExp($('#indextxt').val());
		$('#qtable').each(function(){
			var Ttxt = $(this).find("#witsestitle:eq(0)").html();
			var Ctxt = $(this).find("#wcontent:eq(0)").html();
			Ttxt = Ttxt.replace("<input type=\"submit\" id=\"titlebtn\" value=\"","");
			Ttxt = Ttxt.replace("\">","");
			//re = re.replace(/\u002f/g,"");
			alert(re);
			alert(Ttxt);
			alert(Ctxt);
			if(Ctxt.match(re) != null || Ttxt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	});
	$('#answerbtn').bind("click",function(){

	});
});
