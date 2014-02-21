=== Plugin Name ===
Contributors: ronalfy
Tags: formatting, rss, feed, feeds
Requires at least: 2.0
Tested up to: 2.31
Stable tag: 1.0.7.0

Feed Styler enables you to keep your existing styles for your post, but allows a different style to be applied to the feed.
== Description ==
<h3>What is Feed Styler?</h3>
<p>Feed Styler is a WordPress plugin for WordPress users who are comfortable with <acronym title="Cascading Style Sheets">CSS</acronym> and would like to be able to style their feeds.  Feed Styler enables you to keep your existing class and ID style declarations in your content, but allows a different style to be applied to the feed of that same content.  No longer do feeds have to be stripped of style and color.</p>
<h3>Who is Feed Styler For?</h3>

<p>Feed Styler is for those that use WordPress, are comfortable with <acronym title="Cascading Style Sheets">CSS</acronym>, and would like to be able to use their existing markup to style their feeds.  Feed Styler is very <a href="http://www.devlounge.net/sidenotes/simple-image-styling-with-feed-styler">effective at styling images</a>, blockquotes, and much more.  If you are a hand coder and familiar with CSS, Feed Styler will be very intuitive.  </p>
<p>This plugin is not for CSS beginners, and not for those that rely on WordPress&#8217;s WYSIWYG for content appearance.  This plugin is also not for those who have the opinion that feeds should be void of style.</p>
<h3>Features</h3>
<p>Feed Styler has the following features:</p>
<ul>
<li><a href="http://www.devlounge.net/sidenotes/feed-styler-update-images-and-feeddemon">Images show up styled in feed readers that strip inline styles</a>.</li>
<li>Accepts nested CSS declarations.  For example: <code>#ul li ul li .classname { css code } </code></li>
<li>Accepts multiple classnames per tag.  For example: &lt;p class=&#8221;alert right&#8221;&gt;</li>

<li>Cascades your styles.</li>
<li>Works on all feed readers that do not strip inline styles.</li>
<li>Allows you to keep inline styles out of your post content.</li>
<li>Allows you to keep your site appearance and feed appearance separate.</li>
<li>Allows you to test your styles on your post content for immediate feedback.</li>
</ul>
== Installation ==

<p>Installation is simple.  Just follow these steps:</p>
<ul>
<li>Copy the &#8220;Feed Styler&#8221; folder into your /wp_content/plugins/ directory.</li>

<li>Activate the plugin in the Plugins administration panel.</li>
</ul>


== Screenshots ==

1. First screenshot for a styled feed.
2. Second example of a styled feed.
3. The admin panel interface.

== Plugin Tips ==

<p>The plugin will accept most CSS.  There are several things it can&#8217;t do, however.</p>
<ul>
<li>The plugin cannot correct invalid CSS code.</li>
<li>The plugin will not work if the content HTML is invalid (such as a hanging open or closed tag).</li>
<li>The plugin cannot accept multiple CSS declarations per line.  For example, the plugin cannot accept: <code> p, h1, h3, #id, .classname { style code} </code>.  Each declaration must be entered in separately.</li>
<li>CSS code must be on one line. I do have error checking to strip multi-line CSS to one line though.</li>
<li>Invalid CSS code will be stripped out.  Make sure you have a backup somewhere.</li>

<li>Certain style attributes may cause your feed to invalidate.  Here&#8217;s a list of <a href="http://feedvalidator.org/docs/warning/DangerousStyleAttr.html">acceptable attributes</a>.</li>
</ul>
<h3>How the Plugin Works</h3>
<p>Feed Styler uses <a href="http://php-html.sourceforge.net/">HTML Parser</a> to parse the content HTML.  The parsed HTML is then styled.</p>
<p>For those curious what the plugin does in the back-end of things, here are three files that will give you a good idea of what the plugin does to your content.  Please note that Feed Styler does not permanently modify your content.</p>
<ul>
<li><strong><a href="http://www.devlounge.net/wp-content/uploads/2007/02/sample_html.txt">Sample HTML Code</a> :</strong> This is sample HTML code with classes and IDs specified.</li>

<li><strong><a href="http://www.devlounge.net/wp-content/uploads/2007/02/sample_styles.txt">Sample Styles</a> :</strong> This is sample Feed Styler CSS code that will style the sample HTML code. </li>
<li><strong><a href="http://www.devlounge.net/wp-content/uploads/2007/02/sample_resulting_code.txt">Resulting Code</a> :</strong> This shows what the Sample Code will look like after being run through Feed Styler.</li>
</ul>
<p>The Sample Code is the type of code you might find in a regular blog post: headings, paragraphs, blockquotes, lists, etc&#8230; The plugin determines if the content being served to the user is a feed. If the content is a feed, the content is run through the Feed Styler filter. All IDs, Classes, and Tags that have styles specified in Feed Styler will have the appropriate inline style added. Any feed reader that doesn&#8217;t strip out inline styles (shame on you <a href="http://www.feeddemon.com">FeedDemon</a>) will now show a styled feed.</p>
<h3>Some Tips When Styling Your Feed</h3>
<p>Not all feed readers support inline styles.  For example, FeedDemon doesn&#8217;t support inline styles.  So don&#8217;t fully rely on Feed Styler for the appearance of your feed.</p>
<p>Here are some more tips:</p>
<ul>

<li>Remember to keep feeds readable.  Most feeds have a light background and dark text.</li>
<li>Avoid pixels if possible.  Use percentages or ems.</li>
<li>Be wary of floats, especially towards the end of your content.</li>
<li>Remember that people subscribed to your feed to read your content.</li>
</ul>

