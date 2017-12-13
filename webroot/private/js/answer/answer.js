$(function(){
	$('#indexbtn').bind("click",function(){

		var re = new RegExp($('#indextxt').val());
		$('.panel').each(function(){
			var Ttxt = $(this).find("#wtitle:eq(0)").html();
			var Ctxt = $(this).find("#wcontent:eq(0)").html();
			Ttxt = Ttxt.replace("<input type=\"submit\" id=\"titlebtn\" value=\"","");
			Ttxt = Ttxt.replace("\">","");
			// alert(re);
			if(Ctxt.match(re) != null || Ttxt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	});
});
$(function(){
	$('#completebtn').bind("click",function(){
		var yesno = confirm("この内容で投稿してもよろしいですか？");
		if (yesno == true) {
		}else{
			return false;
		}

	});

});
