<?php

namespace App\Mirror\User;

class Intl8
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

    public function get($code)
    {
        $response = $this->client->get("/user/lang/codigo/" . $code);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif (in_array($response->getStatusCode(), array(200, 201))) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar temporariamente indisponível, tente novamente em alguns instantes", 500);
        }
    }

    public function post($code, $sentence, $translation)
    {
        $response = $this->client->post("/user/lang", [
            "json" => [
                "codigo" => $code,
                "sentenca" => $sentenca,
                "traducao" => $translation
            ]
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif (in_array($response->getStatusCode(), array(200, 201))) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar temporariamente indisponível, tente novamente em alguns instantes", 500);
        }
    }

    public function put($code, $token, $translation)
    {
        $response = $this->client->put("/user/lang", [
            "json" => [
                "codigo" => $code,
                "token" => $token,
                "traducao" => $translation
            ]
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif (in_array($response->getStatusCode(), array(200, 201))) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar temporariamente indisponível, tente novamente em alguns instante", 500);
        }
    }
}