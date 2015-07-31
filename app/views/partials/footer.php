		<div class="download-strip">
			<a href="/download" class="btn">Download Anchor</a>
			<a href="/demo" class="btn subdued text">Play with a demo</a>
		</div>

		<footer id="footer">
		    <div class="wrap">
		    	<section class="blog-article">
			    	<b>Latest update from the <a href="/blog">blog</a></b>

			    	<article>
				    	<h1><a class="chevron" href="/blog/anchor-1.0">Anchor 1.0-beta released!</a></h1>

				    	<small>Posted by Dave <time>24 days ago</time>.</small>

				    	<p>22,174 commits. 192,041 lines of code changed. 1,069 bug fixes. It all boils down to the one number I couldn’t be more pleased to say: 1.0.</p>
						<p>That’s right, Anchor is in its first full version. It’s been a long time coming, but it’s worth the wait. With hundreds of new features, a rebuilt admin panel, plugin support, and a ton more…</p>
			    	</article>
		    	</section>

		    	<section class="numbers">
			    	<b>Stats <em class="amp">&amp;</em> Numbers</b>

			    	<dl>
				    	<dt>305,951</dt>
				    	<dd>Downloads</dd>

				    	<dt><?php echo star_count(); ?></dt>
				    	<dd>Stars</dd>

				    	<dt><?php echo latest_version(); ?></dt>
				    	<dd>Latest version</dd>
			    	</dl>
		    	</section>

		    	<section class="quote">
		    		<b>Thoughts</b>

					<?php $quote = quote(); ?>
		    		<blockquote><?php echo $quote->text; ?></blockquote>
		    		<cite>— <?php echo $quote->author; ?></cite>
		    	</section>

		    	<section class="colophon">
		    		<b>Credits <em class="amp">&amp;</em> Colophons</b>
			    	<p>Typeset in <a href="//google.com/fonts/specimen/Karla">Karla</a>, <a href="//google.com/fonts/specimen/Alegreya">Alegreya</a>, and <a href="//google.com/fonts/specimen/Cousine">Cousine</a> from Google Fonts. It’s powered by PHP 5.5, and hosted with Linode.</p>
					<p>Anchor is designed and built by the Anchor team with help from our amazing <a href="//github.com/anchorcms/anchor-cms/graphs/contributors">contributors</a>.</p>
					<p>Last but not least, a huge thanks to everyone who’s downloaded, helped, and got involved with Anchor. You’re all great!</p>

					<nav class="social">
			            <a class="twitter" href="//twitter.com/anchorcms">Twitter</a>
			            <a class="dribbble" href="//dribbble.com/tags/anchor-cms">Dribbble</a>
			            <a class="github" href="//github.com/anchorcms">GitHub</a>
			        </nav>
		    	</section>
		    </div>
		</footer>
		
		<script src="<?php echo asset('assets/js/retina.js'); ?>"></script>
		<script src="<?php echo asset('assets/js/anchor.js'); ?>"></script>

		<script>var _gaq = [['_setAccount', 'UA-28956662-1'], ['_trackPageview']];</script>
		<script src="//google-analytics.com/ga.js"></script>

		<script>var GoSquared = {acct: 'GSN-460225-Z'}</script>
		<script src="//d1l6p2sc9645hc.cloudfront.net/tracker.js"></script>
	</body>
</html>
