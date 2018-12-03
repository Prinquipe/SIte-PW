<?php include ('includes/chooseHeader.php'); ?>

		<!-- Main -->
			<section id="main">
				<div class="inner">
					<div class="image fit">
						<img src="images/img111.jpg" alt="" />
					</div>
					<header>
						<h1>Log In</h1>
						<!--<p class="info"><a href="#">Student in anu' 3</a></p>-->
                        <form id="form1" name="form1" runat="server" action="loginAux.php" method="POST">

                        
						<h3>Username:</h3>
						<input name="username" type="text" required /> <br>
						

						
						<h3>Password:</h3>
						<input name="password" type="password" required /> <br>

                        <!--input name="submit1" type="reset" value="Sign in" />-->
                        <button type="submit" name="submit1" class="button special">Log In </button>
                        </form>


					</header>
				</div>
			</section>

<?php include('includes/footer.php')?>