<?php

/**
 * Plugin Name: Euro Currency
 * Plugin URI: https://docs.webites.dev/category/dokumentacja/webites-currency/
 * Description: Plugin display current currencies
 * Author: Łukasz Gołabek
 * Author URI: https://webites.pl
 * Version: 1.2.2
 * License: GPLv2
 * Text Domain: webites-currency
 * Domain Path: /languages
 */ 


require_once 'class/WBCP_WebitesCurrency.php';
require_once 'includes/webites-currency-options.php';

add_action( 'init', 'wbcp_currency_load_textdomain' );
  
/**
 * Load plugin textdomain.
 */
function wbcp_currency_load_textdomain() {
  load_plugin_textdomain( 'webites-currency', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
  

function wbcp_currency_add_style()
{
    $dir = plugin_dir_url(__FILE__);
    wp_enqueue_style('currency-style', $dir . 'style/currency-style.css', array());
}

add_action('wp_enqueue_scripts', 'wbcp_currency_add_style', PHP_INT_MAX);


$display = get_option('wbcp_display_after_content');

if ($display == 'on'){
  add_filter( 'the_content', 'wbcp_currency_view_plugin_after_page_and_post');
}

// display plugin

// after posts

function wbcp_currency_view_plugin_after_page_and_post($content) {

  $extra = wbcp_currency_view_plugin();

  return $content . $extra;

}

// shortcode 

add_shortcode( 'webites_currency', 'wbcp_currency_view_plugin' );


function wbcp_currency_view_plugin(){

  $pluginHeader = esc_html(get_option('wbcp_display_header_before'));
  $pluginAfter = esc_html(get_option('wbcp_display_text_after'));
  $currArray = get_option('wbcp_display_currencies_array');
  $countCurrArray = count($currArray);

  $webitesCurrency = new WBCP_WebitesCurrency;

  $webitesCurrency->wb_get_currency();

  if ($pluginHeader){
    $extra .= '<div><h2 class="headerBeforePlugin">' . $pluginHeader . '</h2></div>';
  } 

  $header = __('Exchange rate', 'webites-currency');
  $extra .= '<div class="currencyContainer">
            <div class="mainCurrency">
            <div class="wbcp_currency_header_rate"> 
            ' . $header . '
            </div>
            <div>
            <h3>EUR</h3>
            </div>
            </div>';


    

    foreach($currArray as $currency => $value){

        if ($value == 'on') {
          $data = $webitesCurrency->getField($currency);
          $uppCurrency = strtoupper($currency);

           $extra .= '<div class="currencyItem">
           <div>
           <h6>' 
           . $uppCurrency . 
           '</h6>
           </div> 
           <div>' 
           . round($data, 3) . ' 
           </div>
           </div>';

        }

      }
   $extra .= '</div>';
  if ($pluginAfter){
    $extra .= '<div class="textAfterPlugin">' . $pluginAfter . '</div>';
  } 

  return $extra;

}
