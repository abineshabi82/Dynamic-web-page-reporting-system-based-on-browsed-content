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

<img src="header.png" class="form-control" border="" style="width:100%; height:125px" ></img>
<h6><nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Alpha</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="readmode.php?email=<?php echo $email;?>">Home</a></li>
      <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="">Write mode<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="suggestions.php?email=<?php echo $email;?>">Online Suggestions</a></li>
          <li><a href="voice.php?email=<?php echo $email;?>">Voice read write</a></li>
        </ul>
      </li>
      <li><a href="dynamicpage.php?email=<?php echo $email; ?>">Read mode</a></li>
	  <li><a href="#">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
	  <li><a href="" id="h" style="color:white"><?php echo $email; ?></a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav></h6>
<div  class="container-fluid">
<div class="">
<input type="text" class="form-control" id="note-textarea" name="note-textarea"  placeholder="voice search" value="" style="width: 1046px;"/>
<button id="start-record-btn" class="btn btn-primary" title="Start Recording" style="margin-left: 1054px;margin-top: -52px;">Voice Search</button>
<button id="pause-record-btn" class="btn btn-primary" title="Pause Recording" onclick="upsearch()" style="margin-top: -52px;">Stop Recognition</button>
<input type="button" class="btn btn-primary" id="save-note-btn" title="Save Note" value="Save Note" style="display: none;"/>   
				<br><br>
                <p id="recording-instructions" style="display: none;">Press the <strong>Start Recognition</strong> button and allow access.</p>
                <ul id="notes" style="display: none;">
                    <li>
                        <p class="no-notes"></p>
                    </li>
                </ul>
</div>
  <div class="row well" style="margin-top: -20px;">
	<div class="col-sm-2">
		<!--<img src="1(5).png" class="img-circle"></img>-->
		<form action="" target="blank" method="GET">
		<input type="text" class="form-control" id="g1" name="q" placeholder="google search" value=""/>
		<br>
		<input type="submit" class="btn btn-primary" style="margin-top: -10px;margin-left: 28px;" onclick="openg()" value="Google Search"/>
		<input type="button" class="btn btn-primary" style="margin-top: 2px;margin-left: 47px;" onclick="addgoogle()" value="Add link"/>
		</form>
    </div>
    <div class="col-sm-2">
		<!--<img src="1(7).png" class="img-circle"></img>-->
		<form action="http://www.youtube.com/results" target="blank" method="GET">
		<input type="text" class="form-control" id="g2" name="search_query" placeholder="youtube search"/>
		<br>
		<input type="submit" class="btn btn-primary" style="margin-top: -10px;margin-left: 28px;" onclick="openy()" value="youtube Search"/>
		<input type="button" class="btn btn-primary" style="margin-top: 2px;margin-left: 47px;" onclick="addyoutube()" value="Add link"/>
		</form>
    </div>
    <div class="col-sm-2">
		<!--<img src="1.jpg" class="img-circle"></img>-->
		<form action="https://en.wikipedia.org/wiki" target="blank" method="GET">
		<input type="text" class="form-control" id="g3" name="search" placeholder="wikipedia search"/>
		<br>
		<input type="submit" class="btn btn-primary" style="margin-top: -10px;margin-left: 28px;" onclick="openw()" value="wikipedia Search"/>
		<input type="button" class="btn btn-primary" style="margin-top: 2px;margin-left: 47px;" onclick="addwiki()" value="Add link"/>
		</form>
    </div>
	<div class="col-sm-2">
		<!--<img src="2.png" class="img-circle"></img>-->
		<form action="https://www.quora.com/search" target="blank" method="GET">
		<input type="text" class="form-control" id="g4" name="q" placeholder="quora search"/>
		<br>
		<input type="submit" class="btn btn-primary" style="margin-top:-10px;margin-left:28px;" onclick="openq()" value="Quora Search"/>
		<input type="button" class="btn btn-primary" style="margin-top:2px;margin-left:47px;" onclick="addquora()" value="Add link"/>
	</form>
	</div>
	<div class="col-sm-2">
		<!--<img src="3.png" class="img-circle"></img>-->
		<form>
		<input type="text" placeholder="Translate in Tamil" id="g5" class="form-control" name="q" />
		<br>
		<input type="button" class="btn btn-primary" style="margin-top:-10px;margin-left:28px;" onclick="ltamil()" value="Tamil meaning"/>
		<input type="button" class="btn btn-primary" style="margin-top:2px;margin-left:47px;" onclick="addtamil()" value="Add link"/>
		</form>
	</div>
	<div class="col-sm-2">
		<!--<img src="4.png" class="img-circle"></img>-->
		<form>
		<input type="text" placeholder="Translate in Telugu" id="g6" class="form-control" name="q" />
		<br>
		<input type="button" class="btn btn-primary" style="margin-top: -10px;margin-left: 28px;" onclick="ltelugu()" value="Telugu meaning"/>
		<input type="button" class="btn btn-primary" style="margin-top: 2px;margin-left: 47px;" onclick="addtelugu()" value="Add link"/>
		</form>
	</div>
    </div>
  </div>
  
  <div  class="container6" onselect="getSelectionText();" oncontextmenu="return showContextMenu();" style="margin-top: -12px;height: 908px;margin-left: 0px;margin-right: 23px;width: 1349px;">
  <div class="col-sm-9" id="mydiv">
  <div id="contextMenu" class="context-menu">
			<ul>
			<li id="c" onclick="loadsugg();">Add to Suggestions</li>
			<li onclick="addactivitysame()">Add to Activity notes in same line</li>
			<li onclick="addactivity()">Add to Activity notes in new line</li>
			<li class="separator"></li>
			<li>D</li>
			<li>F</li>
			</ul>
	</div>
    </div>
  <div class="col-sm-3">
      <h3 style="margin-left: 60px;">Activity Notes</h3>
	  <form id="connect_form1" name="connect_form1" action="" method="POST" enctype="multipart/form-data">
	  <h6><textarea id="area1" name="area1" cols="50" rows="34" style="margin-left: -62px;width: 382px;"><?php echo $paste_activity; ?></textarea></h6>
	  <div class="form-group">
	  <h6><select id="mySelect1" name="mySelect1" onchange="myFunction()" style="margin-left: -19px;">
			<option value=" ">Select File</option>
			<?php while($statement10->fetch()) { ?>
			<option value="<?php echo $name1; ?>"><?php echo $name1; ?></option>
			<?php } ?>
		  </select></h6><button class="btn contact_button1" type="submit" name="loadact" id="loadact" style="margin-left: 70px;margin-top: -54px;">Open</button>
	  <button type="submit" id="save1" name="save1" class="btn contact_button1" onclick="" style="margin-top: -54px;">Save as Local</button>
		<input class="" id="ex1" name="ex1" type="text" placeholder="enter file name to save" value="" style="margin-left: -18px;height: 29px;">
	  <button class="btn contact_button1" type="submit" name="saves" id="saves">Save</button>
	  </div>
	  </form>
    </div>
  </div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script2.js"></script>
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="urlpara.js"></script>
  <script src="contextscript.js"></script>
  <script>
	function Get(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
			while(sParameterName[1].indexOf("%20") !== -1)
			{
				sParameterName[1] = sParameterName[1].replace("%20", "+");
			}
            return sParameterName[1];
        }
    }
}
	var d1=document.getElementById("g3").value;
	d1=Get('a');
	document.getElementById("mydiv").innerHTML='<h3 style="margin-left: 329px;">Wikipedia Suggestion</h3><object data=https://en.wikipedia.org/wiki?search='+d1+' style="width: 940px;margin-left: -4px;margin-top: -1px;height: 850px;">';
