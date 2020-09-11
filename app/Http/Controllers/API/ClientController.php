<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Save client.
     * @return \Illuminate\Http\JsonResponse
     */
    public function save()
    {
        $email = request()->get('email');
        $client = Client::where('email', '=', $email)->first();

        if (!$client) {

            $client = new Client();
            $client->first_name = request()->get('first_name');
            $client->last_name = request()->get('last_name');
            $client->email = $email;
            $client->password = bcrypt(request()->get('password'));

            $client->save();

            return response()->json($client);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'client already exists'
                ]
            ], 400);
        }
    }

    /**
     * Update client.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id)
    {
        $client = Client::find($id);

        if ($client) {
            $firstName = request()->get('first_name');
            $lastName = request()->get('last_name');
            $password = request()->get('password');

            if ($firstName) {
                $client->first_name = $firstName;
            }

            if ($lastName) {
                $client->last_name = $lastName;
            }

            if ($password) {
                $client->password = bcrypt($password);
            }

            $client->save();

            return response()->json($client);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'client not found'
                ]
            ], 404);
        }
    }

    /**
     * Get clients.
     * @return \Illuminate\Http\JsonResponse
     */
    public function items()
    {
        $items = Client::all();

        return response()->json($items);
    }

    /**
     * Get client
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function item($id)
    {
        $client = Client::find($id);

        if ($client) {
            return response()->json($client);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'client not found'
                ]
            ], 404);
        }
    }

    /**
     * Delete client.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($id)
    {
        $client = Client::find($id);

        if ($client) {
            $client->delete();
            return response()->json([
                'message' => 'remove client successful'
            ]);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'client not found'
                ]
            ], 404);
        }
    }
}
