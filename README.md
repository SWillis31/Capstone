# Capstone

## Basic Setup 
- Move these files to your ../wamp64/www/Capstone folder

## Database Setup
- Start myPHPadmin (Should automatically do next step)
- Go to localhost/phpmyadmin using Chrome/Internet Explorer
- Make a database named "Capstone_test" with utf8_general_ci
- Import .sql from ../wamp64/www/Capstone

## View Website
- Go to localhost/Capstone to view the website (using Chrome)

## Email Functionality
- Follow the instructions here https://stackoverflow.com/a/24339890
- auth_username = systemtron.auto@gmail.com
- auth_password = SystemTron123
- Edit the links in register.php lines 73 and 74 to the following:
```
<a href='localhost/capstone/add_admin.php?...
<a href='localhost/capsotne/deny_admin.php?...
```
