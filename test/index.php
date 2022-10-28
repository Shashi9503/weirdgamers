<?php
	session_start();
	if(isset($_SESSION['login_email']))
	{
		header("Location: dashboard/");
		exit(0);
	}
	else
	{
?>
<!doctype html>
<html lang="en">

    <head>

		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Play and earn, Play and Win, Earn money online, Earn Huge Cash Prizes & Rewards, Play PUBG and earn, Play Freefire and earn, Pubg, FreeFire, Battleground India, PUBG Mobile Tournament App free, FreeFire Tournament App for Free.">

        <meta name="keywords" content="games, Play and Win, Play and earn, play games and earn online, earn cash and rewards, car games, pubg, freefire, battlegrounds india, pubg tournaments, freefire tournaments, shooting games,">

          <meta property="og:title" content="WeirdGamers - Play and Earn" />
          <meta property="og:type" content="website" />
          <meta property="og:url" content="https://weirdgamers.com" />
          <meta property="og:image" alt="WeirdGamers" content="https://weirdgamers.com/assets/img/backgrounds/weird.webp" />
          <meta property="og:description" content="₹1000 prize pool.Play your favouirates games PUBG & Freefire and earn money more than ₹1000 daily. Weirdgamers is the Platform which makes this possible. Play PUBG & Earn Instant Cash!" />
        <title>Weirdgamers</title>

         <!--CSS -->

		<link rel="preload" href="assets/css/main.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/main.min.css"></noscript>
        <link rel="preload" href="assets/css/styles.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="assets/css/styles.min.css"></noscript>
        
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" alt="WeirdGamers Logo" href="assets/ico/favicon.png">
        
    </head>

    <body>
	
		<a href="https://chat.whatsapp.com/ES8E2l1yrib1QGodZ3ZewB" id="w"><i class="fab fa-whatsapp"></i> Tap to join WhatsApp group</a>

		<!-- Wrapper -->
    	<div class="wrapper">

			<!-- Sidebar -->
			<nav class="sidebar">
				
				<!-- close sidebar menu -->
				<div class="dismiss">
					<i class="fas fa-arrow-left"></i>
				</div>
				
				<div class="logo">
					<h3><a href="index.php">Weird Gamers</a></h3>
				</div>
				
				<ul class="list-unstyled menu-elements">
					<li class="active">
						<a class="scroll-link" href="#top-content"><i class="fas fa-home"></i> Home</a>
					</li>
					<li>
						<a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
							<i class="fas fa-cog"></i>Game Modes
						</a>
						<ul class="collapse list-unstyled" id="otherSections">
							<li>
								<a class="scroll-link" href="#section-1">PUBG (Global)</a>
							</li>
							<li>
								<a class="scroll-link" href="#section-2">Free Fire</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="scroll-link" href="#section-3"><i class="fa fa-pencil-alt"></i> Rules & Guidelines</a>
					</li>
					<li>
						<a class="scroll-link" href="#section-6"><i class="fas fa-paper-plane"></i> Contact us</a>
					</li>
				</ul>
				
				<div class="to-top">
					<a class="btn btn-customized-3" href="#" role="button">
	                    <i class="fas fa-arrow-up"></i> Top
	                </a>
				</div>
				
				<div class="dark-light-buttons">
					<a class="btn-customized-4 btn-customized-dark" href="#" role="button">Dark</a>
					<a class="btn-customized-4 btn-customized-light" href="#" role="button">Light</a>
				</div>
			
			</nav>
			<!-- End sidebar -->
			
			<!-- Dark overlay -->
    		<div class="overlay"></div>

			<!-- Content -->
			<div class="content">
			
				<!-- open sidebar menu -->
				<div class="container-fluid buttons">
					<div class="row">
						<div style="width: fit-content; margin: 0 auto 0 20px;">
							<a class="btn btn-customized open-menu" href="#" role="button">
								<i class="fas fa-align-left"></i> <span>Menu</span>
							</a>
						</div>
						<div style="width: fit-content; margin-right: 20px;">
							<a class="btn btn-customized mr-4" href="login/">
								<i class="fa fa-user"></i> Login
							</a>
							<a class="btn btn-customized" href="register/">
								<i class="fa fa-sign-in-alt"></i> Register
							</a>
						</div>
					</div>
				</div>
			
		        <!-- Top content -->
		        <div class="top-content section-container" id="top-content">
			        <div class="container">
						<h3 style="color: rgb(202,252,3);font-size: 30px;" class="mx-auto">Are you ready to Win instant cash everyday ?</h3><h1 style="color: rgb(202,252,3);">&#128176; Let's Play! &#128176;</h1>
			        </div>
		        </div>
                
                <div class="container" style="margin-top: 40px;" id="stats">
					<h2>Stats of Weirdgamers</h2>
					<div class="row">
						<div class="col-sm-3">
							<br>
							<img src="img/group.webp"/>
							<h4>1,000+ Players</h4><br>
						</div>
						<div class="col-sm-3">
							<br>
							<img src="img/review.webp"/>
							<h4>4.5 User Rating</h4><br>
						</div>
						<div class="col-sm-3">
							<br>
							<img src="img/gameplay.webp"/>
							<h4>100+ Tournaments</h4><br>
						</div>
						<div class="col-sm-3">
							<br>
							<img src="img/rupee.webp"/>
							<h4><strong>&#8377;</strong> 1,00,000+ Worth instant cash Won by Users</h4>
						</div>
					</div>
				</div>
                		
		        <!-- Section 1 -->
		        <div class="section-1-container section-container pb-0" id="section-1">
					<div class="container" style="border: 1px solid rgb(202,252,3);">
						<div class="row">
							<img alt="PUBG" style="margin:0 auto 20px;width: 575px; height: 200px;" src="img/pubg.webp"/>
						</div>
			            <div class="row">
		                	<div class="col-md-4 wow fadeInUp">
		                		<div class="row mt-20">
			                		<div class="col-lg-8">
										<h3>PUBG SOLO</h3>
										<span class="t">Open Now</span>
										<p><strong>Entry Fee - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">10/member</span>
											<br><u>Prizes</u><br>
											Rank 1 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">200</span><br>
											Rank 2 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">150</span><br>
											Rank 3 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">100</span><br>
											Rank 4 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span><br>
											Rank 5 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span><br>
											Max Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span><br>
											Per 7 Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">25</span>
										</strong></p>
										<a class="btn btn-danger mb-3" href="login/">Join</a>
									</div>
			                    </div>
		                    </div>
		                    <div class="col-md-4 section-1-box wow fadeInDown">
			                	<div class="row">
			                		<div class="col-lg-8">
			                    		<h3>PUBG DUO</h3>
			                    		<span class="t">Open Now</span>
										<p><strong>Entry Fee - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">10/member</span>
											<br><u>Prizes</u><br>
											Rank 1 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">250</span><br>
											Rank 2 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">200</span><br>
											Rank 3 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">100</span><br>
											Max Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span><br>
											Per 7 Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">25</span>
										</strong></p>
										<a class="btn btn-danger mb-3" href="login/">Join</a>
									</div>
			                    </div>
		                    </div>
		                    <div class="col-md-4 section-1-box wow fadeInUp">
			                	<div class="row">
			                		<div class="col-lg-8">
			                    		<h3>PUBG SQUAD</h3>
			                    		<span class="t">Open Now</span>
										<p><strong>Entry Fee - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">10/member</span>
											<br><u>Prizes</u><br>
											Rank 1 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">300</span><br>
											Rank 2 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">200</span><br>
											Rank 3 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">150</span><br>
											Rank 4 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">100</span><br>
											Max Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span>
										</strong></p>
										<a class="btn btn-danger mb-3" href="login/">Join</a>
									</div>
			                    </div>
		                    </div>
			            </div>
			        </div>
		        </div>
		
				<!-- Section 2 -->
		        <div class="section-2-container section-container" id="section-2">
			        <div class="container" style="border: 1px solid rgb(202,252,3);">
						<div class="row" style="margin-bottom: 0px;">
							<img alt="Freefire" style="margin: auto;width: 575px;height: 220px;" src="img/freefire.webp"/>
						</div>
			            <div class="row" style="background-color: black;">
		                	<div class="col-md-4 section-1-box wow fadeInUp pt-0">
		                		<div class="row">
			                		<div class="col-lg-8">
			                    		<h3>FREEFIRE SOLO</h3>
			                    		<span class="t">Open Now</span>
										<p><strong>Entry Fee - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">15/member</span>
											<br><u>Prizes</u><br>
											Rank 1 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">200</span><br>
											Rank 2 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">150</span><br>
											Rank 3 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">100</span><br>
											Rank 4 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span><br>
											Max Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span><br>
											Per Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">5</span>
										</strong></p>
										<a class="btn btn-danger mb-3" href="login/">Join</a>
									</div>
			                    </div>
		                    </div>
		                    <div class="col-md-4 section-1-box wow fadeInDown">
			                	<div class="row">
			                		<div class="col-lg-8">
			                    		<h3>FREEFIRE DUO</h3>
			                    		<span class="t">Open Now</span>
										<p><strong>Entry Fee - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">15/member</span>
											<br><u>Prizes</u><br>
											Rank 1 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">250</span><br>
											Rank 2 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">150</span><br>
											Rank 3 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">100</span><br>
											Max Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span><br>
											Per Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">5</span>
										</strong></p>
										<a class="btn btn-danger mb-3" href="login/">Join</a>
									</div>
			                    </div>
		                    </div>
		                    <div class="col-md-4 section-1-box wow fadeInUp">
			                	<div class="row">
			                		<div class="col-lg-8">
			                    		<h3>FREEFIRE SQUAD</h3>
			                    		<span class="t">Open Now</span>
										<p><strong>Entry Fee - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">15/member</span>
											<br><u>Prizes</u><br>
											Rank 1 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">300</span><br>
											Rank 2 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">200</span><br>
											Rank 3 - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">100</span><br>
											Max Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">50</span><br>
											Per Kill - &ThickSpace;<i class="fa fa-rupee-sign"></i>&ThinSpace;<span style="font-size: larger;">5</span>
										</strong></p>
										<a class="btn btn-danger mb-3" href="login/">Join</a>
									</div>
			                    </div>
		                    </div>
			            </div>
			        </div>
		        </div> 
		
				<!-- Section 3 -->
		        <div class="section-3-container section-container" id="section-3">
			        <div class="container">
			            <div class="row">
			                <div class="col section-5 section-description wow fadeIn">
			                    <h2>Rules and Guidelines</h2>
			                    <div class="divider-1 wow fadeInUp"><span></span></div>
			                </div>
			            </div>
			            <div class="row">
							<div class="col-12 text-left section-5 section-description wow fadeIn">
			                    <h3>Rules:</h3>
			                </div>
							<p>
								<ol class="text-left">
									<li>Players must use their PUBG mobile ID or their Freefire Id which they provide at the time of payment. </li>
									<li>Teaming with opponents will result in permanent ban from the platform.</li>
									<li>Befor playing, make sure that at least one player from a team is successfully registered.</li>
									<li>The players are not allowed to use any hacks or any other software tools which gives them an unfair advantage. Doing this will result in permanent ban of the user.	
									</li>
									<li>The room ID and password will be sent to the registered  mail as soon as the match will be fixed</li>
									<li>Players need to join the room via the Room ID/password given to their registered mail.</li>
									<li>Players need to join the room on given time. We are not responsible if you didn't enter the room at given time.</li>
									<li>The prize money will be send instantly within 10 mins after the match via the same medium of the entry fee.</li>
									<li>Prize holders are requested to send the screenshot of the match summary. </li>
									<li>No rematch shall take place if anyone is caught cheating. The final result will be adjusted accordingly.</li>
									<li>In case of any technical issue, only you are responsible. Hence check your network connections before playing.</li>
									<li>For PUBG users the server will be ASIA.</li>
									<li>Sharing of room Id and password is strictly prohibited.</li>
								</ol>
							</p>
			            </div>
						<div class="row">
							<div class="col-12 text-left section-5 section-description wow fadeIn">
			                    <h3>Guidelines:</h3>
			                </div>
							<p>
								<ol class="text-left">
									<li>Visit www.weirdgamers.com </li>
									<li>Complete the registration and login.</li>
									<li>To choose game modes click on Menu -> Game modes.</li>
									<li>Now select your game mode and choose your teammates. You can change usernames.</li>
									<li>Room id/password will be shared to registered email.</li>
									<li>After choosing players, tap on "Pay now" button to move to the payment page</li>	
									<li>Pay the amount and take a screenshot of the transaction for payment security.</li>
									<li>You will get the room id/password on your registered mail as soon as the matches are fixed.</li>
									<li>Note- Use only those username which you have registered on website. People having different usernames will be banned.</li>
								</ol>
							</p>
						</div>
			        </div>
		        </div>		
		        
		        <!-- Section 4 -->
		        <div class="section-6-container section-container section-container-image-bg" id="section-6">
			        <div class="container">
			            <div class="row">
			                <div class="col section-6 section-description wow fadeIn">
			                    <h2>Contact Us</h2>
			                    <div class="divider-1 wow fadeInUp"><span></span></div>
			                    <p>Send us an email using the form below or follow us on our social media channels.</p>
			                </div>
			            </div>
			            <div class="row">
		                	<div class="col-md-6 section-6-box wow fadeInUp">
		                		<h3>By eMail</h3>
								<h4 style="font-size:1.1em;font-family:'Roboto',sans-serif;">weirdgamersverify@gmail.com</h4>
		                    </div>
		                    <div class="col-md-5 offset-md-1 section-6-box wow fadeInDown">
		                    	<h3>Follow us</h3>
		                    	<div class="section-6-social">
			                    	<a href="#"><i class="fab fa-facebook-f"></i></a>
									<a href="#"><i class="fab fa-instagram"></i></a>
									<a href="#"><i class="fab fa-youtube"></i></a>
		                    	</div>
		                    </div>
			            </div>
			        </div>
		        </div>
		
		        <!-- Footer -->
		        <footer class="footer-container">
		
			        <div class="container">
			        	<div class="row">
		
		                    <div class="col">
								Copyright &copy;2021 All Rights Reserved | Weird Gamers<br>
								All the logos, trademarks and images belongs to their respective owners. 
		                    </div>
		
		                </div>
			        </div>
		
		        </footer>
	        
	        </div>
	        <!-- End content -->
        
        </div>
        <!-- End wrapper -->

        <!-- Javascript -->
        
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="assets/js/scripts.min.js"></script>

    </body>

</html>

<?php
	}
?>