<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index($email, Request $request)
    {
        $client = new Client();

        try {
            return json_decode(
                $client->get(
                    'http://descontrolada-backend.cblx.com.br/lojas/' . $email . '/produtos',
                    [
                        'query' => $request->query()
                    ]
                )->getBody(),
                true
            );
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

    public function get($email, $id, Request $request)
    {
        $client = new Client();

        try {
            return json_decode(
                $client->get(
                    'http://descontrolada-backend.cblx.com.br/lojas/' . $email . "/produtos" . '/' . $id,
                    [
                        'query' => $request->query()
                    ]
                )->getBody(),
                true
            );
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

    public function create($email, Request $request)
    {
        $client = new Client();

        try {
            return json_decode(
                $client->post(
                    'http://descontrolada-backend.cblx.com.br/lojas/' . $email . '/produtos',
                    [
                        'json' => $request->json()->all(),

                    ]
                )->getBody(),
                true
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($email, $id, Request $request)
    {
        $client = new Client();

        try {
            return json_decode(
                $client->put(
                    'http://descontrolada-backend.cblx.com.br/lojas/' . $email . "/produtos" . '/' . $id,
                    [
                        'json' => $request->json()->all(),
                    ]
                )->getBody(),
                true
            );
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

    public function delete($email, $id, Request $request)
    {
        $client = new Client();

        try {
            return json_decode(
                $client->delete(
                    'http://descontrolada-backend.cblx.com.br/lojas/' . $email . "/produtos" . '/' . $id,
                    [
                        'query' => $request->query()
                    ]
                )->getBody(),
                true
            );
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

}
