<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ArticleResource;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\JsonResponse;
use App\Services\ArticleService;
use App\Models\Article\Article;
use Illuminate\Http\Request;
use Exception;

class ArticleController extends BaseController
{
    public function __construct(private readonly ArticleService $articleService)
    {}

    /**
     * @OA\Get(
     *     path="api/v1/articles",
     *     summary="Retrive a listing of the Articles",
     *     tags={"Articles"},
     *     @OA\Parameter(name="Authorization", required=true, in="header",
     *          @OA\Schema(type="string", example="Bearer epl5d5olRkge9DK60acfBrrFIHufNeVIXngSWJ7ReCNkr11I6WL")
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(property="code", example=200),
     *             @OA\Property(property="message", example="OK"),
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(ref="#/components/schemas/Article")
     *             )
     *         )
     *     )
     * )
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return $this->sendResponse(ArticleResource::collection($request->user()->articles));
    }

    /**
     * @OA\Get(
     *      path="api/v1/articles/{uuid}",
     *      tags={"Articles"},
     *      summary="Get an existing Article",
     *      @OA\Parameter(
     *          name="uuid",
     *          description="Article uuid",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *              example="389ffffe-b89c-47b6-bc63-cf5fd2a88218"
     *          )
     *      ),
     *      @OA\Parameter(name="Authorization", required=true, in="header",
     *          @OA\Schema(type="string", example="Bearer epl5d5olRkge9DK60acfBrrFIHufNeVIXngSWJ7ReCNkr11I6WL")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(property="code", example=200),
     *              @OA\Property(property="message", example="OK"),
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(ref="#/components/schemas/Article")
     *              )
     *          )
     *      )
     * )
     *
     * @param Article $article
     * @return JsonResponse
     */
    public function show(Article $article): JsonResponse
    {
        return $this->sendResponse(new ArticleResource($article));
    }

    /**
     * @OA\Post(
     *      path="api/v1/articles",
     *      tags={"Articles"},
     *      summary="Store new Article",
     *      @OA\Parameter(name="Authorization", required=true, in="header",
     *          @OA\Schema(type="string", example="Bearer epl5d5olRkge9DK60acfBrrFIHufNeVIXngSWJ7ReCNkr11I6WL")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreArticleRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(property="code", example=201),
     *             @OA\Property(property="message", example="OK"),
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(ref="#/components/schemas/Article")
     *             )
     *         )
     *       )
     * )
     *
     * @param StoreArticleRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreArticleRequest $request): JsonResponse
    {
        try {
            $article = $this->articleService->createArticle($request->validated());

            return $this->sendResponse(new ArticleResource($article), 'OK', 201);
        } catch (Exception $exception) {
            return $this->sendResponse([], $exception->getMessage(), 500);
        }
    }

    /**
     * @OA\Delete(
     *      path="api/v1/articles/{uuid}",
     *      tags={"Articles"},
     *      summary="Delete existing Article",
     *      @OA\Parameter(
     *          name="uuid",
     *          description="Article uuid",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *              example="389ffffe-b89c-47b6-bc63-cf5fd2a88218"
     *          )
     *      ),
     *      @OA\Parameter(name="Authorization", required=true, in="header",
     *          @OA\Schema(type="string", example="Bearer epl5d5olRkge9DK60acfBrrFIHufNeVIXngSWJ7ReCNkr11I6WL")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(property="code", example=204),
     *             @OA\Property(property="message", example="OK"),
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(ref="#/components/schemas/Article")
     *             )
     *         )
     *       )
     * )
     */
    public function destroy(Article $article): JsonResponse
    {
        try {
            $article = $this->articleService->deleteArticle($article);

            return $this->sendResponse(new ArticleResource($article), 'OK', 204);
        } catch (Exception $exception) {
            return $this->sendResponse([], $exception->getMessage(), 500);
        }
    }
}
