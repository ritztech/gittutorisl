
<html>
<head>
<style>

select{
	padding: 2px !important;
  	line-height: normal;
  	font-family: "Khmer Kampot", "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
  	font-size: 13px;
  	align-items: center;
	}
</style>
</head>

<?php 

$province=$_GET['province'];

include("config.php");

//echo $province;

$query="SELECT `id`,upper(CONCAT(`desc`,'**MRP**', `mrp`)) AS `desc` FROM `m_master_store` where barcode = '$province'  ";
$result=mysql_query($query);


?>

<select class="form-control" name="district" onChange="h123(this.value)">
<option>&larr; Select Item &rarr;</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['0']?>><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>