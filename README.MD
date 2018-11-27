# Configuraciones

```apache
<VirtualHost *:80>
        # sudo vim /etc/apache2/sites-available/u-codeigniter.conf - ubuntu
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName
        # specifies what hostname must appear in the request's Host: header to
        # match this virtual host. For the default virtual host (this file) this
        # value is not decisive as it is used as a last resort host regardless.
        # However, you must set it for any further virtual host explicitly.
        ServerName u-codeigniter.localhost
        ServerAlias www.u-codeigniter.localhost

        ServerAdmin samuel@devexteam.com
        DocumentRoot /var/www/html/u-codeigniter

        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
        # error, crit, alert, emerg.
        # It is also possible to configure the loglevel for particular
        # modules, e.g.
        #LogLevel info ssl:warn

        ErrorLog /var/www/html/u-codeigniter/application/logs/error.log
        CustomLog /var/www/html/u-codeigniter/application/logs/access.log combined

        # For most configuration files from conf-available/, which are
        # enabled or disabled at a global level, it is possible to
        # include a line for only one particular virtual host. For example the
        # following line enables the CGI configuration for this host only
        # after it has been globally disabled with "a2disconf".
        #Include conf-available/serve-cgi-bin.conf

        #### PHP-FPM
        <Directory /var/www/html/u-codeigniter>
                Options -Indexes +FollowSymLinks +MultiViews
                AllowOverride All
                Require all granted
        </Directory>

        <FilesMatch \.php$>
                # 2.4.10+ can proxy to unix socket
                SetHandler "proxy:unix:/var/run/php/php7.2-fpm.sock|fcgi://localhost/"

                # Else we can just use a tcp socket:
                #SetHandler "proxy:fcgi://127.0.0.1:9000"
        </FilesMatch>
</VirtualHost>

```

```apache
<VirtualHost *:80>
        # C:/xampp7/htdocs/u-codeigniter - windows
        ServerAdmin samuel@devexteam.com
        DocumentRoot "C:/xampp7/htdocs/u-codeigniter"

        ServerName u-codeigniter.localhost
        ServerAlias www.u-codeigniter.localhost

        ErrorLog "C:/xampp7/htdocs/u-codeigniter/application/logs/error.log"
        CustomLog "C:/xampp7/htdocs/u-codeigniter/application/logs/access.log" combined
</VirtualHost>

```
