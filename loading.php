<!DOCTYPE html>
<html>
<head>
	<title>MedWeb</title>
	<style>
		:root {
			--background: #005;
			--primary: #88D5BF;
			--secondary: #5D6BF8;
			--third: #e27fcb;
		}

		* {
		  box-sizing: border-box;
		}

		body {
		  background: #005;
		  overflow: hidden; /* Hide the scrollbar during the loading animation */
		}

		.container {
		  align-items: center;
		  display: flex;
		  height: 100vh;
		  justify-content: center;
		}

		.shape {
		  background: linear-gradient(45deg, var(--primary) 0%, var(--secondary) 100%);
		  animation: morph 8s ease-in-out infinite;
		  border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
		  height: 400px;
		  transition: all 1s ease-in-out;
		  width: 400px;
		  z-index: 5;
		}

		@keyframes morph {
		  0% {
			border-radius:  60% 40% 30% 70% / 60% 30% 70% 40%;
			background: linear-gradient(45deg, var(--primary) 0%, var(--secondary) 100%);
		  } 
	
		  50% {
			border-radius:  30% 60% 70% 40% / 50% 60% 30% 60%;
			background: linear-gradient(45deg, var(--third) 0%, var(--secondary) 100%);
		  }
  
		  100% {
			border-radius:  60% 40% 30% 70% / 60% 30% 70% 40%;
			background: linear-gradient(45deg, var(--primary) 0%, var(--secondary) 100%);
		  } 
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="shape"></div>
	</div>

	<script>
		// Wait for 5 seconds before redirecting to index.php
		setTimeout(function(){
			window.location.href = 'index.php';
		}, 7000);
	</script>

	<!-- Your content goes here -->
	<?php include('index.php'); ?>
</body>
</html>
