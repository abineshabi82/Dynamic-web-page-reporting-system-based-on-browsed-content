
        
        function showmenu(ev){
            //stop the real right click menu
            ev.preventDefault(); 
            //show the custom menu
            console.log( ev.clientX, ev.clientY );
            menu.style.top = `${ev.clientY - 20}px`;
            menu.style.left = `${ev.clientX - 20}px`;
            menu.classList.remove('off');
        }
        
        function hidemenu(ev){
            menu.classList.add('off');
            menu.style.top = '-200%';
            menu.style.left = '-200%';
        }
		
function myFunction() {
  alert("You selected some text!");
}
function openfile()
{
var x=document.getElementById("myEmbed").value;
var pos = x.lastIndexOf("\\");
pos=pos+1;
x=x.substr(pos);
//alert("Could you like to open this file   "+x);
document.getElementById("di").innerHTML="<embed src="+x+" contextmenu=mymenu width=1150px height=1000px><menu type=context id=mymenu><menuitem label=Refresh></menuitem><menu label=Share on...><menuitem label=Twitter></menuitem><menuitem label=Facebook icon=ico_facebook.png></menuitem></menu><menuitem label=EmailThisPage></menuitem></menu></embed>";
//<embed src="x" width="50%" height="500px" oncontextmenu="alert('menu'); return false" onselect="myFunction()"></embed>
}
function onChangeTest(textbox) 
	{
		//"<a href=http://www.google.com/for></a>";
        alert("Value is " + textbox.value + "\n" + "Old Value is " + textbox.oldvalue);
    }
	
	function check_web_storage_support() {
    if(typeof(Storage) !== "undefined") {
        return(true);
    }
    else {
        alert("Web storage unsupported!");
        return(false);
    }
}
	
function speaks() {
if(check_web_storage_support() == true) {
    var area = document.getElementById("area");
    if(area.value != '') {
		console.log(area.value);
		responsiveVoice.speak(area.value);
    }
    else {
        alert("Nothing to speak");
    }
    }
}
function stopspeaks() {
		responsiveVoice.pause();
}
function resumespeaks() {
		responsiveVoice.resume();
}
function cancelspeaks() {
		responsiveVoice.cancel();
}
	
function speak() {
if(check_web_storage_support() == true) {
    var area = document.getElementById("note-textarea");
    if(area.value != '') {
		console.log(area.value);
		responsiveVoice.speak(area.value);
    }
    else {
        alert("Nothing to save");
    }
    }
}