function chkcap()
{

	chkbx=$("#capbox").val();


		if(chkbx=="" && chkbx.length<=1)
		{
			alert('Enter Image Caption');
			window.location=frontindex.php;
		}
			else {
				
		fireform ('uploadForm');

	}
	function fireform (frm)
	{

		$("#"+frm).submit();
	}
}