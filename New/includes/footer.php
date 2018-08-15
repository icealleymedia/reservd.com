		</content>
		<footer>
			<p>&copy; <?php echo Date("Y"). " "; ?> DefineTP Media. All Rights Reserved.</p>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://cdn.icealleymedia.com/New/js/appinit.js"></script>
		
		<?php
			if(APP_DEBUG == true){
				$all_vars = get_defined_vars();
				echo "<h5>Debugging Information</h5>";
				echo "<pre>";
				var_dump($all_vars);
				echo "</pre>";
			}
			if($_SERVER["REQUEST_URI"] == "/New/ledger/"){ ?>
				<script src="js/init.js"></script>
			<?php }?>
	</body>
</html>