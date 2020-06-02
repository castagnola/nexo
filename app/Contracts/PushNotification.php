<?php

namespace Nexo\Contracts;

interface PushNotification
{
    public function send(array $data, array $payload = []);
}