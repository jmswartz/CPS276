"use strict";

let name = {}

name.init = function(){
	Util.addLis(Util.getEl('#addName')[0], 'click', name.addName);
	Util.addLis(Util.getEl('#getNames')[0], 'click', name.displayNames);
	Util.addLis(Util.getEl('#flname')[0], 'focus', name.clearList);
	Util.addLis(Util.getEl('#clearNames')[0], 'click', name.clearNames);
}

name.clearList = function(){
	Util.getEl('#displayNames')[0].innerHTML = "";
}

name.clearNames = function(){
	Util.getEl('#msg')[0].innerHTML = "";
	Util.sendRequest('php/clearNames.php', function(res){
		let json;

		console.log(res.responseText);
		json = JSON.parse(res.responseText);


		if(json.masterstatus == 'error'){
			Util.getEl('#msg')[0].innerHTML = json.msg;
		}
		else {
			Util.getEl('#msg')[0].innerHTML = json.msg;
			Util.getEl('#flname')[0].value = "";
			Util.getEl('#displayNames')[0].innerHTML = "";
		}
	});

}

name.addName = function(){
	let data = {}
	Util.getEl('#displayNames')[0].innerHTML = "";
	Util.getEl('#msg')[0].innerHTML = "";
	if(Util.getEl('#flname')[0].value === ""){
		Util.getEl('#msg')[0].innerHTML = "You must enter a name";
		return;
	}
	
	data.name = Util.getEl('#flname')[0].value;

	data = JSON.stringify(data);

	Util.sendRequest('php/addName.php', function(res){
		let json;

		console.log(res.responseText);
		json = JSON.parse(res.responseText);


		if(json.masterstatus == 'error'){
			Util.getEl('#msg')[0].innerHTML = json.msg;
		}
		else {
			Util.getEl('#msg')[0].innerHTML = json.msg;
			Util.getEl('#flname')[0].value = "";

		}
		
	}, data);
}

name.displayNames = function(){

	Util.getEl('#msg')[0].innerHTML = "";
	Util.sendRequest('php/displayNames.php', function(res){
		let json;
		console.log(res.responseText);
		json = JSON.parse(res.responseText);
		
		if(json.masterstatus == 'error'){
			Util.getEl('#msg')[0].innerHTML = json.msg;
		}
		else {
			Util.getEl('#displayNames')[0].innerHTML = json.names;
			Util.getEl('#flname')[0].value = "";
		}
	});
}

name.init();