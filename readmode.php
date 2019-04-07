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


if(isset($save))												//for pasted content
{	
	$query = "UPDATE temp SET copy_content=? WHERE id=1";
	$statement= $mysqli->prepare($query);
	$statement->bind_param('s', $area);
	$statement->execute();

}
$sql1="SELECT copy_content FROM temp WHERE id=1";				//for pasted content
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($paste_copy_content);
$statement1->fetch();

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
      <li><a href="dynamicpage.php?email=<?php echo $email; ?>">Read mode</a></li>
	  <li><a href="#">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	  <li><a href="" id="h" style="color:white"><?php echo $email; ?></a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav></h6>

<div class="container" style="margin-top: 13px; margin-left: 22px; width: 1303px;">
  <div class="row">
    <div class="col-sm-12 well">
      <h3>PDF Opener</h3>
	  <div class="btn-group">
	  <input type="file" class="btn" id="myEmbed" accept=".pdf">
	  <button type="button" class="btn btn-primary" onclick="openfile()">Open</button>
	  <div id="di">
	  </div>
	  </div>
    </div>   
  </div>
  </div>
  <div  class="container6" onselect="getSelectionText();" oncontextmenu="return showContextMenu();" style="height: 632px;margin-left: 23px;margin-right: 23px;">
  <div class="col-sm-8">
  <div id="contextMenu" class="context-menu">
			<ul>
			<li id="c" onclick="loadsugg();">Add to Suggestions</li>
			<li onclick="addactivitysame()">Add to Activity notes in same line</li>
			<li onclick="addactivity()">Add to Activity notes in new line</li>
			<li onclick="add_read()">Add to speak notes</li>
			</ul>
	</div>
      <h3>Paste your content for manual read</h3>
	  <form id="connect_form" name="connect_form" action="" method="POST" enctype="multipart/form-data">
	  <h6><textarea id="area" name="area" cols="115" rows="34" value=""><?php echo $paste_copy_content; ?></textarea></h6><br>
	  
	  <button class="btn contact_button1" type="submit" name="save" id="save">Save as Local</button>
	  <input type="hidden" id="output"></input>
	  </form>
    </div>
  <div class="col-sm-4">
      <h3>Activity Notes</h3>
	  <form id="connect_form1" name="connect_form1" action="" method="POST" enctype="multipart/form-data">
	  <h6><textarea id="area1" name="area1" cols="50" rows="34"><?php echo $paste_activity; ?></textarea></h6>
	  <div class="form-group">
	  <h6><select id="mySelect1" name="mySelect1" onchange="myFunction()">
			<option value=" ">Select File</option>
			<?php while($statement10->fetch()) { ?>
			<option value="<?php echo $name1; ?>"><?php echo $name1; ?></option>
			<?php } ?>
		  </select></h6><button class="btn contact_button1" type="submit" name="loadact" id="loadact" style="margin-left: 99px;margin-top: -52px;">Open</button>
	  <button type="submit" id="save1" name="save1" class="btn contact_button1" onclick="" style="margin-top: -52px;">Save as Local</button>
		<input class="" id="ex1" name="ex1" type="text" placeholder="enter file name to save" value="">
	  <button class="btn contact_button1" type="submit" name="saves" id="saves">Save</button>
	  
	  
	  </div>
	  </form>
    </div>
  </div>
  
<div align="center" class="container">
            <div class="app" > 
                <h2><b>Hear Your Content</b></h2>
				<br>
                <div class="input-single">
                    <textarea id="note-textarea" placeholder="Create a new note by typing or using voice recognition and also hear your notes" rows="10" cols="150"></textarea>
                </div>    
				<br>				
                <input type="hidden" id="start-record-btn" class="btn btn-primary" title="Start Recording"></input>
                <input type="hidden" id="pause-record-btn" class="btn btn-primary" title="Pause Recording"></input>
                <input type="hidden" id="save-note-btn" title="Save Note"/>   
				<button class="btn btn-primary" onclick="javascript:speak();">Speak</button>
				<button class="btn btn-primary" onclick="stopspeaks();">Pause</button>
				<button class="btn btn-primary" onclick="resumespeaks();">Resume</button>
				<button class="btn btn-primary" onclick="cancelspeaks();">Stop</button>
				<br><br>
                <p id="recording-instructions"></p>
                <ul id="not">
                    <li>
                        <p  class="no-notes"></p>
                    </li>
                </ul>

            </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script2.js"></script>
<script src="script.js"></script>
<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
<script src="contextscript.js"></script>
<script>
function GetURLParameter1(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
			while(sParameterName[1].indexOf("%40") !== -1)
			{
				sParameterName[1] = sParameterName[1].replace("%40", "@");
			}
            return sParameterName[1];
        }
    }
}
var ab1 = GetURLParameter1('email');
console.log(ab1);     
document.getElementById('h').value=ab1;

function myFunction() {
	var x=document.getElementById("mySelect1").value;
	document.getElementById("ex1").value=x;
}
</script>
</body>
</html>
