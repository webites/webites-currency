=== Plugin Name ===
Contributors: lgolabek
Donate link: https://docs.webites.dev/en/donate/
Tags: currency, eur, usd, gbp, jpy, chf, aud, display currencies, get currencies
Tested up to: 5.7.2
Stable tag: 1.2.1
License: GPLv2 

 
Plugin displays actual currencies AUD, USD, CHF, GBP, JPY etc based on EUR.

== Description ==
 
Wordpress plugin with Currencies based on EUR

How often Plugin uploads currencies

Plugin update currencies one time for one hour. It make that with CRON and run script which upload and save currency to json file on producer server. Installed plugin on Wordpress site runs like that:

1. Downloads currencies from json file
2. Makes Wordpress filter which show currencies after posts and pages content (option)
3. Displays currency with responsive styles. Styles inherit theme styles.
4. Displays currencies using shortcode (option)
5. After refresh site, currencies still updating

Plugin use currencies API Exchangeratesapi
Link: https://exchangeratesapi.io/
Terms: https://exchangeratesapi.io/terms/

Check the documentation: [weBites currency documentation](https://docs.webites.dev/category/dokumentacja/webites-currency/ "weBites currency documentation")

The plugin supports the euro exchange rate for the following currencies:

* USD
* AUD
* CHF
* GBP
* JPY
* BTC
* CAD
* CZK
* DKK
* HUF
* NZD
* PLN
* RUB
* UAH
* XAG
* XAU

== Installation ==
 
This section describes how to install the plugin and get it working.
 
Simplest:

1. Run your Wordpress
2. Plugins -> Add New
3. Search Plugin: **weBites Currency**
4. Click **Install Now**
5. After Install click **Activate**

Manual:

1. Download .zip file
2. Plugins -> Add New
3. Upload Plugin 
4. After Install click **Activate**

== Frequently Asked Questions ==
 
= Where Plugin displays currencies =
 
The plugin displays currencies by posts and pages if you set this option in Plugin Options.

= Can I display currencies wherever I want =

Yes, you can use shortcode. More info about that in documentation and Plugin Options

= Can I use currencies for other purpose =

It's job for developers but yes, you can use currencies for example calculating prices. For more check documentation.

== Screenshots ==
 
1. Display on Pierogi Theme
2. Display on Twenty Twenty-one Theme

== Changelog ==
 
= 1.2.1 =
* Added shortcode
* Added Plugin Options
* Administrator can add "header" and "footer" to displayed currencies
* Administrator decide where currencies are display
* Administrator can choose which currencies will be displays (available 16 currencies)
 
= 1.1.0 =
* First, fixed version

== Arbitrary section ==

Plugin can be modified to custom necessity. 
But big changes must make only author. 
To contact with us enter [weBites website](https://webites.pl "weBites website"). 
**We open to your evolution!**
