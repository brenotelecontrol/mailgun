<?php

namespace App\Mirror\User;

class EmailExchange
{
    public $client;

    public function __construct() 
    {
        $this->client = new \GuzzleHttp\Client([
            "base_uri" => "https://api2.telecontrol.com.br",
            "headers" => [
                "access-application-key" => USER_KEY,
                "access-env" => USER_ENV,
            ],
            "http_errors" => false
        ]);
    }

    public function get($externalId)
    {
        $response = $this->client->get("/user/email-exchange/" . $externalId);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif (in_array($response->getStatusCode(), array(200, 201))) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar temporariamente indisponível, tente novamente em alguns instantes.", 500);
        }
    }

    public function post($externalId, $newEmail)
    {
        $response = $this->client->post("/user/email-exchange/", [
            "json" => [
                "externalId" => $externalId,
                "emailNovo" => $newEmail
            ]
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif (in_array($response->getStatusCode(), array(200, 201))){
            return $json;
        } else {
            throw new \Exception("O serviço pode estar temporariamente indisponível, tente novamente em alguns instantes");
        }
    }

    public function put($token)
    {
        $response = $this->client->put("/user/email-exchange/", [
            "json" => [
                "token" => $token
            ]
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif (in_array($response->getStatusCode(), array(200, 201))) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar temporariamente indisponível, tente novamente em alguns instantes");
        }
    }
}