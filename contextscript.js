	window.onclick=hideContextMenu;
	window.onkeydown=listenKeys;
	var contextMenu=document.getElementById('contextMenu');
	function showContextMenu(){
		contextMenu.style.display='block';
		contextMenu.style.left=event.clientX+'px';
		contextMenu.style.top=event.clientY+'px';
		return false;
		return false;
	}
	function hideContextMenu(){
		contextMenu.style.display='none';
	}
	
	function listenKeys(event)
	{
		var keyCode=event.which||event.keyCode;
		if(keyCode==27){
			hideContextMenu();
		}
	}
function getSelectionText(){
	var quotearea = document.getElementById('area');
var output = document.getElementById('output');
quotearea.addEventListener('mouseup', function(){
    if (this.selectionStart != this.selectionEnd){
        var selectedtext = this.value.substring(this.selectionStart, this.selectionEnd);
        document.getElementById("output").innerHTML = selectedtext;
    }
}, false);
}
function loadsugg(){
		text2=document.getElementById('output');
		t1=document.getElementById('h').value;
		var text3  = text2.textContent || text2.innerText;
		if(text3!='')
		{
		baseURL = "suggestions.php?a="+text3;
		baseURL +="&email="+t1;
		//location.href = baseURL;
		window.open(baseURL,"_blank")
		}
}

function addactivity(){
		text4=document.getElementById('output');
		var text3  = text4.textContent || text4.innerText;
		if(text3!='')
		{
			document.getElementById('area1').innerHTML+='\n';
			document.getElementById('area1').innerHTML+=text3;
			document.getElementById('area1').innerHTML+='\n';
			document.getElementById('area1').innerHTML+='^';
		}
}
function addactivitysame(){
		text4=document.getElementById('output');
		var text3  = text4.textContent || text4.innerText;
		if(text3!='')
		{
			document.getElementById('area1').innerHTML+=' ';
			document.getElementById('area1').innerHTML+=text3;
			document.getElementById('area1').innerHTML+='\n';
			document.getElementById('area1').innerHTML+='^';
		}
}
function add_read(){
		var text5=document.getElementById('output');
		var text3  = text5.textContent || text5.innerText;
			document.getElementById('note-textarea').innerHTML+=' ';
			document.getElementById('note-textarea').innerHTML+=text3;
}