<?php

if (! function_exists('authorize')) {

    /**
     * Authorization helper
     *
     * @param  string  $action
     * @param  mixed  $arguments
     * @param  sring  $redirectUrl
     * @param  string  $message
     * @param  string  $messageType
     * @return void
     */
    function authorize(
        $action,
        $arguments,
        $redirectUrl = '/households',
        $message = 'Unauthorized access',
        $messageType = 'danger'
    ) {
    	if (! auth()->user()->can($action, $arguments)) {
    		return redirect($redirectUrl)->with($messageType, $message)->send();
    	}
    }
}
