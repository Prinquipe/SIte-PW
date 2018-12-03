<?php include ('includes/chooseHeader.php'); ?>

		<!-- Main -->
			<section id="main">
				<div class="inner">
					<div class="image fit">
						<img src="images/pic11.jpg" alt="" />
					</div>
					<header>
						<h1>Sign in</h1>
						<!--<p class="info"><a href="#">Student in anu' 3</a></p>-->
                        <form id="form1" name="form1" runat="server" action="signupAux.php" method="POST">

                        
						<h3>Username:</h3>
						<input name="username" type="text" required /> <br>
						

						
						<h3>Password:</h3>
						<input name="password" type="password" required /> <br>
					    
										
						
						<h3>Confirm Password:</h3>
						<input name="cpassword" type="password" required /> <br>
						

					    
						<h3>Email:</h3>
						<input name="email" type="text" required /> <br>
						

						
						
                       <!-- <input name="submit2" type="reset" value="Sign in" /> -->
                        <!-- <a href="signupAux.php" name="submit2" class="button special">Special</a> -->
                        <button type="submit" name="submit2" class="button special">Sign Up </button>
                        </form>


					</header>
				</div>
			</section>

<?php include('includes/footer.php')?>