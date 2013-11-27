<?php

function parse_contents($contents) // Returns true if invalid person.  Invalid action is checked elsewhere
{
	global $me, $action, $person, $pars;
	if (strpos($contents, '.') === false)
	{
		$actionWithPars = $contents;
	}
	else
	{
		$actionWithPars = explode('.', $contents)[1];
	}
	if (strpos($contents, '.') === false OR explode('.', $contents)[0] == 'i')
	{
		$person = $me;
	}
	else
	{
		$person = explode('.', $contents)[0];
		if (!in_array($person, array('nechka', 'apparition', 'shade', 'reemon', 'pluff', 'dragiri'))) // Prevent access of unwanted variables
		{
			return true;
		}
	}
	$action = explode('(', $actionWithPars)[0];
	if (strpos($contents, '(') === false)
	{
		$pars = null;
	}
	else
	{
		$pars = explode('(', $actionWithPars)[1];
		$pars = explode(')', $pars)[0];
		$pars = explode(',', $pars);
	}
	return false;
}
