<?php

$shutdown = 'sudo /sbin/%s';

if (isset($_GET['arg']))
	if (!strcmp($_GET['arg'], 'reboot') || !strcmp($_GET['arg'], 'poweroff'))
		system(sprintf($shutdown, $_GET['arg']));
	else
		echo 'Error: wrong argument.';
else
	echo 'Error: missing argument.';

?>
