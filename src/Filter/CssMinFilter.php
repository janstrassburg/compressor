<?php

namespace JanStrassburg\Compressor\Filter;

/**
 * A wrapper class for the CssMin lib.
 *
 * Class CssMinFilter
 * @package JanStrassburg\Compressor\Filter
 */
class CssMinFilter {

	/**
	 * @param string $css
	 * @return string
	 */
	public function minify($css) {
		$cssMin = new \CssMin();
		return $cssMin->minify($css);
	}

}
