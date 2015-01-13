<?php if ($cat->category_parent  != 0) { 
    $cat_parent_name = get_category($cat->category_parent);
    $cat_parent_name = $cat_parent_name->cat_name;

if (function_exists('z_taxonomy_image_url')){ 
    $url = z_taxonomy_image_url($cat->term_id);
    $url = "<img src='$url'/>";
}
if (get_field('date_published',"category_{$cat->term_id}")) {
    $date = DateTime::createFromFormat('Ymd', get_field('date_published',"category_{$cat->term_id}"));
}
?>
    <a href="<?php echo get_category_link($cat->term_id); ?>" class="<?php echo create_slug($cat_parent_name) . '-issue' ?> issue alignleft" data-publication="<?php echo $cat_parent_name; ?>" data-date="<?php echo strtotime($date->format('Y-m-d')); ?>">
    <?php echo $url ?>
        <div class='issue-details' style="background-color:<?php the_field('issue_color', "category_{$cat->term_id}"); ?>;">
        <h2 class='name'><?php echo $cat_parent_name; ?></h2>

        <p class='issue-date'><?php the_field('issue_text', "category_{$cat->term_id}"); ?></p>
        <p><?php echo $cat->category_description; ?></p>
        <span class='btn' style="color:<?php the_field('issue_color', "category_{$cat->term_id}"); ?>;">Read More</span>
        </div>
    </a>
<?php } ?>