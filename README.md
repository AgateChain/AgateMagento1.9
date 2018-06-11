# Using the Agate plugin for Magento

## Prerequisites
You must have a Agate API KEY to use this plugin.  It's free visit [here](http://www.agate.services/registration-form/) .


## Server Requirements

* Last Cart Version Tested: 1.9.3.8
* [Magento CE](http://magento.com/resources/system-requirements) 1.9.0.1 or higher. Older versions might work, however this plugin has been validated to work against the 1.9.0.1 Community Edition release.
* [GMP](http://us2.php.net/gmp) or [BC Math](http://us2.php.net/manual/en/book.bc.php) PHP extensions.  GMP is preferred for performance reasons but you may have to install this as most servers do not come with it installed by default.  BC Math is commonly installed however and the plugin will fall back to this method if GMP is not found.
* [PHP](http://us2.php.net/downloads.php) 5.4 or higher. This plugin will not work on PHP 5.3 and below.

## Installation

**From the Releases Page:**

Visit the [Releases](https://github.com/AgateChain/AgateMagento1.9/releases) page of this repository and download the latest version. Once this is done, you can just unzip the contents and use any method you want to put them on your server. The contents will mirror the Magento directory structure.

**WARNING:** It is good practice to backup your database before installing extensions. Please make sure you Create Backups.

## Configuration

Configuration can be done using the Administrator section of your Megento store. Once Logged in, you will find the configuration settings under **System > Configuration > Sales > Payment Methods**.

Enter your API KEY you accquired from Agate and save the settings.

## Usage

Once enabled, your customers will be given the option to pay with Agate. Once they checkout they are redirected to a full screen Agate invoice to pay for the order.

As a merchant, the orders in your Magento store can be treated as any other order. You may need to adjust the Invoice Settings depending on your order fulfillment.

Try How It Works ?
====================

We have created a demo website for you to test the plugin, feel free to visit [here](http://agate.services/magento19/) .

