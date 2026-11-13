<?php

error_reporting(E_ALL);
set_error_handler(function ($severity, $message) {
    throw new RuntimeException($message);
});

define('boniPS_VERSION', 'test');
define('BONIPS_DEFAULT_TYPE_KEY', 'bonips_default');
define('BONIPS_ENABLE_LOGGING', true);
define('BONIPS_SLUG', 'bonips');
define('BONIPS_PURCHASE', __FILE__);
define('boniPS_ADDONS_DIR', __DIR__ . '/../addons/');
define('boniPS_INCLUDES_DIR', __DIR__ . '/../includes/');

function absint($value)
{
    return abs((int) $value);
}

function current_time($type, $gmt = false)
{
    return 1234567890;
}

function get_current_user_id()
{
    return 0;
}

function is_user_logged_in()
{
    return true;
}

function wp_verify_nonce($nonce, $action)
{
    return $nonce === 'test';
}

function bonips_get_buycred_sale_setup($type)
{
    return array('min' => 1, 'max' => 10, 'time' => 'none');
}

function bonips()
{
    return isset($GLOBALS['test_settings']) ? $GLOBALS['test_settings'] : (object) array('cred_id' => BONIPS_DEFAULT_TYPE_KEY);
}

function bonips_get_types()
{
    return array(BONIPS_DEFAULT_TYPE_KEY => 'Points');
}

function bonips_get_buycred_settings()
{
    return new stdClass();
}

function shortcode_atts($defaults, $values)
{
    return array_merge($defaults, array_intersect_key($values, $defaults));
}

function add_filter($hook, $callback, $priority = 10, $accepted_args = 1)
{
}

function add_action($hook, $callback, $priority = 10, $accepted_args = 1)
{
}

function add_shortcode($tag, $callback)
{
}

function do_action($hook)
{
}

function is_admin()
{
    return true;
}

function get_bloginfo($key)
{
    return 'test';
}

function plugins_url($path, $file)
{
    return $path;
}

function bonips_get_option($key, $default = false)
{
    return isset($GLOBALS['test_options'][$key]) ? $GLOBALS['test_options'][$key] : $default;
}

function bonips_get_users_badges($user_id, $refresh = false)
{
    $GLOBALS['badge_reads']++;
    return array(42 => 1);
}

function bonips_get_badge($badge_id, $level)
{
    return (object) array('post_id' => $badge_id, 'level_id' => $level);
}

function bonips_get_users_rank($user_id, $type)
{
    $GLOBALS['rank_reads']++;
    return (object) array('post_id' => 7);
}

function bonips_get_user_meta($user_id, $key, $type = '', $single = true)
{
    $GLOBALS['email_reads']++;
    return array('test_notice');
}

class WP_Widget {}

function apply_filters($hook, $value)
{
    return $value;
}

function wp_parse_args($args, $defaults)
{
    return array_merge($defaults, $args);
}

function __($text, $domain)
{
    return $text;
}

function sanitize_key($value)
{
    return strtolower($value);
}

function sanitize_text_field($value)
{
    return trim(strip_tags($value));
}

function is_multisite()
{
    return false;
}

function bonips_override_settings()
{
    return false;
}

function bonips_centralize_log()
{
    return false;
}

function do_action_ref_array($hook, $args)
{
}

function bonips_get_type_color()
{
    return array(BONIPS_DEFAULT_TYPE_KEY => array('positive' => 'green', 'negative' => 'red'));
}

