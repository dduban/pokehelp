<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-28 21:51:19
  from 'C:\xampp\htdocs\pokehelp\app\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef8f4b77f0a11_36535858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95aa8c86f8779b50aacedaec144326f48010a980' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pokehelp\\app\\views\\index.tpl',
      1 => 1593373875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef8f4b77f0a11_36535858 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2220204385ef8f4b77e5524_32400269', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_2220204385ef8f4b77e5524_32400269 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_2220204385ef8f4b77e5524_32400269',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
							<a href="#" class="image"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/images/pokemon_GO_event.jpg" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">

												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['event']->value, 'e');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
?>
												<h2>Aktualnie trwający event: <u><?php echo $_smarty_tpl->tpl_vars['e']->value["nazwa"];?>
</h2></u><ul class="alt"><li><h3>Od:</h3><?php echo $_smarty_tpl->tpl_vars['e']->value["od"];?>
</li><li><h3>Do:</h3><?php echo $_smarty_tpl->tpl_vars['e']->value["do"];?>
</li>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

												<li><h3>Pokemony:</h3>
													<div style="overflow: auto; height: 200px; width: 70%;">
														<ul>
															<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['eventpoki']->value, 'ep');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ep']->value) {
?>
															<li><?php echo $_smarty_tpl->tpl_vars['ep']->value["nazwa"];?>
</li>
															<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

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
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pokemons']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
												<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["TYP"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["WEBO"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["region"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["maxcp"];?>
</td></tr>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												
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
											<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginview" class="button primary fit">Zaloguj się lub utwórz konto</a>
									
								</div>
							</div>
							<a href="#" class="image"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/images/libre.jpg" alt="" data-position="center center" /></a>
						</section>
						
					</section>

			</div>

<?php
}
}
/* {/block 'top'} */
}
