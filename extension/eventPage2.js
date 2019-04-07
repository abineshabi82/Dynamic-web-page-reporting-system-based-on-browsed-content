var contextMenuItem1 ={
	"title":"add current page link to activity notes",
	"contexts":["selection"],
	"id": "checkclickbaits2"
};

chrome.contextMenus.create(contextMenuItem1);

chrome.contextMenus.onClicked.addListener(onClickHandler);

function onClickHandler(info,tabs){
	if(info.menuItemId=="checkclickbaits2"){
		chrome.tabs.getSelected(null, function(tab){
			//alert(tabs.url);
	var Text=info.selectionText;
	var currentdate = new Date();
    var datetime = "Created on : " + currentdate.getDate() + "/"+(currentdate.getMonth()+1) 
    + "/" + currentdate.getFullYear() + " @ " 
    + currentdate.getHours() + ":" 
    + currentdate.getMinutes() + ":" + currentdate.getSeconds();
	var sText=tabs.url;
	var url="http://localhost/Popup.php?add="+encodeURIComponent(sText)+"&title="+Text+"&date="+datetime;
	window.open(url,'_blank');
		});
	}
};
