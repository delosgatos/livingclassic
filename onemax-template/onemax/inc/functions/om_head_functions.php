<?php

/*
  * OneMaxTheme Functions
  * Author：OneMax creative design
  * Official Site: www.onemax.site
*/


// Head function
function onemax_awesome_remove_version() {
	return '';
}
add_filter('the_generator', 'onemax_awesome_remove_version');