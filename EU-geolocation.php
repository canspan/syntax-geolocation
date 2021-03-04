/*
Plugin Name: John Gamboa's GeoTarget Redirect Example
Description: Redirecting visitor traffic based on geo-location using the WPEngine GeoTarget feature
Version: 1.2
License: GPLv2
*/

function country_geo_redirect() {

$country = getenv('HTTP_GEOIP_COUNTRY_CODE');

if ( $continent == 'EU' ) {

wp_redirect( 'https://www.syntax.com/de-de', 301 );

     exit;

} 

}

add_action('init', 'country_geo_redirect');
