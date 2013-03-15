# Configuration

Once you have anchor installed you many wish to change some of the defaults
that came with Anchor.

### Clean URLs

By default the installer will try and detect if you have Apache and mod_rewrite
enabled and create the htaccess file for you, if it doesnt below are some
details about how to enableclean urls.

1.	Edit the file `anchor/config/app.php` and set the `url` to your base url.

		return array(
			...
			'url' => '/', // or '/anchor' for subfolder called `anchor`

2.	In the same file `anchor/config/app.php` set the `index` to empty.

		return array(
			...
			'index' => ''

3.	Setup the server

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

Changing the timezone on Anchor is very stright forward, located the
file `anchor/config/app.php` and Look for a variable called `timezone`.
In here you add your new [timezone](http://php.net/manual/en/timezones.php),
here's how it should look in your app.php file.

	return array(
		...
		'timezone' => 'Europe/London',


### Language

To change the language in Anchor, located the file `anchor/config/app.php`
and Look for a variable called `language`. In here you add your new language,
here's how it should look in your app.php file.

	return array(
		...
		'language' => 'en_GB',

#### Avaliable translations ([locale ID](http://www.localeplanet.com/icu/))

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

If you would like to add a new translation please submit a pull request, make
sure the folder name for the new translate follows the
[ISO 639 'underscore' ISO 3166](http://www.localeplanet.com/icu/) format.