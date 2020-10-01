<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {

        return $content ;
            // ->title('Dashboard');
            // ->description('<h4> Admin Panel</h4>')
            // ->header('Petopia');
            
    }    


        //    ->row(function (Row $row) {

        //     $row->column(4, '');
        
        //     $row->column(8, function (Column $column) {
        //         $column->row('<h1>Petopia</h1>');
              
        //     });
        // });

          //  ->row(function (Row $row) {
// function
                // $row->column(4,  (Column $column) {
                //     $column->append(Dashboard::environment());
                // });

                // $row->column(4, function (Column $column) {
                //     $column->append(Dashboard::extensions());
                // });

                // $row->column(4, function (Column $column) {
                //     $column->append(Dashboard::dependencies());
                // });
                
           // });
            // ->breadcrumb(
            //     ['text' => 'Dashboard', 'url' => '/admin'],
            //     ['text' => 'User management', 'url' => '/admin/users'],
            //     ['text' => 'Edit user']
            // );
    // }

}
