<div id='more'>Check out the <a href='/archives/'>Archives</a>, or <b>read more</b> about <?php 
 $tags = wp_tag_cloud('smallest=1&largest=1.01&number=10&format=array&unit=em');
 $tag_strip = ' or ' . array_pop($tags) . '.';
 $tags = array_reverse($tags);
 foreach ($tags as $tag) {
     $tag_strip = $tag . ", " . $tag_strip;
 } 
 print $tag_strip
 ?>
</div>