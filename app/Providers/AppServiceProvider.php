<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Tasktodo;
use App\CustomerTaskToDo;
use App\PartnerTaskToDos;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //URL::forceScheme('https');
        Schema::defaultStringLength(191);
        $notification = Tasktodo::all()->count();
        $tasks = Tasktodo::all();
        $notification_cus = CustomerTaskToDo::where('status',1)->count();
        $notification_par = PartnerTaskToDos::where('status',0)->count();
        $tasks_cus = CustomerTaskToDo::where('status',1)->get();
        $tasks_par = PartnerTaskToDos::where('status',0)->get();
        $data = array(
            'noti' => $notification , 
            'tasks' => $tasks,
            'noti_cus' => $notification_cus,
            'noti_par' => $notification_par,
            'tasks_cus' => $tasks_cus,
            'tasks_par' => $tasks_par
        );
        view()->share('data', $data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
