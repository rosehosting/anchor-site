# Base

The `Base` class extend the `Record` class and provides the table prefix on queries.

`public static function table(string $name = '')`

### Returns

String with the table prefix.

### Example

	Base::table(); // returns 'anchor_'

	Post::table(); // returns 'anchor_posts'

	Base::table('posts'); // returns `anchor_posts`