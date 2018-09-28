<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'count' => $this->count(),
            'data' => $this->collection,
        ];
    }

    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true);
        $data = $jsonResponse['data'];
        $links = $jsonResponse['links'];
        unset($jsonResponse['meta'],$jsonResponse['data'],$jsonResponse['links']);
        $jsonResponse['results'] = $data;
        $jsonResponse['links']=$links;
        $response->setContent(json_encode($jsonResponse));
    }
}
