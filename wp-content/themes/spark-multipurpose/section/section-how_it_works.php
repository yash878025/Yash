<?php
if( !function_exists('spark_multipurpose_how_it_works_default_content')){
    function spark_multipurpose_how_it_works_default_content($steps){
        $style = get_theme_mod('spark_multipurpose_how_it_works_style', 'style1');
        foreach($steps as $index => $step): 
            if( $step->block_page == '' ) continue;
            ?>
            <li data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <div class="step_text">
                     <div class='step-content'>
                        <h4><a href="<?php echo esc_url(get_the_permalink($step->block_page)); ?>"><?php echo esc_html( get_the_title( $step->block_page ) ); ?></a></h4>
                        <p><?php echo esc_html(get_the_excerpt( $step->block_page )); ?></p>
                        <a href="<?php echo esc_url(get_the_permalink($step->block_page)); ?>" class="btn btn-noborder">
                            <?php echo esc_html( 'Read More','spark-multipurpose' ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>

                    <?php if(isset($step->block_icon) && $step->block_icon && $style == 'style1'): ?>
                    <div class="step-icon">
                        <i class="<?php echo esc_attr($step->block_icon); ?>"></i>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="step_number">
                    <?php if($style == 'style2' && $step->block_icon): ?>
                        <div class="step-icon">
                            <i class="<?php echo esc_attr($step->block_icon); ?>"></i>
                        </div>
                    
                    <?php endif; ?>
                    <?php if($style == 'style1'): ?>
                    <h2>
                        <?php 
                            $value = str_pad(++$index,2,"0",STR_PAD_LEFT);
                            echo esc_html($value);
                        ?>
                    </h2>
                    <?php endif; ?>
                </div>
                
                <div class="step_img">
                    <?php
                        $img = get_the_post_thumbnail_url($step->block_page, 'medium_large');
                        if( $img ) {
                            echo '<img src="'. esc_url($img ). '" alt="'. get_the_title($step->block_page) .'"/>';
                        } 
                    ?>
                </div>
            </li>
            <?php endforeach; ?>
        <?php
    }   
}

/*****
 * Advance How It Works
 */
if( !function_exists('spark_multipurpose_how_it_works_advance_content')){
    function spark_multipurpose_how_it_works_advance_content($steps){
        $style = get_theme_mod('spark_multipurpose_how_it_works_style', 'style1');
        foreach($steps as $index => $step): 
            if( $step->block_title == '' ) continue;
            ?>
            <li data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <div class="step_text">
                    <div class='step-content'>
                        <h4><a href="<?php echo esc_url( $step->button_url ); ?>"><?php echo esc_html( $step->block_title ); ?></a></h4>
                        <p><?php echo esc_html( $step->block_desc ); ?></p>
                        <?php if( !empty( $step->button_text ) ){ ?>
                            <a href="<?php echo esc_url( $step->button_url ); ?>" class="btn btn-noborder">
                                <?php echo esc_html( $step->button_text ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        <?php } ?>
                    </div>

                    <?php if($step->block_icon && $style == 'style1'): ?>
                    <div class="step-icon">
                        <i class="<?php echo esc_attr($step->block_icon); ?>"></i>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="step_number">
                    <?php if($style == 'style2' && $step->block_icon): ?>
                        <div class="step-icon">
                            <i class="<?php echo esc_attr($step->block_icon); ?>"></i>
                        </div>
                    
                    <?php endif; ?>
                    <?php if($style == 'style1'): ?>
                    <h2>
                        <?php 
                            $value = str_pad(++$index,2,"0",STR_PAD_LEFT);
                            echo esc_html($value);
                        ?>
                    </h2>
                    <?php endif; ?>
                </div>
                <div class="step_img">
                    <?php
                        $img = wp_get_attachment_image_url( attachment_url_to_postid( $step->block_image ), 'medium_large' );
                        if( $img ) {
                            echo '<img src="'. esc_url($img ). '" alt="'. get_the_title() .'"/>';       
                        } 
                    ?>
                </div>
            </li>
            <?php endforeach; ?>
        <?php
    }   
}

if (! function_exists( 'spark_multipurpose_how_it_works_area' ) ):
    function spark_multipurpose_how_it_works_area() {
        $section = get_theme_mod('spark_multipurpose_how_it_works_section_disable','disable');
        if( !empty( $section ) && $section != 'enable' )return;
        ?>
        <section id="how_it_works-section" class="alignfull how_it_works how_it_works-section section">
            <?php 
                /**
                 * Section Title
                */
                $supertitle = get_theme_mod( 'spark_multipurpose_how_it_works_super_title');
                $title 		= get_theme_mod( 'spark_multipurpose_how_it_works_title');
                $titlestyle = get_theme_mod( 'spark_multipurpose_how_it_works_title_align','text-center');
                
                $howitworks_type = get_theme_mod('spark_multipurpose_how_it_works_type','default');
                if( $howitworks_type == 'default' ){
                    $steps = get_theme_mod('spark_multipurpose_how_it_works_page');
                }elseif( $howitworks_type == 'advance' ){
                    $steps = get_theme_mod('spark_multipurpose_how_it_works_advance_settings');
                }else{
                    $steps = get_theme_mod('spark_multipurpose_how_it_works_page');
                }

                if( $steps ){
                    $steps = json_decode($steps);
                }
                if( $steps): ?>
                    <?php spark_multipurpose_add_top_seperator('how_it_works'); ?>
                    <div class="section-wrap">
                        <div class="container">
                            <div class="inner-section-wrap">
                                <?php spark_multipurpose_section_title( $supertitle, $title, $titlestyle );  ?>
                                <div class="step_block">
                                    <ul>
                                        <?php 
                                            if( $howitworks_type == 'default' ){
                                                spark_multipurpose_how_it_works_default_content( $steps ); 
                                            }elseif( $howitworks_type == 'advance' ){
                                                spark_multipurpose_how_it_works_advance_content( $steps ); 
                                            }else{
                                                spark_multipurpose_how_it_works_default_content( $steps );
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php spark_multipurpose_add_bottom_seperator('how_it_works'); ?>
                <?php endif; ?>
        </section>
        <?php
    }
endif;
add_action('spark_multipurpose_how_it_works', 'spark_multipurpose_how_it_works_area', 55);
do_action('spark_multipurpose_how_it_works');
?>

<style>

/***
  * How It Works Section 
*/
.how_it_works .step_block ul {
    padding: 0;
}

.how_it_works .step_block ul li {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    margin-bottom: 30px;
}

.how_it_works .step_block ul li:last-child {
    margin-bottom: 0;
}

.how_it_works .step_block ul li::before {
    content: "";
    position: absolute;
    left: 50%;
    top: 50px;
    transform: translateX(-50%);
    width: 6px;
    height: calc(100% + 100px);
    background-color: var(--theme-color);
}

.how_it_works .step_block ul li:first-child::after {
    content: "";
    position: absolute;
    left: 50%;
    top: -5px;
    transform: translateX(-50%);
    width: 15px;
    height: 15px;
    background-color: var(--theme-color);
    border-radius: 15px;
}

.how_it_works .step_block ul li:first-child::before {
    top: 0;
}

.how_it_works .step_block ul li:last-child::before {
    height: 50%;
    top: 0;
}

.how_it_works .step_block ul li .step_text,
.how_it_works .step_block ul li .step_img {
    width: 40%;
    text-align: right;
    position: relative;
}

.how_it_works .step_block ul li .step_text {
    padding: 20px;
    background: var(--white-color);
    box-shadow: 0 2px 25px 0 var(--box-shadow);
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 1em;
}

.how_it_works .step_block ul li .step_text p {
    margin: 10px 0;
}

.how_it_works .step_text:before {
    content: '';
    position: absolute;
    border-style: solid;
    border-color: #ff090900;
    top: 40%;
    border-width: 17px;
    right: -33px;
    border-left-color: var(--white-color);
}

.how_it_works .step_block ul li:nth-child(2n) .step_text:before {
    transform: rotate(180deg);
    left: -33px;
    right: unset;
}

.how_it_works .step_block ul li:nth-child(2n) .step_text {
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.how_it_works .step_block ul li .step_img {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
}

.how_it_works .step_block ul li .step_img img {
    transition: all ease 0.6s;
    -webkit-transition: all ease 0.6s;
    -ms-transition: all ease 0.6s;
}

.how_it_works .step_block ul li .step_img img:hover {
    transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
}

.how_it_works .step_block ul li:nth-child(2n) {
    flex-direction: row-reverse;
}

.how_it_works .step_block ul li:nth-child(2n) .step_text,
.how_it_works .step_block ul li:nth-child(2n) .step_img {
    text-align: left;
}

/* how it works numbers */
.how_it_works .step_block ul li .step_number {
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    border-radius: 100%;
    background: var(--white-color);
    border: 5px solid rgba(var(--theme-rgb-color), 62%);
    box-shadow: 0 0px 8px rgba(var(--theme-rgb-color), 46%), 0 0 #eee inset, 0 0 #eee inset;
}

.how_it_works .step_number h2 {
    font-size: 28px;
    color: var(--theme-color);
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 5px solid rgba(var(--theme-rgb-color), 72%);
    border-radius: 100%;
    margin: 0;
    box-shadow: 0 2px 15px rgba(var(--theme-rgb-color), 50%), 1px 0 rgba(var(--theme-rgb-color), 50%) inset, -1px 0 rgba(var(--theme-rgb-color), 50%) inset;
}

.how_it_works .step-icon {
    font-size: 49px;
}
@media screen and (max-width: 480px) {

    .how_it_works .step_block ul li,
    .how_it_works .step_block ul li:nth-child(2n) {
        flex-direction: column;
        padding-left: 30px;
        margin-bottom: 20px;
    }

    .how_it_works .step_block ul li:last-child {
        margin-bottom: 0;
    }

    .how_it_works .step_block ul li::before {
        left: 8px;
        transform: none;
    }

    .how_it_works .step_block ul li:first-child::after {
        left: -5px;
        transform: none;
        display: none;
    }

    .how_it_works .step_block ul li .step_text,
    .how_it_works .step_block ul li .step_img,
    .how_it_works .step_block ul li:nth-child(2) .step_text,
    .how_it_works .step_block ul li:nth-child(2) .step_img {
        text-align: center;
    }

    .how_it_works .step_block ul li .step_text,
    .how_it_works .step_block ul li .step_img {
        width: 100%;
    }

    .how_it_works .step_text:before {
        transform: rotate(180deg);
        left: -33px;
        right: unset;
    }

    .how_it_works .step_block ul li .step_number {
        position: absolute;
        top: -5px;
        left: -15px;
        width: 50px;
        height: 50px;
    }

    .how_it_works .step_block ul li:last-child::before {
        opacity: 0;
    }

    .how_it_works .step_block ul li .step_number h2 {
        font-size: 15px;
        margin-bottom: 0;
        margin-top: -2px;
        border: none;
        box-shadow: none;
    }
}
</style>