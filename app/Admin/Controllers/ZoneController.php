<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Zone;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ZoneController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Zone(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->host;
            $grid->username;
            $grid->password;
            $grid->port;
            $grid->sort;
            $grid->dbname;
            $grid->status;
            $grid->created_at;
            $grid->updated_at->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Zone(), function (Show $show) {
            $show->id;
            $show->name;
            $show->host;
            $show->username;
            $show->password;
            $show->port;
            $show->sort;
            $show->dbname;
            $show->status;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Zone(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('host');
            $form->text('username');
            $form->text('password');
            $form->text('port');
            $form->text('sort');
            $form->text('dbname');
            $form->text('status');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
