<?php

namespace App\Mirror\User;

class PasswordRecovery
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

    public function get($token)
    {
        $response = $this->client->get("/user/password-recovery", [
            "query" => [
                "token" => $token,
            ]
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 200) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }


    public function post($email)
    {
        $response = $this->client->post("/user/password-recovery", [
            "json" => [
                "email" => $email,
            ]
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 200) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }

    public function put($token, $senha)
    {
        $response = $this->client->put("/user/password-recovery", [
            "json" => [
                "token" => $token,
                "senha" => $senha,
            ]
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 201) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }
}