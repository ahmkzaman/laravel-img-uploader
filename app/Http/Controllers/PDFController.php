<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::get();
        $data =  [
            'title' => 'Users List',
            'date' => date('m/d/Y'),
            'users' => $users
        ];
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('kzaman.pdf');
    }
}
