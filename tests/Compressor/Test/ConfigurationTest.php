<?php

namespace JanStrassburg\Compressor\Test;

use JanStrassburg\Compressor\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase {

	public function testPathsCanBeSet() {
		$config = new Configuration();
		$config->setRootDir('/my/test/dir/');
		$config->setTempDir('temp');
		$this->assertEquals('/my/test/dir/temp', $config->getTempDir());
	}

}
