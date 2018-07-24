<?php
/**
 * 404 page
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */

global $onemax_options;
get_header();
?>
<div id="container">
    <div class="page404">
        <div class="title">
            <h2><?php echo empty($onemax_options['title'])?esc_html__('Page Not Found','onemax'):esc_html($onemax_options['title']); ?></h2>
        </div>
        <div class="subtitle">
            <h1><?php echo empty($onemax_options['sub-title'])?esc_html__('404','onemax'):esc_html($onemax_options['sub-title']); ?></h1>
        </div>
        <div class="content">
            <h5><?php echo empty($onemax_options['content-text'])?esc_html__('The page you requested could not be found, either contact your webmaster or try again. Use your browsers Back button to navigate to the page you have prevously come from','onemax'):esc_html($onemax_options['content-text']); ?></h5>
        </div>
    </div>
</div>

<?php 
get_footer();
?>