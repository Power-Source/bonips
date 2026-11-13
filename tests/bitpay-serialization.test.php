<?php

error_reporting(E_ALL);
set_error_handler(function ($severity, $message) {
    if ($severity === E_DEPRECATED && strpos($message, 'Serializable interface') !== false) {
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

echo "BitPay serialization tests passed\n";
