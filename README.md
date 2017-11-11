# Lens Website

This repository allows you to set up your own personal copy of the Lens website
(http://lens.guide).

## Installation

Clone the Lens website:  
```bash
cd /home/username/projects
git clone git@github.com:spencer-mortensen/lens.guide.git
```

Install the Apache webserver, if you haven't already:  
```bash
apt-get install apache2 libapache2-mod-php php
```

Create the file "/etc/apache2/sites-available/lens.conf" using the appropriate
paths for your filesystem:   
```bash
<VirtualHost *:80>
	ServerName lens

	ServerAdmin webmaster@localhost
	DocumentRoot "/home/username/projects/lens.guide"

	<Directory "/home/username/projects/lens.guide">
		Options FollowSymLinks
		AllowOverride All

		Require all granted
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Enable the website:  
```bash
a2ensite lens
service apache2 reload
```

Add "lens" to your "/etc/hosts" file:  
```bash
127.0.0.1	localhost lens
```

View your personal copy of the Lens website:  
[http://lens](http://lens)
