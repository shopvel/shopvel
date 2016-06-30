@extends('master')
@section('title') {{ trans('backend/article.add') }} @endsection
<?php $breadcrumb  = [
    ['href' => URL::to('backend/c/article'), 'title' => trans('backend/article.articles')],
    ['href' => URL::to('backend/c/article/a/add'), 'title' => trans('backend/article.add')]
]; ?>