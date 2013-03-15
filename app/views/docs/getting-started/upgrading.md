# Upgrading

**Backup your database and files!**

Here is an example for backup up on most servers via ssh using mysql dump:

	mysqldump
		--compact
		--quick
		--user myusername
		--password=mypassword
		--host=localhost anchorcms > /path/to/my/site/httpdocs/db.sql

lets tar gzip it to a safe location.

	tar --create
		--gzip
		--file=/home/myusername/backups/anchor.tgz
		--directory=/path/to/my/site/httpdocs

### Upgrading from 0.8 and above

1.	Download the [latest version](/download)
2.	Extract the archive and copy/paste/overwrite the `anchor` and `system`
	folders and the `index.php` file.
3.	Done!

### Upgrading from older versions (0.8 and below)

1.	Delete your old `system` folder.

2.	Download the latest version and extract the archive.

3.	Upload and overwrite extracted files to your server.

	*If you have customised the default theme please rename it! or it will be over written.*

4.	Copy the database and application sample files from the installer to your new anchor folder.

		cp install/storage/application.distro.php anchor/config/application.php

		cp install/storage/database.distro.php anchor/config/database.php

5.	Edit the new files and copy the details from your old config.php file.

	For example, my old config database details would simply copy from this:

		'host' => 'anchor-cms-demo.mysql.eu1.frbit.com',
		'port' => '3306',
		'username' => 'anchor-cms-demo',
		'password' => 'my-awesome-password',
		'name' => 'anchorcms',
		'collation' => 'utf8_bin'

	To this:

		'driver' => 'mysql',
		'hostname' => 'anchor-cms-demo.mysql.eu1.frbit.com',
		'port' => 3306,
		'username' => 'anchor-cms-demo',
		'password' => 'my-awesome-password',
		'database' => 'anchorcms'

6.	Run your site and your done.