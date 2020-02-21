function ValidateForm(){


var tcnt = document.form2.totalcnt.value;
for (var init=1; init<=tcnt; init++)
  {
    var dt=document.form2[ "expiary" + init ]
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	
	if( document.form2[ "price" + init ].value == "" )
   {
     alert( "Please fill purchase price!" );
     document.form2[ "price" + init ].focus() ;
     return false;
   }
   
   
	if( document.form2[ "qty" + init ].value == "" )
   {
     alert( "Please fill purchase quantity!" );
     document.form2[ "qty" + init ].focus() ;
     return false;
   }

   
} 

if( document.form2.ppaid.value == "" )
   {
     alert( "Please fill paid amount!" );
     document.form2.ppaid.focus() ;
     return false;
   }
   

if( document.form2.v_id.value == "" )
   {
     alert( "Please select a vendor!" );
     document.form2.v_id.focus() ;
     return false;
   }
   

if( document.form2.pct.value == "" )
   {
     alert( "Please fill purchase receipt number!" );
     document.form2.pct.focus() ;
     return false;
   }
   
   
   

return true 
 }