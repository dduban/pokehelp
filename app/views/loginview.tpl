{extends file="main.tpl"}

{block name=top}
					<header id="header">
				<a href="index.html" class="title">PokeHelp</a>
				<nav>
					<ul>
						<li><a href="{$conf->action_root}index">Home</a></li>
						{if count($conf->roles)>0}
							<li><a href="{$conf->action_root}profilview" class="active">Profil</a></li> 

						{else}
							<li><a href="{$conf->action_root}login" class="active">Zaloguj</a></li> 
						{/if}

						{if count($conf->roles)>0}
							<li><a href="{$conf->action_root}logout" class="active">Wyloguj</a></li> 
						{/if}
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">Logowanie</h1>
							<span class="image fit"><img src="images/login3.png" alt="" /></span>
							<div class="features">

								{if count($conf->roles)>0}
									<div style="margin: 30px auto;"><h2>Jesteś już zalogowany.</h2></div>
									{else}
								<section>

									<span class="icon solid major fa-user"></span>

									


									<h3>Zaloguj</h3>
									<p><form action="{$conf->action_root}login" method="post">
											
											<div style="width: 50%; margin: 0 auto">
												<input type="text" name="login" id="demo-name" placeholder="Login" />
											</div>
											<div style="width: 50%; margin: 0 auto;margin-top: 10px;">
												<input type="password" name="password" id="demo-name" placeholder="Hasło" />
											</div>
											{foreach $msgs->getMessages() as $msg}
												<div class="alert {if $msg->isInfo()} alert-success{/if}
													{if $msgs->isWarning()}alert-warning{/if}
													{if $msgs->isError()}alert-danger{/if}" role="alert">
													{$msg->text}
												</div>

											{/foreach}
											
											<div style="margin: 0 auto; clear: right;  margin-top: 20px; text-align: center;">
												<input type="submit" value="Zaloguj" class="primary" style="width: 70%;" />
											</div>
									</form></p>

									
								</section>
								<section>
									<span class="icon solid major fa-user-plus"></span>




									<h3>Zarejestruj</h3>
									<p><form method="post" action="{$conf->action_root}regSave">
											
											<div style="width: 50%; margin: 0 auto">
												<input type="text" name="login" id="demo-name" value="" placeholder="Login" />
											</div>
											<div style="width: 50%; margin: 0 auto;margin-top: 10px;">
												<input type="password" name="password" id="demo-name" value="" placeholder="Hasło" />
											
											</div>
											<div style="width: 50%; margin: 0 auto;margin-top: 10px;">
												<input type="password" name="password2" id="demo-name" value="" placeholder="Powtórz hasło" />
											
											</div>
											<div style="margin: 0 auto; clear: right;  margin-top: 20px; text-align: center;">
												<input type="submit" value="Zarejestruj" class="primary" style="width: 70%;" />
											</div>
									</form></p>
								</section>
								{/if}
								
							</div>

						</div>
					</section>

			</div>

{/block}