var contextMenuItem ={
	"title":"add to activity notes",
	"contexts":["selection"],
	"id": "checkclickbaits"
};

chrome.contextMenus.create(contextMenuItem);

chrome.contextMenus.onClicked.addListener(onClickHandler);

function onClickHandler(info,tab){
	if(info.menuItemId=="checkclickbaits"){
	var sText=info.selectionText;
	var currentdate = new Date();
    var datetime = "Created on : " + currentdate.getDate() + "/"+(currentdate.getMonth()+1) 
    + "/" + currentdate.getFullYear() + " @ " 
    + currentdate.getHours() + ":" 
    + currentdate.getMinutes() + ":" + currentdate.getSeconds();
var url="http://localhost/Popup.php?add="+encodeURIComponent(sText)+"&date="+datetime;
	window.open(url,'_blank');
	}
};
