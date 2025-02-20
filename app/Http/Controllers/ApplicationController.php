<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\CatalogRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Application;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SuccessResponse;

class ApplicationController extends Controller
{
  function id(Application $application)
  {
    $application->full();
    return new SuccessResponse($application);
  }

  function add(ApplicationRequest $request)
  {
    $application = Application::create($request->validated());
    $application->user_id = auth()->user()->id;
    $application->save();
    return new SuccessResponse($application);
  }

  function patch(ApplicationRequest $request, Catalog $application)
  {
    $application->update($request->validated());
    $application->save();
    return new SuccessResponse($application);
  }

  function delete(Application $application)
  {
    $application->delete();
    return new SuccessResponse([]);
  }
}
