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

Create the file "/etc/apache2/sites-available/lens.conf":  
<pre>
&lt;VirtualHost *:80&gt;
&#9;ServerName lens
&#9;ServerAdmin webmaster@localhost
&#9;DocumentRoot "/home/user/lens.guide/www"<br>
&#9;&lt;Directory "/home/user/lens.guide/www"&gt;
&#9;&#9;AllowOverride all
&#9;&#9;Require all granted
&#9;&lt;/Directory&gt;<br>
&#9;ErrorLog ${APACHE_LOG_DIR}/error.log
&#9;CustomLog ${APACHE_LOG_DIR}/access.log combined
&lt;/VirtualHost&gt;
</pre>

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
