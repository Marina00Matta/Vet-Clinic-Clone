<?php

namespace App\Admin\Controllers;

use App\Visit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\User;
use App\Pet;
use Encore\Admin\Layout\Content;

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
        $grid->column('user.name', __('Pet Owner'));
        $grid->column('pet.name', __('Pet Name'));
        // $grid->column('user_id', __('User id'));
        // $grid->column('pet_id', __('Pet id'));
        $grid->column('date', __('Date'));
        $grid->column('time', __('Time'));
        $grid->column('status', __('Status'));
      
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
       
        $grid->column('confirmed')->display(function() {
            if ($this->status == 'pending'){
            return '<a href="/admin/visits/confirmed/'.$this->id.'">confirm</a>';
            }
        });
    
        $grid->filter(function($filter){

            $filter->disableIdFilter();
            $filter->like('name', 'PetOwner');    
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
        $show = new Show(Visit::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user.name', __('Pet Owner'));
        $show->field('pet.name', __('Pet Name'));
        // $show->field('user_id', __('User id'));
        // $show->field('pet_id', __('Pet id'));
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

        $form->select('user_id',__('Pet Owner'))->options(User::all()->pluck('name','id'))->rules('required');
        $form->select('pet_id',__('Pet Name'))->options(Pet::all()->pluck('name','id'))->rules('required');
        $form->date('date', __('Date'))->default(date('Y-m-d'));
        $form->time('time', __('Time'))->default(date('H:i:s'));
        $form->select('status',__('Status'))->options([
            'pending' => 'Pending',
            'completed' => 'completed',
            'canceled' => 'Canceled',
        ])->default('pending');

        return $form;
    }


    public function confirmed($id)
    {
        // dd($request);
       

        $visit = Visit::where('id', '=', $id)->first();
        // dd($visit);
        $visit->status = "completed";
        // $visit.update($id, $visit);
         $visit->update();
        return redirect('admin/visits');

        // dd($visit);
    }
    protected function visitsOftofay()
    {
       

        $date = date('Y-m-d') ;
        $visits = Visit::where('date','=',$date )->get();
        // dd($visits);
        $grid = new Grid(new Visit());
        // $grid = $visits;
        $grid->column('id', __('Id'));
        $grid->column('user.name', __('Pet Owner'));
        $grid->column('pet.name', __('Pet Name'));
        // $grid->column('user_id', __('User id'));
        // $grid->column('pet_id', __('Pet id'));
        $grid->column('date', __('Date'));
        $grid->column('time', __('Time'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
       
        $grid->column('confirmed')->display(function() {
            if ($this->status == 'pending'){
            return '<a href="/admin/visits/confirmed/'.$this->id.'">confirm</a>';
            }
        });   

        // return $grid->filter(function($filter){

        //     $filter->like($this.date, $date);  
        // $grid->filter->where(function($query){

            // $query->where('status', 'like', $date);
        // });
        return $grid->visits;     
    }

}
