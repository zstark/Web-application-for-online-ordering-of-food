		</content>
		<script src="js/main.js"></script>
		<script src="js/thumbnail.js"></script>
		<script type="text/javascript">
			window.onload = function(){
				for(var i=0;i<window.__ONLOADMETHODS.length;i++){
					window.__ONLOADMETHODS[i]();
				}
			}
			window.onresize = function(){
				//console.log("TEST");
				for(var i=0;i<window.__ONRESIZEMETHODS.length;i++){
					window.__ONRESIZEMETHODS[i]();
				}
			}
			for(var i=0;i<document.__ONLOADMETHODS.length;i++){
				document.__ONLOADMETHODS[i]();
			}
		</script>
	</body>
</html>

<?php 
ob_flush();
?>