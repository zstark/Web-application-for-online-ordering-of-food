<?php session_start(); $ns = 0; ?>
<html>

	<head>
		<base href="" target="_self">
		<title>
			<?php echo($_PAGE_TITLE); ?>
		</title>
		<link rel="stylesheet" href="style/fa/css/font-awesome.min.css">
		<link rel="stylesheet" href="style/main.css">
	</head>

	<body class="content-loader" id="main">
		
		<script type="text/javascript">
			function setCookie(cname, cvalue, exdays) {
			    var d = new Date();
			    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			    var expires = "expires="+d.toUTCString();
			    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
			}

			function getCookie(cname) {
			    var name = cname + "=";
			    var ca = document.cookie.split(';');
			    for(var i = 0; i < ca.length; i++) {
			        var c = ca[i];
			        while (c.charAt(0) == ' ') {
			            c = c.substring(1);
			        }
			        if (c.indexOf(name) == 0) {
			            return c.substring(name.length, c.length);
			        }
			    }
			    return "";
			}
		</script>