<?php

namespace Mirror\User;

class UserAuth
{
    public $client;

    public $email = $_POST['userName'];
    public $senha = $_POST['userPassword'];

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

    public function post($email, $senha)
    {
        $response = $this->client->post("/user/userAuth", [
            "json" => [
                "email" => $email,
                "senha" => $senha
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
}