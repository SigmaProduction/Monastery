
# php artisan migrate
sh -c "echo '; Maximum allowed size for uploaded files.'                >> /usr/local/etc/php/php.ini"
sh -c "echo '; http://php.net/upload-max-filesize'                      >> /usr/local/etc/php/php.ini"
sh -c "echo 'upload_max_filesize = 10M'                                 >> /usr/local/etc/php/php.ini"
composer install
php-fpm
# php artisan serve --host=0.0.0.0 --port=9000
