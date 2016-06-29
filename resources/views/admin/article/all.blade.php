@extends('master')
@section('title') {{ trans('admin/article.articles') }} @endsection
<?php $breadcrumb  = [['href' => URL::to('admin/articles'), 'title' => trans('admin/article.articles')]]; ?>