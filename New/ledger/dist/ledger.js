"use strict"

var ledger = function(options){
	this.options = (options === undefined) ? {} : options;
	
	this.setAttributes();
	
	this.ready()
}

ledger.prototype.setAttributes = function(){
	this.container 			= (this.options.container) 	   		? this.options.container 		: "content";
	this.theDate 			= (this.options.theDate)	   		? this.options.theDate			: new Date();
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
	var timeLoop = moment(this.openTime, "hh");
	var close = moment(this.closeTime, "hh");
	console.log(this.closeTime);
	console.log(timeLoop.format("LT"));
	console.log(close.format("LT"));
	console.log(moment().format("MMMM Do YYYY"));
	while(timeLoop < close){
		if(this.format == 1){
			this.timebar += '<li><span class="time-label"> ' + timeLoop.format("h:mm A") + '</span></li>';
		}else{
			this.timebar += '<li><span class="time-label"> ' + timeLoop.format("kk:mm") + '</span></li>';
		}
		timeLoop.add(this.timeIncrement, "m");
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
	console.log(this.theDate.getMonth() + '-' +  this.theDate.getDate() + '-' + this.theDate.getFullYear());
}
ledger.prototype.addBooking = function(){
	
}

ledger.prototype.removeBooking = function(){
	
}

ledger.prototype.editBooking = function(){
	
}