<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-29 12:40:22
  from 'C:\xampp\htdocs\pokehelp\app\views\adminview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef9c5160e6c71_31151656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '946b807f356105180737046180403e0794759544' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pokehelp\\app\\views\\adminview.tpl',
      1 => 1593425014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef9c5160e6c71_31151656 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10864913205ef9c5160da048_86239175', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_10864913205ef9c5160da048_86239175 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_10864913205ef9c5160da048_86239175',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<header id="header">
				<a href="index.html" class="title">PokeHelp</a>
				<nav>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
index">Home</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
profilview" class="active">Profil</a></li>
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
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaevent']->value, 'le');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['le']->value) {
?>
													<tr><td><?php echo $_smarty_tpl->tpl_vars['le']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['le']->value["od"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['le']->value["do"];?>
</td><td><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
eventActivate/<?php echo $_smarty_tpl->tpl_vars['le']->value['idevent'];?>
">Aktywuj</a></td></tr>
													<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													
													
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
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listapokow']->value, 'lp');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lp']->value) {
?>
												<tr><td><?php echo $_smarty_tpl->tpl_vars['lp']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lp']->value["TYP"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lp']->value["maxcp"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lp']->value["WEBO"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['lp']->value["region"];?>
</td><td><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
pokemonDelete/<?php echo $_smarty_tpl->tpl_vars['lp']->value['idpokemons'];?>
">Usuń</a><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
pokemonAdd/<?php echo $_smarty_tpl->tpl_vars['lp']->value['idpokemons'];?>
">Dodaj</a></td></tr>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												
											</tbody>
											
										</table>
									
							</div>
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
