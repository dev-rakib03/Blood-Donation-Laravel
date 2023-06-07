<?php

namespace App\Exports;

//use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use DB;


class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $sec_id)
    {
        $this->sec_id = $sec_id;
    }

    public function collection()
    {
    	$data=DB::table('courseregestration')
    	->where('courseregestration.section_id','=', $this->sec_id)
    	->join('users','courseregestration.user_id','=','users.id')
    	->select('users.id','users.name','users.email')
        ->orderBy('id', 'desc')
    	->get();
    	return $data;
    }

     public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

                // Set first row to height 20
            	$event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(20);
            },
        ];
    }
}
