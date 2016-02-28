
<section class="wrap">
	<aside class="sidebar">
		<h3>Getting started</h3>

		<ul class="submenu">
			<li><?php link_to('docs/getting-started/requirements', 'System Requirements'); ?></li>
			<li><?php link_to('docs/getting-started/installing', 'Installing Anchor'); ?></li>
			<li><?php link_to('docs/getting-started/upgrading', 'Upgrading Anchor'); ?></li>
			<li><?php link_to('docs/getting-started/configuration', 'Configuration'); ?></li>
		</ul>

		<h3>The Admin Interface</h3>

		<ul class="submenu">
			<li><?php link_to('docs/managing-content/posts', 'Posts (Articles)'); ?></li>
			<li><?php link_to('docs/managing-content/comments', 'Comments'); ?></li>
			<li><?php link_to('docs/managing-content/pages', 'Pages', array('red')); ?></li>
			<li><?php link_to('docs/managing-content/categories', 'Categories', array('red')); ?></li>
			<li><?php link_to('docs/managing-content/users', 'Users', array('red')); ?></li>
			<li><?php link_to('docs/managing-content/metadata', 'Metadata', array('red')); ?></li>
			<li><?php link_to('docs/managing-content/custom-fields', 'Custom Fields', array('red')); ?></li>
			<li><?php link_to('docs/managing-content/custom-variables', 'Custom Variables', array('red')); ?></li>
		</ul>

		<h3>Theming</h3>

		<ul class="submenu">
			<li><?php link_to('docs/theming/introduction', 'Introduction'); ?></li>
			<li><?php link_to('docs/theming/file-structure', 'File Structure'); ?></li>
			<li><?php link_to('docs/theming/custom-templates', 'Custom Templates'); ?></li>
		</ul>

		<h3>Function Reference</h3>

		<ul class="submenu">
			<li><?php link_to('docs/function-reference/articles', 'Articles'); ?></li>
			<li><?php link_to('docs/function-reference/categories', 'Categories'); ?></li>
			<li><?php link_to('docs/function-reference/comments', 'Comments'); ?></li>
			<li><?php link_to('docs/function-reference/config', 'Config'); ?></li>
			<li><?php link_to('docs/function-reference/helpers', 'Helpers'); ?></li>
			<li><?php link_to('docs/function-reference/menus', 'Menus'); ?></li>
			<li><?php link_to('docs/function-reference/metadata', 'Metadata'); ?></li>
			<li><?php link_to('docs/function-reference/pages', 'Pages'); ?></li>
			<li><?php link_to('docs/function-reference/posts', 'Posts'); ?></li>
			<li><?php link_to('docs/function-reference/search', 'Search'); ?></li>
			<li><?php link_to('docs/function-reference/users', 'Users'); ?></li>
		</ul>

		<h3>Class Reference</h3>

		<ul class="submenu">
			<li><?php link_to('docs/class-reference/base', 'Base', array('red')); ?></li>
			<li><?php link_to('docs/class-reference/category', 'Category', array('red')); ?></li>
			<li><?php link_to('docs/class-reference/comment', 'Comment', array('red')); ?></li>
			<li><?php link_to('docs/class-reference/extend', 'Extend', array('red')); ?></li>
			<li><?php link_to('docs/class-reference/page', 'Page', array('red')); ?></li>
			<li><?php link_to('docs/class-reference/plugin', 'Plugin', array('red')); ?></li>
			<li><?php link_to('docs/class-reference/post', 'Post', array('red')); ?></li>
			<li><?php link_to('docs/class-reference/user', 'User', array('red')); ?></li>
		</ul>

		<h3>Plugins</h3>

		<ul class="submenu">
			<li><?php link_to('docs/plugins/introduction', 'Introduction'); ?></li>
			<li><?php link_to('docs/plugins/file-structure', 'File Structure'); ?></li>
			<li><?php link_to('docs/plugins/plugin-file', 'The <code>plugin.php</code> file'); ?></li>
		</ul>
	</aside>
	
	<section class="content">
		<?php echo $content; ?>
	</section>
</section>


<script src="<?php echo asset('assets/js/rainbow-custom.min.js'); ?>"></script>
<script>
	(function() {
		var elements = document.querySelectorAll('pre code');

		for(var i = 0; i < elements.length; i++) {
			elements[i].setAttribute('data-language', 'php');
		};

		Rainbow.color();
	}());
</script>