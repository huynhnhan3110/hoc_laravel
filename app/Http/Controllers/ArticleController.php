<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Article\ArticleGetRequest;
use App\Http\Requests\Article\ArticleCreateRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Http\Requests\Article\ArticleDeleteRequest;

use App\Models\Article;
use App\Models\Comment;

class ArticleController extends Controller
{
	public function showForm() {
		return view('article.create'); // tim trong thu muc article tim file create
	}
	public function create(ArticleCreateRequest $request) {
		$article = new Article();
		$article->fill($request->all());
		$article->save();

		return redirect()->route('articleListPage');
	}
	
	public function update(ArticleUpdateRequest $request) {
		$article = Article::findOrFail($request->id);
		$article->fill($request->all());
		$article->save();

		return response()->json($request->id);
	}
	public function showEditForm(Request $request, $id) {
		return view(
			
			'article.edit',
			[
				'article' => Article::findOrFail($id)
			]
			
		);
	}
	public function delete(ArticleDeleteRequest $request) {
		$article = Article::findOrFail($request->id);
		$article->delete();
		return response()->json($request->id);
	}
	public function showListPage(Request $request) {
		return view('article.list');
	}
	public function list(Request $request) {
		$key = $request->input('keyword');
		$articles  = Article::where('title', 'like', '%'.$key.'%')
							->paginate(10);
		sleep(1);
        return response()->json($articles);
	}
	public function get(ArticleGetRequest $request, $id) {
		$article = Article::findOrFail($id);
		

		return view(
			'article.detail',
			[
				'article' => $article
			]
			);
	}
}
