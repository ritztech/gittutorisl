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

<?php $province=intval($_GET['province']);

include("../config.php");

$query="SELECT `id`, `desc`  from  `m_master_store` WHERE id=$province";
$result=mysql_query($query);

?>
<select class="form-control" name="district" onChange="h123(this.value)">
<option>&larr; Select District &rarr;</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['desc']?></option>
<?php } ?>
</select>

</html>