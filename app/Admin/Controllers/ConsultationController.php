<?php

namespace App\Admin\Controllers;

use App\Consultation;
use App\User;
use App\Pet;
use App\Reservation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ConsultationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Consultation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Consultation());

        $grid->column('id', __('Id'));
        $grid->column('user.name', __('Pet Owner'));
        $grid->column('pet.name', __('Pet Name'));
        $grid->column('reservation.date', __('Reservation Date'));
        $grid->column('presenting_signs', __('Presenting signs'));
        $grid->column('frequency_and_duration', __('Frequency and duration'));
        $grid->column('appetite', __('Appetite'));
        $grid->column('drinking', __('Drinking'));
        $grid->column('urination', __('Urination'));
        $grid->column('bowel', __('Bowel'));
        $grid->column('vomiting', __('Vomiting'));
        $grid->column('attitude', __('Attitude'));
        $grid->column('coughing', __('Coughing'));
        $grid->column('sneezing', __('Sneezing'));
        $grid->column('HR', __('HR'));
        $grid->column('RR', __('RR'));
        $grid->column('CRT', __('CRT'));
        $grid->column('WT', __('WT'));
        $grid->column('eyes', __('Eyes'));
        $grid->column('ears', __('Ears'));
        $grid->column('mouth', __('Mouth'));
        $grid->column('lung_sounds', __('Lung sounds'));
        $grid->column('heart_sounds', __('Heart sounds'));
        $grid->column('neuro', __('Neuro'));
        $grid->column('abdomen', __('Abdomen'));
        $grid->column('skin', __('Skin'));
        $grid->column('skeletal', __('Skeletal'));
        $grid->column('DDx', __('DDx'));
        $grid->column('tests', __('Tests'));
        $grid->column('treatment', __('Treatment'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));


        $grid->filter(function($filter){

            $filter->disableIdFilter();
            $filter->like('user.name', 'Pet Owner');
        
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
        $show = new Show(Consultation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user.name', __('Pet Owner'));
        $show->field('pet.name', __('Pet Name'));
        $show->field('reservation.date', __('Reservation Date'));
        $show->field('presenting_signs', __('Presenting signs'));
        $show->field('frequency_and_duration', __('Frequency and duration'));
        $show->field('appetite', __('Appetite'));
        $show->field('drinking', __('Drinking'));
        $show->field('urination', __('Urination'));
        $show->field('bowel', __('Bowel'));
        $show->field('vomiting', __('Vomiting'));
        $show->field('attitude', __('Attitude'));
        $show->field('coughing', __('Coughing'));
        $show->field('sneezing', __('Sneezing'));
        $show->field('HR', __('HR'));
        $show->field('RR', __('RR'));
        $show->field('CRT', __('CRT'));
        $show->field('WT', __('WT'));
        $show->field('eyes', __('Eyes'));
        $show->field('ears', __('Ears'));
        $show->field('mouth', __('Mouth'));
        $show->field('lung_sounds', __('Lung sounds'));
        $show->field('heart_sounds', __('Heart sounds'));
        $show->field('neuro', __('Neuro'));
        $show->field('abdomen', __('Abdomen'));
        $show->field('skin', __('Skin'));
        $show->field('skeletal', __('Skeletal'));
        $show->field('DDx', __('DDx'));
        $show->field('tests', __('Tests'));
        $show->field('treatment', __('Treatment'));
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
        $form = new Form(new Consultation());

        $form->select('user_id',__('Pet Owner'))->options(User::all()->pluck('name','id'))->required();
        $form->select('pet_id',__('Pet Name'))->options(Pet::all()->pluck('name','id'))->required();
        $form->select('reservation_id',__('Reservation Date'))->options(Reservation::all()->pluck('date','id'))->required();
        $form->textarea('presenting_signs', __('Presenting signs'))->default('none');
        $form->textarea('frequency_and_duration', __('Frequency and duration'))->default('none');
        $form->textarea('appetite', __('Appetite'))->default('none');
        $form->textarea('drinking', __('Drinking'))->default('none');
        $form->textarea('urination', __('Urination'))->default('none');
        $form->textarea('bowel', __('Bowel'))->default('none');
        $form->textarea('vomiting', __('Vomiting'))->default('none');
        $form->textarea('attitude', __('Attitude'))->default('none');
        $form->textarea('coughing', __('Coughing'))->default('none');
        $form->textarea('sneezing', __('Sneezing'))->default('none');
        $form->textarea('HR', __('HR'))->default('none');
        $form->textarea('RR', __('RR'))->default('none');
        $form->textarea('CRT', __('CRT'))->default('none');
        $form->textarea('WT', __('WT'))->default('none');
        $form->textarea('eyes', __('Eyes'))->default('none');
        $form->textarea('ears', __('Ears'))->default('none');
        $form->textarea('mouth', __('Mouth'))->default('none');
        $form->textarea('lung_sounds', __('Lung sounds'))->default('none');
        $form->textarea('heart_sounds', __('Heart sounds'))->default('none');
        $form->textarea('neuro', __('Neuro'))->default('none');
        $form->textarea('abdomen', __('Abdomen'))->default('none');
        $form->textarea('skin', __('Skin'))->default('none');
        $form->textarea('skeletal', __('Skeletal'))->default('none');
        $form->textarea('DDx', __('DDx'))->default('none');
        $form->textarea('tests', __('Tests'))->default('none');
        $form->textarea('treatment', __('Treatment'))->default('none');

        return $form;
    }
}
