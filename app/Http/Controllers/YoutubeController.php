<?php

namespace App\Http\Controllers;

use App\Services\YoutubeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class YoutubeController extends Controller
{
    /**
     * @var YoutubeService
     */
    private YoutubeService $youtubeService;

    /**
     * YoutubeController constructor.
     * @param YoutubeService $youtubeService
     */
    public function __construct(
        YoutubeService $youtubeService
    )
    {
        $this->youtubeService = $youtubeService;
    }

    /**
     * Return json with Youtube vídeo data
     * @param Request $request
     * @return JsonResponse
     */
    public function getYoutubeVideos(Request $request): JsonResponse
    {
        $query = $request->get('search');
        if(empty($query)) {
            return response()->json(['message' => 'Termo de busca está vazio'],400);
        }

        $arr = $this->youtubeService->search($query);

        return response()->json($arr,200);
    }
}
