<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

$t_date = date("d/m/Y");

if($_SESSION['auth'] == "NORMAL")
{
	
	$leg = "ledger_all.php";
	$i_leg = "cust_ledger_rep_i.php";
	//$i_leg = "show_sell_bill_d.php";
	
	
	$pay_sum = "Report_purchase_pay_summ.php";
}
else
{
	
		$leg = "ledger_all.php";
		$i_leg = "cust_ledger_rep_i_1.php";
		$pay_sum = "Report_purchase_pay_summ1.php";
}

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
 
    <script>
	
         $(function() {
       		 
  		  		$(".auto").autocomplete({
			
			 minLength: 0,
            source: "search.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		      select: function( event, ui ) {
			
              $(this).val( ui.item.desc1);
			 // $( ".auto" ).val( ui.item.label );
               window.location='edit_customer_rec.php?id='+ui.item.value;
			   
		  
			   //cust_ledger_rep1_2.php?id=78
			 
			   
               return false;
            }
         }
		 
)	

	 
		 
         .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
         };
         });
</script>
<script>
//================================= SEND SMS
function   sendsms()

{
	  var smstext = prompt("Please enter your message here ...");

	  
if (confirm("Are you sure you want to send this message---  ?! "+smstext) == true) {


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var fruits = xmlhttp.responseText;
	
 if(fruits ==1)
 {
	alert('Message  sent successfully ...');
 }  else { alert('SMS not sent due to internet connection issue ...');}
	
	
 



    }
  }
  
  
xmlhttp.open("GET","upd_ord_sttt_sms.php?id="+smstext,true);
xmlhttp.send();

} else {
        x = "You pressed Cancel!";
    }

	
	
}		 
		 
</script>
</head>

<body>

<h2 align="center" style="text-shadow: 1px 1px 3px #666666,
                       -1px -1px 3px #FFFFFF; font-size:17px;">
					  *** CUSTOMER DETAILS ***  </h2>




<table width="99%" border="0" align="center">
 <tr>
<td>
<?php 

if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;

	$setLimit =50;
	$pageLimit = ($page * $setLimit) - $setLimit;
	
	   function displayPaginationBelow($per_page,$page){
	   $page_url="all_cust_rec_customer_n.php?&";
    	$query = "SELECT COUNT(*) as totalCount FROM `customers` where acctype = 1";
    	$rec = mysql_fetch_array(mysql_query($query));
    	$total = $rec['totalCount'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $setLastpage = ceil($total/$per_page);
    	$lpm1 = $setLastpage - 1;
    	
    	$setPaginate = "";
    	if($setLastpage > 1)
    	{	
    		$setPaginate .= "<ul class='setPaginate'>";
                    $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
    		if ($setLastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $setLastpage; $counter++)
    			{
    				if ($counter == $page)
    					$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    				else
    					$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
    			}
    		}
    		elseif($setLastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
    				}
    				$setPaginate.= "<li class='dot'>...</li>";
    				$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
    			}
    			elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
    				$setPaginate.= "<li class='dot'>...</li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
    				}
    				$setPaginate.= "<li class='dot'>..</li>";
    				$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
    			}
    			else
    			{
    				$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
    				$setPaginate.= "<li class='dot'>..</li>";
    				for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
    		}else{
    			$setPaginate.= "<li><a class='current_page'>Next</a></li>";
                $setPaginate.= "<li><a class='current_page'>Last</a></li>";
            }

    		$setPaginate.= "</ul>\n";		
    	}
    
    
        return $setPaginate;
    } 
	
	
	
	
	
	
?>
	
	
	
	<style type="text/css">
	.navi {
	width: 100%;		
	border:3px solid  #4d0000;
	}

	.show {
		
	color: blue;
	
	cursor: pointer;
	font: 15px/19px Arial,Helvetica,sans-serif;
	}
	.show a {
	text-decoration: none;
	}
	.show:hover {
	text-decoration: underline;
	}


	ul.setPaginate li.setPage{
		
	padding:15px 10px;
	font-size:14px;
	}

	ul.setPaginate{
	margin:0px;
	padding:0px;
	height:100%;
	overflow:hidden;
	font:12px 'Tahoma';
	list-style-type:none;	
	}  

	ul.setPaginate li.dot{padding: 3px 0;}

	ul.setPaginate li{
	float:left;
	margin:0px;
	padding:0px;
	margin-left:5px;
	}



	ul.setPaginate li a
	{
	background: none repeat scroll 0 0 #ffffff;
	border: 1px solid #cccccc;
	color: #999999;
	display: inline-block;
	font: 15px/25px Arial,Helvetica,sans-serif;
	margin: 5px 3px 0 0;
	padding: 0 5px;
	text-align: center;
	text-decoration: none;
	}	

	ul.setPaginate li a:hover,
	ul.setPaginate li a.current_page
	{
	background: none repeat scroll 0 0 #0d92e1;
	border: 1px solid #000000;
	color: #ffffff;
	text-decoration: none;
	}

	ul.setPaginate li a{
	color:black;
	display:block;
	text-decoration:none;
	padding:5px 8px;
	text-decoration: none;
	}




	</style>
	
	
	   <div class="navi">
	
<table border="2" width="100%">
<tr>
<td colspan="18" align="left">
<b>
Search Customer By Name</b>
<input   name="cname"   tabIndex = "5"  type="text"  autofocus  value = ""   class='auto abcq'> 





<INPUT class = "abcqq" Type="BUTTON" VALUE="ADD NEW CUSTOMER" ONCLICK="window.location.href='add_customer_front.php'">


                                   
</td>
</tr>
<tr style="background-color:#000000; color:#ffffff; text-align:center; font-weight:bold;">
   <th width="5%">S No</th>
 <th>NAME</th>
                                             <th>CONTACT</th>
                                            <th>CITY</th>
				
  <th>NET DUE</th>											
												 
</tr>
<?php

$emp=mysql_query("SELECT `cid`, `name`, `contact`, `city`, `address`, `op_dues`, `net_due`,`o_date` FROM `customers` where acctype = 1 order by net_due desc LIMIT ".$pageLimit." , ".$setLimit) or die(mysql_error());
	
$i=50;
	while ($rec = mysql_fetch_array($emp)) {
		
		$i=$i - 1;

$snooinc = $pageLimit + 50;


$snoop = $snooinc - $i;
		
	
//======================GET STATENAME
	
	?>
	<div class="show">
	<tr style="text-align:center;">
	<td><?php  echo $snoop;  ?></td>
	
	
	<td style="width:201px;padding-left:10px;">
<a href="edit_customer_rec.php?id= <?php echo  $rec['cid']?> "> <?php echo  $rec['name']?>  </a>
</td>

<td style="width:150px;"> <?php  echo $rec['contact'];  ?></td>
<td style="width:200px;"><?php  echo $rec['city'];  ?></td>
<td>
<a href="cust_ledger_due_bills.php?id= <?php echo  $rec['cid']?> "> <?php echo $rec['net_due']?>  </a>

</td>

	</tr>
	
	</div>
	<?php }	?>
	</table>
	</div>

	<?php echo displayPaginationBelow($setLimit,$page); ?>
</td>
</tr>

</table>
</body>
</html> 