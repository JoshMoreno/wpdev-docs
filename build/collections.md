# Collections
Collections help you manipulate arrays quickly and fluently. Say goodbye to complicated conditionals and temporary variables.

> [Official 5.4 Docs on Laravel.com](https://laravel.com/docs/5.4/collections)

## Example
Let's say you have an array of wpdev Posts and you want to group them by year (which is an ACF field).

```php
$postsByYear = collect($Posts)->groupBy(function($post) {
    return $post->acfField('year_field');
});

/*
[
    '2018' => [ // posts w/ year_field == 2018 ],
    '2017' => [ // posts w/ year_field == 2017 ],
    '2016' => [ // posts w/ year_field == 2016 ],
]
*/
```