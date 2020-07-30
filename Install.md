# Installation

### Run commands
1. `ddev start`
2. `ddev composer install`
3. `ddev import-db`

### After DB import
1. Change `base_url` in a table `core_config_data` to your URL 
2. Run commands:
    1. `php bin/magento setup:store-config:set --base-url="<your-url>"`
    2. `php bin/magento setup:store-config:set --base-url-secure="<your-url>"`
    3. `php bin/magento cache:flush`
