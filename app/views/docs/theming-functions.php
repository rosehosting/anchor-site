<?php echo $header; ?>

<hgroup role="banner">
	<h1>Documentation</h1>
</hgroup>

<section id="content">
	<?php echo $sidebar; ?>

	<div class="primary">
		<h2>Core Theme Functions</h2>

		<p>At its core, Anchor is HTML and CSS, with sprinkles of all-important PHP, to dynamically
		retrieve and serve all the data. Don&rsquo;t worry, though, it&rsquo;s pretty painless.
		Here is a comprehensive list of all the functions available to you and your Anchor theme.</p>

		<p><small class="note"><b>Note:</b> these functions may not work as expected in Anchor 0.8
		and lower, and may cause errors.</small></p>

		<dl>
			<?php foreach($docs as $doc): ?>
			<dt>
				<a name="<?php echo $doc->slug; ?>"></a>
				<code><?php echo $doc->function; ?></code>
			</dt>
			<dd>
				<p><?php echo $doc->content; ?></p>
				<?php if($doc->sample) echo Spectrum::parse($doc->sample); ?>
			</dd>
			<?php endforeach; ?>
		</dl>
	</div>
</section>

<?php echo $footer; ?>