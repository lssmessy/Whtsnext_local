var xmlHttp=createXmlHttpRequestObject();
function createXmlHttpRequestObject(){
	var xmlHttp;
	if(window.ActiveXObject)
	{
		try{
		xmlHttp=new ActiveXObject('Microsoft.XMLHTTP');
		}catch(e){ alert('error occured');}
	}
	else{
		try{
		xmlHttp=new XMLHttpRequest();
		}catch(e){ alert('error occured');}
	}
	if(!xmlHttp) alert("can't create Object");
	else return xmlHttp;

}
function process(){
	if(xmlHttp.readyState==0 || xmlHttp.readyState==4)//Object is free or ready to do some stuff
	{
			food=encodeURIComponent(document.getElementById('userInput').value);//encode user entered value
			xmlHttp.open("GET","foodstore.php?food="+food,true);//GET is type of request, url for getting parameter, true means do things asynchronously 
			//Open create the type of request which we want to send
			xmlHttp.onreadystatechange=handleServerResponse;//when server respond to our request call handleServerResponse to handle the response
			xmlHttp.send(null);//whenever we are sending the request with GET method, set always null parameter. when it will be post there will be different parameters
			
	}
	else{
		setTimeout(process(),1000);//wait for 1 sec(1000miliseconds) and then check whether object is free or not? if its free then call 'process()'
	}
}
function handleServerResponse()
{
	if(xmlHttp.readyState==4){//readyState==4 means response is ready and object is done communicating
			if(xmlHttp.status==200)//communication went 'ok'
			{
				
				xmlResponse=xmlHttp.responseXML;//its our whole xml
				xmlDocumentElement=xmlResponse.documentElement;//root element of xml
				message=xmlDocumentElement.firstChild.data;//first child of root element ..here we have '<response>' and data is our actual message (echo)
				document.getElementById('underInput').innerHTML=message;//innerHTML is the data between the tags i.e, <div> abc </div>..here 'abc' is 'innerHTML'
			
			}
			else 
			{
				alert('Something went wrong');
			}
}
}