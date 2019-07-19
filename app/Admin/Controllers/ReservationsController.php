<?php

namespace App\Admin\Controllers;

use App\Reservation;
use App\ReservedTable;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReservationsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Rezervari';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reservation);

        $grid->column('id', __('Id'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Telefon'));
        $grid->column('first_name', __('Prenume'));
        $grid->column('last_name', __('Nume'));
        $grid->column('guests', __('Invitati'));
        $grid->column('notes', __('Mentiuni'));
        $grid->column('from', __('Sosire'));
        $grid->column('to', __('Plecare'));
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
        $show->field('email', __('Email'));
        $show->field('phone', __('Telefon'));
        $show->field('first_name', __('Prenume'));
        $show->field('last_name', __('Nume'));
        $show->field('guests', __('Invitati'));
        $show->field('notes', __('Mentiuni'));
        $show->field('from', __('Sosire'));
        $show->field('to', __('Plecare'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Reservation);

        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->text('first_name', __('Prenume'));
        $form->text('last_name', __('Nume'));
        $form->textarea('notes', __('Mentiuni'));

        return $form;
    }

    public function destroy($id)
    {
        Reservation::destroy($id);
        ReservedTable::where('reservation_id',$id)->delete();
    }
}
