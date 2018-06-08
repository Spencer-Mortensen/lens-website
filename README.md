# Lens Website

This repository allows you to set up your own personal copy of the Lens website
(http://lens.guide).

## Installation

Make sure that you've installed the Apache webserver:  
```bash
apt-get install apache2 libapache2-mod-php php
```

And git:
```bash
apt-get install git
```

And Composer:  
https://getcomposer.org/doc/00-intro.md

Now clone the Lens website:  
```bash
git clone git@github.com:spencer-mortensen/lens.guide.git
cd lens.guide
composer install
```

And create the file "/var/www/lens/index.php":  
<pre>&lt;?php<br>
namespace Synerga;<br>
$projectDirectory = <i>'/home/user/lens.guide'</i>;<br>
require "{$projectDirectory}/vendor/autoload.php";<br>
$data = "{$projectDirectory}/data";<br>
$synerga = new Synerga();
$synerga->run('<:router:>');</pre>

But be sure to use the correct path to your "lens.guide" directory!

Create the file "/etc/apache2/sites-available/lens.conf":  
<pre>&lt;VirtualHost *:80>
&#9;ServerName lens
&#9;ServerAdmin webmaster@localhost
&#9;DocumentRoot "/var/www/lens"<br>
&#9;&lt;Directory "/var/www/lens"&gt;
&#9;&#9;AllowOverride None
&#9;&#9;Require all granted<br>
&#9;&#9;RewriteEngine On<br>
&#9;&#9;# Append directory slashes before rewriting URLs
&#9;&#9;RewriteRule (^|/)\.?[^./]+$ http://%{HTTP_HOST}%{REQUEST_URI}/ [R=301,L]<br>
&#9;&#9;# Use Synerga
&#9;&#9;RewriteRule ^ - [E=URI:%{REQUEST_URI}]
&#9;&#9;RewriteRule !^index\.php$ /index.php [QSA,L]<br>
&#9;&#9;# Set the Synerga environment variables
&#9;&#9;RewriteCond %{ENV:REDIRECT_URI} ^/?(.*)$
&#9;&#9;RewriteRule ^ - [E=SYNERGA_BASE:/,E=SYNERGA_PATH:%1]<br>
&#9;&#9;# Enable If-None-Match support
&#9;&#9;RewriteCond %{HTTP:If-None-Match} !=""
&#9;&#9;RewriteRule ^ - [E=HTTP_IF_NONE_MATCH:%{HTTP:If-None-Match}]
&#9;&lt;/Directory&gt;<br>
&#9;ErrorLog ${APACHE_LOG_DIR}/error.log
&#9;CustomLog ${APACHE_LOG_DIR}/access.log combined
&lt;/VirtualHost&gt;</pre>

Enable the website:  
```bash
a2enmod rewrite
a2ensite lens
service apache2 restart
```

Add "lens" to your "/etc/hosts" file:  
```bash
127.0.0.1	localhost lens
```

And view your personal copy of the Lens website:  
[http://lens](http://lens)
