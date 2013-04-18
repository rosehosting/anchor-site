# Category

The `Category` class extends the `Base` class and inherits all methods.

`public static function dropdown(void)`

### Returns

Array of categories indexed by the category ID.

### Example

	<?php foreach(Category::dropdown() as $id => $category): ?>

		<option value="<?php echo $id; ?>"><?php echo $category; ?></option>

	<?php endforeach; ?>


`public static function slug(string $slug)`

### Returns

New instance of the `Category` object or null if not found

### Example

	$category = Category::slug('my-category-slug');

	echo $category->title;

	$category->title = 'New Title';

	$category->save();


`public static function paginate(int $page = 1, int $perpage = 10)`

### Returns

New instance of the `Paginator` class

### Example

	$paging = Category::paginate(1, 10);

	$paging->links(); // returns <a href="BASE/category/1">First</a> ...

	foreach($paging->results as $category) {
		echo $category->title;
	}