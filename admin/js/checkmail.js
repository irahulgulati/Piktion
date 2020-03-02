function checkMail()
 {	
fmail = $("#fgtml").val();

if(fmail== "" || fmail.length < 1)
{
	alert('Please enter email');
	$("#fgtml").focus();
}
else
{
	
	fireForm('fgt');
}
function fireForm(frm)
{   
	
	$("#"+frm).submit();

}
}
