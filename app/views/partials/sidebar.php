<aside id="sidebar">
	<ul>
		<li>
			<?php echo Html::link('docs/getting-started', 'Getting Started'); ?>
			<ul class="submenu">
				<li><?php echo Html::link('docs/getting-started/requirements', 'Requirements'); ?></li>
				<li><?php echo Html::link('docs/getting-started/installing', 'Installing'); ?></li>
			</ul>
		</li>
		<li>
			<?php echo Html::link('docs/managing-content', 'Managing Content'); ?>
			<ul class="submenu">
				<li><?php echo Html::link('docs/managing-content', 'The Control Panel'); ?></li>
			</ul>
		</li>
		<li>
			<?php echo Html::link('docs/theming', 'Theming'); ?>
			<ul class="submenu">
				<li>
					<?php echo Html::link('docs/theming-functions', 'Core Template Functions'); ?>
					<ul class="files">
						<?php foreach(Query::table('docs')->group_by('file')->get() as $doc): ?>
						<li><?php echo Html::link('docs/theming-functions/' . $doc->file, ucwords($doc->file)); ?></li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</aside>