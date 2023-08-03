<?php

namespace App\Http\Livewire\admin;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class AllUsers extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\User>
     */
    public function datasource(): Builder
    {
        return User::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')

            /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn (User $model) => strtolower(e($model->name)))

            ->addColumn('username')
            ->addColumn('email')
            ->addColumn('refer')
            ->addColumn('status')
            ->addColumn('networker')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            // Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('Username', 'username')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('Refer', 'refer')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Networker', 'networker')
                ->toggleable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('username')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('refer')->operators(['contains']),
            Filter::inputText('status')->operators(['contains']),
            Filter::boolean('networker'),
            Filter::datetimepicker('created_at'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('delete', 'Delete')
                ->class('btn btn-danger btn-sm')
                ->emit('delete', ['id' => 'id']),

            Button::make('suspend', 'Suspend')
                ->class('btn btn-danger btn-sm')
                ->emit('suspend', ['id' => 'id']),

            Button::make('activate', 'Activate')
                ->class('btn btn-primary btn-sm')
                ->emit('activate', ['id' => 'id']),

            Button::make('pin', 'Make PIN')
                ->class('btn btn-danger btn-sm')
                ->emit('pin', ['id' => 'id']),

            Button::make('unpin', 'Make Normal')
                ->class('btn btn-primary btn-sm')
                ->emit('unpin', ['id' => 'id']),

            //    Button::make('destroy', 'Delete')
            //        ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            //        ->route('user.destroy', function(\App\Models\User $model) {
            //             return $model->id;
            //        })
            //        ->method('delete')
        ];
    }

    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(),
            [
                'delete'   => 'delete',
                'pin'   => 'pin',
                'unpin'   => 'unpin',
                'suspend'   => 'suspend',
                'activate'   => 'activate',
            ]
        );
    }


    public function delete($id)
    {
        $user = User::find($id['id']);
        $user->delete();

        $this->dispatchBrowserEvent('deleted', ['status' => 'User Deleted Successfully']);
    }

    public function activate($id)
    {
        $user = User::find($id['id']);
        $user->status = 'active';
        $user->save();

        $this->dispatchBrowserEvent('deleted', ['status' => 'User Suspended Successfully']);
    }

    public function suspend($id)
    {
        $user = User::find($id['id']);
        $user->status = 'suspend';
        $user->save();

        $this->dispatchBrowserEvent('deleted', ['status' => 'User Suspended Successfully']);
    }


    public function pin($id)
    {
        $user = User::find($id['id']);
        $user->networker = true;
        $user->save();

        $this->dispatchBrowserEvent('deleted', ['status' => 'User Account Converted to PIN Account']);
    }

    public function unpin($id)
    {
        $user = User::find($id['id']);
        $user->networker = false;
        $user->save();

        $this->dispatchBrowserEvent('deleted', ['status' => 'PIN Account Converted to Normal Account']);
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
        return [

            //Hide button edit for ID 1
            Rule::button('suspend')
                ->when(fn ($user) => $user->status === 'suspend')
                ->hide(),

            Rule::button('activate')
                ->when(fn ($user) => $user->status === 'active')
                ->hide(),

            Rule::button('pin')
                ->when(fn ($user) => $user->networker == true)
                ->hide(),

            Rule::button('unpin')
                ->when(fn ($user) => $user->networker == false)
                ->hide(),
        ];
    }
}
