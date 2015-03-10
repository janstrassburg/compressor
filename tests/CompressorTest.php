<?php

namespace JanStrassburg\Compressor\Test;

use JanStrassburg\Compressor\Compressor;
use JanStrassburg\Compressor\Configuration;

class CompressorTest extends \PHPUnit_Framework_TestCase {

	public function testAssetsWillBeCompressed() {
		$config = new Configuration();
		$config->setRootDir(__DIR__);
		$config->setTempDir('/temp');

		$compressor = new Compressor();
		$compressor->setCssMin(new \CssMin());
		$compressor->setConfig($config);
		$compressor->setAssets(array(
			'js' => array(
				'/assets/test.js'
			),
			'css' => array(
				'/assets/test.css'
			)
		));
		$compressor->run();
	}

}
