# Default Data
Initial data to get you going even faster!

Each template rendered by WordPress has a `$data` associative array exposed to it.

You can access it like a normal array `$data['Post']` or directly `$Post` since it's also passed through `extract()`.

## Post
An instance of `\WPDev\Models\Post` created from the global post.

## Posts
An array of `\WPDev\Models\Post` objects created from the main query.