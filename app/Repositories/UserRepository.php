<?php

namespace App\Repositories;

// Model for the repository
use App\Models\User;

// Support Facades
use Illuminate\Support\Facades\Log;

// Exception
use Exception;

class UserRepository extends BaseRepository
{
	/**
	 * Create a new repository instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get the total number of users available.
	 *
	 * @return int|boolean
	 */
	public function getTotalUsers()
	{
		try {
			return User::count();
		} catch(Exception $e) {
			Log::channel('user')->error('[UserRepository:getTotalUsers] Total users not fetched because an exception occurred: ');
			Log::channel('user')->error($e->getMessage());

			return false;
		}
	}

	/**
	 * Create a new user.
	 *
	 * @param  array  $userDetails
	 * @return \App\Models\User|boolean
	 */
	public function createUser($userDetails)
	{
		try {
			return User::create($userDetails);
		} catch (Exception $e) {
			Log::channel('user')->error('[UserRepository:createUser] New user not created because an exception occurred: ');
			Log::channel('user')->error($e->getMessage());

			return false;
		}
	}

	/**
	 * Get the paginated list of users by role id.
	 *
	 * @param  int  $roleId
	 * @param  int  $perPage
	 * @return \Illuminate\Pagination\LengthAwarePaginator|boolean
	 */
	public function getPaginatedListOfUsersByRoleId($roleId, $perPage)
	{
		try {
			return User::whereRoleId($roleId)
						 ->paginate($perPage);
		} catch (Exception $e) {
			Log::channel('user')->error('[UserRepository:getPaginatedListOfUsersByRoleId] Paginated list of users by role id not fetched because an exception occurred: ');
			Log::channel('user')->error($e->getMessage());

			return false;
		}
	}

	/**
	 * Get the plucked list of users by role id.
	 *
	 * @param  int  $roleId
	 * @return \Illuminate\Support\Collection|boolean
	 */
	public function getPluckedListOfUsersByRoleId($roleId)
	{
		try {
			return User::whereRoleId($roleId)->pluck('name', 'id');
		} catch (Exception $e) {
			Log::channel('user')->error('[UserRepository:getPluckedListOfUsersByRoleId] Plucked list of users by role id not fetched because an exception occurred: ');
			Log::channel('user')->error($e->getMessage());

			return false;
		}
	}

}