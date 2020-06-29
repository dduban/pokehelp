{extends file="main.tpl"}

{block name=top}

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">PokeHelp</a>
				<nav>
					<ul>
						<li><a href="{$conf->action_root}index">Home</a></li>
						<li><a href="generic.html" class="active">Profil</a></li>
						<li><a href="{$conf->action_root}logout">Wyloguj</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">Profil</h1>
							<span class="image fit"><img src="images/profil.png" alt="" /></span>
							<section>

								{if \core\RoleUtils::inRole("admin")}
								<a href="{$conf->action_url}adminview" class="button primary fit">Panel kontrolny administratora</a>
								{/if}


								<div style="clear:both;"><br><b><h2>Kody znajomych społeczności</h2></b>

								
										<div class="table-wrapper" style="height: 300px; overflow: auto;">
											<table class="alt" >
												<thead>
													<tr>
														<th>Nick</th>
														<th>Kod</th>
														<th>Drużyna</th>
														<th>Województwo</th>
														<th>Poziom</th>
													</tr>
												</thead>
												<tbody>
													{foreach $kody as $k}
													{strip}
													<tr>
														<td>{$k["nickname"]}</td>
														<td>{$k["kod"]}</td>
														<td>{$k["team"]}</td>
														<td>{$k["nazwa"]}</td>
														<td>{$k["lvl"]}</td>
														
													</tr>
													{/strip}
													{/foreach}
													
												</tbody>
												
											</table>
										</div>

										<form action="{$conf->action_url}profilview">
											<br><h3><legend>Znajdź przyjaciół według województwa</legend></h3>
											<fieldset style="width:400px;">
												<input type="text" placeholder="Województwo" name="sf_wojew" value="{$searchForm->wojew}"><br />
												<button type="submit" >Filtruj</button>
											</fieldset>
										</form>

										<br>
										<label for="toggle1" class="button" style="width: 300px">Dodaj swój kod</label>
										<input type="checkbox" id="toggle1" role="button">

										

										

										

										<div id="dodajkod" style="border: 3px dashed white; padding: 20px; padding-top: 15px; text-align: center;"> 
											<h3>Dodaj kod</h3>




											<form method="post" action="{$conf->action_root}kodSave">
											
												<div class="col-6 " style="float: left; width: 20%;">
													<input type="text" name="nickname" id="demo-name" value="" placeholder="Nick" style="height: 40px;"/>
												</div>
												<div class="col-6 " style="float: left;width: 20%;">
													<input type="text" name="kod" id="demo-name kod" value="" placeholder="Kod" style="height: 40px;"/>
												</div>
												
												<div class="col-12" style="float: left; width: 20%;">
													<select name="team" id="demo-category team" style="height: 40px;">
														<option value=""  disabled>- Drużyna -</option>
														<option value="Mystic">Mystic</option>
														<option value="Instinct">Instinct</option>
														<option value="Valor">Valor</option>
													</select>
												</div>
												<div class="col-12" style="float: left; width: 20%;">
													<select name="wojew" id="demo-category wojew" style="height: 40px;">

														<option value=""  disabled>- Województwo -</option>

														{foreach $wojew as $w}
														{strip}
															<option value="{$w["idwoj"]}">{$w["nazwa"]}</option>
														{/strip}
														{/foreach}
													</select>
												</div>
												
												<div class="col-6 " style="float: left;width: 20%;">
													<input type="text" name="lvl" id="demo-name lvl" value="" placeholder="Poziom" style="height: 40px;"/>
												</div>
												
												<input type="submit" value="Dodaj kod" class="primary" style="margin-top:15px;"/>

											
											</form>





										</div>


							</section>


							<section>
								
								<div id="dodajpokemona" style=" padding: 20px; padding-top: 15px; text-align: center; margin-top: 50px;"> 
											<h3>Dodaj Pokemona</h3>
											<form method="post" action="{$conf->action_root}pokSave">
											
												<div class="col-6 " style="float: left; width: 20%;">
													<input type="text" name="nazwa" id="demo-name" value="" placeholder="Nazwa" style="height: 40px;"/>
												</div>
												
												
												<div class="col-12" style="float: left; width: 20%;">
													<select name="typ" id="demo-category typ" style="height: 40px;">
														<option value="" disabled>- Typ -</option>
														{foreach $typy as $t}
														{strip}
															<option value="{$t["idTyp"]}">{$t["nazwa"]}</option>
														{/strip}
														{/foreach}
													</select>
												</div>
												<div class="col-6 " style="float: left; width: 20%;">

													<input type="text" name="maxcp" id="demo-name" value="" placeholder="Max cp" style="height: 40px;"/>
												</div>
												<div class="col-12" style="float: left; width: 20%;">
													<select name="webo" id="demo-category webo" style="height: 40px;">
														<option value="" disabled>- Weather boost -</option>
														{foreach $webo as $w}
														{strip}
															<option value="{$w["idWebo"]}">{$w["Nazwa"]}</option>
														{/strip}
														{/foreach}
													</select>
												</div>
												<div class="col-12" style="float: left; width: 20%;">
													<select name="region" id="demo-category" style="height: 40px;">
														<option value="" disabled>- Regionalny -</option>
														<option value="Tak">Tak</option>
														<option value="Nie">Nie</option>
													</select>
												</div>
												
												
												<input type="submit" value="Dodaj pokemona" class="primary" style="margin-top:15px;"/>
											
											</form>
										</div>
							</section>


						</div>
					</section>

			</div>
{/block}