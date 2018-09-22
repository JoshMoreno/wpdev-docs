# wpdev.controller.directories

Filter what folders you're controllers are in.

## Parameters
### `array $directories`
The default directories. 
```php
parent-theme/controllers/

// and if using a child theme  
child-theme/controllers/
```

## Return
An `array` of directories containing controllers. 

Paths appearing in the array first (e.g. `$directories[0]`) will be searched before paths appearing later, (e.g. `$directories[1]`).

## Usage
If you want your controllers in a `my-theme/different-directory`.
```php
add_filter('wpdev.controller.directories', function($directories) {
    $directories = get_stylesheet_directory() . '/different-directory',

    return $directories 
}, 10, 2);
```