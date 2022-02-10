
<?php if ( get_theme_mod( 'simpleshop_display_homepage_shop_category', true ) ) : ?>
<section class="space-3">
    <div class="container sm-center">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2 class="title"><?php echo get_theme_mod( 'simpleshop_homepage_category_title', __('Shop by Category', 'simpleshop' ) ); ?></h2>
                </div>
            </div>

            <div class="col-md-12">
                <?php 
                $no_of_category = get_theme_mod( 'simpleshop_homepage_noof_category' );
                echo do_shortcode("[product_categories columns='{$no_of_category}']"); 
                ?>
            </div>
            
        </div>
    </div>
</section>
<?php endif; ?>