function validMem() {	
name = $("#name").val();
mail = $("#mail").val();
password = $("#password").val();	

if(name == "" || name.length < 1)
{
	alert('please fill name');
	 $("#name").focus();
}	

	
if(mail == "" || mail.length < 1)
{
	
	alert('please fill email');
	$("#mail").focus();
}	

if(password == "" || password.length < 1)
{
	alert('please fill password');
	$("#password").focus();
}


else
{
	fireForm('memForm');
}
function fireForm(frm)
{   
	$("#"+frm).submit();

}
}