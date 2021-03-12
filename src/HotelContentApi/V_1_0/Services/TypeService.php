<?php

namespace Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Services;

use GuzzleHttp\Exception\RequestException;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Helpers\BaseHelper;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests\Type\LanguagesRequest;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\Type\LanguagesResponse;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\UnauthorizedResponse;
use Symfony\Component\HttpFoundation\Response;

class TypeService extends BaseService
{
    /**
     * https://developer.hotelbeds.com/documentation/hotels/content-api/api-reference/#operation/languagesUsingGET
     */
    public function languages(LanguagesRequest $request) : LanguagesResponse
    {
        $uri = (
                $this->getProduction() 
                ? 'https://api.hotelbeds.com/hotel-content-api/1.0/types/languages'
                : 'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/languages'
            )
            .'?'
            .http_build_query($request->toArray());

        try {
            $get = $this->getClient()->get(
                $uri,
                [
                    'headers' => array_filter([
                        'Accept' => $request->getAccept(),
                        'Accept-Encoding' => $request->getAcceptEncoding(),
                        'Api-Key' => $request->getApiKey(),
                        'X-Signature' => $request->getXSignature(),
                    ]),
                    'timeout' => self::TIMEOUT,
                ]
            );
            $response = new LanguagesResponse(json_decode($get->getBody(), true));
            $response->setResponseBody($get->getBody());
        } catch (RequestException $e) {
            $response = new LanguagesResponse();

            if ($eResponse = $e->getResponse()) {
                if (
                    in_array($eResponse->getStatusCode(), [
                        Response::HTTP_UNAUTHORIZED,
                        Response::HTTP_FORBIDDEN,
                    ])
                ) {
                    $unauthorizedResponse = new UnauthorizedResponse(json_decode($eResponse->getBody(), true));
                    $response->setError(BaseHelper::UnauthorizedResponseToError($unauthorizedResponse));
                } else {
                    $response = new LanguagesResponse(json_decode($eResponse->getBody(), true));  
                }

                if ($error = $response->getError()) {
                    $error->setCode($eResponse->getStatusCode());
                }
                $response->setResponseBody($eResponse->getBody());
            }
        }

        $response->setRequestUrl($uri);

        return $response;
    }
}