function replacespace(sParam)
{
    //var sPageURL = window.location.search.substring(1);
    var sURLVariables = sParam;
	sURLVariables=sURLVariables.split(' ').join('+');
	return sURLVariables;
}
	function addgoogle()
	{
		var v1='http://www.google.com/search?q=';
		var q1=document.getElementById('g1').value;
		v1+=replacespace(q1);
		document.getElementById('area1').value+='\n';
		document.getElementById('area1').value+=v1;
	}
	function addyoutube()
	{
		var v1='https://www.youtube.com/results?search_query=';
		var q1=document.getElementById('g2').value;
		v1+=replacespace(q1);
		console.log(v1);
		document.getElementById('area1').value+='\n';
		document.getElementById('area1').value+=v1;
	}
	function addwiki()
	{
		var v1='https://en.wikipedia.org/wiki?search=';
		var q1=document.getElementById('g3').value;
		v1+=replacespace(q1);
		console.log(v1);
		document.getElementById('area1').value+='\n';
		document.getElementById('area1').value+=v1;
	}
	function addquora()
	{
		var v1='https://www.quora.com/search?q=';
		var q1=document.getElementById('g4').value;
		v1+=replacespace(q1);
		console.log(v1);
		document.getElementById('area1').value+='\n';
		document.getElementById('area1').value+=v1;
	}
	function addtamil()
	{
		var v1='https://www.google.com/search?q=';
		var q1=document.getElementById('g5').value;
		v1+=replacespace(q1);
		v1+='+meaning+in+tamil';
		console.log(v1);
		document.getElementById('area1').value+='\n';
		document.getElementById('area1').value+=v1;
	}
	function addtelugu()
	{
		var v1='https://www.google.com/search?q=';
		var q1=document.getElementById('g6').value;
		v1+=replacespace(q1);
		v1+='+meaning+in+telugu';
		console.log(v1);
		document.getElementById('area1').value+='\n';
		document.getElementById('area1').value+=v1;
	}
	function ltelugu(){
		var q1=document.getElementById('g6').value;
		var v1=replacespace(q1);
		window.open('https://www.google.com/search?q='+v1+'+meaning+in+telugu',"_blank")
	}
	function ltamil(){
		var q1=document.getElementById('g5').value;
		var v1=replacespace(q1);
		window.open('https://www.google.com/search?q='+v1+'+meaning+in+tamil',"_blank")
	}
	function openg(){
		var q1=document.getElementById('g1').value;
		var v1=replacespace(q1);
		window.open('https://www.google.com/search?q='+v1,"_blank")
	}
	function openy(){
		var q1=document.getElementById('g2').value;
		var v1=replacespace(q1);
		window.open('https://www.youtube.com/results?search_query='+v1,"_blank")
	}
	function openw(){
		var q1=document.getElementById('g3').value;
		var v1=replacespace(q1);
		window.open('https://en.wikipedia.org/wiki?search='+v1,"_blank")
	}
	function openq(){
		var q1=document.getElementById('g4').value;
		var v1=replacespace(q1);
		window.open('https://www.quora.com/search?q='+v1,"_blank")
	}
	function myFunction() {
	var x=document.getElementById("mySelect1").value;
	document.getElementById("ex1").value=x;
	}
	function upsearch(){
		var x=document.getElementById("note-textarea").value;
		console.log(x);
		document.getElementById("g1").value=x;
		document.getElementById("g2").value=x;
		document.getElementById("g3").value=x;
		document.getElementById("g4").value=x;
		document.getElementById("g5").value=x;
		document.getElementById("g6").value=x;
		document.getElementById("note-textarea").value='';
	}
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script2.js"></script>
<script src="script.js"></script>
<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
</body>
</html>