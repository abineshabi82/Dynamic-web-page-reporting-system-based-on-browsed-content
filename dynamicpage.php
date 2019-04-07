<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  .well{
background-color: ;
}
nav.navbar.navbar-inverse {
    margin-bottom: 0px;
}
  </style>
</head>
<body style="background-color:#eef9c5;">
<?php                             
include("class/configs.php");
extract($_REQUEST);

if(isset($save1))												//for activity content
{	
	$query2 = "UPDATE temp SET activity_notes=? WHERE id=1";
	$statement2= $mysqli->prepare($query2);
	$statement2->bind_param('s', $area1);
	$statement2->execute();

}
$sql3="SELECT activity_notes FROM temp WHERE id=1";				//for activity content
$statement3=$mysqli->prepare($sql3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($paste_activity);
$statement3->fetch();
if(isset($saves))												//for activity content
{
	$query7 = "UPDATE temp SET activity_notes=? WHERE id=1";
	$statement7= $mysqli->prepare($query7);
	$statement7->bind_param('s', $area1);
	$statement7->execute();	
	$sql8="SELECT activity_notes FROM temp WHERE id=1";				//for activity content
	$statement8=$mysqli->prepare($sql8);
	$statement8->execute();
	$statement8->store_result();
	$statement8->bind_result($paste_activity);
	$statement8->fetch();
$a=explode("@",$email);
$sql4="SELECT name FROM ".$a[0]." WHERE name=?";				//for pasted content
$statement4=$mysqli->prepare($sql4);
$statement4->bind_param('s', $ex1);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($name);
$statement4->fetch();
if($name==$ex1)
{
	$query5 = "UPDATE ".$a[0]." SET content=? WHERE name=?";
	$statement5= $mysqli->prepare($query5);
	$statement5->bind_param('ss', $area1,$name);
	$statement5->execute();
}
elseif($name!=$ex1){
	$query6 = "INSERT INTO ".$a[0]." (name,content) VALUES(?,?)";
	$statement6= $mysqli->prepare($query6);
	$statement6->bind_param('ss', $ex1,$area1);
	$statement6->execute();
}

}
$a=explode("@",$email);
$sql10="SELECT name FROM ".$a[0]."";
$statement10=$mysqli->prepare($sql10);
$statement10->execute();
$statement10->store_result();
$statement10->bind_result($name1);

if(isset($loadact)){
	$sql11="SELECT content FROM ".$a[0]." WHERE name=?";				//for pasted content
	$statement11=$mysqli->prepare($sql11);
	$statement11->bind_param('s', $ex1);
	$statement11->execute();
	$statement11->store_result();
	$statement11->bind_result($paste_activity);
	$statement11->fetch();
}
?>
<img src="header.png" class="form-control" style="width:100%; height:125px" ></img>
<h6><nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Alpha</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="readmode.php?email=<?php echo $email; ?>">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Write mode<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="suggestions.php?email=<?php echo $email; ?>">Online Suggestions</a></li>
          <li><a href="voice.php?email=<?php echo $email; ?>">Voice read write</a></li>
        </ul>
      </li>
      <li class="active"><a href="#">Read mode</a></li>
	  <li><a href="#">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	  <li><a href="" id="h" style="color:white"><?php echo $email;?></a></li>
      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav></h6>
<div align="center" class="container-fluid well">
			<div class="col-sm-12" style="margin-left: -29px;">
      <h3 style="margin-left: 60px;">Activity Notes</h3>
	  <form id="connect_form1" name="connect_form1" action="" method="POST" enctype="multipart/form-data">
	  <textarea id="area1" name="area1" cols="170" rows="15"><?php echo $paste_activity; ?></textarea>
	  <div class="form-group">
	  <h6><select id="mySelect1" name="mySelect1" onchange="myFunction()" style="margin-left: -239px;width: 96px;height: 27px;">
			<option value=" ">Select File</option>
			<?php while($statement10->fetch()) { ?>
			<option value="<?php echo $name1; ?>"><?php echo $name1; ?></option>
			<?php } ?>
		  </select>
		</h6>
		<button class="btn contact_button1" type="submit" name="loadact" id="loadact" >Open</button>
		<button type="submit" id="save1" name="save1" class="btn contact_button1" onclick="" >Save as Local</button>
		<input class="" id="ex1" name="ex1" type="text" placeholder="enter file name to save" value="" >
	  <button class="btn contact_button1" type="submit" name="saves" id="saves">Save</button>
	  <button class="btn contact_button1" type="button" onclick="generate()" name="gen" id="gen">Generate report</button>
	  </div>
	  </form>
    </div><br>
</div>
<div id="myDIV">
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function myFunction() {
	var x=document.getElementById("mySelect1").value;
	document.getElementById("ex1").value=x;
}
function ValidURL(str) {
  var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
  if(!regex .test(str)) {
    return false;
  } else {
    return true;
  }
}
function ValidutubeURL(str) {
  var regex = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/watch\?v=([^&]+)/m;
  if(!regex .test(str)) {
    return false;
  } else {
    return true;
  }
}
function generate(){
	var x1=document.getElementById("area1").value;
	var com = x1.split('^');
	for (var i = 0; i < com.length-1; i++) 
    {
		if(com[i].indexOf("*d") !== -1)
		{
			com[i]=com[i].replace("*d", "");
			var di=document.createElement("div");
			di.setAttribute('style',"margin-left: 59px;margin-right: 63px;");
			var para1 = document.createElement("h6");
			var t1 = document.createTextNode(com[i]);
			para1.appendChild(t1);
			di.appendChild(para1);
			document.getElementById("myDIV").appendChild(di);
		}
		else if(com[i].indexOf("*h") !== -1)
		{
			com[i]=com[i].replace("*h", "");
			var di=document.createElement("div");
			di.setAttribute('style',"margin-left: 59px;margin-right: 63px;");
			var para1 = document.createElement("h4");
			var t1 = document.createTextNode(com[i]);
			para1.appendChild(t1);
			di.appendChild(para1);
			document.getElementById("myDIV").appendChild(di);
		}
		else if(ValidutubeURL(com[i])==true)
		{
			com[i] = com[i].replace("watch?v=", "embed/");
			var iframe = document.createElement('iframe');
			iframe.frameBorder=0;
			iframe.width="640px";
			iframe.height="390px";
			iframe.setAttribute("src", com[i]);
			iframe.setAttribute("style", "margin-left: 60px;width: 1225px;height: 693px;");
			document.getElementById("myDIV").appendChild(iframe);
		}
		else if(ValidURL(com[i])==true)
		{
			var di=document.createElement("div");
			di.setAttribute('style',"margin-left: 59px;margin-right: 63px;");
			var br=document.createElement("br");
			var aTag=document.createElement("a");
			aTag.setAttribute('href',com[i]);
			aTag.setAttribute('target',"_blank");
			aTag.innerHTML = com[i];
			di.appendChild(aTag);
			document.getElementById("myDIV").appendChild(di);
			document.getElementById("myDIV").appendChild(br);
		}
		else{
		var di=document.createElement("div");
		di.setAttribute('style',"margin-left: 59px;margin-right: 63px;");
		var para = document.createElement("p");
		para.setAttribute('class',"well");
		var t = document.createTextNode(com[i]);
		para.appendChild(t);
		di.appendChild(para);
		document.getElementById("myDIV").appendChild(di);
		}
	}
}
	</script>
</body>
</html>
