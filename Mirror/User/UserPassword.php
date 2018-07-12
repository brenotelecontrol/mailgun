<?php

namespace App\Mirror\User;

class UserPassword
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

    public function post($externalId, $senhaAtual, $senha, $reset = false)
    {
        $json = [
            "externalId" => $externalId,
            "senhaAtual" => $senhaAtual,
            "senha" => $senha
        ];
        if ($reset === true) {
            $json['reset'] = "true";
        }

        $response = $this->client->post("/user/user-password", [
            "json" => $json
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