<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SuccessResponse;

class CatalogController extends Controller
{
  function get(Request $request)
  {
    $ids = $request->header('ids', '');
    $count = Catalog::count();
    $idsArray = $ids ? explode(',', $ids) : range(1, $count);
    $skip = $request->header('skip', 0);
    $take = $request->header('take', 6);
    $direction = $request->header('direction', 'desc');
    $order = $request->header('order', 'views');
    $response_id = $request->header('responseId', 1);
//        $price = $request->header('price', '');
    $type = $request->header('type', '');
    $types = $type ? [$type] : Catalog::select('type')->distinct()->pluck('type')->toArray();
//        $prices = $price ? [$price] : Catalog::select('price')->distinct()->pluck('price')->toArray();
    $catalogs = Catalog::with(['image'])
      ->whereIn('type', $types)
      ->whereIn('id', $idsArray)
      ->orderBy($order, $direction)
      ->skip($skip)
      ->take($take)
      ->get();
    return response([
      'success' => true,
      'massage' => 'Success',
      'data' => $catalogs,
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
    $count = Catalog::count();
    $idsArray = $ids ? explode(',', $ids) : range(1, $count);
    $skip = $request->header('skip', 0);
    $take = $request->header('take', 30);
    $response_id = $request->header('responseId', 1);
    $catalogs = Catalog::with(['image'])
      ->where('name', 'like', '%' . $search . '%')
      ->skip($skip)
      ->take($take)
      ->get();
    return response([
      'success' => true,
      'massage' => 'Success',
      'data' => $catalogs,
      'response_id' => $response_id,
      "pagingInfo" => [
        "limit" => $skip + $take,
        "offset" => +$skip,
        "totalCount" => count($idsArray),]], 200
    );
  }

  function id(Catalog $catalog)
  {
    $catalog->full();
    return new SuccessResponse($catalog);
  }

  function add(CatalogRequest $request)
  {
    $catalog = Catalog::create($request->validated());
    $catalog->save();
    return new SuccessResponse($catalog);
  }

  function patch(CatalogRequest $request, Catalog $catalog)
  {
    $catalog->update($request->validated());
    $catalog->save();
    return new SuccessResponse($catalog);
  }

  function delete(Catalog $catalog)
  {
    $catalog->delete();
    return new SuccessResponse([]);
  }
}
