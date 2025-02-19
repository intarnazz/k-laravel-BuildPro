<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SuccessResponse;

class CommentController extends Controller
{
  function id(Comment $comment)
  {
    $comment->full();
    return new SuccessResponse($comment);
  }

  function add(CommentRequest $request)
  {
    $comment = Comment::create($request->validated());
    $comment->user_id = auth()->user()->id;
    $comment->save();
    return new SuccessResponse($comment);
  }

  function patch(CommentRequest $request, Catalog $comment)
  {
    $comment->update($request->validated());
    $comment->save();
    return new SuccessResponse($comment);
  }

  function delete(Comment $comment)
  {
    $comment->delete();
    return new SuccessResponse([]);
  }
}
