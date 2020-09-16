<?php

namespace App\Admin\Controllers;

use App\Boarding;
use App\Pet;
use App\Reservation;
use App\Cage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BoardingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Boarding';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Boarding());

        $grid->column('id', __('Id'));
        $grid->column('pet.name', __('Pet Name'));
        $grid->column('reservation.date', __('Reservation Date'));
        $grid->column('cage_id', __('Cage Number'));
        $grid->column('end_date', __('End date'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){

            $filter->disableIdFilter();
            $filter->like('pet.name', 'Pet Name');
        
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Boarding::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pet.name', __('Pet Name'));
        $show->field('reservation.date', __('Reservation Date'));
        $show->field('cage_id', __('Cage Number'));
        $show->field('end_date', __('End date'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Boarding());        
        
        $form->select('pet_id',__('Pet Name'))->options(Pet::all()->pluck('name','id'))->rules('required');
        $form->select('reservation_id',__('Reservation'))->options(Reservation::all()->pluck('date','id'))->rules('required');
        $form->select('cage_id',__('Available Cages'))->options(Cage::get()->where("availability","Available")->pluck('id','id'))->rules('required');
        $form->datetime('end_date', __('End date'))->default(date('Y-m-d H:i:s'))->rules('required');
        
        return $form;      
    }
}
