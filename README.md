# AvaTax Tax Adjuster plugin for Craft Commerce

Calculates tax rates with Avalara AvaTax

This plugin is in beta and bugs may be present. Please document any issues you encounter at our [Github Issues](https://github.com/surprisehighway/craft-avataxtaxadjuster/issues) page.


## Installation

To install the AvaTax Tax Adjuster plugin, follow these steps:

1. Download & unzip the file and place the `avataxtaxadjuster` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/surprisehighway/craft-avataxtaxadjuster.git avataxtaxadjuster` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3.  -OR- install with Composer via `composer require surprisehighway/avataxtaxadjuster`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `avataxtaxadjuster` for Craft to see it. GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

AvaTax Tax Adjuster works on Craft 2.6.x

## AvaTax Tax Adjuster Overview

Calculate and add sales tax to an order's base tax using Avalara's AvaTax service.

## Configuring AvaTax Tax Adjuster

1. Copy config.php from the `avataxtaxadjuster` directory to your craft/config folder and rename it to `avataxtaxadjuster.php`
2. Specify a valid orgin address within the `shipFrom` array
3. Visit `/admin/settings/plugins/avataxtaxadjuster` and provide your avatax account information. Sanbox account credentials are optional.
4. Selecting "Sandbox" or "Production" will enable the chosen environment.

## Using AvaTax Tax Adjuster

1. Visit `/admin/commerce/settings/taxcategories/'. A tax category with the handle "avatax" should exist, if not, create one.
2. Visit `/admin/commerce/settings/producttypes'. For each product type to use tax rates provided by Avalara, select the AvaTax category from the "Available Tax Categories" field.

![Product Tax Category](resources/tax-category.png)

After completing the installation and configuration, AvaTax will calculate and apply sales tax to all orders with a valid shipping address.

## AvaTax Tax Adjuster Roadmap

Some things to do, and ideas for potential features:

* Enable/Disable tax calculation on a per-product basis.

Brought to you by [Rob Knecht](https://github.com/rmknecht) and [Surprise Highway](https://github.com/surprisehighway)