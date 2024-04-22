<?php
namespace App\Http\Controllers;
use App\Models\Horoscop;
use App\Models\Lang;
use App\Http\Requests\StoreHoroscopRequest;
use App\Http\Requests\UpdateHoroscopRequest;
use Carbon\Carbon;

class HoroscopController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHoroscopRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Horoscop $horoscop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horoscop $horoscop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHoroscopRequest $request, Horoscop $horoscop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horoscop $horoscop)
    {
        //
    }

    public function importarHoroscop()
    {
        $langs = Lang::all();

        // Definim els signes del zodíac en un array
        $horoscops = ['aquarius', 'pisces', 'aries', 'taurus', 'gemini', 'cancer', 'leo', 'virgo', 'libra', 'scorpio', 'sagittarius', 'capricorn'];
        $temps = ['today'];

        // RECORREMOS LOS SIGNOS DEL ZODIAC
        foreach ($temps as $temp) {
            foreach ($horoscops as $horoscop) {
                $text = file_get_contents("https://www.astrology-zodiac-signs.com/api/call.php?time=$temp&sign=$horoscop");
                Horoscop::create([
                    'date' => Carbon::now()->format('d/m/y'),
                    'lang' => 'en',
                    'sign' => $horoscop,
                    'time' => 'today',
                    'phrase' => $text,
                ]);
            }
        }

        // MOSTRAMOS UN MENSAJE QUE EL HOROSCOPO SE A IMPORTADO CORRECTAMENTE
        return response()->json(['message' => 'Horoscop importat correctament']);
    }
}