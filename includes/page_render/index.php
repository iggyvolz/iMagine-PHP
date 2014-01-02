<?php

register_shutdown_function('page_render_' . FTGR_MODE);

function page_render_normal()
{
	if (defined('FTGR_REFRESH'))
	{
		echo '<HEAD><title>Resetting game, please refresh</title><script>window.onload=function() { location.reload(); };</script></HEAD><BODY>Please reload the page to reset the game.</BODY>';
		die;
	}
	global $debug,
	$blazer,
	$curleaf,
	$dragiri,
	$feniixis,
	$fireebee,
	$flike,
	$ghostslicer,
	$hartvile,
	$krabulous,
	$nightwing,
	$plantsy,
	$pluff,
	$reebee,
	$reemon,
	$skelestorm,
	$strab;
	ob_start();
	require_once __DIR__ . FTGR_SLASH . 'page.html';
	$page = ob_get_contents();
	ob_end_clean();
	$response = _("Welcome to Fightmon the Game: Reemon v") . FTGR_VERSION . _("!");
	$response.=PHP_EOL;
	$response.=_("For help and credits, type help then press enter.");
	$response = $response;
	if (!empty($_SESSION['ftgr']['returns']))
	{
		foreach ($_SESSION['ftgr']['returns'] as $value)
		{
			$response.=PHP_EOL;
			$response.=$value;
		}
	}
	$replacements = array(
		'<!-- RESPONSE -->' => $response,
		'<!-- ENERGY_BLAZER -->' => $blazer->energy,
		'<!-- ENERGY_CURLEAF -->' => $curleaf->energy,
		'<!-- ENERGY_DRAGIRI -->' => $dragiri->energy,
		'<!-- ENERGY_FENIIXIS -->' => $feniixis->energy,
		'<!-- ENERGY_FIREEBEE -->' => $fireebee->energy,
		'<!-- ENERGY_FLIKE -->' => $flike->energy,
		'<!-- ENERGY_GHOSTSLICER -->' => $ghostslicer->energy,
		'<!-- ENERGY_HARTVILE -->' => $hartvile->energy,
		'<!-- ENERGY_KRABULOUS -->' => $krabulous->energy,
		'<!-- ENERGY_NIGHTWING -->' => $nightwing->energy,
		'<!-- ENERGY_PLANTSY -->' => $plantsy->energy,
		'<!-- ENERGY_PLUFF -->' => $pluff->energy,
		'<!-- ENERGY_REEBEE -->' => $reebee->energy,
		'<!-- ENERGY_REEMON -->' => $reemon->energy,
		'<!-- ENERGY_SKELESTORM -->' => $skelestorm->energy,
		'<!-- ENERGY_STRAB -->' => $strab->energy,
		'<!-- STARTING_ENERGY_BLAZER -->' => FTGR_BLAZER_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_CURLEAF -->' => FTGR_CURLEAF_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_DRAGIRI -->' => FTGR_DRAGIRI_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_FENIIXIS -->' => FTGR_FENIIXIS_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_FIREEBEE -->' => FTGR_FIREE_BEE_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_FLIKE -->' => FTGR_FLIKE_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_GHOSTSLICER -->' => FTGR_GHOST_SLICER_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_HARTVILE -->' => FTGR_HARTVILE_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_KRABULOUS -->' => FTGR_KRABULOUS_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_NIGHTWING -->' => FTGR_NIGHTWING_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_PLANTSY -->' => FTGR_PLANTSY_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_PLUFF -->' => FTGR_PLUFF_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_REEBEE -->' => FTGR_REE_BEE_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_REEMON -->' => FTGR_REEMON_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_SKELESTORM -->' => FTGR_SKELESTORM_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_STRAB -->' => FTGR_STRAB_STARTING_ENERGY,
		'<!-- NAME_BLAZER -->' => _("Blazer"),
		'<!-- NAME_CURLEAF -->' => _("Curleaf"),
		'<!-- NAME_DRAGIRI -->' => _("Dragiri"),
		'<!-- NAME_FENIIXIS -->' => _("Feniixis"),
		'<!-- NAME_FIREEBEE -->' => _("FireeBee"),
		'<!-- NAME_FLIKE -->' => _("Flike"),
		'<!-- NAME_GHOSTSLICER -->' => _("GhostSlicer"),
		'<!-- NAME_HARTVILE -->' => _("Hartvile"),
		'<!-- NAME_KRABULOUS -->' => _("Krabulous"),
		'<!-- NAME_NIGHTWING -->' => _("Nightwing"),
		'<!-- NAME_PLANTSY -->' => _("Plantsy"),
		'<!-- NAME_PLUFF -->' => _("Pluff"),
		'<!-- NAME_REEBEE -->' => _("ReeBee"),
		'<!-- NAME_REEMON -->' => _("Reemon"),
		'<!-- NAME_SKELESTORM -->' => _("Skelestorm"),
		'<!-- NAME_STRAB -->' => _("Strab"),
	);
	$page = str_replace(array_keys($replacements), array_values($replacements), $page);
	$page = utf8_decode($page); // Change ASCII code to actual letter
	echo $page;
}

function page_render_api()
{
	global $debug,
	$errors,
	$blazer,
	$curleaf,
	$dragiri,
	$feniixis,
	$fireebee,
	$flike,
	$ghostslicer,
	$hartvile,
	$krabulous,
	$nightwing,
	$plantsy,
	$pluff,
	$reebee,
	$reemon,
	$skelestorm,
	$strab;
	if (defined('FTGR_HELP'))
	{
		echo json_encode('help');
		return;
	}
	$response = str_replace(array('%1'), array(FTGR_VERSION), _("Welcome to Fightmon the Game: Reemon v%1!"));
	$response.=PHP_EOL;
	$response.=_("For help and credits, type help then press enter.");
	$response = trim($response);
	if (!empty($_SESSION['ftgr']['returns']))
	{
		foreach ($_SESSION['ftgr']['returns'] as $value)
		{
			$response.=PHP_EOL;
			$response.=$value;
		}
	}
	echo json_encode(array(
		'dump' => ($_SESSION['ftgr']['debug'] AND FTGR_DEBUG) ? print_r($GLOBALS, TRUE) : '',
		'blazer_energy' => $blazer->energy,
		'curleaf_energy' => $curleaf->energy,
		'dragiri_energy' => $dragiri->energy,
		'feniixis_energy' => $feniixis->energy,
		'fireebee_energy' => $fireebee->energy,
		'flike_energy' => $flike->energy,
		'ghostslicer_energy' => $ghostslicer->energy,
		'hartvile_energy' => $hartvile->energy,
		'krabulous_energy' => $krabulous->energy,
		'nightwing_energy' => $nightwing->energy,
		'plantsy_energy' => $plantsy->energy,
		'pluff_energy' => $pluff->energy,
		'reebee_energy' => $reebee->energy,
		'reemon_energy' => $reemon->energy,
		'skelestorm_energy' => $skelestorm->energy,
		'strab_energy' => $strab->energy,
		'response' => trim($response),
		'errors' => ($errors === array()) ? '' : _("Uh, oh!  There were errors!") . PHP_EOL . (FTGR_DEBUG ? array_to_lines($errors) : _("Errors have been hidden by an administrator, but they may have been logged."))
	));
}
