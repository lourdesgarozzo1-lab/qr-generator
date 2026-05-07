<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function generate(Request $request)
    {
        // Validamos que envíen la cédula
        $cedula = $request->query('ci');

        if (!$cedula) {
            return response()->json(['error' => 'Falta el parámetro cedula'], 400);
        }

        // Genera el QR y lo retorna como imagen SVG
        return response(QrCode::format('svg')->size(300)->generate($cedula))
                ->header('Content-Type', 'image/svg+xml');
    }
}