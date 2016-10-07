<?php

namespace App\Support;

use App\Models\Contracts\Urlable;

class UrlBuilder
{
	protected $urlable;

	protected $path = [];

	public function __construct(Urlable $urlable)
	{
		$this->urlable = $urlable;

		if ($urlable->parent() !== '') {
			$this->path[] = $urlable->parent();
		}

		$this->path[] = $urlable->getTable();

		return $this;
	}

	public function id()
	{
		$this->path[] = $this->urlable->id;

		return $this;
	}

	public function __call($method, $args)
	{
		$this->path[] = $method;

		return $this;
	}

	public function __toString()
	{
		return trim(implode('/', $this->path), '/');
	}

}
