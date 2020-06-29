<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-29 12:18:52
  from 'C:\xampp\htdocs\pokehelp\app\views\profilview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef9c00c3e8750_05530998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be08182685c00de0ccd16348035f35626e601a1e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pokehelp\\app\\views\\profilview.tpl',
      1 => 1593425064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef9c00c3e8750_05530998 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14245452315ef9c00c2d6d01_97051482', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_14245452315ef9c00c2d6d01_97051482 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_14245452315ef9c00c2d6d01_97051482',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">PokeHelp</a>
				<nav>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
index">Home</a></li>
						<li><a href="generic.html" class="active">Profil</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a></li>
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

								<?php if (\core\RoleUtils::inRole("admin")) {?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
adminview" class="button primary fit">Panel kontrolny administratora</a>
								<?php }?>


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
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kody']->value, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
?>
													<tr><td><?php echo $_smarty_tpl->tpl_vars['k']->value["nickname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["kod"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["team"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["lvl"];?>
</td></tr>
													<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													
												</tbody>
												
											</table>
										</div>

										<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
profilview">
											<br><h3><legend>Znajdź przyjaciół według województwa</legend></h3>
											<fieldset style="width:400px;">
												<input type="text" placeholder="Województwo" name="sf_wojew" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->wojew;?>
"><br />
												<button type="submit" >Filtruj</button>
											</fieldset>
										</form>

										<br>
										<label for="toggle1" class="button" style="width: 300px">Dodaj swój kod</label>
										<input type="checkbox" id="toggle1" role="button">

										

										

										

										<div id="dodajkod" style="border: 3px dashed white; padding: 20px; padding-top: 15px; text-align: center;"> 
											<h3>Dodaj kod</h3>




											<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
kodSave">
											
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

														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wojew']->value, 'w');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['w']->value["idwoj"];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value["nazwa"];?>
</option>
														<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
											<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
pokSave">
											
												<div class="col-6 " style="float: left; width: 20%;">
													<input type="text" name="nazwa" id="demo-name" value="" placeholder="Nazwa" style="height: 40px;"/>
												</div>
												
												
												<div class="col-12" style="float: left; width: 20%;">
													<select name="typ" id="demo-category typ" style="height: 40px;">
														<option value="" disabled>- Typ -</option>
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['typy']->value, 't');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['t']->value["idTyp"];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value["nazwa"];?>
</option>
														<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</select>
												</div>
												<div class="col-6 " style="float: left; width: 20%;">

													<input type="text" name="maxcp" id="demo-name" value="" placeholder="Max cp" style="height: 40px;"/>
												</div>
												<div class="col-12" style="float: left; width: 20%;">
													<select name="webo" id="demo-category webo" style="height: 40px;">
														<option value="" disabled>- Weather boost -</option>
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['webo']->value, 'w');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['w']->value["idWebo"];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value["Nazwa"];?>
</option>
														<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
<?php
}
}
/* {/block 'top'} */
}
