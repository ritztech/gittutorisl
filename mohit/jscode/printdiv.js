function PrintMe(DivID) {
var disp_setting="toolbar=yes,location=no,";
disp_setting+="directories=yes,menubar=yes,";
disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
   var content_vlue = document.getElementById(DivID).innerHTML;
   
   
   var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
   docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
   docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
   docprint.document.write('<head><title> </title>');
   docprint.document.write('<style type="text/css">body{ margin:0px;');
   docprint.document.write('font-family:verdana,Arial;color:#000;');
   docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
   docprint.document.write('a{color:#000;text-decoration:none;} </style>');
   docprint.document.write('</head><body onLoad="self.print();self.close();"><center>');
   //  docprint.document.write('</head><body onLoad="self.print();"><center>');
   //docprint.document.write(' <p>  <IMG SRC="jscode/dewdale.png" WIDTH=100 HEIGHT=50 >  <h5>DewDale Co-operative Housing Society Ltd.,Survey Number 174/5/2(1 to 6)  </br>   Wakad Road,Near Datta Mandir , Wakad ,Pune - 411057     </br>         Reg.No.PNA/PNA-(3)/HSG/(TC)/11514/2011 </h5>  </p> ');
   docprint.document.write(content_vlue);
   docprint.document.write('</div >');
   docprint.document.write('</center></body></html>');
   docprint.document.close();
   docprint.focus();

}





   