<?php

namespace App\Http\Livewire\Reservasi;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class ReservasiTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = false;

    public string $primaryKey = 'reservasis.id', $primaryKeyName = 'reservasis.id';
    public string $sortField = 'reservasis.id';


    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showRecordCount('full')
            ->showToggleColumns()
            ->showExportOption('download', ['excel', 'csv']);
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
     * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\User>|null
     */
    public function datasource(): ?Builder
    {
        return Reservasi::query()
            ->join('kamars', function ($kamars) {
                $kamars->on('reservasis.id_kamar', '=', 'kamars.id');
            })
            ->select('reservasis.*', 'kamars.tipe_kamar');
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
        return [
            'GetKamar' => [
                'tipe_kamar'
            ]
        ];
    }


    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('nama_tamu', function ($reservasi) {
                return $reservasi->nama_tamu;
            })

            ->addColumn('id_kamar', function (Reservasi $reservasi) {
                return $reservasi->id_kamar;
            })
            ->addColumn('tipe_kamar', function (Reservasi $reservasi) {
                return $reservasi->GetKamar->tipe_kamar;
            })

            ->addColumn('jumlah_kamar', function (Reservasi $reservasi) {
                return $reservasi->jumlah_kamar;
            })
            ->addColumn('tgl_checkin', function (Reservasi $reservasi) {
                return Carbon::parse($reservasi->tgl_checkin)->format('H:i, d/m/Y');
            })
            ->addColumn('tgl_checkout', function (Reservasi $reservasi) {
                return Carbon::parse($reservasi->tgl_checkout)->format('H:i, d/m/Y');
            })
            ->addColumn('status');
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
        $canEdit = true; //User has edit permission

        return [
            Column::add()
                ->title('Nama tamu')
                ->field('nama_tamu')
                ->makeInputText('nama_tamu')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title('Tipe kamar')
                ->field('tipe_kamar')
                ->makeInputSelect(Kamar::with('Reservasi')->get(), 'tipe_kamar', 'id_kamar')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title('Tgl Booking')
                ->field('created_at')
                ->editOnClick($canEdit)
                ->makeInputDatePicker()
                ->searchable()
                ->sortable(),
            Column::add()
                ->title('Check-in')
                ->field('tgl_checkin')
                ->editOnClick($canEdit)
                ->makeInputDatePicker()
                ->searchable()
                ->sortable(),

            Column::add()
                ->title('Check-out')
                ->field('tgl_checkout')
                ->editOnClick($canEdit)
                ->makeInputDatePicker()
                ->searchable()
                ->sortable(),

            Column::add()
                ->title('Status')
                ->field('status')
                ->searchable()
                ->sortable(),
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
     * PowerGrid Reservasi Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption(__('Edit'))
                ->class('text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center')
                ->openModal('reservasi.edit-status', [
                    'reservasiId'                  => 'id',
                    'reservasiStatus'              => 'status',
                ]),

            Button::add('detail')
                ->caption(__('Detail'))
                ->class('text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br shadow-lg shadow-blue-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center')
                ->openModal('reservasi.detail-reservasi', [
                    'reservasiId'                  => 'id',
                    'reservasiNama'                => 'nama_tamu',
                    'reservasiTipeKamar'           => 'tipe_kamar',
                    'reservasiCheckin'             => 'tgl_checkin',
                    'reservasiCheckout'            => 'tgl_checkout',
                    'reservasiStatus'              => 'status',
                ]),

            Button::add('destroy')
                ->caption('Delete')
                ->class('text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br shadow-lg shadow-red-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center')
                ->openModal('reservasi.delete-reservasi', [
                    'reservasiId'                  => 'id',
                    'reservasiNama'                => 'nama_tamu',
                    'reservasiTipeKamar'           => 'tipe_kamar',
                    'reservasiTgl'                 => 'tgl',
                    'reservasiCheckin'             => 'tgl_checkin',
                    'reservasiCheckout'            => 'tgl_checkout',
                    'reservasiStatus'              => 'status',
                    'confirmationTitle'       => 'Hapus data reservasi',
                    'confirmationDescription' => 'Apakah kamu yakin ingin menghapus data reservasi ini?',
                ]),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Reservasi Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */


    public function actionRules(): array
    {
        return [

            //Hide button edit for ID 1
            // Rule::button('edit')
            //     ->when(fn ($reservasi) => $reservasi->id === 1)
            //     ->hide(),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

    /**
     * PowerGrid Reservasi Update.
     *
     * @param array<string,string> $data
     */


    public function update(array $data): bool
    {
        if ($data['field'] == 'tgl_checkin' && $data['value'] != '') {
            $data['field'] = 'tgl_checkin';
            $data['value'] =  Carbon::createFromFormat('H:i, d/m/Y', $data['value']);
        }
        if ($data['field'] == 'tgl_checkout' && $data['value'] != '') {
            $data['field'] = 'tgl_checkout';
            $data['value'] =  Carbon::createFromFormat('H:i, d/m/Y', $data['value']);
        }
        try {
            $updated = Reservasi::query()
                ->find($data['id'])
                ->update([
                    $data['field'] => $data['value']
                ]);
        } catch (QueryException $exception) {
            $updated = false;
        }

        $this->dispatchBrowserEvent(
            'successEdit',
        );
        return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
}
