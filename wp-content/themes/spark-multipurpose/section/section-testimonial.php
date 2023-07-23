<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 *
 * @hooked spark_multipurpose_testimonial - 70
 */
if (! function_exists( 'spark_multipurpose_testimonial' ) ):
    
    function spark_multipurpose_testimonial(){
        
        $testimonial_options = get_theme_mod('spark_multipurpose_testimonial_section_disable','disable');
        
        if( !empty( $testimonial_options ) && $testimonial_options == 'enable' ){
           
            $testimonial_style = get_theme_mod('spark_multipurpose_testimonial_style', 'style1');
        ?>
        <section id="testimonial-section" class="testimonial-section section alignfull <?php echo esc_attr($testimonial_style); ?>">
            <?php spark_multipurpose_add_top_seperator('testimonial'); ?>
            <div class="section-wrap">   
                <div class="container">
                    <div class="inner-section-wrap">
                        <?php 
                            /**
                             * Section Title
                            */
                            $supertitle = get_theme_mod( 'spark_multipurpose_testimonial_subtitle' );
                            $title 		= get_theme_mod( 'spark_multipurpose_testimonial_title' );
                            $titlestyle = get_theme_mod( 'spark_multipurpose_testimonial_title_align','text-center' );
                            spark_multipurpose_section_title( $supertitle, $title, $titlestyle ); 
                        ?>
                        <div id="testimonial_slider" class="owl-carousel testimonial-block">
                            <?php
                                $testimonial_page = get_theme_mod('spark_multipurpose_testimonial_page'); 
                                if (!empty($testimonial_page)):
                                $testimonial_pages = json_decode($testimonial_page);
                                foreach ($testimonial_pages as $testimonial_page):
                                $page_id = $testimonial_page->testimonial_page;
                                if (!empty($page_id)):
                                $testimonial_query = new WP_Query('page_id=' . $page_id);
                                if ( $testimonial_query->have_posts() ): while ($testimonial_query->have_posts()): $testimonial_query->the_post();
                                    if( !isset($testimonial_page->rating)){
                                        $testimonial_page->rating = 5;
                                    }
                                ?>
                                <div class="item">
                                    <div class="testimonial_slide_box">
                                        <div class="rating">
                                            <?php foreach( range( 1, intval( $testimonial_page->rating )) as $index ): ?>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="review">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="testimonial_author">
                                            <div class="testimonial_img">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </div>
                                            <div class="testimonial_author_text">
                                                <h3><?php the_title(); ?></h3>
                                                <span class="designation"><?php echo esc_html( $testimonial_page->designation ); ?></span>
                                                <ul class="social-icon">
                                                    <?php if (!empty ($testimonial_page->facebook_url)) : ?>
                                                        <li class="social-facebook">
                                                            <a href="<?php echo esc_attr($testimonial_page->facebook_url) ?>">
                                                                <i class="fab fab fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; if (!empty ($testimonial_page->twitter_url)) : ?>
                                                        <li class="social-twitter">
                                                            <a href="<?php echo esc_attr($testimonial_page->twitter_url) ?>">
                                                                <i class="fab fab fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; if (!empty ($testimonial_page->instagram_url ) ) : ?>
                                                        <li class="social-instagram">
                                                            <a href="<?php echo esc_attr($testimonial_page->instagram_url) ?>">
                                                                <i class="fab fab fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; if (!empty ( $testimonial_page->youtube_url ) ) :?>
                                                        <li class="social-youtube">
                                                            <a href="<?php echo esc_attr($testimonial_page->youtube_url) ?>">
                                                                <i class="fab fab fa-youtube"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; endif; endif; endforeach; endif; ?>
                        </div>
                       
                       <?php 
                            $link = get_theme_mod('spark_multipurpose_testimonial_review_link');
                            if( !empty( $link ) ): 
                        ?>
                            <div class="total_review">
                                <a href="<?php echo esc_url($link); ?>"><?php echo esc_html__('TOTAL USER REVIEWS', 'spark-multipurpose');?> <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        <?php endif; ?>
                        
                        <?php 
                            $testimonial_cover = get_theme_mod('spark_multipurpose_testimonial_cover_image');
                            if( !empty ( $testimonial_cover ) ): 
                        ?>
                            <div class="avtar_faces">
                                <img src="<?php echo esc_url( $testimonial_cover ); ?>" alt="image">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php spark_multipurpose_add_bottom_seperator('testimonial'); ?>
        </section>
    <?php } }
endif;
add_action('spark_multipurpose_action_testimonial', 'spark_multipurpose_testimonial', 70);


do_action('spark_multipurpose_action_testimonial');
?>
<style>

/**
 * Testimonial
*/
#testimonial_slider[data-col="1"] {
    max-width: 650px;
    margin: 0 auto;
}

.testimonial-block .testimonial_slide_box,
.testimonial-section .total_review {
    text-align: center;
}

.testimonial-block .rating {
    margin-bottom: 20px;
}

