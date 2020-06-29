{extends file="main.tpl"}

{block name=top}
					<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">PokeHelp</a></li>
							<li><a href="#one">Event</a></li>
							<li><a href="#two">Pokemon List</a></li>
							<li><a href="#three">Zaloguj</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>PokeHelp</h1>
							<p>Strona z podstawowymi informacjami o pokemonach z gry Pokemon GO jak również informacje o aktualnie trwających wydarzeniach. Możesz się również zalogować i wymieniać kodami przyjaciela.</p>
							<ul class="actions">
								<li><a href="#three" class="button scrolly">Zaloguj</a></li>
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							<a href="#" class="image"><img src="{$conf->app_url}/images/pokemon_GO_event.jpg" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">

												{foreach $event as $e}
												{strip}

													<h2>Aktualnie trwający event: <u>{$e["nazwa"]}</h2></u>
									
													<ul class="alt">


													<li><h3>Od:</h3>{$e["od"]}</li>
													<li><h3>Do:</h3>{$e["do"]}</li>

												{/strip}
												{/foreach}

												<li><h3>Pokemony:</h3>
													<div style="overflow: auto; height: 200px; width: 70%;">
														<ul>
															{foreach $eventpoki as $ep}
															{strip}
																<li>{$ep["nazwa"]}</li>
															{/strip}
															{/foreach}

														</ul>
													</div>
												</li>
											</ul>
									
								</div>
							</div>
						</section>
						
					</section>

				<!-- Two -->
					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Poke Lista</h2>
							<p>Brakuje pokemona? Zaloguj się i dodaj go do listy.</p>
							
								<div class="table-wrapper" style="height: 700px; overflow: auto;">
										<table class="alt" id="tab_pokemons">
											<thead>
												<tr>
													<th>Nazwa</th>
													<th>Typ</th>
													<th>Weather Boost</th>
													<th>Regionalny</th>
													<th>Max CP</th>
												</tr>
											</thead>
											<tbody>
												{foreach $pokemons as $p}
												{strip}
													<tr>
														<td>{$p["nazwa"]}</td>
														<td>{$p["TYP"]}</td>
														<td>{$p["WEBO"]}</td>
														<td>{$p["region"]}</td>
														<td>{$p["maxcp"]}</td>
														
													</tr>
												{/strip}
												{/foreach}
												
											</tbody>
											
										</table>
									
							</div>
							
						</div>
					</section>

				<!-- Three -->
					<section id="three" class="wrapper style1 spotlights">
						<section>
							
							<div class="content">
								<div class="inner">
									<h2>Zaloguj się lub utwórz konto</h2>
									
											<p>Posiadając konto możesz wysyłać propozycje kolejnych wprowadzanych pokemonów do świata gry Pokemon GO.<br><br> Możesz również udostępnić swój kod dodania do znajomych lub przeglądać i dodawać kody innych, wymieniaj się prezentami z całej Polski.<p>
											<a href="{$conf->action_root}loginview" class="button primary fit">Zaloguj się lub utwórz konto</a>
									
								</div>
							</div>
							<a href="#" class="image"><img src="{$conf->app_url}/images/libre.jpg" alt="" data-position="center center" /></a>
						</section>
						
					</section>

			</div>

{/block}