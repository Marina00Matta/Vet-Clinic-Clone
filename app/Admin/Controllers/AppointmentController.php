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
        $grid->column('status', __('Status'));
        $grid->column('date', __('Date'));
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
        $show->field('status', __('Status'));
        $show->field('date', __('Date'));
        $show->field('start_time', __('Start time'));
        $show->field('end_time', __('End time'));
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
        $form = new Form(new Appointment());

        $form->text('status', __('Status'));
        $form->date('date', __('Date'))->default(date('Y-m-d'));
        $form->time('start_time', __('Start time'))->default(date('H:i:s'));
        $form->time('end_time', __('End time'))->default(date('H:i:s'));

        return $form;
    }
}
