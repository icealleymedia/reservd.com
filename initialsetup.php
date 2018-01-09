<? require_once("includes/header.php"); ?>
<!-- Form Starts Here -->
	<form id="businessform" action="api/authenticate.php" method="post">
<!-- Progress Bar -->	
		<ul id="progress-bar">		
			<li class="active">Business Setup</li>
			<li>Location</li>
			<li>Services</li>
			<li>Payment Plans</li>
			<li>Payment Information</li>
		</ul>	
	<!-- Fields -->
	<!--Business Setup-->
		<fieldset>
			<h2 class="field-title">Let's get started!</h2>
				<h3 class="field-subtitle">Provide your business information</h3>
					<input type="text" name="business name" placeholder="Enter your business name" />
					<input type="url" name="url" placeholder="Enter your company's website" />
					<input type="email" name="email" placeholder="Hey! What's your email?" />
					<input type="text" name="phone" placeholder="Ring..Ring.." />
					<textarea name="address" placeholder="Where are you located?"></textarea>
				<input type="button" name="next" class="next-action-button" value="Next"/>
		</fieldset>		
		
			
	<!--Services-->
		<fieldset>
			<h2 class="field-title">We got you covered here!</h2>
				<h3 class="field-subtitle">Choose your industry</h3>
					<input type="text" name="service name" placeholder="Enter your primary service name" />
					<input list="industries" name="industries" />
						<datalist id="industries">
							<option value="Restaurant"></option>
							<option value="Clinic"></option>
							<option value="123"></option>
							<option value="456"></option>
							<option value="789"></option>
							<option value="abc"></option>
						</datalist>
					<input type="number" name="duration" placeholder="Hey! What's your email?" />
					<input type="number" name="spots" placeholder="Quantity of spots" />
					<input type="range" name="hours" multiple="" />
				<input type="button" name="next" class="next-action-button" value="Next"/>
		</fieldset>		

	<!--Plans-->
		<fieldset>
			<h2 class="field-title">You are half way done!</h2>
				<h3 class="field-subtitle">Select your preferred plan</h3>
					<input type="text" name="business name" placeholder="Enter your business name" />
				<input type="button" name="next" class="next-action-button" value="Next"/>
		</fieldset>		

	<!--Payment Informaiton-->
		<fieldset>You are almost done!
			<h2 class="field-title">You are almost done!</h2>
				<h3 class="field-subtitle">How would you like to pay for this service?</h3>
				<!-- Payment Type -->
				<ul class="payment-type-list">
					<li>
						<label>Paypal</label>
						<input type="radio" name="payment-method" value="pp">
					</li>
					<li>
						<label>Amex</label>
						<input type="radio" name="payment-method" value="ae">
					</li>
					<li>
						<label>Mastercard</label>
						<input type="radio" name="payment-method" value="mc">
					</li>
					<li>
						<label>Visa</label>
						<input type="radio" name="payment-method" value="vs">
					</li>
					<li>
						<label>Discover Card</label>
						<input type="radio" name="payment-method" value="dc">
					</li>
				</ul>
					<div id="cc-info">
						<input type="text" name="cc-number" placeholder="Card Number" />
						<!-- expiry date input -->
						<label>Expiry</label>
						<div>
							<span>
								<select id="expMonth" name="expMonth">
									<option value="00">MM</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</span>
							<span>
								&#47;
							</span>
							<span>
								<select id="expYear" name="expYear">
									<option value="00">YY</option>
								</select>
							</span>
						</div>
						<input type="text" name="cvv" placeholder="Enter 3-digit numeric security code" />
					</div>
					<div id="pp-info">
						<input type="email" name="email" placeholder="Enter Paypal Account Email Here" />
					</div>
				<input type="button" name="next" class="next-action-button" value="Next"/>
		</fieldset>		

		</form>
<? require_once("includes/footer.php"); ?>