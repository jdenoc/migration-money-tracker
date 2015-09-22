# migration-money-tracker
Database migrations for MoneyTracker

##Phinx Documentation
Phinx documentation can be found [here](http://docs.phinx.org/en/stable/index.html)
The most notable documenation pages are:
-  [Installation](http://docs.phinx.org/en/stable/install.html)
-  [Commands](http://docs.phinx.org/en/stable/commands.html)
-  [Writing Migrations](http://docs.phinx.org/en/stable/migrations.html)
 
##Setup
- Make sure that the database `jdenoc_money_tracker` has been created.
    - Renaming database is optional. Be sure to update the database name in [phinx.yml](phinx.yml)
- Get database username & password and assign them to the appropriate `user` and `pass` YAML variables in [phinx.yml](phinx.yml)  
- To run all migrations: `phinx migrate -t 0`
    - If you intend to use the production values, use the following command instead: `phinx migrate -e production -t 0`