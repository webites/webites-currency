<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && 
((!empty($_POST['usd'])) ||
(!empty($_POST['aud'])) ||
(!empty($_POST['chf'])) ||
(!empty($_POST['gbp'])) ||
(!empty($_POST['jpy'])) ||
(!empty($_POST['btc'])) ||
(!empty($_POST['cad'])) ||
(!empty($_POST['czk'])) ||
(!empty($_POST['dkk'])) ||
(!empty($_POST['huf'])) ||
(!empty($_POST['nzd'])) ||
(!empty($_POST['pln'])) ||
(!empty($_POST['rub'])) ||
(!empty($_POST['uah'])) ||
(!empty($_POST['xag'])) ||
(!empty($_POST['xau']))) )
{

    $usd = $_POST['usd'];
    $aud = $_POST['aud'];
    $chf = $_POST['chf'];
    $gbp = $_POST['gbp'];

    $jpy = $_POST['jpy'];
    $btc = $_POST['btc'];
    $cad = $_POST['cad'];
    $czk = $_POST['czk'];

    $dkk = $_POST['dkk'];
    $huf = $_POST['huf'];
    $nzd = $_POST['nzd'];
    $pln = $_POST['pln'];

    $rub = $_POST['rub'];
    $uah = $_POST['uah'];
    $xag = $_POST['xag'];
    $xau = $_POST['xau'];

    $currencies_values = [
        'usd' => $usd,
        'aud' => $aud,
        'chf' => $chf,
        'gbp' => $gbp,
        'jpy' => $jpy,
        'btc' => $btc,
        'cad' => $cad,
        'czk' => $czk,
        'dkk' => $dkk,
        'huf' => $huf,
        'nzd' => $nzd,
        'pln' => $pln,
        'rub' => $rub,
        'uah' => $uah,
        'xag' => $xag,
        'xau' => $xau
    ];

    update_option( 'wbcp_display_currencies_array', $currencies_values);
}


add_action('admin_menu', 'wbcp_currency_options_create_menu');

function wbcp_currency_options_create_menu() {

    add_menu_page(
        __( 'Currencies', 'webites-currency' ),
        __( 'Currencies', 'webites-currency' ),
        'manage_options',
        'webites-currency/includes/webites-currency-options.php',
        'wbcp_currency_display_webites_currency_options',
        'dashicons-money-alt',
        66
    );
	//call register settings function
	add_action( 'admin_init', 'wbcp_currency_register_webites_currency_settings' );
}





function wbcp_currency_register_webites_currency_settings() {
	//register our settings
	register_setting( 'wbcp_currency_plugin_options', 'wbcp_display_after_content' );
	register_setting( 'wbcp_currency_plugin_options', 'wbcp_display_header_before' );
	register_setting( 'wbcp_currency_plugin_options', 'wbcp_display_text_after' );
    register_setting( 'wbcp_currency_plugin_array', 'wbcp_display_currencies_array' );
}

