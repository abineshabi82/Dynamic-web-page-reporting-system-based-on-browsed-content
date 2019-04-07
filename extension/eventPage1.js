var contextMenuItem1 ={
	"title":"add to suggestion notes",
	"contexts":["selection"],
	"id": "checkclickbaits1"
};

chrome.contextMenus.create(contextMenuItem1);

chrome.contextMenus.onClicked.addListener(onClickHandler);

function onClickHandler(info,tab){
	if(info.menuItemId=="checkclickbaits1"){
	var sText=info.selectionText;
	var currentdate = new Date();
    var datetime = "Created on : " + currentdate.getDate() + "/"+(currentdate.getMonth()+1) 
    + "/" + currentdate.getFullYear() + " @ " 
    + currentdate.getHours() + ":" 
    + currentdate.getMinutes() + ":" + currentdate.getSeconds();
var url="http://localhost/Popup1.php?add="+encodeURIComponent(sText)+"&date="+datetime;
	window.open(url,'_blank');
	}
};
