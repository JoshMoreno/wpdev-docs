# Post
A better post object. Ditch "The Loop".

## Usage
### Single
```PHP
<?php /** @var \WPDev\Models\Post $Post */ ?>
<h1>
	<a href="<?= $Post->url(); ?>">
		<?= $Post->title(); ?>
	</a>
</h1>
<?= $Post->content(); ?>
```

### Loop
```php
<?php /** @var \WPDev\Models\Post[] $Posts */ ?>
<?php foreach ($Posts as $post) : ?>
	<div>
		<?= $post->featuredImage('medium'); ?>
		<h2><?= $post->title(); ?></h2>
		<div><?= $post->excerpt(); ?></div>
		<a href="<?= $post->url(); ?>">Read More</a>
	</div>
<?php endforeach; ?>
```

## API Reference
### Public Methods
| Method | Summary |
| --- | --- |
| __construct | For a fluid syntax use Post::create |
| __get | Routes protected property access to appropriate methods. (e.g. $Post->title === $Post->title()) |
| *static* create | Static version of __construct for a fluid syntax. |
| acfField | Uses ACF's `get_field()` to fetch a field value |
| acfFields | Uses ACF's `get_fields()` to get all custom field values in an associative array.|
| ancestors | Retrieves the parent posts. The order is the direct parent being first in the array to the highest level ancestor being last in the array. |
| createdDate | The date the post was created. |
| featuredImage | Get the featured image. Returns an instance of `\WPDev\Models\Image`. |
| featuredImageId | Get the featured image id. |
| field | Gets a field value using `get_post_meta()`. |
| hasFeaturedImage | Whether the post has a featured image or not. |
| hasTerm | Checks whether the post has the term. If no arg passed checks if it has any term. |
| id | The id. |
| title | The title. |
| url | The url (aka permalink) |
| content | The content. Same as `the_content()` except we don't echo. |
| excerpt | The excerpt |
| modifiedDate | The last modified date. |
| parent | Gets the parent post if any. If so, will return a `\WPDev\Models\Post` |
| parentId | The parent ID if there is a parent. Else 0. |
| postType | The post type. |
| status | The current post status. |
| taxonomies | The taxonomy names associated with the post. |
| terms | Terms for all or a specific associated taxonomy. |
| wpPost | The original `WP_Post` object. |

### Protected
If you're extending this class, these might be of use. 

| Method | Summary |
| --- | --- |
| hasWpPost | Checks if we have a there is a `\WP_Post` set. Since we use get_post(), this might not actually be set. |
| isAcfActive | Helper to check if ACF is activated. Useful if you're adding methods that interact with ACF. |
| postElseId | A helper for optimization. A lot of WordPress functions are flexible and allow for an id or `\WP_Post` object to be passed in. In theory, passing in the object should be faster than passing in the id, since the object would not need to get rebuilt. |
| restoreWpGlobals | Restores WordPress globals after altering them with `$this->setupWpGlobals()`. |
| setupWpGlobals | This is a bit of a hack so we can reliable call functions like get_the_content() that depend on being called inside "The Loop (aka having the post as a global along with other related globals)". So dumb! |



