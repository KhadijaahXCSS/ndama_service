<?php
/**
 * @package Affiliate Store
 */
?>

<?php
    $affiliate_store_post_date = esc_html(get_the_date());
    $affiliate_store_year = esc_html(get_the_date('Y'));
    $affiliate_store_month = esc_html(get_the_date('m'));

    $affiliate_store_author_id = esc_attr(get_the_author_meta('ID'));
    $affiliate_store_author_link = esc_url(get_author_posts_url($affiliate_store_author_id));
    $affiliate_store_author_name = esc_html(get_the_author());
?>

<div class="col-lg-4 col-md-4 postsec-list">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="listarticle">
        <?php if (has_post_thumbnail() ){ ?>
            <div class="post-thumb">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
        <?php } ?>
        <header class="entry-header">
            <h2 class="single_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ('post' == get_post_type() && ( get_theme_mod('affiliate_store_metafields_date', true) || get_theme_mod('affiliate_store_metafields_comments', true) || get_theme_mod('affiliate_store_metafields_author', true) || get_theme_mod('affiliate_store_metafields_time', true))) : ?>
                <div class="postmeta">
                    <?php if (get_theme_mod('affiliate_store_metafields_date', true)) : ?>
                        <div class="post-date">
                            <a href="<?php echo esc_url(get_month_link($affiliate_store_year, $affiliate_store_month)); ?>">
                           <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($affiliate_store_post_date); ?>
                                <span class="screen-reader-text"><?php echo esc_html($affiliate_store_post_date); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>  
                    <?php if (get_theme_mod('affiliate_store_metafields_comments', true)) : ?>  
                        <div class="post-comment">&nbsp; &nbsp;
                            <a href="<?php echo esc_url(get_comments_link()); ?>">
                            <span><?php echo esc_html(get_theme_mod('affiliate_store_metabox_seperator', '|'));?></span><i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                                <span class="screen-reader-text"><?php comments_number(); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('affiliate_store_metafields_author', true)) : ?>
                        <div class="post-author">&nbsp; &nbsp;
                            <a href="<?php echo $affiliate_store_author_link; ?>">
                            <span><?php echo esc_html(get_theme_mod('affiliate_store_metabox_seperator', '|'));?></span><i class="fas fa-user"></i> &nbsp; <?php echo esc_html($affiliate_store_author_name); ?>
                                <span class="screen-reader-text"><?php echo esc_html($affiliate_store_author_name); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('affiliate_store_metafields_time', true)) : ?>
                        <div class="post-time">&nbsp; &nbsp;
                            <a href="#">
                            <span><?php echo esc_html(get_theme_mod('affiliate_store_metabox_seperator', '|'));?></span><i class="fas fa-clock"></i> &nbsp; <?php echo esc_html(get_the_time()); ?>
                                <span class="screen-reader-text"><?php echo esc_html(get_the_time()); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </header>
            <div class="entry-summary">
            <?php if(get_theme_mod('affiliate_store_blog_post_description_option') == 'Full Content'){ ?>
                <div class="entry-content"><?php
                    $affiliate_store_content = get_the_content(); ?>
                    <p><?php echo wpautop($affiliate_store_content); ?></p>  
                </div>
             <?php }
            if(get_theme_mod('affiliate_store_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                    <div class="entry-content"> 
                        <p><?php $affiliate_store_excerpt = get_the_excerpt(); echo esc_html($affiliate_store_excerpt); ?></p>
                    </div>
                <?php }?>
            <?php }?> 
            </div>
        <div class="clearfix"></div>
    </div>
</article>
</div>
