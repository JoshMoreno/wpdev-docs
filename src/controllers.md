# Controllers
Controllers help keep your templates clean by separating the business layer from the presentation layer, all following the WP template hierarchy you're used to.

## Setup
1. Create a `controllers` folder in the root of your theme.
2. Create controller files inside this folder.

## Naming
Create controllers following the same file naming convention as the [WP Template Hierarchy](https://wphierarchy.com/). Also make sure, it follows the same folder structure. See below for examples.

You can name the class whatever you'd like, but a good rule of thumb would be to name it after the file using upper camel case (aka pascal case). For example, if you have a `single-post.php` file you would name the class `SinglePost`.

### Examples
- Front Page - `controllers/front-page.php`
- Single Post - `controllers/single-post.php`
- Page Template located at `custom-page-templates/full-width.php` - `controllers/custom-page-templates/full-width.php`

### Gotchas
Only one controller will be run. The most specific.

## Requirement
The class must implement `WPDev\Controller\ControllerInterface`.

To fulfill this implementation, the class must contain a `build()` method which returns an array.

## Boilerplate
Use the snippet below to get started even faster. Just rename `{{MyTheme}}` to the namespace of your theme or project and change `{{SinglePost}}` to something that makes sense.

```php
<?php
namespace {{MyTheme}};

use WPDev\Controller\ControllerInterface;

class {{SinglePost}} implements ControllerInterface
{
    /**
    * The default data set by wpdev before calling build()
    * @var  array
    */
    public $defaultData = [];

    public function build()
    {
        return [];
    }
}
```