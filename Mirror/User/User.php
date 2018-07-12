<?php

namespace Mirror\User;

class User
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

    public function get($externalId = null, $nick = null, $email = null)
    {

        if ($externalId) {
            $query['externalId'] = $externalId;
        }
        if ($nick) {
            $query['nick'] = $nick;
        }
        if ($email) {
            $query['email'] = $email;
        }

        $response = $this->client->get("/user/user", [
            "query" => $query
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);
        if ($response->getStatusCode() == 404) {
            throw new \Exception("Usuário não encontrado", 404);
        } elseif ($response->getStatusCode() == 400) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 200) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }

    public function post($email, $nome = null, $sobrenome = null, $senha = null, $birthday = null, $birthmonth = null, $birthyear = null)
    {
        $body = [
            "email" => $email
        ];

        if ($nome) {
            $body['nome'] = $nome;
        }
        if ($sobrenome) {
            $body['sobrenome'] = $sobrenome;
        }
        if ($senha) {
            $body['senha'] = $senha;
        }
        if ($birthday) {
            $body['birthday'];
        }
        if ($birthmonth) {
            $body['birthmonth'];
        }
        if ($birthyear) {
            $body['birthyear'];
        }

        $response = $this->client->post("/user/user", [
            "json" => $body
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);
        if ($response->getStatusCode() == 404) {
            throw new \Exception("Usuário não encontrado", 404);
        } elseif ($response->getStatusCode() == 400) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 201) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }

    public function put($externalId, $nome = null, $sobrenome = null, $email = null, $sexo = null, $dataNascimento = null, $pais = null)
    {
        if ($nome) {
            $body['nome'] = $nome;
        }
        if ($sobrenome) {
            $body['sobrenome'] = $sobrenome;
        }
        if ($email) {
            $body['email'] = $email;
        }
        if ($sexo) {
            $body['sexo'] = $sexo;
        }
        if ($dataNascimento) {
            if (strlen($dataNascimento) == 5 || strlen($dataNascimento) == 10) {
                $dataNascimento = explode("/", $dataNascimento);
                $body['aniversarioDia'] = $dataNascimento[0];
                $body['aniversarioMes'] = $dataNascimento[1];
                if (count($dataNascimento) == 3) {
                    $body['aniversarioAno'] = $dataNascimento[2];
                } else {
                    $body['aniversarioAno'] = "";
                }
            } else {
                throw new \Exception("Data em formato inválido");
            }
        }
        if ($pais) {
            $body['pais'] = $pais;
        }

        $response = $this->client->put("/user/user/externalId/" . $externalId, [
            "json" => $body
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if ($response->getStatusCode() == 404) {
            throw new \Exception("Usuário não encontrado", 404);
        } elseif ($response->getStatusCode() == 400) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 200) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }
}