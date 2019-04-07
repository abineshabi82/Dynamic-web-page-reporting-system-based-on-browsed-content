function GetURLParameter(sParam)
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
				sParameterName[1] = sParameterName[1].replace("%20", " ");
			}
            return sParameterName[1];
        }
    }
}
var ab = GetURLParameter('a');                     // 
document.getElementById('g1').value=ab;
document.getElementById('g2').value=ab;
document.getElementById('g3').value=ab;
document.getElementById('g4').value=ab;
document.getElementById('g5').value=ab;
document.getElementById('g6').value=ab;
