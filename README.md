## Inventory App for a Luxury Store (Beginner Tutorial)

This project is a beginners tutorial sample application done with vanilla PHP. 
The project aims to demonstrate key concepts that would aid understanding of Developing Web Apps.


### Installation

1. Git Clone the Project on to your computer
2. Navigate to the directory
3. Run Composer Install
4. Load Sample SQL file into MySQL
5. Edit .env file to reflect database credentials
6. Serve the public folder of the application


```
$ -> git clone https://github.com/horiyomi/inventoryApp

$ -> cd inventoryApp

$ -> composer install

$ -> mysql -u yourdbusername -p
     mysql> create database inventory_db; exit;
    
$ -> mysql -u yourdbusername -p -D inventory_db < inventory_db.sql

$ -> nano .env #optional you can edit in your code editor instead

$ -> php -S localhost:8090 -t=public # could serve with nginx or apache
```

### Configuration

In your .env file you will need to setup the following. 
Create one in the root of your project if none exists.


```
DB_HOST=localhost
DB_DRIVER=mysql
DB_USER=yourdbuser
DB_NAME=yourdb
DB_PASS=yourawesomedbpassword

```

**Note:** Replace with your own credentials.