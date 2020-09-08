# Installation

### Run commands
1. `ddev start`
2. `ddev composer install`
3. `ddev import-db`

### After DB import
1. Change `base_url` in a table `core_config_data` to your URL
2. Switch to the `ddev` console by command: `ddev ssh` 
3. Run commands:
    1. `php bin/magento setup:store-config:set --base-url="<your-url>"`
    2. `php bin/magento setup:store-config:set --base-url-secure="<your-url>"`
    3. `php bin/magento cache:flush`


## Create admin user
Command: `php bin/magento admin:user:create`

## Reset authenticator per account
Command: `php bin/magento security:tfa:reset <user> <provider>`

##Products are not showing in category
Check below list 

1.General->Status = Enabled

2.general->Visibility = Catalog,Search

3.Inventory->Qty > 0

4.Inventory->Stock Availability = In Stock

5.Websites = checking your site

6.Catgories = checking your category.

Then:

Command: `php bin/magento setup:static-content:deploy`

Command: `php bin/magento indexer:reindex`

Clear cache and try again.

##Disabling 2 Factor Authentication
Command: `php bin/magento module:disable Magento_TwoFactorAuth && bin/magento cache:flush`

##URL Rewrites
1.Marketing->SEO & Search -> URL Rewrites

##Multiple Currencies
1.Stores -> Configuration -> Currency Setup -> choose Allowed Currencies you want to display

2.Setup currency rates: Stores -> Currency Rates -> Set value for all parameters

##Custom Email Template
1.Marketing -> Communications -> Email Templates -> Add New Template

2.Command: `php bin/magento cache:flush && bin/magento index:reindex`

https://devdocs.magento.com/guides/v2.4/frontend-dev-guide/templates/template-email.html

##Set New Custom Email Template
1.Stores -> Configuration -> Sales -> Sales Emails -> Order (or whatever) -> New Order Confirmaton Template -> Set New Email Template

##Multi language Email Template
1.Stores -> Configuration -> Change Scope To Correct Store View

2.Stores -> Configuration -> Sales -> Sales Emails -> Order (or whatever) -> New Order Confirmaton Template -> Set New Email Template


