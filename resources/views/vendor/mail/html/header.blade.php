<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
           <!-- <h1 class="logo me-auto"><a href="/"><span>PF </span>Solution</a></h1> -->
            <!-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> -->
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>