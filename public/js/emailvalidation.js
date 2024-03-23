<!--
function validateEmail()
{
 var emailID = document.myForm.EMail.value;
 atpos = emailID.indexOf("@");
 dotpos = emailID.lastIndexOf(".");
 if (atpos < 1 || ( dotpos - atpos < 2 )) 
 {
 alert("Please enter correct email ID")
 document.myForm.EMail.focus() ;
 return false;
 }
 return( true );
}
//-->