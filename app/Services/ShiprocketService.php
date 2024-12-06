<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ShiprocketService
{
    protected $apiUrl;
    protected $email;
    protected $password;
    protected $token;
    protected $client;

    public function __construct()
    {
        $this->apiUrl = config('services.shiprocket.api_url');
        $this->email = config('services.shiprocket.key'); // Moved email to config
        $this->password = config('services.shiprocket.secret'); // Moved password to config
        $this->client = new Client();
        $this->token = $this->authenticate();
    }

    // Authenticate and get an access token
    public function authenticate()
    {
        try {
            $response = $this->client->post($this->apiUrl . '/auth/login', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode([
                    'email' => $this->email,
                    'password' => $this->password
                ])
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            // dd($data);
            return $data['token'] ?? null; // Return token or null if not present

        } catch (RequestException $e) {
            // Handle the error and return null if authentication fails
            return null;
        }
    }

    // Create an order on Shiprocket
    public function createOrder($orderData)
    {

        // dd($this->token);
        try {
            $response = $this->client->post($this->apiUrl . '/orders/create/adhoc', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token, // Using token from the constructor
                ],
                'json' => $orderData
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $e) {
            // Handle the error and return a meaningful response
            return ['error' => $e->getMessage()];
        }
    }

    // Get shipping label or track the order
    public function getTrackingDetails($shipmentId)
    {
        try {
            $response = $this->client->get($this->apiUrl . '/courier/track', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token, // Using token from the constructor
                ],
                'query' => [
                    'shipment_id' => $shipmentId
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $e) {
            // Handle the error and return a meaningful response
            return ['error' => $e->getMessage()];
        }
    }
}
