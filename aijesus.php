<?php
/**
 * Plugin Name:       Artificial Intelligence Jesus
 * Description:       Create a list of users who have clicked something or come to a page
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1
 * Author:            JohnDeeBDD
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       aijesus

 */

//namespace AIJesus;

//die("fcfs-block");

require_once (plugin_dir_path(__FILE__). 'src/AIJesus/autoloader.php');


function my_login_logo() { 

echo( '
<style type="text/css">
#login h1 a, .login h1 a {
background-image: url(https://aijes.us/wp-content/uploads/pantocrator2.jpg);
height:320px;
width:320px;
background-size: 320px 320px;
background-repeat: no-repeat;
padding-bottom: 30px;
}
</style>
');

}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function w4dev_login_headerurl() {
    return home_url( '/' );
}
add_filter( 'login_headerurl', 'w4dev_login_headerurl');


function w4dev_login_url( $force_reauth, $redirect ) {
    $login_url = 'jim';

    if ( ! empty( $redirect ) ) {
        $login_url = add_query_arg( 'redirect_to', urlencode( $redirect ), $login_url );
    }

    if ( $force_reauth ) {
        $login_url = add_query_arg( 'reauth', '1', $login_url ) ;
    }

    return $login_url ;
}
add_filter( 'login_url', 'w4dev_login_url', 10, 2 );