<?php

namespace JanStrassburg\Compressor;

use JsMin\Minify;

class Compressor {

	/**
	 * @var \JanStrassburg\Compressor\Configuration
	 */
	private $config;

	/**
	 * @var array
	 */
	private $assets;

	/**
	 * @var \CssMin
	 */
	private $cssMin;


	public function run() {
		$this->minify('js');
		$this->minify('css');
	}

	/**
	 * @param string $type
	 */
	private function minify($type) {
		if (!empty($this->assets[$type])) {
			$string = '';
			foreach ($this->assets[$type] as $file) {
				if ($type == 'css') {
					$string .= $this->cssMin->minify(file_get_contents($this->config->getRootDir() . $file));
				} elseif ($type == 'js') {
					$string .= Minify::minify(file_get_contents($this->config->getRootDir() . $file));
				}
			}
			$this->writeFile($string, $type);
		}
	}

	/**
	 * @param string $string
	 * @param string $type
	 */
	private function writeFile($string, $type) {
		$fileName = $this->config->getTempDir() . '/final.' . $type;
		if (is_file($fileName)) {
			unlink($fileName);
		}
		file_put_contents($fileName, $string);
	}

	/**
	 * @param Configuration $config
	 */
	public function setConfig(Configuration $config) {
		$this->config = $config;
	}

	/**
	 * @param array $assets
	 */
	public function setAssets(array $assets) {
		$this->assets = $assets;
	}

	/**
	 * @param \CssMin $cssMin
	 */
	public function setCssMin(\CssMin $cssMin) {
		$this->cssMin = $cssMin;
	}

}
