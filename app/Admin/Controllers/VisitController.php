<?php

namespace App\Admin\Controllers;

use App\Visit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VisitController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Visit';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Visit());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('pet_id', __('Pet id'));
        $grid->column('date', __('Date'));
        $grid->column('time', __('Time'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Visit::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('pet_id', __('Pet id'));
        $show->field('date', __('Date'));
        $show->field('time', __('Time'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Visit());

        $form->number('user_id', __('User id'));
        $form->number('pet_id', __('Pet id'));
        $form->date('date', __('Date'))->default(date('Y-m-d'));
        $form->time('time', __('Time'))->default(date('H:i:s'));
        $form->text('status', __('Status'))->default('pending');

        return $form;
    }
}
