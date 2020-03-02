function checkMem() {	
name = $("#name").val();
password = $("#password").val();	

if(name == "" || name.length < 1)
{
	alert('please fill name');
	$("#name").focus();
}	
if(password == "" || password.length < 1)
{
	alert('please fill password');
	 $("#password").focus();
}
else
{
	
	fireForm('search');
}
function fireForm(frm)
{   
	
	$("#"+frm).submit();

}
 }
