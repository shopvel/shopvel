@extends('master')
@section('title') {{ trans('admin/article.add') }} @endsection
<?php $breadcrumb  = [
    ['href' => URL::to('admin/articles'), 'title' => trans('admin/article.articles')],
    ['href' => URL::to('admin/article/add'), 'title' => trans('admin/article.add')]
]; ?>