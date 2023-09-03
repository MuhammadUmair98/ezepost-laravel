<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class DefaultResponses extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Response::macro('success', fn ($data='') => response()->json(['success' => true, 'data' => $data]) );
		Response::macro('success', function($data = '', $data1 = ''){
			if(!empty($data)){
				return response()->json([
					'success' => true,
					'data' => $data
				]);
			}else{
				return response()->json([
					'success' => true
				]);
			}
		});

		Response::macro('error', fn ($error, $status_code) => response()->json(['error' => false, 'error' => $error], $status_code) );
    }
}
