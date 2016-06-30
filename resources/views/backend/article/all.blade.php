@extends('master')
@section('title') {{ trans('backend/article.articles') }} @endsection
<?php $breadcrumb  = [['href' => URL::to('backend/article'), 'title' => trans('backend/article.articles')]]; ?>