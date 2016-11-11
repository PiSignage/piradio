<?php

$radio = '/usr/local/bin/piradio';

if (isset($_GET['adj'])) {
	// Volume adjustment may consist of digits or be + or -
	$adj = preg_replace('/[^0-9+-mute]+/', '', $_GET['adj']);
	echo $adj;
	if (strlen($adj)) {
		if (!strcmp($adj, '-') || !strcmp($adj, '+') || is_numeric($adj)) {
			// Adjust volume, discard output
			exec($radio . ' vol ' . $adj);
		} elseif(!strcmp($adj, 'mute')) {
			exec($radio . $adj);
		}
	}
}

// Get status, display output
system($radio);

?>
