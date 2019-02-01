<?php
declare(strict_types = 1);

use SmartEmailing\Types\Helpers\StringHelpers;
use SmartEmailing\Types\JsonString;

require_once __DIR__ . '/vendor/autoload.php';

foreach (\SmartEmailing\Types\CountryCode::getAvailableValues() as $code) {
	$data = \file_get_contents('http://i18napis.appspot.com/address/data/' . $code);
	$data = JsonString::from($data)->getDecodedValue();

	echo 'CountryCode::' . $data['key'] . ' => "#^' . StringHelpers::removeWhitespace($data['zip']) . '\z#",' . PHP_EOL;
}
