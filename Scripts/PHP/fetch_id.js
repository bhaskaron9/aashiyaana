function view()
{
	var url="fetch_this.php";
	load_my_URL(url,function(data){
	var xml=parse_my_XMLdata(data);
	var mnodes=xml.documentElement.getElementsByTagName("id");
	var html="";
	var i;
	if(mnodes.length==0)
	{
	html="No ids!!";
	}
	else
	{
	for(i=0;i<mnodes.length;i++)
	{
		var j=i+1;
		var link=mnodes[i].getAttribute("id_no");
		html+= j+". "+link+"<br>";
	}
	}
	document.getElementById("my_id").innerHTML=html;
});
}

//the function requests XMLHttpRequest and calls a callback function, it open the given url and returns the response through responseText
function load_my_URL(url,do_func)
{
	var my_req=window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
	 my_req.onreadystatechange = function() {
        if (my_req.readyState == 4) {
		  //document.getElementById("link").value="";
		  do_func(my_req.responseText, my_req.status);
          my_req.onreadystatechange = no_func();
          
        }
      };
	my_req.open('GET',url,true);
	my_req.send(null);
}
function parse_my_XMLdata(data)
{
	if(window.ActiveXObject)
	{
		var doc=new ActiveXObject('Microsoft.XMLDOM');
		doc.loadXML(data);
		return doc;
	}
	else if(window.DOMParser)
	{
		return (new DOMParser).parseFromString(data,'text/xml');
	}

}
function no_func(){}
window.onload=view();