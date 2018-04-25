"use Strict"
console.log("init loaded");

	$(document).ready(function(){
		
		$.getScript("dist/moment/moment.js", function(data, textStatus, jqxhr){
			console.log("moment.js loaded in successfully");
			if(jqxhr.status == 200){
				$.ajax({
					url: "dist/ledger.js",
					dataType: "script",
					success: function(){
						var appointments = new ledger({
						'openTime' : 8,
						'closeTime': 23,
						'timeIncrement' : 80,
						'format' : 2
						});
					},
					error: function(){
						console.log("Critical Error Loading Appointment Ledger Please Contact Our Support Team.");
					}
				});
			}
		});
	});