function wbcp_currency_display_webites_currency_options() {
    $display = get_option('wbcp_display_after_content');
?>

<div class="wrap">
<h1><?php _e('weBites Currency Plugin Options', 'webites-currency'); ?></h1>

<form method="post" action="options.php">
    <?php settings_fields( 'wbcp_currency_plugin_options' ); ?>
    <?php do_settings_sections( 'wbcp_currency_plugin_options' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">
        <?php _e('Display after posts and page content', 'webites-currency'); ?>
        </th>
        <td>
        <input type="checkbox" 
        name="wbcp_display_after_content"  
        <?php if ($display == 'on') { echo "CHECKED"; } ?> />
        </td>
        </tr>
         
        <tr valign="top">
        <th scope="row">
        <?php _e('Header before displayed plugin', 'webites-currency'); ?>
        </th>
        <td>
        <input type="text" 
        name="wbcp_display_header_before" 
        value="<?php echo esc_attr( get_option('wbcp_display_header_before') ); ?>" />
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">
        <?php _e('Text after displayed plugin', 'webites-currency'); ?>
        </th>
        <td>
        <input type="text" 
        name="wbcp_display_text_after" 
        value="<?php echo esc_attr( get_option('wbcp_display_text_after') ); ?>" />
        </td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>

<div>
<h1><?php _e('weBites Currency - Display Currencies via Shortcode', 'webites-currency'); ?></h1>
<p>
<?php 
_e('Use the simple shortcode to display currencies wherever you want: <br> <pre> [webites_currency][/webites_currency]</pre>', 
'webites-currency'); 
?>
</p>
</div>

<?php $currArray = get_option('wbcp_display_currencies_array'); ?>

<!-- currencies table -->
<h1><?php _e('weBites Currency - Display Currencies', 'webites-currency'); ?></h1>

<form method="post" action="">

    <table class="form-table">
        <tr valign="top">
        <th scope="row">
        <?php _e('Check currencies which have to display', 'webites-currency'); ?>
        <BR>
        <i><?php _e('We recommended choose beetween 3 and 7', 'webites-currency'); ?></i>
        </th>
        

        <td>
        <label for="usd">USD</label>
        <input type="checkbox" 
        name="usd"  
        id="usd"
        <?php if ($currArray['usd'] == 'on') { echo "CHECKED"; } ?> />
        </td>


        <td>
        <label for="aud">AUD</label>
        <input type="checkbox" 
        name="aud"  
        id="aud"
        <?php if ($currArray['aud']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        <td>
        <label for="chf">CHF</label>
        <input type="checkbox" 
        name="chf"  
        id="chf"
        <?php if ($currArray['chf']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        <td>
        <label for="gbp">GBP</label>
        <input type="checkbox" 
        name="gbp"  
        id="gbp"
        <?php if ($currArray['gbp']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        <td>
        <label for="jpy">JPY</label>
        <input type="checkbox" 
        name="jpy"  
        id="jpy"
        <?php if ($currArray['jpy']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        <td>
        <label for="btc">BTC</label>
        <input type="checkbox" 
        name="btc"  
        id="btc"
        <?php if ($currArray['btc']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        <td>
        <label for="cad">CAD</label>
        <input type="checkbox" 
        name="cad"  
        id="cad"
        <?php if ($currArray['cad']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        <td>
        <label for="czk">CZK</label>
        <input type="checkbox" 
        name="czk" 
        id="czk" 
        <?php if ($currArray['czk']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        <td>
        <label for="dkk">DKK</label>
        <input type="checkbox" 
        name="dkk" 
        id="dkk" 
        <?php if ($currArray['dkk']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        <td>
        <label for="huf">HUF</label>
        <input type="checkbox" 
        name="huf"  
        id="huf"
        <?php if ($currArray['huf']  == 'on') { echo "CHECKED"; } ?> />
        </td>


        <td>
        <label for="nzd">NZD</label>
        <input type="checkbox" 
        name="nzd"  
        id="nzd"
        <?php if ($currArray['nzd']  == 'on') { echo "CHECKED"; } ?> />
        </td>


        <td>
        <label for="pln">PLN</label>
        <input type="checkbox" 
        name="pln"  
        id="pln"
        <?php if ($currArray['pln']  == 'on') { echo "CHECKED"; } ?> />
        </td>



        <td>
        <label for="rub">RUB</label>
        <input type="checkbox" 
        name="rub"  
        id="rub"
        <?php if ($currArray['rub']  == 'on') { echo "CHECKED"; } ?> />
        </td>


        <td>
        <label for="uah">UAH</label>
        <input type="checkbox" 
        name="uah"  
        id="uah"
        <?php if ($currArray['uah']  == 'on') { echo "CHECKED"; } ?> />
        </td>


        <td>
        <label for="xag">XAG</label>
        <input type="checkbox" 
        name="xag" 
        id="xag" 
        <?php if ($currArray['xag']  == 'on') { echo "CHECKED"; } ?> />
        </td>

        
        <td>
        <label for="xau">XAU</label>
        <input type="checkbox" 
        name="xau" 
        id="xau" 
        <?php if ($currArray['xau']  == 'on') { echo "CHECKED"; } ?> />
        </td>



        </tr>

        </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>