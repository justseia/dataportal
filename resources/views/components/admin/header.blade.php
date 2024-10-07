<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Включить темный режим">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Включить светлый режим">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7">
                        </path>
                    </svg>
                </a>
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                            </path>
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                        </svg>
                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card" style="width: 450px;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Уведомление</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                                @foreach (range(1, 3) as $notification)
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="status-dot status-dot-animated bg-red d-block"></span>
                                            </div>
                                            <div class="col text-truncate">
                                                <a href="#" class="text-body d-block">Факт {{ $notification }}</a>
                                                <div class="d-block text-secondary text-truncate mt-n1">
                                                    Сейтмурат Калмурат красавчик
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm bg-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-shield">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h2"/>
                            <path d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z"/>
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                        </svg>
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->first_name }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <form action="{{ route('admin.auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Выйти</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Route::is('admin.dashboard.*') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Главный
                            </span>
                        </a>
                    </li>
                    @can(\App\Enums\AdminPermissions::CLIENT_GET)
                        <li class="nav-item {{ Route::is('admin.clients.*') ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('admin.clients.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-square-rounded">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z"/>
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"/>
                                        <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05"/>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Пользователи
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can(\App\Enums\AdminPermissions::NEWS_GET)
                        <li class="nav-item {{ Route::is('admin.news.*') ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('admin.news.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-news">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"/>
                                        <path d="M8 8l4 0"/>
                                        <path d="M8 12l4 0"/>
                                        <path d="M8 16l4 0"/>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Публикации
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can(\App\Enums\AdminPermissions::REPORT_GET)
                        <li class="nav-item {{ Route::is('admin.reports.*') ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('admin.reports.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-news">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"/>
                                        <path d="M8 8l4 0"/>
                                        <path d="M8 12l4 0"/>
                                        <path d="M8 16l4 0"/>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Отчеты
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can(\App\Enums\AdminPermissions::DATABASE_GET)
                        <li class="nav-item {{ Route::is('admin.datasets.*') ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('admin.datasets.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-database">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0"/>
                                        <path d="M4 6v6a8 3 0 0 0 16 0v-6"/>
                                        <path d="M4 12v6a8 3 0 0 0 16 0v-6"/>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Данные
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can(\App\Enums\AdminPermissions::ADMIN_GET)
                        <li class="nav-item {{ Route::is('admin.admins.*') ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('admin.admins.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                        <path d="M16 19h6"/>
                                        <path d="M19 16v6"/>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"/>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Админ
                                </span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</header>
