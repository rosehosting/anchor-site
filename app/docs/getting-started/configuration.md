# Configuration

Once you have Anchor installed you many wish to change some of the defaults
that came with Anchor. To do this, you’ll need to modify some **config files**.

## To find your config files

All configuration files are stored in the `anchor/config` folder, but if you need
to modify some specific parts of Anchor, continue reading for some common examples.

### Clean URLs

By default, the installer will try and detect if you have `Apache` and `mod_rewrite`
enabled and create the **.htaccess** file for you. However, in some cases (mainly
due to server restrictions), Anchor is unable to do it for you, and you’ll need to
do it yourself. Here’s how to enable clean URLs and remove the `index.php/` from the
URL.

1.	Edit the file `anchor/config/app.php` and set the `url` to your base URL
  	(the path to your Anchor installation — if you’re installing Anchor as a
  	subfolder, it’s the name of that subfolder).

		return array(
			...
			'url' => '/', // or '/anchor' for subfolder called `anchor`

2.	In the same file, `anchor/config/app.php`, set the `index` to an empty string.

		return array(
			...
			'index' => ''

3.	Tell your server to listen to the URL changes (you may need to restart your
  	server).

	#### Apache (mod_rewrite)

	Create a `.htaccess` file in your web root and paste the following contents:

		<IfModule mod_rewrite.c>
			RewriteEngine On
			RewriteCond %{REQUEST_FILENAME} !-f
			RewriteRule ^ index.php [L]
		</IfModule>

	#### Nginx

	Make sure in your vhost file you have the `try_files` feature.

		# http://wiki.nginx.org/HttpCoreModule
		location / {
			try_files $uri $uri/ /index.php;
		}

### Timezone

If you need to use a non-UTC timezone (for example, using the `relative_time`
function in America/Asia), you’ll need to change Anchor’s system timezone.
Anchor uses [standard PHP timezones](http://php.net/manual/en/timezones.php);
to find your timezone, check the PHP documentation.

Once you’ve found your timezone string, edit the `timezone` field in
`anchor/config/app.php` (which should look like below, replacing Europe/London
with your timezone string).

	return array(
		...
		'timezone' => 'Europe/London',


### Language

Anchor supports internationalisation, which means you can use Anchor in non-
English languages. To change the language, edit the `language` variable in
`anchor/config/app.php'`.

	return array(
		...
		'language' => 'en_GB',

### Available translations

You can view all of Anchor’s translations
[on the GitHub page](https://github.com/anchorcms/anchor-cms/tree/master/anchor/language),
but here’s a short list of available (known working) translations.

- German (de_DE)
- Iberian Spanish (es_ES)
- Estonian (et_EE)
- English (en_GB)
- French (fr_FR)
- Hungarian (hu_HU)
- Italian (it_IT)
- Dutch (nl_NL)
- Brazilian Portuguese (pt_BR)
- Swedish (sv_SE)
- Welsh (cy_GB)

If you would like to add a new translation please
[submit a pull request](https://github.com/anchorcms/anchor-cms/pull/new/master); make sure the folder name for the new translate follows the
[ISO 639 'underscore' ISO 3166](http://www.localeplanet.com/icu/) format.