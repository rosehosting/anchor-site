# Requirements

In order to remain lightweight, Anchor only supports recent versions of the languages it’s written in. As such, you will need:

* PHP 5.3.6+
	* curl
	* mcrypt
	* gd
	* pdo\_mysql or pdo\_sqlite
* MySQL 5.2+ or SQLite 2+

If you’re not sure what version of PHP you have, create a new file, and paste the following in at the top of the page:

	<?php echo PHP_VERSION; // version.php

This should print a number to your screen, which should be bigger than `5.3.6`.

**If you don’t have the necessary requirements, you will not be able to install Anchor.** Contact your host to upgrade.