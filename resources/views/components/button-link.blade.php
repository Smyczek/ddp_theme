<a href="{{ esc_url( $url ) }}" {{ $attributes->merge(['class' => $type]) }}>{!! $message ?? $slot !!}</a>
