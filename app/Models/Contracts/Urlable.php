<?php

namespace App\Models\Contracts;

interface Urlable 
{
	/**
	 * Gets parent model path
	 *
	 * @return string
	 */
	public function parent();
	
	/**
	 * Returns the UrlBuilder
	 *
	 * @return \App\Support\UrlBuilder
	 */
	public function url();
	
}
