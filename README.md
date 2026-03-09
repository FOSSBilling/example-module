# Example module README file

This module provides a starting point for the developers on creating their FOSSBilling module.

Explore the files and comments in the code to understand the structure of the module better. See the social links on [our website](https://fossbilling.org) if you need further information. This module has its own [GitHub repository](https://github.com/FOSSBilling/example-module) where you can submit issues and pull requests.

In general, we use modules to extend the functionality of FOSSBilling.

All modules can communicate with the other modules using their API endpoints.

## Technical requirements about modules

## Required

* Module folder has to contain a **manifest.json** file to describe itself. The module engine will look for this file to find information about your extension.

## Optional

* **README.md** - A file which generally is used to hold a getting started guide or installation instructions for your module.
* **html_admin** - A folder holding front-end templates (`*.html.twig files`) for the administrator panel.
* **html_client** - A folder holding front-end templates (`*.html.twig files`) for the client / guest area.

### Commands CLI folder (Optional)

* **ClassConsole.php** - A file where you can run CLI console by ```php console.php your:cli```
* Multiple files can be added to the folder as long as they have different names and do not conflict with existing ones.

### Controller folder

* **Admin.php** - Defines the module's routes and navigation items for the administrator panel.
* **Client.php** - Used to define the module's routes for the client / guest area.

### Api folder

* **Admin.php** - Administrator API, only authorized administrators will be able to call these endpoints.
* **Client.php** - Client API, only logged in clients will be able to call these endpoints.
* **Guest.php** - Guest API, no authorization is needed for these endpoints. Don't provide confidential data over these endpoints. Anybody over the internet will be able to access these information, including bots.

## Tips

We recommend hosting your extensions on a public [GitHub](https://github.com) repository.

### Automated compatibility checking

As FOSSBilling evolves and matures, its internal functionality changes, which can create compatibility issues between your module and FOSSBilling.
To help developers catch these issues early on, we've designed a workflow that enables you to perform a PHPStan analysis of your module with both the latest FOSSBilling release and its preview builds.
While PHPStan cannot perform live tests, it's a useful tool to verify that your module doesn't reference missing functions, use incorrect types, or have other common low-level issues.

#### Setup

More in-depth instructions are planned. For now, check out the required files:

* [php-ci.yml](https://github.com/FOSSBilling/example-module/blob/main/.github/workflows/php-ci.yml)
* [phpstan.neon](https://github.com/FOSSBilling/example-module/blob/main/phpstan.neon)

## Licensing
This extension is open source software and is released under the Apache v2.0 license. See [LICENSE](LICENSE) for the full license terms.

This product includes the following third party work:
* Open Source Iconography by [Pictogrammers](https://pictogrammers.com/) licensed under the [Pictogrammers Free License](https://pictogrammers.com/docs/general/license/).
