# Custom DNS TLD (for internal purpose)

## Tools ##
* MySQL
* PowerDNS Authoritative Server 
For your authorithative server, we have selected PowerDNS mostly because of the availability of a HTTP API. This API will help us to easly exchange information between registries and registrar as EPP is used on real world.
* PowerAdmin
PowerAdmin is on the web based management interfaces for PowerDNS. This user-friendly interface will help the team to create zones and ressource records without writing any SQL statement.

## Installation & Configurations ##
* MySQL

    >$ apt-get install mysql-server mysql-client

* PowerDNS

  To install PowerDNS, we run
  
  >$ apt-get install pdns-server pdns-backend-mysql
    
  The PowerDNS configuration is located in the /etc/powerdns directory - We will come to that in a moment.
Now we connect to MySQL:

    >$ mysql -u root -p

  Type in our MySQL root password, and we should be on the MySQL shell. On the MySQL shell, we create a database for PowerDNS:

        CREATE DATABASE powerdns;

Next we create a database user (powerdns) for PowerDNS:
       
     GRANT ALL ON powerdns.* TO 'power_admin'@'localhost' IDENTIFIED BY 'power_admin_password';
     GRANT ALL ON powerdns.* TO 'power_admin'@'localhost.localdomain' IDENTIFIED BY 'power_admin_password';
     FLUSH PRIVILEGES;
    ######(Replace power_admin_password with a password of your choice.)

Now we create the tables needed by PowerDNS...
    
    USE powerdns;
    
    CREATE TABLE domains (
    id INT auto_increment,
    name VARCHAR(255) NOT NULL,
    master VARCHAR(128) DEFAULT NULL,
    last_check INT DEFAULT NULL,
    type VARCHAR(6) NOT NULL,
    notified_serial INT DEFAULT NULL,
    account VARCHAR(40) DEFAULT NULL,
    primary key (id)
    );

    CREATE UNIQUE INDEX name_index ON domains(name);
    
    CREATE TABLE records (
    id INT auto_increment,
    domain_id INT DEFAULT NULL,
    name VARCHAR(255) DEFAULT NULL,
    type VARCHAR(6) DEFAULT NULL,
    content VARCHAR(255) DEFAULT NULL,
    ttl INT DEFAULT NULL,
    prio INT DEFAULT NULL,
    change_date INT DEFAULT NULL,
    primary key(id)
    );

    CREATE INDEX rec_name_index ON records(name);
    CREATE INDEX nametype_index ON records(name,type);
    CREATE INDEX domain_id ON records(domain_id);

    CREATE TABLE supermasters (
    ip VARCHAR(25) NOT NULL,
    nameserver VARCHAR(255) NOT NULL,
    account VARCHAR(40) DEFAULT NULL
    );

 ... and finally leave the MySQL shell:
    
    > quit;

 Now we must configure PowerDNS so that it uses the MySQL backend:
    
   > vi /etc/powerdns/pdns.conf

Add the line launch=gmysql to pdns.conf:

    [...]
        ################################# 
        # launch        Which backends to launch and order to query them in 
        #   
        # launch=
        launch=gmysql        
    [...]

Then open /etc/powerdns/pdns.d/pdns.local and make it look as follows:
    
   >$ vi /etc/powerdns/pdns.d/pdns.local

#### Here comes the local changes the user made, like configuration of ####
#### the several backends that exists.####

    gmysql-host=127.0.0.1 
    gmysql-user=power_admin 
    gmysql-password=power_admin_password 
    gmysql-dbname=powerdns

Then restart pdns:

     /etc/init.d/pdns restart

That's it, PowerDNS is now ready to be used. To learn more about it, please refer to its documentation: http://downloads.powerdns.com/documentation/html/index.html

* Poweradmin

  Now let's install Poweradmin, a web-based control panel for PowerDNS. Poweradmin is written in PHP, so we must install a web server (I'm using Apache2 in this example) and PHP:
  
    >$ apt-get install apache2 libapache2-mod-php5 php5 php5-common php5-curl php5-dev php5-gd php-pear php5-imap php5-mcrypt php5-mhash php5-ming php5-mysql php5-xmlrpc gettext


Continue installing libc-client without Maildir support? <-- Yes
Poweradmin also requires the following two PEAR packages:

   >$ pear install DB
   
   >$ pear install pear/MDB2#mysql


Now all prerequisites for Poweradmin are installed, and we can begin with the Poweradmin installation (I will install it in a subdirectory of /var/www - /var/www is the document root of Apache's default web site on Debian; if you've created a vhost with a different document root, please adjust the paths).
Go to https://www.poweradmin.org/trac/wiki/GettingPoweradmin and download the latest Poweradmin package, e.g. as follows:

    $ cd /tmp
    $ wget http://sourceforge.net/projects/poweradmin/files/poweradmin-2.1.7.tgz

Then install it to the /var/www/poweradmin directory as follows:

    $ tar xvfz poweradmin-2.1.7.tgz
    $ mv poweradmin-2.1.7/ /var/www/html/poweradmin
    $ touch /var/www/poweradmin/inc/config.inc.php
    $ sudo chown -R www-data:www-data /var/www/html/poweradmin/
    $ Sudo service apache2 start


Now open a browser and launch the web-based Poweradmin installer (http://192.168.20.20/poweradmin/install).


## TLDs Creation ##

