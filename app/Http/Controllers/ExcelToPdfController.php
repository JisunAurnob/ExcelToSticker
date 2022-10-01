<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\Token;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class ExcelToPdfController extends Controller
{
    public function home()
    {
        return view('pages.excelToPdf');
    }
    public function process(Request $request)
    {

        $request->validate(
            [
                'excelFile' => 'required|mimes:xlsx|max:50000',
                // 'token' => 'required'

            ],
            [
                'excelFile.required' => 'Excel File Required',
                'excelFile.mimes' => 'The file must be a file of type: xlsx',
                // 'token.required' => 'Token Required To Convert! Contact Admin'
            ]
        );

        $path = $request->file('excelFile');
        // $request->file('excelFile')->move("Temp", 'tempFile.xlsx');
        // if($this->tokenCheckValidate($request->token)){

        $collection  = Excel::toCollection(new UsersImport(), $path)->toArray();

        $data = $collection[0];
        // dd($data);
        // $sorted = array();


        for($j=1;$j<count($data);$j++){
            for($i=$j+1;$i<count($data)-1;$i++){
                //$data[$i][4] X
                //$data[$i][5] Y
    
                // dd((double)$data[$i][4]);
                if( (double)$data[$i][4]>(double)$data[$j][4] && (double)$data[$i][5]>(double)$data[$j][5]){
                $small=$data[$i];
                $large=$data[$i+1];
                $data[$j]=$large;
                $data[$i]=$small;
                }
            }
        }

        dd($data);

        $pdf = PDF::setOptions([
            // 'isHtml5ParserEnabled' => true,
            // 'isRemoteEnabled' => true,
            'defaultFont' => 'sans-serif'
        ])->setPaper('a4', 'portrait')
            ->loadView('pages.pdfView', ['excelData' => $data]);
        return $pdf->stream('StickerGeneratedByExToSticker.pdf');
        // }
        // else{
        //     return view('pages.excelToPdf')->with('errormsg', 'Token is not valid. You have to give a valid token to use the service');
        // }

    }
    // public function dummyPreview()
    // {
    //     $path = public_path('DummyStickerPDF.pdf');
    //     $header = [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'inline'
    //     ];
    //     // ; filename="DummyStickerPDF.pdf"
    //     return response()->file($path, $header);
    // }

    public function tokenCheckValidate($token)
    {
        $token = Token::where('status', 'reserved')
            ->where('token', $token)
            ->first();
        if ($token) {
            $token->status = 'used';
            $token->save();
            return true;
        } else {
            // return view('pages.excelToPdf')->with('errormsg', 'Token is not valid. You have to give a valid token to use the service');
            return false;
        }
    }
}
