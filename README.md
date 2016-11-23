# migration-money-tracker
Database migrations for MoneyTracker

## Setup
- Install via composer `composer require jdenoc/moneyTracker-migration`

- Make sure that the database `jdenoc_money_tracker` has been created.
    - Renaming database is _optional_. Be sure to update the database name in [phinx.yml](phinx.yml)
- Get database username & password and assign them to the appropriate `user` and `pass` YAML variables in [phinx.yml](phinx.yml)  
- To run all migrations: `vendor/bin/phinx migrate -c vendor/jdenoc/moneyTracker-migration/phinx.yml`
    - If you intend to use the production [values stored in the YAML file](phinx.yml#L7-L15), use the following command instead: `vendor/bin/phinx migrate -e production -c vendor/jdenoc/moneyTracker-migration/phinx.yml`

## Phinx Documentation
Phinx documentation can be found [here](http://docs.phinx.org/en/stable/index.html)  
The most notable documentation pages are:
- [Installation](http://docs.phinx.org/en/stable/install.html)
- [Commands](http://docs.phinx.org/en/stable/commands.html)
- [Writing Migrations](http://docs.phinx.org/en/stable/migrations.html)