function check($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

require_once __DIR__ . '/../abstracts/bonips-abstract-object.php';
require_once __DIR__ . '/../includes/bonips-object.php';
require_once __DIR__ . '/../addons/buy-creds/abstracts/bonips-abstract-payment-gateway.php';
require_once __DIR__ . '/../addons/buy-creds/gateways/bank-transfer.php';
require_once __DIR__ . '/../abstracts/bonips-abstract-hook.php';
require_once __DIR__ . '/../includes/bonips-functions.php';
require_once __DIR__ . '/../addons/banking/abstracts/bonips-abstract-service.php';
require_once __DIR__ . '/../addons/banking/services/bonips-service-interest.php';
require_once __DIR__ . '/../addons/stats/abstracts/bonips-abstract-stat-widget.php';
require_once __DIR__ . '/../includes/classes/class.query-log.php';

$account = new boniPS_Account(0);
check(!isset($account->badges) && !isset($account->ranks), 'Add-ons must remain unpopulated initially');
$account->badges = array();
$account->badge_ids = array();
$account->ranks = 0;
$account->email_block = array('test_notice');
check(isset($account->badges) && isset($account->ranks), 'Empty add-on results must count as populated');
$account->badges[42] = (object) array('level' => 1);
$account->badge_ids[42] = 1;
check($account->get(array('badge_ids' => 42)) === 1, 'Add-on properties must support the object getter');
$account->set(array('badge_ids' => 42), 2);
check($account->badge_ids[42] === 2, 'Add-on properties must support the object setter');
$account->set(array('ranks'), 3);
check($account->ranks === 3, 'List-style setters must update the declared property');

$balance = new boniPS_Balance(0);
$balance->rank = (object) array('rank_id' => 7);
$account->balance = array(BONIPS_DEFAULT_TYPE_KEY => $balance);
$restored = unserialize(serialize($account));
check($restored->balance[BONIPS_DEFAULT_TYPE_KEY]->rank->rank_id === 7, 'Rank data must survive serialization');
check($restored->email_block === array('test_notice'), 'Email preferences must survive serialization');
unset($account->badges);
check(!isset($account->badges), 'Unsetting add-on data must allow repopulation');
$account->badges = array();

$gateway = new boniPS_Bank_Transfer(array('bank' => array('currency' => 'USD')));
check($gateway->now === 1234567890, 'Gateway initialization must populate the current time');
check($gateway->prefs['currency'] === 'USD', 'Gateway preferences must override defaults');
check($gateway->prefs['exchange'] === array(BONIPS_DEFAULT_TYPE_KEY => 1), 'Gateway defaults must remain available');
check(isset($gateway->documentation), 'Gateway metadata must remain available');
foreach (array(
    'bitpay' => 'boniPS_Bitpay',
    'netbilling' => 'boniPS_NETbilling',
    'paypal-standard' => 'boniPS_PayPal_Standard',
    'skrill' => 'boniPS_Skrill',
    'zombaio' => 'boniPS_Zombaio'
) as $file => $class) {
    require_once __DIR__ . '/../addons/buy-creds/gateways/' . $file . '.php';
    $instance = new $class(array());
    check($instance->prefs === $instance->defaults, $class . ' must initialize its declared defaults');
}

$hook = new class(array('id' => 'test', 'metakey' => '_test')) extends boniPS_Hook {
    public $metakey;
    public $window;

    public function limit_query($ref = '', $user_id = 0, $start = 0, $end = 0, $ref_id = null)
    {
        $this->window = array($start, $end);
        return 1;
    }
};
check($hook->metakey === '_test', 'Hook constructor metadata must remain extensible');
check($hook->is_over_daily_limit('test', 1, 1), 'Reached daily limit must be detected');
check(
    $hook->window === array(strtotime('today midnight', current_time('timestamp')), current_time('timestamp')),
    'Daily limits must use the initialized hook timestamp'
);
check(!$hook->is_over_daily_limit('test', 1, 2), 'An unreached daily limit must allow points');

$service = new boniPS_Banking_Service_Interest(array('interest' => array('min_balance' => 10)));
check($service->prefs['min_balance'] === 10 && isset($service->prefs['rate']), 'Banking preferences must merge with defaults');
check($service->log_reference === 'interest', 'Banking subclasses must populate their metadata');

$settings = new class() extends boniPS_Settings {
    public $addon_settings;

    public function get_log_table()
    {
        return 'test_log';
    }

    public function get_point_type_settings()
    {
        return array_merge($this->defaults(), array('addon_settings' => array('enabled' => true)));
    }
};
check($settings->addon_settings === array('enabled' => true), 'Settings subclasses must populate explicitly declared additional keys');
$settings->badges = array('show_all_bp' => 1);
check($settings->badges['show_all_bp'] === 1, 'Module settings must remain writable through declared properties');

$GLOBALS['test_settings'] = $settings;
require_once __DIR__ . '/../abstracts/bonips-abstract-module.php';
$modules = array(
    'modules/bonips-module-addons.php' => 'boniPS_Addons_Module',
    'modules/bonips-module-hooks.php' => 'boniPS_Hooks_Module',
    'modules/bonips-module-settings.php' => 'boniPS_Settings_Module',
    'modules/bonips-module-log.php' => 'boniPS_Log_Module',
    'modules/bonips-module-management.php' => 'boniPS_Management_Module',
    'modules/bonips-module-export.php' => 'boniPS_Export_Module',
    'modules/bonips-module-caching.php' => 'boniPS_Caching_Module',
    'modules/bonips-module-buddypress.php' => 'boniPS_BuddyPress_Module',
    'addons/banking/boniPS-addon-banking.php' => 'boniPS_Banking_Module',
    'addons/buy-creds/modules/buycred-module-core.php' => 'boniPS_buyCRED_Module',
    'addons/buy-creds/modules/buycred-module-pending.php' => 'buyCRED_Pending_Payments',
    'addons/badges/boniPS-addon-badges.php' => 'boniPS_Badge_Module',
    'addons/ranks/boniPS-addon-ranks.php' => 'boniPS_Ranks_Module',
    'addons/coupons/boniPS-addon-coupons.php' => 'boniPS_Coupons_Module',
    'addons/transfer/boniPS-addon-transfer.php' => 'boniPS_Transfer_Module',
    'addons/email-notices/boniPS-addon-email-notices.php' => 'boniPS_Email_Notice_Module',
    'addons/notifications/boniPS-addon-notifications.php' => 'boniPS_Notifications_Module',
    'addons/sell-content/boniPS-addon-sell-content.php' => 'boniPS_Sell_Content_Module',
    'addons/stats/boniPS-addon-stats.php' => 'boniPS_Stats_Module',
    'addons/import/boniPS-addon-import.php' => 'boniPS_Import'
);
foreach ($modules as $file => $class) {
    require_once __DIR__ . '/../' . $file;
    new $class();
}
foreach (array('boniPS_Banking_Service_Central', 'boniPS_Banking_Service_Interest', 'boniPS_Banking_Service_Payouts') as $class) {
    new $class(array());
}

$GLOBALS['test_options']['bonips_pref_hooks_custom'] = array(
    'installed' => array('test' => array('callback' => array('Test_Hook'))),
    'active' => array('test'),
    'hook_prefs' => array('test' => array('creds' => 5))
);
$hooks = new boniPS_Hooks_Module('custom');
check($hooks->is_active('test') && $hooks->hook_prefs['test']['creds'] === 5, 'Stored hook preferences must populate declared fields for custom point types');
$settings->cred_id = BONIPS_DEFAULT_TYPE_KEY;

$bonips_current_account = new boniPS_Account(0);
$bonips_account = new boniPS_Account(0);
foreach (array($bonips_current_account, $bonips_account) as $target) {
    $target->balance = array(BONIPS_DEFAULT_TYPE_KEY => new boniPS_Balance(0));
}
$GLOBALS['badge_reads'] = $GLOBALS['rank_reads'] = $GLOBALS['email_reads'] = 0;
foreach (array('boniPS_Badge_Module', 'boniPS_Ranks_Module', 'boniPS_Email_Notice_Module') as $class) {
    $module = new $class();
    $module->populate_current_account();
    $module->populate_account();
    $module->populate_current_account();
    $module->populate_account();
}
foreach (array($bonips_current_account, $bonips_account) as $target) {
    check($target->badges[42]->level_id === 1 && $target->badge_ids === array(42 => 1), 'Declared badge fields must be populated by the add-on');
    check($target->ranks === 1 && $target->balance[BONIPS_DEFAULT_TYPE_KEY]->rank->post_id === 7, 'Declared rank fields must be populated by the add-on');
    check($target->email_block === array('test_notice'), 'Declared email preferences must be populated by the add-on');
}
check($GLOBALS['badge_reads'] === 2 && $GLOBALS['rank_reads'] === 2 && $GLOBALS['email_reads'] === 2, 'Populated add-on data must not be loaded again');

$pointType = new boniPS_Point_Type();
unset($pointType->format['decimals']);
check($pointType->number('1.5') === 1, 'Point formatting must retain access to its declared core settings');

$sale = new class(array('id' => 'test', 'defaults' => array()), array()) extends boniPS_Payment_Gateway {
    public $transaction_populated = false;

    public function get_point_type()
    {
        return BONIPS_DEFAULT_TYPE_KEY;
    }

    public function get_recipient_id()
    {
        return 1;
    }

    public function get_amount()
    {
        return 11;
    }

    public function get_cost($amount = 0, $point_type = BONIPS_DEFAULT_TYPE_KEY, $raw = false, $custom_rate = 0)
    {
        return '11.00';
    }

    public function exceeds_limit()
    {
        return false;
    }

    public function populate_transaction()
    {
        $this->transaction_populated = true;
    }
};
$sale->core = new class() {
    public function exclude_user($user_id)
    {
        return false;
    }
};
$_REQUEST['token'] = 'test';
check(!$sale->valid_request() && !$sale->transaction_populated && count($sale->errors) === 1, 'Purchase validation must enforce the declared sale limit before creating a transaction');
unset($_REQUEST['token']);

$wpdb = new class() {
    public $num_rows = 0;
    public $parameters;

    public function prepare($sql, ...$parameters)
    {
        $this->parameters = $parameters;
        return $sql;
    }

    public function get_results($sql)
    {
        return array();
    }
};
$bonips_log_table = 'test_log';
$sale->point_type = 'custom';
check($sale->transaction_id_is_unique('test-id') && $wpdb->parameters[2] === 'custom', 'Transaction lookup must use the declared purchase point type');

$widget = new class('test') extends boniPS_Statistics_Widget {};
check($widget->now === current_time('timestamp'), 'Statistics widgets must initialize their timestamp');

$query = (new ReflectionClass('boniPS_Query_Log'))->newInstanceWithoutConstructor();
$query->reset_query();
check($query->args === null && $query->prep === null, 'Resetting a log query must clear its state');

echo "Declared property tests passed\n";
