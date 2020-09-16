<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Form\Field\Nullable;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;
use Encore\Admin\Auth\Permission;


class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('recommendation', __('Recommendation'));
        $grid->column('address', __('Address'));
        //$grid->column('created_at')->date('Y-m-d');
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

         //filter by name
        $grid->filter(function($filter){

            $filter->disableIdFilter();
            $filter->like('name', 'name');
        
        });

        // $grid->actions(function($actions){
        //     if(!Admin::user()->can('delete-user'))
        //     {
        //         $action->disableDelete();
        //     }
        // });

        // !Admin::user()->cannot('delete-user');

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
        $show->field('phone_number', __('Phone number'));
        $show->field('recommendation', __('Recommendation'));
        $show->field('address', __('Address'));

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

        $form->text('name', __('Name'))->rules('required|min:3');
        $form->email('email', __('Email'))->rules('required|unique:users');
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'))->rules('required');
        $form->password('password',__('Password'))->rules('required|min:6|regex:"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"', [
            'regex' => 'at least one letter and one number',
        ]);
        $form->text('phone_number', __('Phone number'))->rules('required|min:11');
        $form->textarea('recommendation', __('Recommendation'));
        $form->text('address', __('Address'))->rules('required');

        return $form;
    }

    public function delete()
    {
        Permission::check('delete-user');
    }
}
