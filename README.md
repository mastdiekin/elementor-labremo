# Elementor Labremo Gym theme Plugin

Plugin Structure: 
```
assets/
      /js   
      /css  Holds plugin CSS Files
      
widgets/
      /blog.php
      /button.php
      /classes.php
      /coaches.php
      /hero.php
      /index.php
      /photo.php
      /pricing.php
      /scrollax.image.php
      /scrollax.spacer.php
      /testimonial.php
      
index.php
elementor-labremo.php
plugin.php
```


* `assets` directory - holds plugin JavaScript and CSS assets
  * `/js` directory - Holds plugin Javascript Files
  * `/css` directory - Holds plugin CSS Files
* `widgets` directory - Holds Plugin widgets
  * `/blog.php` - Blog Widget class
  * `/button.php` - Button Widget class
  * `/classes.php` - Classes Widget class
  * `/coaches.php` - Coaches Widget class
  * `/hero.php` - Hero Widget class
  * `/index.php` - Index Widget class
  * `/photo.php` - Photo Widget class
  * `/pricing.php` - Pricing Widget class
  * `/scrollax.image.php` - Scrollax.image Widget class
  * `/scrollax.spacer.php` - Scrollax.spacer Widget class
  * `/testimonial.php` - Testimonial Widget class
* `index.php`	- Prevent direct access to directories
* `elementor-labremo.php`	- Main plugin file, used as a loader if plugin minimum requirements are met.
* `plugin.php` - The actual Plugin file/Class.

For more documentation please see [Elementor Developers Resource](https://developers.elementor.com/creating-an-extension-for-elementor/).
