<?php

namespace App\Services;

// Repositories
use App\Repositories\StoreClinicRepository;

// Support Facades
use Illuminate\Support\Facades\Log;

// Exception
use Exception;

class StoreClinicService extends BaseService
{
	/**
	 * StoreClinicRepository instance to use various functions of the StoreClinicRepository.
	 *
	 * @var \App\Repositories\StoreClinicRepository
	 */
	protected $storeclinicRepository;

	/**
	 * Create a new service instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->storeclinicRepository = new StoreClinicRepository;
	}

	/**
	 * Get the paginated list of all Storeclinic.
	 *
	 * @param  int  $perPage
	 * @return \Illuminate\Pagination\LengthAwarePaginator|boolean
	 */
	public function getPaginatedListOfStoreClinics($perPage)
	{
		try {
			return $this->storeclinicRepository->getPaginatedListOfStoreClinics($perPage);
		} catch (Exception $e) {
			Log::channel('storeclinic')->error('[StoreClinicService:getPaginatedListOfStoreClinics] Paginated list of Store Clinic not fetched because an exception occurred: ');
			Log::channel('storeclinic')->error($e->getMessage());

			return false;
		}
	}

	/**
	 * Create new storeadmin.
	 *
	 * @param  array  $storeClinicDetails
	 * @return \App\Models\Client|boolean
	 */
	public function createStoreClinic($storeClinicDetails)
	{
		try {
			$newStoreClinicInput['name'] = $storeClinicDetails['name'];
			$newStoreClinicInput['gstin'] = $storeClinicDetails['gstin'];
			$newStoreClinicInput['state'] = $storeClinicDetails['state'];
			$newStoreClinicInput['country'] = $storeClinicDetails['country'];
			$newStoreClinicInput['pincode'] = $storeClinicDetails['pincode'];

	        $newStoreClinic =  $this->storeclinicRepository->createStoreClinic($newStoreClinicInput);
	        
	        if ($newStoreClinic) {
	        	/**
	        	 * Attach the users with the newly created site using relationship.
	        	 */
	        	if ($storeClinicDetails['storeadmin_id']) {
	        		$users[] = $storeClinicDetails['storeadmin_id'];
	        	}

	        	$newStoreClinic->users()->attach(
	        		$users,
	        		[
	        			'created_at' => now(),
	        			'updated_at' => now()
	        		]
	        	);

	        	// dd($newStoreClinic);
	        	
	        	return $newStoreClinic;
	        }else {
	        	return false;
	        }
	        
		} catch (Exception $e) {
			Log::channel('storeclinic')->error('[StoreClinicService:createStoreClinic] store clinic not created because an exception occurred: ');
			Log::channel('storeclinic')->error($e->getMessage());

			return false;
		}
	}

}