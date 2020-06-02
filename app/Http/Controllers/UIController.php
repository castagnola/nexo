<?php

namespace Nexo\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime, DateInterval, DatePeriod;

/**
 * Class UIController
 * @package Nexo\Http\Controllers
 */
class UIController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function adminTemplate(Request $request)
    {
        $name = $request->get('name');
        return view("templates/admin/" . $name);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function clientTemplate(Request $request)
    {
        $name = $request->get('name');
        return view("templates/client/" . $name);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function customerTemplate(Request $request)
    {
        $name = $request->get('name');
        return view("templates/customer/" . $name);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getCommonTemplate(Request $request)
    {
        $name = $request->get('name');
        return view("templates/common/" . $name);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getView(Request $request)
    {
        $name = $request->get('name');
        return view($name);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTimeline(Request $request)
    {
        $begin = new Carbon($request->get('begin'));
        $end = new Carbon($request->get('end'));

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        $return = [
            'days' => [],
            'hours' => [],
            'half' => []
        ];

        foreach ($period as $dt) {
            $return['days'][] = $dt->format('Y-m-d');

            $hourBegin = clone $dt;
            $hourEnd = clone $dt;

            $hourInterval = DateInterval::createFromDateString('1 hour');
            $hourPeriod = new DatePeriod($hourBegin->hour(7), $hourInterval, $hourEnd->hour(23)->addHour());

            foreach ($hourPeriod as $hdt) {
                $return['hours'][] = $hdt->format(DATE_ISO8601);
                $return['half'][] = $hdt->format(DATE_ISO8601);
                $return['half'][] = $hdt->minute(30)->format(DATE_ISO8601);
            }

        }

        return response()->json($return);
    }


    public function getTemplate(Request $request)
    {
        // Languages
        $name = $request->get('name');
        return view("templates/" . $name);
    }
}
