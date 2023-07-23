<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 *  Our Team Member Section
*/
if (! function_exists( 'spark_multipurpose_team' ) ):

    function spark_multipurpose_team(){

        $team_options = get_theme_mod('spark_multipurpose_team_section_disable','disable');

        if( !empty( $team_options ) && $team_options == 'enable' ){

            $team_layout    = get_theme_mod('spark_multipurpose_team_style', 'style1');
            $team_page      = get_theme_mod('spark_multipurpose_team');
            $team_col = get_theme_mod( 'spark_multipurpose_team_col', 3 );
            $type = get_theme_mod('spark_multipurpose_team_bg_type');

            $bg_video           = get_theme_mod("spark_multipurpose_team_bg_video", '1IaZy0sDLu0');

            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
        ?>
        <section id="team-section" class="team-section section alignfull <?php echo esc_attr( $team_layout ); ?>" <?php echo $video_data; ?>>
            <?php spark_multipurpose_add_top_seperator('team'); ?>
            <div class="section-wrap">
                <div class="container">
                    <div class="inner-section-wrap">
                        <?php 
                            /**
                             * Section Title
                            */
                            $supertitle = get_theme_mod( 'spark_multipurpose_team_super_title' );
                            $title 		= get_theme_mod( 'spark_multipurpose_team_title' );
                            $titlestyle = get_theme_mod( 'spark_multipurpose_team_title_align','text-center' );
                            spark_multipurpose_section_title( $supertitle, $title, $titlestyle ); 

                        ?>
                        <div class="d-grid d-grid-column-<?php echo esc_attr($team_col); ?> team-wrapper">
                            <?php
                                $teamimg = get_theme_mod('spark_multipurpose_team_item_image','enable');
                                $team_page = get_theme_mod('spark_multipurpose_team');

                                if (!empty( $team_page ) ):
                                $team_pages = json_decode($team_page);
                                foreach ($team_pages as $team_page):
                                    $page_id = $team_page->team_page;
                                    if (!empty( $page_id )):
                                    $team_query = new WP_Query('page_id=' . $page_id);
                                    if ($team_query->have_posts()): while ($team_query->have_posts()): $team_query->the_post();
                            ?>
                                <div class="team-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                                    <div class="box box-shadow <?php echo esc_attr( $teamimg.'no' ); ?>">
                                        <?php if( !empty( $teamimg ) && $teamimg == 'enable' ){ ?>
                                            <figure>
                                                <?php
                                                    if( !empty( $team_layout ) && $team_layout == 'layout_two') {
                                                        the_post_thumbnail('thumbnail');
                                                    } else {
                                                        the_post_thumbnail('medium_large');
                                                    }
                                                ?>
                                            </figure>
                                        <?php } ?>
                                        <div class="team-wrap <?php echo esc_attr($team_page->alignment); ?>">
                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php if (!empty( $team_page->designation ) ): ?>
                                                <span class="designation"><?php echo esc_html($team_page->designation); ?></span>
                                            <?php endif; ?>
                                            <?php the_excerpt(); ?>
                                            <ul class="sp_socialicon">
                                                <?php if (!empty( $team_page->facebook ) ) : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url( $team_page->facebook ); ?>">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; if (!empty( $team_page->twitter ) ) : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($team_page->twitter); ?>">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; if (!empty( $team_page->linkedin ) ) : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($team_page->linkedin); ?>">
                                                            <i class="fab fa-linkedin-in"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; if (!empty( $team_page->instagram ) ) : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($team_page->instagram); ?>">
                                                            <i class="fab fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; endif; endif; endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php spark_multipurpose_add_bottom_seperator('team'); ?>
        </section>
    <?php } }
endif;
add_action('spark_multipurpose_action_team', 'spark_multipurpose_team', 75);
/**
 * Hook -  spark_multipurpose_action_team
 *
 * @hooked spark_multipurpose_team - 75
 */
do_action('spark_multipurpose_action_team');
?>

<style>

/*--------------------------------------------------------------
 ## Our Team Member Section
--------------------------------------------------------------*/
.team-section .team-item {
    display: grid;
}

.team-section .box {
    text-align: center;
    background: var(--white-color);
    position: relative;
}

.team-section.style1 .box figure img {
    object-fit: cover;
}

.team-section.style1 .box .team-wrap {
    padding: 20px 20px 30px;
}

.team-section .team-wrap h3 {
    margin-bottom: 0;
    font-size: 25px;
}

.team-section .team-wrap span {
    display: block;
    color: var(--theme-color);
    margin: 0 0 10px;
    font-weight: 600;
}

/**
 * Team Layout Two
*/
.team-section.style2 .box figure {
    float: left;
    width: 50%;
}

