@extends('master')
@section('title') {{ trans('backend/article.articles') }} @endsection
<?php $breadcrumb  = [['href' => URL::to('backend/articles'), 'title' => trans('backend/article.articles')]]; ?>