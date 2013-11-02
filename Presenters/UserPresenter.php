<?php namespace Acme\Presenters;

class UserPresenter extends Presenter {

	public function gravatar()
	{
		return 'gravatar path';
	}

	public function created_at()
	{
		return $this->resource->created_at->format('Y-m-d');
	}
}
