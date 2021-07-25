<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ChatworkSchedule;
use App\Models\Chatwork;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;

class ChatworkSchedules extends Command
{
    protected $signature = 'chatwork-schdule:run';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // caclute time number
        $nowUtc = Carbon::now(); // UTC
        $nowVn = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');

        $currentHour = $nowVn->hour;
        $currentMinute = $nowVn->minute;
        $timeNumber = $currentHour * 2;

        if ($currentMinute > 29) {
            $timeNumber += 1;
        }

        $schedules = ChatworkSchedule::where('time_number', $timeNumber)->get();
        foreach ($schedules as $schedule) {
            $chatwork = Chatwork::find($schedule->user_id);
            if (empty($chatwork)) {
                continue;
            }
            $this->_sendMessageToChatwork($chatwork->token, $schedule->group_id, $schedule->message);
        }
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

    protected function _sendMessageToChatwork($token, $groupId, $message)
    {
        try {
            $this->_getClientConnect($token)->post("rooms/{$groupId}/messages", [
                'form_params' => [
                    'body' => $message
                ],
            ]);
        } catch (\Exception $e) {
            dd($e);
            \Log::error($e->getMessage());
        }
    }
}
