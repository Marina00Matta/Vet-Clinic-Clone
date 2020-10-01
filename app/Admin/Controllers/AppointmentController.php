<?php

namespace App\Admin\Controllers;

use App\Appointment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AppointmentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Appointment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Appointment());

        $grid->column('id', __('Id'));
        $grid->column('day',__('day'))->display(function() {
            if ($this->day == 0){
                return 'Sunday';
            }
            if ($this->day == 1){
                return 'Monday';
            }
            if ($this->day == 2){
                return 'Tuesday';
            }
            if ($this->day == 3){
                return 'Wednesday';
            }
            if ($this->day == 4){
                return 'Thursday';
            }
            if ($this->day == 5){
                return 'Friday';
            }
            if ($this->day == 6){
                return 'Saturday';
            }
            });
        $grid->column('start_time', __('Start time'));
        $grid->column('end_time', __('End time'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Appointment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('day', __('Day'));
        // $show->field('date', __('Date'));
        $show->field('start_time', __('Start time'));
        // $show->field('end_time', __('End time'));
        // $show->field('created_at', __('Created at'));
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
        $form = new Form(new Appointment());

        $form->select('day',__('day'))->options([
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Mednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',

        ])->rules('required');
        // $form->date('date', __('Date'));
        $form->time('start_time', __('Start time'))->default(date('H:i:s'));
        $form->time('end_time', __('End time'))->default(date('H:i:s'));

        return $form;
    }
}
