<x-layout >

    @section('sidebar')
        @include('components.side-bar', ['data' => $data])
    @endsection
    @section('content')
        @include('components.content', ['data' => $data])
    @endsection
</x-layout>
