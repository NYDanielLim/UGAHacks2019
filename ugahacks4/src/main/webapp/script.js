function sendRequest(url){

	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if(this.status == 200){
			document.getElementById("textBoxGET").innerHTML = this.responseText;
		

		}
	}

	xhttp.open("GET",url,true);

	xhttp.setRequestHeader("Content-Type", "application/json");
	xhttp.setRequestHeader("Accept", "application/json");
	xhttp.setRequestHeader("businessID", "BUSN-4ab3fe25c2bdc429a430e231f5f87aad07342d18c502502c917354d0adbffc2a");
	xhttp.setRequestHeader("apiKey", "prod-ac383b2dcc8a321d708fa03cc7968e2dfd49a7a2b4fd10c865acac27f0eda56248183de09dad3979dc1ebb0f08fe2b9b7d9df6c92bedc297cb7847b9e6d1a3dc");
	
	xhttp.send();
}