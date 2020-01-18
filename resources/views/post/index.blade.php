@extends('layouts.app')
    @section('content')
        <post-component :login="{{$login}}"></post-component>
    @endsection
<script>
    let url = 'http://blog/api/posts';
    fetch(url)

        .then(response => response.text())

        .then(data => {
            console.log(data)
        })

        .catch(error => console.error(error))
</script>


