<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Zone;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Contracts\Support\Renderable;

class ZoneController extends AdminController
{

    /**
     * @param Content $content
     * @return Content|void
     */
    public function index(Content $content)
    {
        $content->header('分区管理');

        $content->description('游戏分区管理');

        $content->breadcrumb(
            ['text'=>'分区','url'=>'/admin/zone']
        );
//        return $content
//            ->title($this->title())
//            ->description($this->description()['index'] ?? trans('admin.list'))
//            ->body($this->grid());
//
        return $content->body($this->grid());
//        return $content->row('hello');

//        return $content->row(function (Row $row) {
//            $row->column(4,'hehe');
//            $row->column(4,'haha');
//            $row->column(4,'xixi');
//        });

//        return $content->row(function (Row $row) {
//            $row->column(4,'11111');
//            $row->column(4,'22222');
//            $row->column(4,function (Column $column) {
//                $column->row('333333');
//                $column->row(44444);
//            });
//        });
    }

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
            $grid->created_at->sortable();
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
            $form->text('name')->placeholder('游戏分区名称');
            $form->ip('host');
            $form->text('username')->default('root');
            $form->password('password');
            $form->number('port')->default(3306);
            $form->number('sort')->default(0);
            $form->text('dbname')->default('数据库名称');
            $form->radio('status')->options(['0'=>'禁用','1'=>'启用'])->default('0');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
