<aside class="sidebar">
	<h3><a href="/docs/getting-started">Getting started</a></h3>

	<ul class="submenu">
		<?php doc('getting-started/requirements', 'System Requirements'); ?>
		<?php doc('getting-started/installing', 'Installing Anchor'); ?>
		<?php doc('getting-started/upgrading', 'Upgrading Anchor'); ?>
		<?php doc('getting-started/configuration', 'Configuration'); ?>
	</ul>

	<h3><a href="/docs/managing-content">The Admin Interface</a></h3>

	<ul class="submenu">
		<?php doc('managing-content/posts', 'Posts (Articles)'); ?>
		<?php doc('managing-content/comments', 'Comments'); ?>
		<?php doc('managing-content/pages', 'Pages', array('red')); ?>
		<?php doc('managing-content/categories', 'Categories', array('red')); ?>
		<?php doc('managing-content/users', 'Users', array('red')); ?>
		<?php doc('managing-content/metadata', 'Metadata', array('red')); ?>
		<?php doc('managing-content/custom-fields', 'Custom Fields', array('red')); ?>
		<?php doc('managing-content/custom-variables', 'Custom Variables', array('red')); ?>
	</ul>

	<h3><a href="/docs/theming">Theming</a></h3>

	<ul class="submenu">
		<?php doc('theming/introduction', 'Introduction'); ?>
		<?php doc('theming/file-structure', 'File Structure'); ?>
		<?php doc('theming/custom-templates', 'Custom Templates'); ?>
	</ul>

	<h3><a href="/docs/function-reference">Function Reference</a></h3>

	<ul class="submenu">
		<?php doc('function-reference/articles', 'Articles'); ?>
		<?php doc('function-reference/categories', 'Categories'); ?>
		<?php doc('function-reference/comments', 'Comments'); ?>
		<?php doc('function-reference/config', 'Config'); ?>
		<?php doc('function-reference/helpers', 'Helpers'); ?>
		<?php doc('function-reference/menus', 'Menus'); ?>
		<?php doc('function-reference/metadata', 'Metadata'); ?>
		<?php doc('function-reference/pages', 'Pages'); ?>
		<?php doc('function-reference/posts', 'Posts'); ?>
		<?php doc('function-reference/search', 'Search'); ?>
		<?php doc('function-reference/users', 'Users'); ?>
	</ul>

	<h3><a href="/docs/class-reference">Class Reference</a></h3>

	<ul class="submenu">
		<?php doc('class-reference/base', 'Base', array('red')); ?>
		<?php doc('class-reference/category', 'Category', array('red')); ?>
		<?php doc('class-reference/comment', 'Comment', array('red')); ?>
		<?php doc('class-reference/extend', 'Extend', array('red')); ?>
		<?php doc('class-reference/page', 'Page', array('red')); ?>
		<?php doc('class-reference/plugin', 'Plugin', array('red')); ?>
		<?php doc('class-reference/post', 'Post', array('red')); ?>
		<?php doc('class-reference/user', 'User', array('red')); ?>
	</ul>

	<h3><a href="/docs/plugins">Plugins</a></h3>

	<ul class="submenu">
		<?php doc('plugins/introduction', 'Introduction'); ?>
		<?php doc('plugins/file-structure', 'File Structure'); ?>
		<?php doc('plugins/plugin-file', 'The <code>plugin.php</code> file'); ?>
	</ul>
</aside>