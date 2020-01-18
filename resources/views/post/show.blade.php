@extends('layouts.app')
    @section('content')
        <show-component :id="{{json_encode($id)}}"></show-component>
    @endsection

