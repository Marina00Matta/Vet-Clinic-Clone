<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FollowupController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Follow Up';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        // $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        // $grid->column('email_verified_at', __('Email verified at'));
        // $grid->column('password', __('Password'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('last_visit', __('Last visit'));
        $grid->column('contacted', __('Contacted'));
        // $grid->column('address', __('Address'));
        // $grid->column('remember_token', __('Remember token'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        // $grid->filter(function($filter){

        //     $filter->disableIdFilter();
        //     $filter->like('last_visit', 'Last Visit');

            
        
        // });

        $grid->quickSearch(function ($model, $query) {
            // $model->where('last_visit', $query)->orWhere('last_visit', 'like', "%{$query}%");
            $model->whereDate('last_visit' , "%{$query}%");

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('phone_number', __('Phone number'));
        $show->field('last_visit', __('Last visit'));
        $show->field('contacted', __('Contacted'));
        $show->field('address', __('Address'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('phone_number', __('Phone number'));
        $form->date('last_visit', __('Last visit'))->default(date('Y-m-d'));
        $form->date('contacted', __('Contacted'))->default(date('Y-m-d'));
        $form->text('address', __('Address'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
