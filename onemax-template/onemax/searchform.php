<?php
/**
 * The main template file.
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
?>
<div class="search-box">
    <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" >
        <input type="text" name="s" placeholder="<?php esc_html_e('Search the support form...','onemax');?>"id="s" />
        <input type="submit" id="searchsubmit" value="<?php esc_html_e('search','onemax')?>" />
    </form>
</div>
