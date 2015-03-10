<?php

namespace JanStrassburg\Compressor;

use JanStrassburg\Compressor\Filter\CssMinFilter;
use JanStrassburg\Compressor\Filter\JsMinFilter;

class Compressor {

	/**
	 * @var Configuration
	 */
	private $config;

	/**
	 * @var array
	 */
	private $assets;

	/**
	 * @var CssMinFilter
	 */
	private $cssMinFilter;

	/**
	 * @var JsMinFilter
	 */
	private $jsMinFilter;

	/**
	 * Executes compressor
	 */
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
				$filterName = $type . 'MinFilter';
				$this->$filterName->minify(file_get_contents($this->config->getRootDir() . $file));
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
	 * @param CssMinFilter $cssMinFilter
	 */
	public function setCssMinFilter(CssMinFilter $cssMinFilter) {
		$this->cssMinFilter = $cssMinFilter;
	}

	/**
	 * @param JsMinFilter $jsMinFilter
	 */
	public function setJsMinFilter(JsMinFilter $jsMinFilter) {
		$this->jsMinFilter = $jsMinFilter;
	}

}
