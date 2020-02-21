<html>
<head>

<script language="javascript">

function  f123 ()

{
var myDropDown=document.getElementById("myDropDown");
var length = myDropDown.options.length;
//open dropdown
myDropDown.size = length;
//close dropdown
//myDropDown.size = 0;

}

</script>

</head>


<body>

<select id="myDropDown">
  <option>html5</option>
  <option>javascript</option>
  <option>jquery</option>
  <option>css</option>
  <option>sencha</option>
</select>

<input type="button" onclick="f123()" value="SAVE">

</body>

</html>
