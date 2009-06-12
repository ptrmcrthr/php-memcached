--TEST--
Memcached local server test
--SKIPIF--
<?php if (!extension_loaded("memcached")) print "skip"; ?>
--FILE--
<?php
require('php_test_init.php');
$m = new $php_class_name();
$m->addServer('127.0.0.1', 11211, 1);

$key = 'foobarbazDEADC0DE';
$m->set($key, array(
	'foo' => 'bar'
), 360);

var_dump($m->get($key));
?>
--EXPECT--
array(1) {
  ["foo"]=>
  string(3) "bar"
}
