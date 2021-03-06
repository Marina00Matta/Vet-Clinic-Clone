<?php

namespace App\Admin\Controllers;

use App\Reservation;
use App\User;
use App\Pet;
use App\Service;
use App\Visit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;





class ReservationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Reservation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reservation());

        $grid->column('id', __('Id'));
        $grid->column('Pet Onwer')->display(function() {
            $Visit = Visit::where('id', '=', $this->visit_id)->first();
            $user = User::where('id', '=',$Visit->user_id)->first();
            return $user->name;
        });
        $grid->column('Pet Name')->display(function() {
            $Visit = Visit::where('id', '=', $this->visit_id)->first();
            $pet = Pet::where('id', '=',$Visit->pet_id)->first();
            return $pet->name;
        });
        $grid->column('service.name', __('Service'));
        $grid->column('date', __('Date'));
        $grid->column('status')->display(function() {
            if ($this->status == 0){
            return '<a href="/admin/reservations/checked/'.$this->id.'">Check</a>';
            }
            else {
                return 'Checked';
            }
        });

        $grid->filter(function($filter){

            $filter->disableIdFilter();
            $filter->like('user.name', 'Pet Owner');
            $filter->like('pet.name','Pet Name');
        
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
        $show = new Show(Reservation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user.name', __('Pet Owner'));
        $show->field('pet.name', __('Pet Name'));
        $show->field('service.name', __('Service'));
        $show->field('date', __('Date'));
        $show->field('status', __('Status'));
        // $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));
       

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Reservation());

        $form->select('user_id',__('Pet Owner'))->options(User::all()->pluck('name','id'))->rules('required');
        $form->select('pet_id',__('Pet Name'))->options(Pet::all()->pluck('name','id'))->rules('required');
        $form->select('service_id',__('Service'))->options(Service::all()->pluck('name','id'));
        $form->datetime('date', __('Date'))->default(date('Y-m-d H:i:s'))->rules('required|min:3');
        $form->select('status',__('Status'))->options([
            'pending' => 'Pending',
            'completed' => 'completed',
            'canceled' => 'Canceled',
        ])->default('pending');

        return $form;
    }


    public function checked($id)
    {
        // dd($request);
       

        $reservation = Reservation::where('id', '=', $id)->first();
        // dd($visit);
        $reservation->status = 1;
        // $visit.update($id, $visit);
         $reservation->update();
        return redirect('admin/reservations');

        // dd($visit);
    }

   
}
