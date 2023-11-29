<div>
    @unless (Auth::check())
    You are not signed in.
    @endunless
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    <h1>Hello, {{ $users[0]->Name }}</h1>

    @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor
 
@foreach ($users as $user)
    <p>This is user {{ $user->Name }}</p>
@endforeach
 
@forelse ($users as $user)
    <li>{{ $user->Name }}</li>
@empty
    <p>No users</p>
@endforelse
 
@while (false)
    <p>I'm looping forever.</p>
@endwhile

    The current UNIX timestamp is {{ time() }}.
    @if (count($users) === 1)
    I have one active user!
    @elseif (count($users) > 1)
    I have multiple active users!
    @else
    I don't have any active users!
    @endif

    @isset($records)
    // $records is defined and is not null...
    @endisset

    @empty($records)
    // $records is "empty"...
    @endempty

    @auth
    // The user is authenticated...
    @endauth

    @guest
    // The user is not authenticated...
    @endguest

    @production
    // Production specific content...
    @endproduction

    @env('staging')
    // The application is running in "staging"...
    @endenv

    @env(['staging', 'production'])
    // The application is running in "staging" or "production"...
    @endenv
</div>

<div>
@foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif
 
    @if ($loop->last)
        This is the last iteration.
    @endif
 
    <p>This is user {{ $user->Name }}</p>
@endforeach


@foreach ($users as $user)
    @foreach ($users as $post)
        @if ($loop->parent->first)
            This is the first iteration of the parent loop.
        @endif
    @endforeach
@endforeach

@php
    $isActive = false;
    $hasError = true;
@endphp
 
<span @class([
    'p-4',
    'font-bold' => $isActive,
    'text-gray-500' => ! $isActive,
    'bg-red' => $hasError,
])>In span class</span>

@php
    $isActive = true;
@endphp
 
<span @style([
    'background-color: red',
    'font-weight: bold' => $isActive,
])></span>
 
<span style="background-color: red; font-weight: bold;">In span style</span>
 
<span class="p-4 text-gray-500 bg-red"></span>

@includeIf('shared.errors', ['message' => 'Error message here ..', 'isActive' => true])
@includeIf('shared.warning', ['message' => 'Warning message here ..', 'isActive' => true])
@includeIf('shared.success', ['message' => 'Success message here ..', 'isActive' => true])


</div>
@verbatim
<div class="container">
    Hello, {{ $users }}.
</div>
@endverbatim
<script>
    var app = <?php echo json_encode($users); ?>;
</script>