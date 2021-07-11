<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Chatwork;
use App\Models\ChatworkSchedule;
use Carbon\Carbon;

class ChatWorkController extends Controller
{
    protected $client;

    public function __construct()
    {
    }

    public function index()
    {
        $setting = Chatwork::firstOrNew([
                'user_id' => \Auth::guard('web')->user()->id
            ]
        );
        $roomIds = $this->getRoomIds($setting->token);

        $schedules = ChatworkSchedule::where('user_id', \Auth::guard('web')->user()->id)->get();
        return view('backend.chatwork.index', [
            'schedules' => $schedules,
            'time_mapping' => $this->getTimeMapping(),
            'roomIds' => $roomIds
        ]);
    }

    public function create()
    {
        return view('backend.chatwork.create', [
            'time_mapping' => $this->getTimeMapping()
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //  ]);
        $data = $request->all();
        $data['user_id'] = \Auth::guard('web')->user()->id;
        ChatworkSchedule::create($data);
     
        return redirect()->route('chatworks.index')
                        ->with('success','Create a new chatwork schedule successfully.');
    }

    public function destroy($chatworkScheduleId)
    {
        try {
            $entity = ChatworkSchedule::find($chatworkScheduleId);
            $entity->delete();

            return redirect()->route('chatworks.index')
                ->with('success', 'A chatwork schedule deleted successfully');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    
        return redirect()->route('chatworks.index')
                        ->with('success', 'Error but color success =))');
    }

    public function setting()
    {
        $setting = Chatwork::firstOrNew([
                'user_id' => \Auth::guard('web')->user()->id
            ]
        );
        return view('backend.chatwork.setting', [
            'setting' => $setting,
            'status' => $this->checkApiToken($setting->token)
        ]);
    }

    public function updateSetting(Request $request)
    {
        $user = Chatwork::updateOrCreate(
            [
                'user_id' => \Auth::guard('web')->user()->id
            ],
            [
                'token' => $request->get('token')
            ]
        );

        return redirect()->route('chatwork.setting.get');
    }

    public function checkApiToken($token)
    {
        $client = $this->_getClientConnect($token);
        try {
            $client->get('me');
        } catch (\Exception $e) {
            $status = false;
            \Log::error($e->getMessage());
        }
        return $status ?? true;
    }

    public function getRoomIds($token)
    {
        $roomIds = [];
        try {
            $values = json_decode(
                $this->_getClientConnect($token)->get('rooms')->getBody()->getContents()
            );
            foreach ($values as $value) {
                $roomIds[] = $value->room_id;
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
        return $roomIds;
    }

    protected function _getClientConnect($token = '')
    {
        return new Client([
            'base_uri' => 'https://api.chatwork.com/v2/',
            'headers' => [
                'X-ChatWorkToken' => $token
            ]
        ]); 
    }

    protected function getTimeMapping()
    {
        return [
            "0" => "00:00 AM",
            "1" => "00:30 AM",
            "2" => "01:00 AM",
            "3" => "01:30 AM",
            "4" => "02:00 AM",
            "5" => "02:30 AM",
            "6" => "03:00 AM",
            "7" => "03:30 AM",
            "8" => "04:00 AM",
            "9" => "04:30 AM",
            "10" => "05:00 AM",
            "11" => "05:30 AM",
            "12" => "06:00 AM",
            "13" => "06:30 AM",
            "14" => "07:00 AM",
            "15" => "07:30 AM",
            "16" => "08:00 AM",
            "17" => "08:30 AM",
            "18" => "09:00 AM",
            "19" => "09:30 AM",
            "20" => "10:00 AM",
            "21" => "10:30 AM",
            "22" => "11:00 AM",
            "23" => "11:30 AM",
            "24" => "12:00 PM",
            "25" => "12:30 PM",
            "26" => "13:00 PM",
            "27" => "13:30 PM",
            "28" => "14:00 PM",
            "29" => "14:30 PM",
            "30" => "15:00 PM",
            "31" => "15:30 PM",
            "32" => "16:00 PM",
            "33" => "16:30 PM",
            "34" => "17:00 PM",
            "35" => "17:30 PM",
            "36" => "18:00 PM",
            "37" => "18:30 PM",
            "38" => "19:00 PM",
            "39" => "19:30 PM",
            "41" => "20:00 PM",
            "42" => "20:30 PM",
            "43" => "21:00 PM",
            "44" => "21:30 PM",
            "45" => "22:00 PM",
            "46" => "22:30 PM",
            "47" => "23:00 PM",
            "48" => "23:30 PM"
        ];
    }
}