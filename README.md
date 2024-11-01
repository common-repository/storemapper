# Storemapper for WordPress #
**Contributors:** storemapper, sureswiftcapital, codivated, damonsharp  
**Tags:** storemapper, store locator, store locator plugin, store locator software, store map, locator,
**Requires at least:** 4.4  
**Tested up to:** 6.6.2  
**Stable tag:** 2.0.1
**Requires PHP:** 5.4.45
**Donate link:** N/A  
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  

Easily place our Store Locator plugin on your site via shortcode, widget, or code snippet.

## Description ##

We offer a dead simple store locator plugin. Help your customers find your nearest multi-location business, or search for a specific location. The Storemapper plugin is a favorite of restaurants, wholesale dealers, retail stores and many other multi-location businesses. Easily get directions and drive foot traffic via desktop, tablet or mobile devices.  
See which stores are getting the most traffic and route your inventory accordingly. Plan your expansions by viewing where searches are happening but not finding a location nearby. Storemapper's analytics turn your store locator into a critical business strategy tool.

Storemapper is fully customizable to blend seamlessly into the look and feel of your website. Your designers and brand specialists will be happy with the font, colors, logo placement, and more, which are easily customized to match your store locator to the style of your site.

It is improbable, but should you have difficulty installing or using Storemapper, send the support team an email or chat request and we will be happy to assist.

**Requirements:**
The plugin requires a Storemapper account. Sign up for a trial at [http://storemapper.co](http://storemapper.co?utm_source=wordpress.org).

Just to recap a few of our key features:
* No coding required, just a couple of simple clicks, then upload your store feed via spreadsheet or Google Sheet sync.
* Fully customizable… Brand matching is easy with Storemapper, simply pick from a large selection of preloaded setting options or, make adjustments using your own CSS. It’s that simple. Want custom store locator markers? No problem, we do that too.
* Robust analytics to see how your users are engaging with your map and enable strategic decision making with actionable data that can be used to understand your growth potential and key customer demographics.
* 7-Day free trial, this gives you plenty of time to test our platform, then upgrade, or bounce. Yes, we provide amazing support during your trial, and beyond.
* Stellar support is our mantra, our support staff has been with us since inception and can certainly assist with any questions you have.
* Authorized Google Maps API, meaning this is not some hacked together mapping utility, it is the baseline data that Google themselves use, but you get to customize the user experience!
* Google My Business integration, the easiest way to import all your stores from Google.
* Search results can be shown many ways, (kilometers or miles, varying radius’, list view or map view, etc. etc). Not to mention maps will be served in the native language of the searchers device preference.
* Facebook integration allows the same awesome map on your Facebook page, that you have on your website.
* Several pricing tiers to suit your multi-location business. Got 10 stores? How about 10,000? No problem, we support businesses of many sizes.

View a quick walk-through of the plugin:

https://www.youtube.com/watch?v=pr6gEEWskFQ&autoplay=0&rel=0

## Installation ##
Use the following steps to install and use the plugin...

1. Upload `wp-storemapper.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Navigate to /wp-admin/options-general.php?page=wp_storemapper_settings and enter your Storemapper account ID.
1. Place the Storemapper content on your site using one of the following methods:
	* Place `<?php wp_storemapper_content(); ?>` in your template(s). This function call takes up to two optional parameters: a `title` parameter, which is a string (ex. '`My Storemapper Content`'), and a `tag` parameter, that accepts a string to be used as the HTML tag that wraps the title string from the `title` parameter. When `title` is left empty, no title will be output. When `title` is set and `tag` is left empty the title will be wrapped in `h2` tags by default. For example `<?php wp_storemapper_content( 'My Storemapper Content', 'h1' ); ?>` will output the Storemapper content preceeded by `<h1>My Storemapper Content</h1>`.
	* Insert a shortcode into page or post content using the Storemapper button in the editor toolbar.
	* Add the Storemapper widget to a widget area in the WordPress admin under Appearance > Widgets.
	* Add the Storemapper map using the Storemapper block on the block editor, under Widgets.

Note: Title output using the title tag feature will automatically have the class `wp-storemapper-title` added, which can be used for additional CSS styling.

## Frequently Asked Questions ##

### Can I bulk update my stores? ###

Yes, read more about that on this [support thread](https://www.storemapper.co/support/making-bulk-changes-via-csv-with-bulk-edit/).

### Can I add categories to my locations to differentiate their features? ###

Yes, read more about categorizing your store (drive up location, showroom, pick-up online orders,
Open Late, etc.) for later filtering [here](https://www.storemapper.co/support/using-category-filters/).

### Addresses can be listed a lot of different ways. What is the proper way to list my stores for upload? ###

We have boiled down the questions asked most by users and compiled that information in this
[support thread](https://www.storemapper.co/support/common-address-formatting-problems/).

### Are there any limitations when outputting the Storemapper content on my site? ###

Yes. The content is limited to being displayed only once per page/post. You may see unintended output if you attempt to display the Storemapper content on a post or page using both the shortcode button in the post editor and via a widget area that displays on the same page for example.

There are lots of other Q/A in our [support section](https://www.storemapper.co/support/), can’t find your answer there? Then simply email or
chat with our support team.

## Screenshots ##

### 1. Settings page. ###
![Settings page.](http://ps.w.org/storemapper-for-wordpress/assets/screenshot-1.png)

### 2. Widgets page showing placement in Footer 2 widget area. ###
![Widgets page showing placement in Footer 2 widget area.](http://ps.w.org/storemapper-for-wordpress/assets/screenshot-2.png)

### 3. Post editor showing the Storemapper button that inserts a shortcode. ###
![Post editor showing the Storemapper button that inserts a shortcode.](http://ps.w.org/storemapper-for-wordpress/assets/screenshot-3.png)

### 4. Post editor showing the Storemapper button form, allowing an optional title and HTML tag to surround the title. ###
![Post editor showing the Storemapper button form, allowing an optional title and HTML tag to surround the title.](http://ps.w.org/storemapper-for-wordpress/assets/screenshot-4.png)

### 5. Post editor showing the inserted shortcode. ###
![Post editor showing the inserted shortcode.](http://ps.w.org/storemapper-for-wordpress/assets/screenshot-5.png)

### 6. Twentyseventeen theme showing the Storemapper shortcode output on a blog article. ###
![Twentyseventeen theme showing the Storemapper shortcode output on a blog article.](http://ps.w.org/storemapper-for-wordpress/assets/screenshot-6.png)


## Upgrade Notice ##

Not currently applicable.

## Changelog ##

### 1.0.0 ###
* Initial release.

### 2.0.0 ###
* Add Storemapper block