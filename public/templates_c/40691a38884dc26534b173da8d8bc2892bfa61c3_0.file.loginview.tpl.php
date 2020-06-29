<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-29 12:31:38
  from 'C:\xampp\htdocs\pokehelp\app\views\loginview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef9c30ae7a977_46616025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40691a38884dc26534b173da8d8bc2892bfa61c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pokehelp\\app\\views\\loginview.tpl',
      1 => 1593426697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef9c30ae7a977_46616025 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17848226245ef9c30ae6e486_98759169', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_17848226245ef9c30ae6e486_98759169 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_17848226245ef9c30ae6e486_98759169',
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
						<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
profilview" class="active">Profil</a></li> 

						<?php } else { ?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" class="active">Zaloguj</a></li> 
						<?php }?>

						<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="active">Wyloguj</a></li> 
						<?php }?>
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

								<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
									<div style="margin: 30px auto;"><h2>Jesteś już zalogowany.</h2></div>
									<?php } else { ?>
								<section>

									<span class="icon solid major fa-user"></span>

									


									<h3>Zaloguj</h3>
									<p><form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">
											
											<div style="width: 50%; margin: 0 auto">
												<input type="text" name="login" id="demo-name" placeholder="Login" />
											</div>
											<div style="width: 50%; margin: 0 auto;margin-top: 10px;">
												<input type="password" name="password" id="demo-name" placeholder="Hasło" />
											</div>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
												<div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?> alert-success<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isWarning()) {?>alert-warning<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>alert-danger<?php }?>" role="alert">
													<?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

												</div>

											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											
											<div style="margin: 0 auto; clear: right;  margin-top: 20px; text-align: center;">
												<input type="submit" value="Zaloguj" class="primary" style="width: 70%;" />
											</div>
									</form></p>

									
								</section>
								<section>
									<span class="icon solid major fa-user-plus"></span>




									<h3>Zarejestruj</h3>
									<p><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
regSave">
											
											<div style="width: 50%; margin: 0 auto">
												<input type="text" name="login" id="demo-name" value="" placeholder="Login" />
											</div>
											<div style="width: 50%; margin: 0 auto;margin-top: 10px;">
												<input type="text" name="password" id="demo-name" value="" placeholder="Hasło" />
											
											</div>
											<div style="width: 50%; margin: 0 auto;margin-top: 10px;">
												<input type="text" name="password2" id="demo-name" value="" placeholder="Powtórz hasło" />
											
											</div>
											<div style="margin: 0 auto; clear: right;  margin-top: 20px; text-align: center;">
												<input type="submit" value="Zarejestruj" class="primary" style="width: 70%;" />
											</div>
									</form></p>
								</section>
								<?php }?>
								
							</div>

						</div>
					</section>

			</div>

<?php
}
}
/* {/block 'top'} */
}