.team-section .box figure {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.team-section .box figure img {
    transition: all ease 0.6s;
    -webkit-transition: all ease 0.6s;
    -ms-transition: all ease 0.6s;
}

.team-section .box figure img:hover {
    transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
}

.team-section.style2 .box.no .team-wrap {
    width: 100%;
}

.team-section.style2 .box .team-wrap {
    float: right;
    width: 50%;
    padding: 20px;
}

.team-section.style2 .box {
    border-radius: 8px;
    box-shadow: 0 2px 25px 0 var(--box-shadow);
    display: flex;
}

.team-section.style2 .box figure img {
    width: 100%;
    height: 100%;
    border-radius: 6px 0 0 6px;
    object-fit: cover;
}

.team-section.style2 .box figure img:hover {
    border-radius: 6px 0 0 6px;
}

.team-section.style2 .box:hover {
    transition: 0.3s;
}

/**
 * Team Member Social Icon
*/
.team-section ul.sp_socialicon {
    padding: 0;
    margin: 0;
    list-style-type: none;
}

.team-section.layout_one ul.sp_socialicon {
    margin-top: 15px;
}

.team-section ul.sp_socialicon li {
    display: inline-block;
}

.team-section ul.sp_socialicon li:last-child {
    margin: 0;
}

.team-section ul.sp_socialicon li a i {
    display: block;
    width: 35px;
    height: 35px;
    text-align: center;
    line-height: 35px;
    border-radius: 50%;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    color: var(--white-color);
    background: var(--theme-color);
}

.team-section ul.sp_socialicon li a i.fa-facebook-f {
    background: #3b5998;
}

.team-section ul.sp_socialicon li a i.fa-twitter {
    background: #1da1f2;
}

.team-section ul.sp_socialicon li a i.fa-google {
    background: #db4c3f;
}

.team-section ul.sp_socialicon li a i.fa-linkedin-in {
    background: #1178b3;
}

.team-sectionul.sp_socialicon li a i.fa-youtube {
    background: #d20014;
}

.team-section ul.sp_socialicon li a i:hover {
    background: var(--theme-color);
    color: var(--white-color);
    border-color: var(--theme-color)
}

/** team member layout 3 (tab) */
.team-tab-layout {
    display: flex;
}

.team-thumb-details {
    width: 61%;
    padding: 26px;
    border-radius: 6px;
    position: relative;
    overflow: hidden;
}

.team-tab-layout .team-thumb {
    flex: 1;
}

.team-tab-layout.tab-content .tab-pane {
    display: none;
}

.team-tab-layout.tab-content .tab-pane.active {
    display: block;
}

.team-thumb-details .inner {
    display: flex;
    align-items: center;
    position: relative;
    gap: 30px;
}

.team-thumb-details .rbt-team-thumbnail {
    flex-basis: 44%;
}

.team-thumb-details .rbt-team-thumbnail .thumb img {
    border-radius: 6px;
    height: auto;
    object-fit: cover;
    width: 100%;
}

.team-thumb-details .rbt-team-details {
    flex-basis: 56%;
}

.team-thumb-details .author-info {
    margin-bottom: 20px;
}

.team-thumb-details .text-left .testimonial_author_text ul {
    justify-content: flex-start;
}

.team-thumb-details .text-right .testimonial_author_text ul {
    justify-content: flex-end;
}

.top-circle-shape {
    position: absolute;
    width: 240px;
    top: -96px;
    height: 240px;
    right: -96px;
    margin: 0 auto;
    background-image: linear-gradient(90deg, #CFA2E8, #637FEA);
    opacity: 0.09;
    border-radius: 100%;
    box-sizing: border-box;
}

.top-circle-shape::before {
    position: absolute;
    content: "";
    background: #fff;
    border-radius: 100%;
    width: calc(100% - 60px);
    height: calc(100% - 60px);
    left: 30px;
    top: 30px;
}

.rbt-team-tab-thumb li a.active .thumb::before {
    opacity: 1;
    margin: 0;
}

.rbt-information-list a {
    display: flex;
}

.rbt-team-tab-thumb {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
    margin: 0px auto;
    margin-bottom: -30px;
    outline: none;
    border: 0 none;
}

.rbt-team-tab-thumb li {
    padding-left: 5px;
    padding-right: 5px;
    flex-basis: 33.33%;
    margin-bottom: 10px;
    outline: none;
    cursor: pointer;
    margin-top: 0;
}

.rbt-team-tab-thumb li a {
    display: block;
}

.rbt-team-tab-thumb li .rbt-team-thumbnail {
    padding: 10px;
    background: var(--white-color);
    box-shadow: 0 15px 34px 0 rgba(175, 181, 204, 0.32);
    border-radius: 6px;
}

.rbt-team-tab-thumb li .rbt-team-thumbnail .thumb {
    position: relative;
    display: inline-block;
    width: 100%;
    cursor: pointer;
}

.rbt-team-tab-thumb li .rbt-team-thumbnail .thumb::before {
    content: "\f340";
    position: absolute;
    font-family: 'dashicons';
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 18px;
    z-index: 2;
    font-size: 28px;
    opacity: 0;
    font-weight: 900;
    margin-left: 15px;
}

.rbt-team-tab-thumb li .rbt-team-thumbnail .thumb img {
    border-radius: 6px;
    width: auto;
    object-fit: cover;
    height: 206px;
    max-width: 100%;
}

.rbt-team-tab-thumb li .rbt-team-thumbnail .thumb::after {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    background: linear-gradient(218.15deg, var(--theme-color) 0%, #b966e7 100%);
    width: 100%;
    height: 100%;
    z-index: 1;
    cursor: pointer;
    border-radius: 6px;
    opacity: 0;
}

.rbt-team-tab-thumb li a.active .thumb::after {
    opacity: 0.5;
}

.theme-color {
    color: var(--theme-color);
}

.rbt-team-details span.designation {
    display: block;
}

.rbt-team-details span.team-form {
    font-style: italic;
}
</style>