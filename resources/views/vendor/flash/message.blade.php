@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert
                    alert-{{ $message['level'] }}
                    {{ 'alert-important' }}"
                    role="alert"
        >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
