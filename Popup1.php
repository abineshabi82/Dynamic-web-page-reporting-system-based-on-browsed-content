<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" href="styles2.css">-->
  <link rel="stylesheet" href="contextstyle.css">
  <style>
nav.navbar.navbar-inverse {
    margin-bottom: 0px;
}
.well {
    min-height: 20px;
    padding: 8px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}
  </style>
</head>
<body style="background-color:#eef9c5;">
<?php                             
include("class/configs.php");
extract($_REQUEST);
if(isset($save))
	{
	$query4 = "UPDATE temp SET copy_content=? WHERE id=1";
	$statement4= $mysqli->prepare($query4);
	$statement4->bind_param('s', $area);
	$statement4->execute();
echo "<script>window.close();</script>";
	}
$sql5="SELECT copy_content FROM temp WHERE id=1";				//for activity content
$statement5=$mysqli->prepare($sql5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($paste_copy_content);
$statement5->fetch();
?>
<img src="header.png" class="form-control" border="" style="width:100%; height:125px" ></img>
<h6><nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Alpha</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="readmode.php?email=<?php echo $email;?>">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Write mode<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="suggestions.php?email=<?php echo $email;?>">Online Suggestions</a></li>
          <li><a href="voice.php?email=<?php echo $email;?>">Voice read write</a></li>
        </ul>
      </li>
      <li><a href="#">Read mode</a></li>
	  <li><a href="#">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	  <li><a href="" id="h" style="color:white"></a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav></h6>

  <div  class="container6" onselect="getSelectionText();" oncontextmenu="return showContextMenu();" style="height: 632px;margin-left: 23px;margin-right: 23px;">

	<div class="col-sm-9">
      <h3>Paste your content for manual read</h3>
	  <form id="connect_form" name="connect_form" action="" method="POST" enctype="multipart/form-data">
	  <h6><textarea id="area" name="area" cols="115" rows="34" value=""><?php echo $paste_copy_content; ?></textarea></h6><br>
	  
	  <button class="btn contact_button1" type="submit" name="save" id="save">Save as Local</button>
	  <input type="hidden" id="output"></input>
	  </form>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script2.js"></script>
<script src="script.js"></script>
<script>
function GetURLParameter(sParam)
{
	
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
		console.log(sParameterName);
        if (sParameterName[0] == sParam) 
        {
			while(sParameterName[1].indexOf("%EF%82%B7") !== -1)
			{
				//console.log(' ');
				sParameterName[1] = sParameterName[1].replace("%EF%82%B7", "");
			}
			while(sParameterName[1].indexOf("%EF%83%98") !== -1)
			{
				//console.log(' ');
				sParameterName[1] = sParameterName[1].replace("%EF%83%98", ">");
			}
			while(sParameterName[1].indexOf("%20%20") !== -1)
			{
				//console.log(' ');
				sParameterName[1] = sParameterName[1].replace("%20%20", "\n");
			}
			while(sParameterName[1].indexOf("%20") !== -1)
			{
				//console.log(' ');
				sParameterName[1] = sParameterName[1].replace("%20", " ");
			}
			while(sParameterName[1].indexOf("%21") !== -1)
			{
				//console.log('\n!');
				sParameterName[1] = sParameterName[1].replace("%21", "!");
			}
			while(sParameterName[1].indexOf("%40") !== -1)
			{
				//console.log('\n@');
				sParameterName[1] = sParameterName[1].replace("%40", "@");
			}
			while(sParameterName[1].indexOf("%23") !== -1)
			{
				//console.log('\n#');
				sParameterName[1] = sParameterName[1].replace("%23", "#");
			}
			while(sParameterName[1].indexOf("%24") !== -1)
			{
				//console.log('\n$');
				sParameterName[1] = sParameterName[1].replace("%24", "$");
			}
			while(sParameterName[1].indexOf("%25") !== -1)
			{
				//console.log('\n%');
				sParameterName[1] = sParameterName[1].replace("%25", "%");
			}
			while(sParameterName[1].indexOf("%5E") !== -1)
			{
				//console.log('\n^');
				sParameterName[1] = sParameterName[1].replace("%5E", "^");
			}
			while(sParameterName[1].indexOf("%26") !== -1)
			{
				//console.log('\n&');
				sParameterName[1] = sParameterName[1].replace("%26", "&");
			}
			while(sParameterName[1].indexOf("%28") !== -1)
			{
				//console.log('\n(');
				sParameterName[1] = sParameterName[1].replace("%28", "(");
			}
			while(sParameterName[1].indexOf("%29") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%29", ")");
			}
			while(sParameterName[1].indexOf("%2C") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%2C", ",");
			}
			while(sParameterName[1].indexOf("%2F") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%2F", "/");
			}
			while(sParameterName[1].indexOf("%3B") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%3B", ";");
			}
			while(sParameterName[1].indexOf("%27") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%27", "'");
			}
			while(sParameterName[1].indexOf("%5B") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%5B", "[");
			}
			while(sParameterName[1].indexOf("%5D") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%5D", "]");
			}
			while(sParameterName[1].indexOf("%5C") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace('%5C', '\\');
			}
			while(sParameterName[1].indexOf("%3F") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%3F", "?");
			}
			while(sParameterName[1].indexOf("%3A") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%3A", ":");
			}
			while(sParameterName[1].indexOf("%7B") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%7B", "{");
			}
			while(sParameterName[1].indexOf("%7D") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%7D", "}");
			}
			while(sParameterName[1].indexOf("%7C") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%7C", "|");
			}
			while(sParameterName[1].indexOf("%3C") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%3C", "<");
			}
			while(sParameterName[1].indexOf("%3E") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%3E", ">");
			}
			while(sParameterName[1].indexOf("%22") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace('%22', '"');
			}
			while(sParameterName[1].indexOf("%3D") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%3D", "=");
			}
			while(sParameterName[1].indexOf("%2B") !== -1)
			{
				//console.log('\n)');
				sParameterName[1] = sParameterName[1].replace("%2B", "+");
			}
            return sParameterName[1];
        }
    }
}
var ab = GetURLParameter('add'); 
document.getElementById('area').value+='\n';                  
document.getElementById('area').value+=ab;
</script>

</body>
</html>
