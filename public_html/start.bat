@ECHO OFF
set SRVPATH=F:\Backend\nginx
start /D%SRVPATH% nginx.exe

F:/Backend/RunHiddenConsole.exe  F:/Backend/php/php-cgi.exe -b 127.0.0.1:9000 -c F:/Backend/php/php.ini

F:/Backend/RunHiddenConsole.exe  F:\Backend\mysql\bin\mysqld.exe --console --skip-grant-tables