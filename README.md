# Trades Centre
RMIT Programming Project course

Change working Directory to /var/www/html by using the command 
cd /var/www/html
Find the link of the project	
git clone <address of project goes here>
After cloning, there should be a directory with the name of your project
Change working directory to that folder by entering the command 
cd <your_project_directory>



Within the project directory enter the following commands 
composer install --ignore-platform-reqs
chmod -R 777 storage
cp .env\ BACK .env
Edit the configuration file for apache2 to recognise the path to application
Vi /etc/apache2/sites-available/laravel.conf
Change the path of DocumentRoot and Directory to your current project.
 DocumentRoot /var/www/html/your_project/public
<Directory /var/www/html/your_project>
Save the file and restart apache2 
service apache2 restart
