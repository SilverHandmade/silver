$(function(){
	$('#indexbtn').bind("click",function(){

		var re = new RegExp($('#indextxt').val());
		$('.indexlist').each(function(){
			var Ttxt = $(this).find("#wtitle:eq(0)").html();
			var Ctxt = $(this).find("#wcontent:eq(0)").html();
			Ttxt = Ttxt.replace("<input type=\"submit\" id=\"titlebtn\" value=\"","");
			Ttxt = Ttxt.replace("\">","");
			// alert(re);
			// alert(Ttxt);
			// alert(Ctxt);
			if(Ctxt.match(re) != null || Ttxt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	});
});
$(function(){
	$('#answerbtn').bind("click",function(){
		var answertxt = document.getElementById( "answertxt" ).value;
		$('#appendtable').append('<tr><td value="">' + answertxt + '</td></tr>');
	});
});
