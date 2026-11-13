<?php

error_reporting(E_ALL);
set_error_handler(function ($severity, $message) {
    throw new RuntimeException($message);
});

define('boniPS_VERSION', 'test');
define('BONIPS_DEFAULT_TYPE_KEY', 'bonips_default');
define('BONIPS_DEFAULT_LABEL', 'Points');
define('BONIPS_SLUG', 'bonips');
define('BONIPS_MARKET_VERSION', 'test');
define('BONIPS_MARKETPRESS', __FILE__);
define('boniPS_THIS', __FILE__);
define('EM_VERSION', 'test');

function check($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function __($text, $domain)
{
    return $text;
}

function add_action($hook, $callback, $priority = 10, $accepted_args = 1)
{
}

function add_filter($hook, $callback, $priority = 10, $accepted_args = 1)
{
}

function apply_filters($hook, $value)
{
    return $value;
}

function bonips_label($strip = false)
{
    return 'Points';
}

function bonips_get_types()
{
    return array(BONIPS_DEFAULT_TYPE_KEY => 'Points');
}

function bonips_point_type_exists($type)
{
    return isset(bonips_get_types()[$type]);
}

function get_woocommerce_currency()
{
    return 'EUR';
}

function get_current_user_id()
{
    return 7;
}

function is_user_logged_in()
{
    return true;
}

function shortcode_atts($defaults, $values)
{
    return array_merge($defaults, array_intersect_key($values, $defaults));
}

function get_option($key)
{
    return array();
}

function plugins_url($path, $file)
{
    return $path;
}

function mp_register_gateway_plugin($class, $id, $label)
{
}

function bonips_apply_defaults($defaults, $settings)
{
    return array_replace_recursive($defaults, $settings);
}

class Test_Gateway_Settings
{
    public function number($value)
    {
        return (float) $value;
    }

    public function exclude_user($user_id)
    {
        return false;
    }

    public function get_users_balance($user_id, $type)
    {
        return 100;
    }

    public function plural()
    {
        return 'Points';
    }

    public function template_tags_general($text)
    {
        return $text;
    }

    public function available_template_tags($tags, $custom = '')
    {
        return $custom;
    }
}

function bonips($type)
{
    return new Test_Gateway_Settings();
}

class WC_Payment_Gateway
{
    public $id;
    public $icon;
    public $has_fields;
    public $method_title;
    public $method_description;
    public $supports;
    public $title;
    public $description;
    public $form_fields;

    public function init_settings()
    {
    }

    public function get_option($key)
    {
        if ($key === 'exchange_rate') {
            return 2;
        }

        return isset($this->form_fields[$key]['default']) ? $this->form_fields[$key]['default'] : '';
    }
}

class MP_Gateway_API
{
    public function get_setting($key, $default = false)
    {
        return $default;
    }
}

class EM_Gateway
{
    public function __construct()
    {
    }

    public function is_active()
    {
        return false;
    }
}

class wpsc_merchant
{
    public $cart_data = array('total_price' => 5);
    public $cart_items = array();

    public function __construct($purchase_id, $is_receiving)
    {
    }
}

require_once __DIR__ . '/../addons/gateway/carts/bonips-woocommerce.php';
require_once __DIR__ . '/../addons/gateway/carts/bonips-marketpress.php';
require_once __DIR__ . '/../addons/marketpress/classes/class.boniPS-MarketPress-Gateway.php';
require_once __DIR__ . '/../addons/gateway/event-booking/bonips-eventsmanager-pro.php';
require_once __DIR__ . '/../addons/gateway/event-booking/bonips-eventsmanager.php';
require_once __DIR__ . '/../addons/gateway/carts/bonips-wpecommerce.php';

bonips_init_woo_gateway();
$woo = new WC_Gateway_boniPS();
check($woo->exchange_rate === 2.0 && $woo->bonips_type === BONIPS_DEFAULT_TYPE_KEY, 'WooCommerce must initialize point settings');
check($woo->log_template_refund !== '' && $woo->profit_sharing_percent === 0, 'WooCommerce refund and sharing settings must remain available');

bonips_init_psecommerce_gateway();
foreach (array('MP_Gateway_boniPS', 'MP_Gateway_boniPS_MarketPress') as $class) {
    $gateway = new $class();
    $gateway->on_creation();
    check($gateway->bonips instanceof Test_Gateway_Settings, $class . ' must initialize point settings');
}

$events = new EM_Gateway_boniPS();
check($events->prefs['type'] === BONIPS_DEFAULT_TYPE_KEY && $events->core instanceof Test_Gateway_Settings, 'Booking gateway must initialize point settings');
$event = new class() {
    public function is_free()
    {
        return false;
    }
};
$columns = $events->ticket_columns(array('type' => 'Type', 'price' => 'Price', 'spaces' => 'Spaces'), $event);
check($events->booking_cols === count($columns), 'Booking gateway must track its ticket columns');

$regularEvents = new class() extends boniPS_Events_Manager_Gateway {
    public function __construct()
    {
    }

    public function can_pay($EM_Booking)
    {
        return false;
    }
};
check($regularEvents->add_pay_button('Cancel', new stdClass()) === 'Cancel', 'Booking actions must remain unchanged when point payment is unavailable');

bonips_init_wpecom_construct_gateway();
$merchant = new wpsc_merchant_bonips(42, false, $bonips_wpecom_settings, bonips(BONIPS_DEFAULT_TYPE_KEY));
$merchant->validate(new stdClass());
check($merchant->user_id === 7 && $merchant->cost === 5.0, 'WP e-Commerce must retain the validated buyer and point cost');

echo "Gateway property tests passed\n";
