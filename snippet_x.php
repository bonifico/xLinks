<?php
//require list of links
include_once (MODX_ASSETS_PATH .'config_x.php');

/* @var modX $modx */
/* @var modResource $resource */

// get text from toparse parametr
$content = $modx->resource->get($toparse);

// check config
$disable = false;
if(!isset($EXP) || $disable) { print $content; return '';}
$text_arr = explode("\n", $content);

// some settings. MAX_LINKS - limit of links for this content block
define(TEST_MODE, 0);
define(SKIP_STR, 0);
define(MAX_LINKS, 4);


if(TEST_MODE) print "<pre>";
// start parse block
$xlinks=0;
$text_string_number=1;
foreach($text_arr as $text_str)
{
	$res=0;
	$i=0;

	// If string already have link, skip it
	$skip=0;
	if(preg_match('/<a.*/', $text_str)) $skip=1;

	// Also do not use first string for xlinking
	if($xlinks < MAX_LINKS && !$skip && $text_string_number>SKIP_STR)
	{
		foreach($EXP as $exp)
		{
			$res = preg_match($exp, $text_str, $match);
			if($res==0) {  $i++; continue; }

			if(TEST_MODE) print "\n ---------------- \n(i  =  $i) "."String: ".$text_str."\n";;

			if($res)
			{
				if(TEST_MODE) print "$xlinks) Mathes: ".$match[1]."\n";


				$tag = "<a href='$ID[$i]'>$match[1]</a>";
				$text_str = preg_replace($EXP[$i], $tag, $text_str, 1);
			}
			$xlinks++;
			if(TEST_MODE) print "xlinks  =  $xlinks\n";
			break;
		}
	}

	if(TEST_MODE) print ">> ";
	print $text_str;
	$text_string_number++;
}
/**/
if(TEST_MODE) print "</pre>";