<?php

//here is a list of links. EXP - regular expression for words, that should be replaced. ID - id of MODX resource, where link should leads to.

// 4 words
// wicked red black hats
	$EXP[] = '/(wicke[A-z]*\sred[A-z]*\sblack[A-z]\shat[A-z]\s*)/ui';
	$ID[] = 14;


// 3 words
//accessory for iphone
	$EXP[] = '/(accesso[A-z]*\sfor\siphone[A-z])/ui';
	$ID[] = 22;

// 2 words
//cash loans
	$EXP[] = '/(cash[A-z]*\sloans[A-z])/ui';
	$ID[] = 32;