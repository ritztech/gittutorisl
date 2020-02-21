
<?php

include('config.php');

$result13 = mysql_query("select name,id from muser");


?>




<form name = "form2" >

</br>
</br>

</br>
</br>



<table border='1' cellpadding='1' frame="box"  bgcolor="white"   >

<tr> <th style="text-align:center" colspan="6"  > <font color="blue"> <h4> DRUG  EXPIARY EPORT FOR NEXT 3 MONTHS   </h4> </font> </th>  </tr>
<tr> <th> name </th> <th> id </th>   </tr> 


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   

   <td> <input type = "text" size="12" readonly name = "pdate<?php echo   $i ?>" value = "<?php echo  $row13['0'] ?>" />  </td>
   <td> <input type = "text" size="20" readonly name = "pvend<?php echo   $i ?>" value = "<?php echo  $row13['1'] ?>" />  </td>


    
</tr>
  
<?php  }	?>

</table>

</br>


  



</div>






</div>
</div>
</div>

</form>



</div>
</div>
</div>


</body>
</html> 