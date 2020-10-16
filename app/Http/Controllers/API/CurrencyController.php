<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CurrencyController extends Controller
{
    public function getCurrency(Request $request)
    {

        $array = [];
        $arrayCountryCurrency = [
            'AUD' => [
                'img' => 'https://www.countryflags.io/au/flat/64.png'
            ],
            'AZN' => [
                'img' => 'https://www.countryflags.io/az/flat/64.png'
            ],
            'GBP' => [
                'img' => 'https://www.countryflags.io/gb/flat/64.png',
            ],
            'AMD' => [
                'img' => 'https://www.countryflags.io/am/flat/64.png',
            ],
            'BYN' => [
                'img' => 'https://www.countryflags.io/by/flat/64.png',
            ],
            'BGN' => [
                'img' => 'https://www.countryflags.io/bg/flat/64.png',
            ],
            'BRL' => [
                'img' => 'https://www.countryflags.io/br/flat/64.png'
            ],
            'HUF' => [
                'img' => 'https://www.countryflags.io/hu/flat/64.png'
            ],
            'HKD' => [
                'img' => 'https://www.countryflags.io/hk/flat/64.png'
            ],
            'DKK' => [
                'img' => 'https://www.countryflags.io/dk/flat/64.png'
            ],
            'USD' => [
                'img' => 'https://www.countryflags.io/us/flat/64.png'
            ],
            'EUR' => [
                'img' => 'https://www.countryflags.io/eu/flat/64.png'
            ],
            'INR' => [
                'img' => 'https://www.countryflags.io/in/flat/64.png'
            ]
        ];
        $currencies = $this->requestCurrency();
        foreach ($currencies as $currency) {
            if ((isset($arrayCountryCurrency[$currency->CharCode]))) {
                $currency->difference = round($currency->Value - $currency->Previous, 4);
                $merged = array_merge($arrayCountryCurrency[$currency->CharCode], get_object_vars($currency));
                array_push($array, $merged);
            }
        }
        return response()->json($array, 200);
    }
    private function requestCurrency()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.cbr-xml-daily.ru/daily_json.js');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $json = json_decode($output);
        curl_close($ch);
        return get_object_vars($json->Valute);
    }
    public function getCurrencyByCode(Request $request, $currency) {
        $arrayCountryCurrency = [
            $currency => [
                'labels' => [],
                'values' => []
            ],
        ];
        $i = 0;
        
        while($i != 14) {
            $dateMatch = Carbon::now()->subDays($i)->format('Y/m/d');
            $link = $i == 0 ? 'https://www.cbr-xml-daily.ru/daily_json.js' : "https://www.cbr-xml-daily.ru/archive/{$dateMatch}/daily_json.js";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            $json = json_decode($output);
            if(isset($json->code)) {
                $i++;
            } 
            else {
                $currencies = get_object_vars($json->Valute);
                curl_close($ch);
    
                foreach ($currencies as $currency) {
                    if ((isset($arrayCountryCurrency[$currency->CharCode]))) {
                        array_unshift($arrayCountryCurrency[$currency->CharCode]['labels'], $dateMatch );
                        array_unshift($arrayCountryCurrency[$currency->CharCode]['values'], $currency->Value);
                    }
                }
                $i++;
            }
        }
        return response()->json($arrayCountryCurrency, 200);
        return $arrayCountryCurrency;
    }
}
