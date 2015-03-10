<?php

namespace JanStrassburg\Compressor\Test;

use JanStrassburg\Compressor\Compressor;
use JanStrassburg\Compressor\Configuration;
use JanStrassburg\Compressor\Filter\CssMinFilter;
use JanStrassburg\Compressor\Filter\JsMinFilter;

class CompressorTest extends \PHPUnit_Framework_TestCase {

	public function testAssetsWillBeCompressed() {
		$config = new Configuration();
		$config->setRootDir(__DIR__);
		$config->setTempDir('/temp');
		$compressor = new Compressor();
		$compressor->setCssMinFilter(new CssMinFilter());
		$compressor->setJsMinFilter(new JsMinFilter());
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
		$this->assertFileExists($config->getTempDir() . '/final.css');
		$this->assertFileExists($config->getTempDir() . '/final.js');
	}

}
