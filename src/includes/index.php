<?php

namespace ftgr;

// Intentionally non-alphabetized.  In order of prerequisition.
require_once realpath(__DIR__ . '/error/index.php');
require_once realpath(__DIR__ . '/constants/index.php');
require_once realpath(__DIR__ . '/translations/index.php');
require_once realpath(__DIR__ . '/initiate_session/index.php');
if (defined('FTGR_DIE')) // run modified die()
{
	goto end;
}
require_once realpath(__DIR__ . '/classes/index.php');
require_once realpath(__DIR__ . '/page_render/index.php');
require_once realpath(__DIR__ . '/parse_contents/index.php');
end: