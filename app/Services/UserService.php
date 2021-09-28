<?php

namespace App\Services;

// Repositories
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

// Support Facades
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

// Exception
use Exception;

class UserService extends BaseService
{
	/**
	 * RoleRepository instance to use various functions of the RoleRepository.
	 *
	 * @var \App\Repositories\RoleRepository
	 */
	protected $roleRepository;

	/**
	 * UserRepository instance to use various functions of the UserRepository.
	 *
	 * @var \App\Repositories\UserRepository
	 */
	protected $userRepository;

	/**
	 * Create a new service instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->roleRepository = new RoleRepository;
		$this->userRepository = new UserRepository;
	}

	/**
	 * Create new user.
	 *
	 * @param  array $userDetails
	 * @return \App\Models\User|boolean
	 */
	public function createUser($userDetails)
	{
		try {
			/**
	         * Fetch the role by type and append role_id to userDetails and remove type.
	         */
	        $role = $this->roleRepository->getFirstRoleByLabel($userDetails['type']);
	        $userDetails['role_id'] = $role->id;
	        unset($userDetails['type']);

	        /**
	         * Hash the password given by the user before saving in database.
	         */
	        $userDetails['password'] = Hash::make($userDetails['password']);

	        return $this->userRepository->createUser($userDetails);
	        
		} catch (Exception $e) {
			Log::channel('user')->error('[UserService:createUser] User not created because an exception occurred: ');
			Log::channel('user')->error($e->getMessage());

			return false;
		}
	}

	/**
	 * Get the paginated list of all StoreAdmin.
	 *
	 * @param  int  $perPage
	 * @return \Illuminate\Pagination\LengthAwarePaginator|boolean
	 */
	public function getPaginatedListOfStoresAdmin($perPage)
	{
		try{
			/**
			 * Get StoreAdmin role object.
			 */
			$storeAdminRole = $this->roleRepository->getFirstRoleByLabel('storeadmin');

			return $this->userRepository->getPaginatedListOfUsersByRoleId($storeAdminRole->id, $perPage);
		} catch(Exception $e){
			Log::channel('user')->error('[UserService:getPaginatedListOfStoresAdmin] Paginated list of StoreAdmin not fetched because an exception occurred: ');
			Log::channel('user')->error($e->getMessage());

			return false;
		}
	}

	/**
	 * Get the plucked list of all storeadmin.
	 *
	 * @return \Illuminate\Support\Collection|boolean
	 */
	public function getPluckedListOfStoreAdmin()
	{
		try{
			/**
			 * get the storeadmin role
			 */
			$storeAdminRole = $this->roleRepository->getFirstRoleByLabel('storeadmin');
			return $this->userRepository->getPluckedListOfUsersByRoleId($storeAdminRole->id);
		}catch(Exception $e){
			Log::channel('user')->error('[UserService:getPluckedListOfStoreAdmin] Plucked list of storeadmin not fetched because an exception occurred:');
			Log::channel('user')->error($e->getMessage);

			return false;
		}
	}
}