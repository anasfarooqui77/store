<?php

namespace App\Repositories;

// Model for this repository
use App\Models\Storeclinic;

// Support Facades
use Illuminate\Support\Facades\Log;

// Exception
use Exception;

class StoreClinicRepository extends BaseRepository
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
	 * Get the paginated list of clients.
	 *
	 * @param  int  $perPage
	 * @return \Illuminate\Pagination\LengthAwarePaginator|boolean
	 */
	public function getPaginatedListOfStoreClinics($perPage)
	{
		try {
			// dd($perPage);
			return StoreClinic::paginate($perPage);
		} catch (Exception $e) {
			Log::channel('storeclinic')->error('[StoreClinicRepository:getPaginatedListOfStoreClinics] Paginated list of Store Clinic not fetched because an exception occurred: ');
			Log::channel('storeclinic')->error($e->getMessage());

			return false;
		}
	}

	/**
	 * Create a new site.
	 *
	 * @param  array  $storeClinicDetails
	 * @return \App\Models\Site|boolean
	 */
	public function createStoreClinic($storeClinicDetails)
	{
		try {

			// dd($storeClinicDetails);
			return StoreClinic::create($storeClinicDetails);
		} catch (Exception $e) {
			Log::channel('storeclinic')->error('[StoreClinicRepository:createSite] New store Clinic not created because an exception occurred: ');
			Log::channel('storeclinic')->error($e->getMessage());

			return false;
		}
	}

}