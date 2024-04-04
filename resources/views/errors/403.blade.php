<x-layout :error="true">
    <section class="ct-error">
        <h1>{{ $exception->getStatusCode() }} | {{ $exception->getMessage() }}</h1>
    </section>
</x-layout>