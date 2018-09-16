# `wpdev.factory.postModelClass`
This filter allows you to change what post model class gets used.

This filter runs anytime you use any of wpdev's `\WPDev\Factories\PostFactory` methods or helper function such as `get_posts_from_query`

## Parameters
### `string $postModelClass` 

The classname of the post model you want to use. Default is `\WPDev\Models\Post`

###`WP_Post $post`
The post that going to be passed to the post model class.

## Usage
```php
add_filter('wpdev.factory.postModelClass', function($postModelClass, $post) {
    if ($post->post_type === 'event') {
        return \MyEventPlugin\Models\Event::class;
    }

    return $postModelClass 
}, 10, 2);
```