		</content>
		<footer>
			<p>&copy; <?php echo Date("Y"). " "; ?> DefineTP Media. All Rights Reserved.</p>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="js/appinit.js"></script>
		<?php
			if(APP_DEBUG == true){
				$all_vars = get_defined_vars();
				echo "<pre>";
				var_dump($all_vars);
				echo "</pre>";
			}
		?>
	</body>
</html>