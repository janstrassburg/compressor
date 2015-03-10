<?php

namespace JanStrassburg\Compressor;

/**
 * A configuration container for the compressor.
 * All target directories can be set here.
 *
 * Class Configuration
 * @package JanStrassburg\Compressor
 */
class Configuration {

	/**
	 * @var string
	 */
	private $rootDir = '';

	/**
	 * @var string
	 */
	private $tempDir = '';

	/**
	 * @return mixed
	 */
	public function getRootDir() {
		return $this->rootDir;
	}

	/**
	 * @param mixed $rootDir
	 */
	public function setRootDir($rootDir) {
		$this->rootDir = $rootDir;
	}

	/**
	 * @return mixed
	 */
	public function getTempDir() {
		return $this->rootDir . $this->tempDir;
	}

	/**
	 * @param mixed $tempDir
	 */
	public function setTempDir($tempDir) {
		$this->tempDir = $tempDir;
	}


}
