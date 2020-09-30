<?php

namespace App\Admin\Controllers;

use App\Cage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cage());

        $grid->column('id', __('Id'));
        $grid->column('availability', __('Availability'));
        $grid->column('description', __('Description'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));


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
        $show = new Show(Cage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('availability', __('Availability'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Cage());
        
        $form->radio('availability')->options(['Available' => 'Available', 'Not Available'=> 'Not Available'])->default('Available'); 
        $form->textarea('description', __('Description'))->rules('required');

        return $form;
    }
}
