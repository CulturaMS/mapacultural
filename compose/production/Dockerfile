FROM mapasculturais/mapasculturais:v5.1.20
RUN apt install curl -y

COPY compose/common/config.php /var/www/html/protected/application/conf/config.php
COPY compose/common/config.d /var/www/html/protected/application/conf/conf-common.d
COPY compose/production/config.d /var/www/html/protected/application/conf/config.d


COPY themes /var/www/html/protected/application/themes
COPY plugins /var/www/html/protected/application/plugins
RUN curl https://raw.githubusercontent.com/opauth/facebook/master/FacebookStrategy.php > /var/www/html/protected/application/plugins/MultipleLocalAuth/Facebook/FacebookStrategy.php
RUN chown -R www-data: /var/www/html/protected/application/plugins/AldirBlanc/importFiles/

COPY compose/common/php-ini.d /usr/local/etc/php/conf.d

COPY compose/common/config-csv-inciso1.php /var/www/html/protected/application/plugins/AldirBlancDataprev/config-csv-inciso1.php
COPY compose/common/config-csv-inciso2.php /var/www/html/protected/application/plugins/AldirBlancDataprev/config-csv-inciso2.php
COPY compose/common/config-csv-generic-inciso1.php /var/www/html/protected/application/plugins/AldirBlanc/config-csv-generic-inciso1.php

