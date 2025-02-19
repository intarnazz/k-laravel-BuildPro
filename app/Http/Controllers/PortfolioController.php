<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SuccessResponse;

class PortfolioController extends Controller
{
  function get(Request $request)
  {
    $ids = $request->header('ids', '');
    $count = Portfolio::count();
    $idsArray = $ids ? explode(',', $ids) : range(1, $count);
    $skip = $request->header('skip', 0);
    $take = $request->header('take', 6);
    $direction = $request->header('direction', 'desc');
    $order = $request->header('order', 'views');
    $response_id = $request->header('responseId', 1);
    $type = $request->header('type', '');
    $types = $type ? [$type] : Catalog::select('type')->distinct()->pluck('type')->toArray();
    $portfolio = Portfolio::with(['image'])
      ->whereIn('type', $types)
      ->whereIn('id', $idsArray)
      ->orderBy($order, $direction)
      ->skip($skip)
      ->take($take)
      ->get();
    return response([
      'success' => true,
      'massage' => 'Success',
      'data' => $portfolio,
      'response_id' => $response_id,
      "pagingInfo" => [
        "limit" => $skip + $take,
        "offset" => +$skip,
        "totalCount" => count($idsArray),]], 200
    );
  }

  function search(Request $request)
  {
    $search = $request->header('search', '');
    $ids = $request->header('ids', '');
    $count = Portfolio::count();
    $idsArray = $ids ? explode(',', $ids) : range(1, $count);
    $skip = $request->header('skip', 0);
    $take = $request->header('take', 30);
    $response_id = $request->header('responseId', 1);
    $portfolio = Portfolio::with(['image'])
      ->where('name', 'like', '%' . $search . '%')
      ->skip($skip)
      ->take($take)
      ->get();
    return response([
      'success' => true,
      'massage' => 'Success',
      'data' => $portfolio,
      'response_id' => $response_id,
      "pagingInfo" => [
        "limit" => $skip + $take,
        "offset" => +$skip,
        "totalCount" => count($idsArray),]], 200
    );
  }

  function id(Portfolio $portfolio)
  {
    $portfolio->full();
    return new SuccessResponse($portfolio);
  }

//  function add(PortfolioRequest $request)
//  {
//    $portfolio = Portfolio::create($request->validated());
//    $portfolio->save();
//    return new SuccessResponse($portfolio);
//  }
//
//  function patch(PortfolioRequest $request, Catalog $portfolio)
//  {
//    $portfolio->update($request->validated());
//    $portfolio->save();
//    return new SuccessResponse($portfolio);
//  }
//
//  function delete(Portfolio $portfolio)
//  {
//    $portfolio->delete();
//    return new SuccessResponse([]);
//  }
}
