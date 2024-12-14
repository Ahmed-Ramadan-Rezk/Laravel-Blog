<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('posts.index') }}">
                <i class="bi bi-collection"></i>
                <span>Posts</span>
            </a>
        </li><!-- End Posts Page Nav -->

        @can('admin', App\Models\Tag::class)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('tags.index') }}">
                <i class="bi bi-tags"></i>
                <span>Tags</span>
            </a>
        </li><!-- End Tags Page Nav -->
        @endcan

        @can('admin', App\Models\User::class)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('users.index') }}">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li><!-- End Users Page Nav -->
        @endcan

        @can('admin', App\Models\Message::class)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('messages') }}">
                <i class="bi bi-inbox"></i>
                <span>Messages</span>
            </a>
        </li><!-- End Users Page Nav -->
        @endcan

        @can('admin', App\Models\Setting::class)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('settings.edit') }}">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li><!-- End Users Page Nav -->
        @endcan

        <li class="nav-heading">Site</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('home') }}">
                <i class="bi bi-arrow-up-right-square"></i>
                <span>View Site</span>
            </a>
        </li><!-- End Users Page Nav -->

    </ul>
</aside><!-- End Sidebar-->