<?php

namespace JanStrassburg\Compressor\Filter;

use JsMin\Minify;

class JsMinFilter {

	/**
	 * @param string $js
	 * @return string
	 */
	public function minify($js){
		return Minify::minify($js);
	}

}
