# Installing

Before installing make sure your platform as the [required](/docs/getting-started/requirements) components to run Anchor.

1.	Download the latest version of Anchor [here](/download).
2.	Navigate to your downloading file and extract the contents.
3.	Depending on your host there may be a few methods of getting files uploaded.
	The most common is FTP/SFTP. In your favorite client connect to you host
	and upload the files into the `public` folder, on different hosts this folder
	might be called `public_html`, `web`, `httpdocs`.
4.	Most server should be configured to allow the webserver to read and write to
	your files and folders, but some do not, in this case you will have to change
	the permissions on the `contents` and `anchor/config` folder to `0777` for
	the installer to run.
5.	Next you will need to create a database for anchor to install to, this can
	be called anything you like. On different host this process might vary,
	normally you will have sccess to some sort of gui client such as phpmyadmin.
6.	Nagigate your browser to your Anchor installing, if you have placed Anchor
	in a sub directory make sure you append the foldder name to the URL:

		http://mydomainname.com/

	In a sub directory:

		http://mydomainname.com/anchor/

	Follow the instructions in the installer.

7.	Once you have completed the install make sure to delete `install` folder.

Any issues check on the forums in case its a common problem or start a new discussion.