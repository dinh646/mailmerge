<!DOCTYPE html>
<?php $url = base_url(); //echo $url; ?>
<html>
	<head>
		<!-- Title here -->
		<title>:: EMAIL ::</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
    <link href="<?php echo $url;?>templates/web_default/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="<?php echo $url;?>templates/web_default/css/font-awesome.min.css" rel="stylesheet">	
		<!-- Animate CSS -->
		<link href="<?php echo $url;?>templates/web_default/css/animate.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="<?php echo $url;?>templates/web_default/css/style.css" rel="stylesheet">
		
		<!-- Favicon -->
	
	</head>
	
	<body>
		
		<div class="outer">
		
			<!-- Sidebar Start-->
			<!-- Menu for tablets and mobile -->
			<div class="navigation">
				<a href="#">Menu</a>
			</div>
			<div class="sidebar">
				<!-- Logo of company -->
				<div class="logo text-center">
					<h1><a href="#">EMAIL</a></h1>
					<p>mail merge</p>
				</div>
				<div class="sidebar-search">
					<form>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Text to search">
							<span class="input-group-btn">
								<button class="btn btn-danger" type="button"><i class="icon-search"></i></button>
							</span>
						</div>
					</form>
				</div>
				<!-- Navigation menu list -->
				<ul class="list-unstyled list">Thêm email
					<li><a href="#home" class="anchorLink"><i class="icon-home scolor"></i>Gui mail</a></li>
					<li class="dropdown">
							<a data-toggle="dropdown" href="#"><i class="icon-plus-sign scolor"></i>Tien ich<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" >
                <li><a href="#"><font style="font-family: sans-serif, Arial;">Thêm email hýõng</font></a></li>
                <li><a href="#">Thêm email</a></li>
							</ul>
					</li>
				</ul>
				<!-- Social media links -->
				
			</div>
			
			<!-- Sidebar End -->
			
			<!-- Main Start -->
			
			<div class="main">
				
				<div class="container">
				
			   <h3>Home</h3>
					<hr />
				
					
					

					
					<!-- Footer -->
				<footer>
					<div class="row">
						<div class="col-md-12">
							<hr />
							<br />
							<!-- You should not remove the footer link back. -->
							<p class="text-center">Copyright 2013 - <a href="#">Your Website</a> - Designed by <a href="http://responsivewebinc.com/bootstrap-themes">Bootstrap Themes</a></p>
							<br />
						</div>
					</div>
				</footer>
				
				</div>
				
				
				
			</div>	<!-- This end div for main class -->
		</div>
		
		<div class="clearfix"></div>
		
		
		<!-- Scroll to top -->
      <span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="<?php echo $url;?>templates/web_default/js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="<?php echo $url;?>templates/web_default/js/bootstrap.min.js"></script>
	</body>	
</html>