<?php if (is_category()) {
		$cat = get_category($cat); 
	  if ($cat->category_parent == 0) {
			echo "<h1>" . $cat->name . "</h1>";
			echo "<h2>" . $cat->category_description . "</h2>";
		} else {
	    $cat_parent_name = get_category($cat->category_parent);
			echo "<h1>" . $cat_parent_name->cat_name . "</h1>";
			echo "<h2>" . $cat_parent_name->category_description . "</h2>";
  	}
	} elseif (is_page() || is_single()) {
		$page = get_page($id);
		echo "<h1>" . $page->post_title . "</h1>";
	} elseif (is_tag()) {
		$tagTitle = single_tag_title('Tag: ', false);
		echo "<h1>" . $tagTitle . "</h1>";
	} elseif (is_search()) {
		echo "<h1>Results for: " . get_search_query() . "</h1>";
	}	else {
		echo "<h1>" . get_bloginfo('name') . "</h1>";
	}?>
