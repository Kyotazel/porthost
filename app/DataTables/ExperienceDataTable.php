<?php

namespace App\DataTables;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ExperienceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('periode', function ($row) {
                return "<h5><span class='badge bg-primary'>($row->first_time - $row->last_time)</span></h5>";
            })
            ->addColumn('proffesion', function ($row) {
                if ($row->proffesion) {
                    return "<h5><span class='badge bg-success'>$row->proffesion</span></h5>";
                } else {
                    return "";
                }
            })
            ->addColumn('action', function ($row) {
                return "<button class='btn btn-sm btn-primary' onclick='edit($row->id)'><i class='mdi mdi-pencil'></i></button> 
                    <button class='btn btn-sm btn-danger' onclick='destroy($row->id)'><i class='mdi mdi-trash-can'></i></button>";
            })
            ->rawColumns(['periode', 'action', 'proffesion', 'description'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Experience $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Experience $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('experience-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('name'),
            Column::make('periode')->addClass('text-center'),
            Column::make('proffesion')->addClass('text-center'),
            Column::make('description'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(160)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Experience_' . date('YmdHis');
    }
}
