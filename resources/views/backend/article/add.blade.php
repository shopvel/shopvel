@extends('master')
@section('title') {{ trans('backend/article.add') }} @endsection
<?php $breadcrumb  = [
    ['href' => URL::to('backend/articles'), 'title' => trans('backend/article.articles')],
    ['href' => URL::to('backend/article/add'), 'title' => trans('backend/article.add')]
]; ?>