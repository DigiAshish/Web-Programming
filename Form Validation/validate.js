$(document).ready(function() {
	var alphaNum = /^[a-zA-Z0-9]+$/;
			
	$("#username").focus(function(){
		$("span").remove();
		$("#username").parent().append("<span class='info'>Must be Alpha Numeric Characters</span>");
		$("#password").blur();
		if($("#password").val().length>=8)
		{
			$("#password").parent().append("<span class='ok'>OK</span>");
		}
		else if($("#password").val().length>0 && $("#password").val().length<8)
		{
			$("#password").parent().append("<span class='error'>Error</span>");
		}
		
		$("#email").blur();
		if($("#email").val().length>0)
		{
			if($("#email").val().indexOf("@") != -1){
				$("#email").parent().append("<span class='ok'>OK</span>");
			}
			else{
				$("#email").parent().append("<span class='error'>Error</span>");
			}
		}
    });
	
	$("#password").focus(function(){
		$("span").remove();
		$("#username").blur();
		$("#password").parent().append("<span class='info'>Password should be of min 8 characters</span>");
		if($("#username").val().length>0)
		{
			if(alphaNum.test($("#username").val()))
			{
				$("#username").parent().append("<span class='ok'>OK</span>");
			}
			else
			{
				$("#username").parent().append("<span class='error'>Error</span>");
			}
		}
		
		
		$("#email").blur();
		if($("#email").val().length>0)
		{
			if($("#email").val().indexOf("@") != -1){
				$("#email").parent().append("<span class='ok'>OK</span>");
			}
			else{
				$("#email").parent().append("<span class='error'>Error</span>");
			}
		}
    });
	
	
	$("#email").focus(function(){
		$("span").remove();
		$("#email").parent().append("<span class='info'>Please Enter a valid email(abc@abc.com)</span>");
		$("#username").blur();
		if($("#username").val().length>0)
		{
			if(alphaNum.test($("#username").val()))
			{
				$("#username").parent().append("<span class='ok'>OK</span>");
			}
			else
			{
				$("#username").parent().append("<span class='error'>Error</span>");
			}
		}
		$("#password").blur();
		if($("#password").val().length>=8)
		{
			$("#password").parent().append("<span class='ok'>OK</span>");
		}
		else if($("#password").val().length>0 && $("#password").val().length<8)
		{
			$("#password").parent().append("<span class='error'>Error</span>");
		}
		
		
    });
});
