<?php
/*
 * About Us Progress Bar Active Callback Function.
*/
function spark_multipurpose_active_progressbar(){
  
  if (get_theme_mod('spark_multipurpose_aboutus_progressbar','enable') == 'enable') {
    return true;
  }else {
    return false;
  }
}

/*
 * Home Section Enable
*/
function spark_multipurpose_enable_frontpage(){
  if (get_theme_mod('spark_multipurpose_enable_frontpage', 'disable') == 'enable') {
    return true;
  }else {
    return false;
  }
}