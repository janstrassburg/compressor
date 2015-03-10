<?php

namespace JanStrassburg\Compressor\Filter;

use JsMin\Minify;

/**
 * A wrapper class for the JsMin lib.
 *
 * Class JsMinFilter
 * @package JanStrassburg\Compressor\Filter
 */
class JsMinFilter {

	/**
	 * @param string $js
	 * @return string
	 */
	public function minify($js) {
		return Minify::minify($js);
	}

}
