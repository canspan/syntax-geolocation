function geoIpRedirect() : void
{
 $redirectCookieName = 'sytx_geo_redirect';
 try {
 // Exit if its not the homepage or
 // the redirect already happened or
 // NGINX didnt provide the environment variable
 if (isset($_COOKIE[$redirectCookieName]) ||
 is_front_page() === false ||
 empty($country = strtoupper(trim(getenv('HTTP_GEOIP_COUNTRY_CODE'))))) {
 return;
 }

 // Set the cookie!
 setcookie($redirectCookieName, time(), 0);

 switch (true) {
 // Redirect for German site
 case in_array($country, [
 'AT', 'BE', 'BG', 'HR',
 'CY', 'CZ', 'DK', 'EE',
 'FI', 'FR', 'DE', 'GR',
 'HU', 'IE', 'IT', 'LV',
 'LT', 'LU', 'MT', 'NL',
 'PL', 'PT', 'RO', 'SK',
 'SI', 'ES', 'SE',
 ]) : {
 header(sprintf(... [
 'Location: %s/de-de',
 site_url()
 ]));
 die;
 }
 }
 } catch (\Throwable $exception) {
 // Silence is golden
 }
}
