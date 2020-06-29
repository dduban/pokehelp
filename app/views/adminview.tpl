{extends file="main.tpl"}

{block name=top}
			<header id="header">
				<a href="index.html" class="title">PokeHelp</a>
				<nav>
					<ul>
						<li><a href="{$conf->action_root}index">Home</a></li>
						<li><a href="{$conf->action_root}profilview" class="active">Profil</a></li>
						<li><a href="{$conf->action_root}logout">Wyloguj</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">Administrator</h1>
							<span class="image fit"><img src="images/profil.png" alt="" /></span>
							<div style="clear:both;"><br><b><h2>Lista eventów</h2></b>

								
										<div class="table-wrapper" style="height: 300px; overflow: auto;">
											<table class="alt" >
												<thead>
													<tr>
														<th>Nazwa eventu</th>
														<th>Początek</th>
														<th>Koniec</th>
														<th>Uaktywnij</th>
													</tr>
												</thead>
												<tbody>
													{foreach $listaevent as $le}
													{strip}
														<tr>
															<td>{$le["nazwa"]}</td>
															<td>{$le["od"]}</td>
															<td>{$le["do"]}</td>
															<td><a class="button" href="{$conf->action_url}eventActivate/{$le['idevent']}">Aktywuj</a></td>
														</tr>
													{/strip}
													{/foreach}
													
													
												</tbody>
												
											</table>
										</div>
										
									</div>
									
								</div>
							</section>
							<section id="main" class="wrapper">
								<div class="inner">
								
								<h3>Lista propozycji graczy</h3>
								<div class="table-wrapper" style="height: 700px; overflow: auto;">
										<table class="alt" >
											<thead>
												<tr>
													<th>Nazwa</th>
													<th>Typ</th>
													<th>Max CP</th>
													<th>Weather Boost</th>
													<th>Regionalny</th>
													<th>Decyzja</th>
												</tr>
											</thead>
											<tbody>
												{foreach $listapokow as $lp}
												{strip}
													<tr>
														<td>{$lp["nazwa"]}</td>
														<td>{$lp["TYP"]}</td>
														<td>{$lp["maxcp"]}</td>
														<td>{$lp["WEBO"]}</td>
														<td>{$lp["region"]}</td>
														<td>
															<a class="button" href="{$conf->action_url}pokemonDelete/{$lp['idpokemons']}">Usuń</a>
															<a class="button" href="{$conf->action_url}pokemonAdd/{$lp['idpokemons']}">Dodaj</a>
														</td>
														
														
													</tr>
												{/strip}
												{/foreach}
												
											</tbody>
											
										</table>
									
							</div>
						</div>

							</section>


							
						</div>
					</section>

			</div>
{/block}