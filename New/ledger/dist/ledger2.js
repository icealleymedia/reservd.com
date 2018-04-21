"use strict"

var ledger = function(options){
	this.options = (options === undefined) ? {} : options;
	
	this.setAttributes();
	
	this.ready()
}

ledger.prototype.setAttributes = function(){
	this.container 			= (this.options.container) 	   		? this.options.container 		: "content";
	this.openTime  			= (this.options.openTime)      		? this.options.openTime  		: 9;
	this.closeTime 			= (this.options.closeTime)     		? this.options.closeTime 		: 17;
	this.format    			= (this.options.format)    	   		? this.options.format    		: 2; /* 1 = Display time in AM/PM. 2 = Display time in Military Format */
	this.view 	   			= (this.options.view)      	   		? this.options.view 	   		: "timetable";
	this.timeIncrement  	= (this.options.timeIncrement) 		? this.options.timeIncrement 	: 60;
	this.things				= (this.options.things)		   		? this.options.thing			: 1;
	this.thingsIdentifier	= (this.options.thingsIdentifier)	? this.options.thingIdentifier	: "Lane"; 
	}


ledger.prototype.ready = function(){
	$(this.container).prepend("<p>Appointment ledger Initialized....</p>");
	this.setScope();
	this.getThings();
}

ledger.prototype.setScope = function (){
	this.timebar = "<time><header><ul>";
	var d = new Date();
	var h = d.setHours(this.openTime);
	for(i = h; i <= this.closeTime; i++){
		var timeslot = "" ;
		this.timebar += '<li><span class="time-label"> ' + this.formatTime(i) + '</span></li>';
		if(this.timeIncrement == 30){
			timeslot = i + ":30";
			this.timebar += '<li><span class="time-label"> ' + timeslot + '</span></li>';
		}
	}
	this.timebar += '</ul></header></time>';
	
	this.Draw();
}

ledger.prototype.formatTime = function(time){
	var formatedTime = "";
	formatedTime += time + ":00";
	return(formatedTime);
}

ledger.prototype.Draw = function(){
	$(this.container).empty();
	$(this.container).prepend('<div class="ledger"></div>');
	$('div.ledger').append(this.timebar);
}
ledger.prototype.getThings = function(){
	this.thingsoutput = '<aside><ul>';
	this.thingsoutput += '<li>' + this.thingsIdentifier + ' ' + this.things + '</li>';
	this.thingsoutput += '</ul></aside>';
	
	$(this.container).append(this.thingsoutput);
}
ledger.prototype.addBooking = function(){
	
}

ledger.prototype.removeBooking = function(){
	
}

ledger.prototype.editBooking = function(){
	
}