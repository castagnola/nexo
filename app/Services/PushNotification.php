<?php

namespace Nexo\Services;

use Nexo\Contracts\PushNotification as Contract;
use Nexo\Entities\UserDevice;
use Nexo\Entities\UserPush;
use Dmitrovskiy\IonicPush\Exception\BadRequestException;
use Dmitrovskiy\IonicPush\Exception\PermissionDeniedException;
use Dmitrovskiy\IonicPush\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;

class PushNotification implements Contract
{
    /**
     * @param array $data
     * @param array $payload
     */
    public function send(array $data, array $payload = [])
    {

        if (!is_array($data['users'])) {
            $data['users'] = array($data['users']);
        }

        $tokens = [];
        $usersIds = [];

        $notificationId = UserPush::count() + 1;

        foreach ($data['users'] as $userId) {
            $devices = UserDevice::where('user_id', $userId)->get();


            if (!$devices->isEmpty()) {
                foreach ($devices as $device) {
                    $tokens[] = $device->token;
                }

                $usersIds[] = $userId;
            }
        }

        if (!empty($tokens)) {

            $encodedApiSecret = base64_encode(config('nexo.ionicKey') . ':');;
            $authorization = sprintf("Basic %s", $encodedApiSecret);

            $headers = array(
                'Authorization' => $authorization,
                'Content-Type' => 'application/json',
                'X-Ionic-Application-Id' => config('nexo.ionicID')
            );

            $notification = [
                'title' => $data['title'],
                'alert' => $data['alert'],
                "priority" => 1,
                'android' => [
                    'notId' => $notificationId,
                    'payload' => $payload,
                    'title' => $data['title'],
                    'message' => $data['alert'],
                    "style" => "inbox",
                    "summaryText" => "Tienes %n% notificaciones.",
                    "icon" => "icon"
                ],
                'ios' => [
                    'notId' => $notificationId,
                    'payload' => $payload,
                    'title' => $data['title'],
                    'message' => $data['alert'],
                ],
            ];

          // dd($notification);


            $body = json_encode(array(
                'tokens' => $tokens,
                'notification' => $notification,
                'production' => true
            ));


            $request = new Request(
                'POST',
                'https://push.ionic.io/api/v1/push',
                $headers,
                $body
            );

            $client = new Client();

            try {
                $response = $client->send($request);

                $responseDecoded = json_decode($response->getBody());

                foreach ($usersIds as $userId) {
                    UserPush::create([
                        'user_id' => $userId,
                        'push_id' => $responseDecoded->message_id
                    ]);
                }
            } catch (ClientException $e) {

            } catch (\Exception $e) {

            }

        }
    }
}