function sendRequest(url){

	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if(this.status == 200){
			
			
			document.getElementById("textFromGet").innerHTML = this.responseText;
		}
	}
	xhttp.onload=function(){
		var ourData = JSON.parse(xhttp.responseText);
		console.log(ourData.customerList[0].referenceNumber);
		//document.getElementById("textFromGet").innerHTML = ourData.customerList[0].referenceNumber;
		renderHTML(ourData);
	}

	xhttp.open("GET",url,true);

	xhttp.setRequestHeader("Content-Type", "application/json");
	xhttp.setRequestHeader("Accept", "application/json");
	xhttp.setRequestHeader("businessID", "BUSN-4ab3fe25c2bdc429a430e231f5f87aad07342d18c502502c917354d0adbffc2a");
	xhttp.setRequestHeader("apiKey", "prod-ac383b2dcc8a321d708fa03cc7968e2dfd49a7a2b4fd10c865acac27f0eda56248183de09dad3979dc1ebb0f08fe2b9b7d9df6c92bedc297cb7847b9e6d1a3dc");
	
	xhttp.send();
}
function renderHTML(data){
    var htmlString="";

    for(i=0; i<data.length; i++){
        console.log(data[i]);
    }
}
function changeMenu(x){

    x.classList.toggle("change");
    document.getElementById("dropdown").classList.toggle("show");
}

function newAjax(){
	var url = "https://certwebservices.ft.cashedge.com/sdk/Payments/Customers";
	var cityLine = document.getElementById("city").value;
	var firstLine = document.getElementById("firstLine").value;
	var stateLine = document.getElementById("state").value;
	var zipLine = document.getElementById("zip").value;
	var emailLine = document.getElementById("email").value;
	var fName = document.getElementById("firstName").value;
	var lName = document.getElementById("lastName").value;
	var phone = document.getElementById("phone").value;
	
	var requestObj = { address: {city: cityLine, line1: firstLine, state: stateLine, zip: zipLine},
			email: emailLine, personName: {firstName: fName, lastName: lName}, 
			phone1: phone, requestID: "test", mode: "initiate"};
	var toJSON = JSON.stringify(requestObj);
	console.log(toJSON);
	var request = new XMLHttpRequest();
	request.open('POST', url, true);
	request.setRequestHeader("Content-Type", "application/json");
	request.setRequestHeader("businessID", "BUSN-4ab3fe25c2bdc429a430e231f5f87aad07342d18c502502c917354d0adbffc2a");
	request.setRequestHeader("apiKey", "prod-ac383b2dcc8a321d708fa03cc7968e2dfd49a7a2b4fd10c865acac27f0eda56248183de09dad3979dc1ebb0f08fe2b9b7d9df6c92bedc297cb7847b9e6d1a3dc");
	
	request.send(toJSON);
	
	request.onreadystatechange = processRequest;
	function processRequest(e){
		if(request.readyState == 4 && request.status == 200)
			console.log('customer added successfully!');
			alert(request.responseText);
	}
	
}
