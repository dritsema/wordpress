<?php

/*
 * ESPN - ESD
 * Only show the appropriate tabs at the right admin level
 */

$tab = $_GET['page'];
$is_multisite = is_multisite();
$is_network_admin_page = is_network_admin();

$show_general = false;
$show_sp = false;
$show_idp = false;
	
if ($is_multisite && $is_network_admin_page) {
	// Multisite Network Settings
	$show_idp = true;
} elseif ($is_multisite) {
	// Multisite Site Settings
	$show_general = true;
	$show_sp = true;
} else {
	// Single Site Settings
	$show_general = true;
	$show_sp = true;
	$show_idp = true;
}

?>
<link rel="stylesheet" href="<?php echo constant('SAMLAUTH_URL') . '/lib/css/sso.css';?>" />
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
<div class="wrap">
	<h2 class="nav-tab-wrapper">
		Single Sign-On&nbsp;
		<?php
		if ($show_general) {
			?> <a href="?page=sso_general.php" class="nav-tab<?php if($tab == 'sso_general.php'){echo ' nav-tab-active';}?>">General<span class="badge badge-important" id="sso_errors"><?php if($status->num_errors != 0) echo $status->num_errors; ?></span></a><?php
		}
		if ($show_idp) {
			?> <a href="?page=sso_idp.php" class="nav-tab<?php if($tab == 'sso_idp.php'){echo ' nav-tab-active';}?>">Identity Provider</a><?php
		}
		if ($show_sp) {
			?> <a href="?page=sso_sp.php" class="nav-tab<?php if($tab == 'sso_sp.php'){echo ' nav-tab-active';}?>">Service Provider</a><?php
		}
		?>
		<a href="?page=sso_help.php" class="nav-tab<?php if($tab == 'sso_help.php'){echo ' nav-tab-active';}?>">Help</a>
	</h2>
</div>