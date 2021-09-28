<?php

namespace App\Services;

// Support Facades
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

// Exception
use Exception;

class AuthService extends BaseService
{
	/**
	 * Create a new service instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get role label of currently logged in user.
	 *
	 * @return string|boolean
	 */
	public function getRoleLabelOfCurrentlyLoggedInUser()
	{
		try {
			if($user = Auth::user()) {
				return $user->role->label;
			} else {
				Log::channel('authentication')->error('[AuthService:getRoleLabelOfCurrentlyLoggedInUser] Role label of the currently logged in user not fetched because an exception occurred: ');
				Log::channel('authentication')->error('No user is currently logged in.');

				return false;
			}
		} catch(Exception $e) {
			Log::channel('authentication')->error('[AuthService:getRoleLabelOfCurrentlyLoggedInUser] Role label of the currently logged in user not fetched because an exception occurred: ');
			Log::channel('authentication')->error($e->getMessage());

			return false;
		}
	}

	/**
	 * Get currently logged in user.
	 *
	 * @return \App\Models\User|boolean
	 */
	public function getCurrentlyLoggedInUser()
	{
		try {
			return Auth::user();
		} catch (Exception $e) {
            Log::channel('authentication')->error('[AuthService:getCurrentlyLoggedInUser] Get currently logged in user did not worked because an exception occured: ');
            Log::channel('authentication')->error($e->getMessage());

            return false;
        }
	}
}