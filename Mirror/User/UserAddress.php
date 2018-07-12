<?php

namespace App\Mirror\User;

class UserAddress
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
        $response = $this->client->get("/user/user-address/externalId/" . $externalId);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 200 || $response->getStatusCode() == 201) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }

    public function post($externalId, $tipoEndereco, $tipoEnderecoComplmento = "", $estado, $cidade, $endereco, $numero, $enderecoPrincipal, $bairro = null, $complemento = null, $caixaPostal = null, $cep = null, $distrito = null)
    {

        $params['externalId'] = $externalId;
        $params['tipoEndereco'] = $tipoEndereco;
        $params['tipoEnderecoComplmento'] = $tipoEnderecoComplmento;
        $params['estado'] = $estado;
        $params['ibgeCidade'] = $cidade;
        $params['endereco'] = $endereco;
        $params['numero'] = $numero;
        $params['principal'] = $enderecoPrincipal;
        $params['bairro'] = $bairro;
        $params['complemento'] = $complemento;
        $params['caixaPostal'] = $caixaPostal;
        $params['cep'] = $cep;
        $params['distrito'] = $distrito;


        $response = $this->client->post("/user/user-address", [
            "json" => $params
        ]);

        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 200 || $response->getStatusCode() == 201) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }

    public function delete($externalId, $addressId)
    {
        $response = $this->client->delete("/user/user-address/externalId/" . $externalId . "/addressId/" . $addressId);
        $json = $response->getBody()->getContents();
        $json = json_decode($json, true);

        if (in_array($response->getStatusCode(), array(400, 404))) {
            throw new \Exception($json['exception']);
        } elseif ($response->getStatusCode() == 200 || $response->getStatusCode() == 201) {
            return $json;
        } else {
            throw new \Exception("O serviço pode estar indisponível no momento, tente novamente em alguns instântes");
        }
    }
}