.testimonial-block .rating i {
    color: var(--yellow-color);
    font-size: 20px;
}

.testimonial-block .review p {
    font-size: 22px;
    line-height: 1.6;
}

.testimonial-block .testimonial_slide_box .testimonial_img img {
    margin: 0 auto;
    border-radius: 100%;
    height: 150px;
    width: 150px;
    object-fit: cover;
}

.testimonial-block .testimonial_slide_box h3 {
    font-size: 20px;
    margin-bottom: 0;
    margin-top: 15px;
    color: inherit;
}

.testimonial-block .social-icon li {
    display: inline;
    margin-right: 6px;
}

.testimonial_author_text ul {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0;
    margin-top: 20px;
    justify-content: center;
    list-style: none;
    flex-wrap: wrap;
}

.testimonial_author_text ul li i {
    /* margin: 0 6px; */
    color: var(--white-color);
    border-radius: 50%;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
    font-size: 16px;
    background: rgb(0 0 0 / 20%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.testimonial_author_text ul li a i.fa-facebook,
.testimonial_author_text ul li a i.fa-facebook-f,
.testimonial_author_text ul li a i.fa-facebook-messenger {
    background: #3b5998;
}

.testimonial_author_text ul li a i.fa-twitter {
    background: #1da1f2;
}

.testimonial_author_text ul li a i.fa-google-plus-g {
    background: #db4c3f;
}

.testimonial_author_text ul li a i.fa-linkedin {
    background: #1178b3;
}

.testimonial_author_text ul li a i.fa-youtube {
    background: #d20014;
}

.testimonial_author_text ul li a i.fa-pinterest {
    background: #d20014;
}

.testimonial_author_text ul li a i.fa-instagram {
    background: #bc2a8d;
}

.testimonial_author_text ul li a i:hover {
    background: var(--theme-color);
    color: var(--white-color);
    border-color: var(--theme-color);
}

/* *
 * Testimonial Layout Two
*/
.style2 .testimonial_author {
    display: flex;
    justify-content: center;
    align-items: center;
}

.style2 .testimonial_author .testimonial_img {
    margin-right: 20px;
}

.style2 .testimonial_author .testimonial_img img {
    margin: 0 auto;
    width: 80px;
    height: 80px;
}

.style2 .testimonial_author_text {
    text-align: left;
}


.testimonial-section .total_review a {
    color: var(--theme-color);
    font-weight: 700;
    font-style: italic;
}

.testimonial-section .avtar_faces {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: -1;
    width: 100%;
}

.testimonial-section .avtar_faces img {
    max-width: 100%;
}

.testimonial-block .item {
    background: #fff;
    padding: 15px;
    border-radius: 5px;
}

.testimonial-block.style4 .item {
    background: transparent;
    padding-left: 50px;
    padding-top: 30px;
    padding-bottom: 30px;
}

.testimonial-block:not(.owl-carousel) {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 1em;
}

.testimonial-block[data-col="2"] {
    grid-template-columns: repeat(2, 1fr);
}

.testimonial-block[data-col="3"] {
    grid-template-columns: repeat(3, 1fr);
}

.testimonial-block[data-col="4"] {
    grid-template-columns: repeat(4, 1fr);
}

.testimonial-block.style3 .testimonial_slide_box {
    text-align: left;
}

.testimonial-block.style3 .testimonial_slide_box p {
    font-size: 17px;
}

.testimonial-block.style3 .testimonial_author {
    display: flex;
    gap: 1em;
    align-items: center;
}

.testimonial-block.style3 .testimonial_slide_box .testimonial_img img {
    width: 50px;
    height: 50px;
}

.testimonial-block.style3 .testimonial_slide_box h3 {
    margin-top: 0;
}

.testimonial-block.style3 .testimonial_author_text ul {
    margin: 5px 0;
    justify-content: flex-start;
}

.testimonial-block.style3 .testimonial_author_text ul li i {
    width: 20px;
    height: 20px;
    line-height: 1;
    font-size: 10px;
    margin: 0;
    padding: 0;
}

.testimonial_slide_box {
    position: relative;
}

.testimonial-block.style3 .testimonial_slide_box:before {
    content: "\f10e";
    font-family: var(--icon-font);
    position: absolute;
    right: 00px;
    bottom: 0px;
    font-size: 4rem;
    font-weight: 600;
    line-height: 1;
    color: var(--light-color);
}

.testimonial-section.style4 .inner-section-wrap {
    display: flex;
    align-items: center;
    gap: 2em;
}

.testimonial-section.style4 .title-wrapper {
    width: 40%;
}

#testimonial_slider[data-col="1"].style4 {
    max-width: calc(100% - 44%);
    flex: 1;
}

.testimonial-section.style4 .item:before {
    content: '';
    width: 39%;
    height: 100%;
    position: absolute;
    background: var(--theme-color);
    left: 0;
    top: 0;
    z-index: 0;
    display: block;
    transition: .5s;
    border-radius: 5px 0 0 5px;
}

</style>