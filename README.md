# Trades Centre
RMIT Programming Project course

Change working Directory to /var/www/html by using the command <br>
cd /var/www/html<br>
Find the link of the project	<br>
git clone <address of project goes here><br>
After cloning, there should be a directory with the name of your project<br>
Change working directory to that folder by entering the command <br>
cd <your_project_directory><br>
<br>
<br>
<br>
Within the project directory enter the following commands <br>
composer install --ignore-platform-reqs<br>
chmod -R 777 storage<br>
cp .env\ BACK .env<br>
Edit the configuration file for apache2 to recognise the path to application<br>
Vi /etc/apache2/sites-available/laravel.conf<br>
Change the path of DocumentRoot and Directory to your current project.<br>
 DocumentRoot /var/www/html/your_project/public<br>
<Directory /var/www/html/your_project><br>
Save the file and restart apache2 <br>
service apache2 restart<br>
