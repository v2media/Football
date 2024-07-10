<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api-football-v1.p.rapidapi.com/v3/',
        ]);
    }

    public function crawlFixtures($date)
    {
        $response = $this->client->request('GET', 'fixtures', [
            'headers' => [
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
                'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
                'Accept'        => 'application/json',
            ],
            'query' => [
                'date' => $date,
                'timezone' => 'Asia/Ho_Chi_Minh'
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function crawlLiveFixtures()
    {
        $response = $this->client->request('GET', 'fixtures', [
            'headers' => [
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
                'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
                'Accept'        => 'application/json',
            ],
            'query' => [
                'live' => 'all',
                'timezone' => 'Asia/Ho_Chi_Minh'
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function crawlTeams($league, $season)
    {
        $response = $this->client->request('GET', 'teams', [
            'headers' => [
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
                'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
                'Accept'        => 'application/json',
            ],
            'query' => [
                'league' => $league,
                'season' => $season,
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function crawlLeagues()
    {
        $response = $this->client->request('GET', 'leagues', [
            'headers' => [
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
                'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
                'Accept'        => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function crawlCountries()
    {
        $response = $this->client->request('GET', 'countries', [
            'headers' => [
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
                'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
                'Accept'        => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function crawlTeamsCountries()
    {
        $response = $this->client->request('GET', 'teams/countries', [
            'headers' => [
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
                'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
                'Accept'        => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function crawlSeasons()
    {
        $response = $this->client->request('GET', 'leagues/seasons', [
            'headers' => [
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
                'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
                'Accept'        => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function crawlPlayersByLeague($league, $season, $page)
    {
        $response = $this->client->request('GET', 'players', [
            'headers' => [
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
                'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
                'Accept'        => 'application/json',
            ],
            'query' => [
                'league' => $league,
                'season' => $season,
                'page'   => $page
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }
}
