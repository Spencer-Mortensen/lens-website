# Lens Website

This repository allows you to set up your own personal copy of the Lens website
(http://lens.guide).

## Installation

Clone the Lens website:  
```bash
cd /home/username/projects
git clone git@github.com:spencer-mortensen/lens.guide.git
cd lens.guide
composer install
```

Install the Apache webserver, if you haven't already:  
```bash
apt-get install apache2 libapache2-mod-php php
```

Create the file "/etc/apache2/sites-available/lens.conf" using the appropriate
paths for your filesystem:   
<pre>&lt;VirtualHost *:80&gt;
&#9;ServerName lens
&#9;ServerAdmin webmaster@localhost
&#9;DocumentRoot "/home/username/projects/lens.guide"<br>
&#9;&lt;Directory "/home/username/projects/lens.guide"&gt;
&#9;&#9;Options FollowSymLinks
&#9;&#9;AllowOverride All
&#9;&#9;Require all granted
&#9;&lt;/Directory&gt;<br>
&#9;ErrorLog ${APACHE_LOG_DIR}/error.log
&#9;CustomLog ${APACHE_LOG_DIR}/access.log combined
&lt;/VirtualHost&gt;</pre>

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
