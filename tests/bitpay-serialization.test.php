<?php

error_reporting(E_ALL);
set_error_handler(function ($severity, $message) {
    if ($severity === E_DEPRECATED) {
        throw new RuntimeException($message);
    }

    return false;
});

require_once __DIR__ . '/../addons/buy-creds/gateways/Bitpay/Autoloader.php';
Bitpay\Autoloader::register();

function check($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function legacy_object($class, array $values)
{
    $payload = serialize($values);

    return 'C:' . strlen($class) . ':"' . $class . '":' . strlen($payload) . ':{' . $payload . '}';
}

$pointValues = array('abc', 'def');
$point = new Bitpay\Point($pointValues[0], $pointValues[1]);
check($point->serialize() === serialize($pointValues), 'Point legacy payload changed');
foreach (array(serialize($point), legacy_object('Bitpay\\Point', $pointValues)) as $encoded) {
    $restored = unserialize($encoded);
    check($restored->getX() === 'abc' && $restored->getY() === 'def', 'Point round trip failed');
}

$keyValues = array('key-id', 'abc', 'def', '1234', '4660');
foreach (array('Bitpay\\PrivateKey', 'Bitpay\\PublicKey', 'Bitpay\\SinKey') as $class) {
    $key = unserialize(legacy_object($class, $keyValues));
    check($key->serialize() === serialize($keyValues), $class . ' legacy payload changed');

    foreach (array(serialize($key), legacy_object($class, $keyValues)) as $encoded) {
        $restored = unserialize($encoded);
        check(
            get_class($restored) === $class
            && $restored->getId() === 'key-id'
            && $restored->getX() === 'abc'
            && $restored->getY() === 'def'
            && $restored->getHex() === '1234'
            && $restored->getDec() === '4660',
            $class . ' round trip failed'
        );
    }
}

$publicKey = new Bitpay\PublicKey();
foreach (array(array(), array(null)) as $arguments) {
    try {
        call_user_func_array(array($publicKey, 'generate'), $arguments);
        throw new RuntimeException('Generating without a private key should fail');
    } catch (Exception $error) {
        check($error->getMessage() === 'Please `setPrivateKey` before you generate a public key', 'Unexpected missing key error');
    }
}

$privateKey = new Bitpay\PrivateKey();
$publicKey->__unserialize($keyValues);
check($publicKey->generate($privateKey) === $publicKey, 'Generating with a private key failed');

try {
    $publicKey->generate(new stdClass());
    throw new RuntimeException('An invalid private key should be rejected');
} catch (TypeError $error) {
}

$infinity = new Bitpay\Point(Bitpay\PointInterface::INFINITY, Bitpay\PointInterface::INFINITY);
check(Bitpay\Util\Util::pointDouble($infinity) === $infinity, 'Point doubling must accept omitted curve parameters');
check(Bitpay\Util\Util::pointDouble($infinity, null) === $infinity, 'Point doubling must accept explicit null curve parameters');

$networkAware = new class() extends Bitpay\Network\NetworkAware {
    public function getNetwork()
    {
        return $this->network;
    }
};
$network = new Bitpay\Network\Testnet();
$networkAware->setNetwork($network);
check($networkAware->getNetwork() === $network, 'Network assignment failed');
foreach (array(array(), array(null)) as $arguments) {
    $networkAware->setNetwork($network);
    call_user_func_array(array($networkAware, 'setNetwork'), $arguments);
    check($networkAware->getNetwork() === null, 'Network reset must accept omitted or null networks');
}

$bitpay = new class(array('test' => true), null) extends Bitpay\Bitpay {
    public $initializedConfig;

    protected function initializeContainer($config)
    {
        $this->initializedConfig = $config;
    }
};
check($bitpay->initializedConfig === array('test' => true), 'Null containers must retain automatic initialization');

echo "BitPay compatibility tests passed\n";
