@php
    $navItems = [
        ['label' => 'Work', 'route' => 'our-work'],
        ['label' => 'Clients', 'route' => 'clients'],
        ['label' => 'Services', 'route' => 'services'],
        // ['label' => 'Industries', 'route' => 'industries', 'chevron' => true],
        ['label' => 'Industries', 'route' => 'industries'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Blog', 'route' => 'blog'],
    ];

    $logoLightPath = 'images/logo-light.png';
    $logoDarkPath = 'images/logo-dark.png';

    $hasLightLogo = file_exists(public_path($logoLightPath));
    $hasDarkLogo = file_exists(public_path($logoDarkPath));
@endphp

<header id="siteHeader"
    class="fixed inset-x-0 top-0 z-[100] translate-y-0 opacity-100 transition-all duration-700 ease-[cubic-bezier(0.22,1,0.36,1)]">
    <div class="site-shell pt-3 sm:pt-4">
        <div class="header-frame rounded-[28px] px-3 sm:px-5 xl:px-6">
            <div class="flex items-center justify-between gap-3 py-3 sm:py-4 xl:py-5">

                <a href="{{ route('home') }}" class="flex shrink-0 items-center">
                    @if($hasLightLogo || $hasDarkLogo)
                        @if($hasLightLogo)
                            <img src="{{ asset($logoLightPath) }}" alt="Logo"
                                class="h-[42px] sm:h-[48px] lg:h-[56px] w-auto object-contain dark:hidden">
                        @endif

                        @if($hasDarkLogo)
                            <img src="{{ asset($logoDarkPath) }}" alt="Logo"
                                class="hidden h-[42px] sm:h-[48px] lg:h-[56px] w-auto object-contain dark:block">
                        @elseif($hasLightLogo)
                            <img src="{{ asset($logoLightPath) }}" alt="Logo"
                                class="hidden h-[42px] sm:h-[48px] lg:h-[56px] w-auto object-contain brightness-[1.18] contrast-125 dark:block">
                        @endif
                    @else
                        <span class="flex items-center gap-3 sm:gap-4">
                            <span class="block h-[54px] w-[27px] rounded-l-full bg-[#060616] dark:bg-white"></span>
                            <span
                                class="text-[28px] sm:text-[34px] lg:text-[42px] font-semibold leading-none tracking-[-0.07em] text-[#060616] dark:text-white">
                                clay
                            </span>
                        </span>
                    @endif
                </a>

                <div class="hidden xl:flex items-center gap-4 2xl:gap-5">
                    <nav class="flex items-center gap-8 2xl:gap-10">
                        @foreach ($navItems as $item)
                            <a href="{{ route($item['route']) }}"
                                class="header-link {{ request()->routeIs($item['route']) ? 'is-active' : '' }}">
                                <span class="whitespace-nowrap">{{ $item['label'] }}</span>

                                @if(!empty($item['chevron']))
                                    <svg class="ml-2 h-[16px] w-[16px] shrink-0 text-black/35 dark:text-white/45"
                                        viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                        <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </nav>

                    <button type="button" class="theme-toggle js-theme-toggle" aria-label="Toggle dark mode">
                        <svg class="theme-icon-moon h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M21 12.8A9 9 0 1111.2 3c-.1.4-.2.8-.2 1.2A8 8 0 0019 12c0 .3 0 .5-.1.8z"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg class="theme-icon-sun h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8" />
                            <path
                                d="M12 2v2.2M12 19.8V22M4.93 4.93l1.56 1.56M17.51 17.51l1.56 1.56M2 12h2.2M19.8 12H22M4.93 19.07l1.56-1.56M17.51 6.49l1.56-1.56"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </button>

                    <a href="{{ route('contact') }}" class="header-cta">
                        Contact
                    </a>
                </div>

                <div class="flex items-center gap-2 xl:hidden">
                    <button type="button" class="theme-toggle js-theme-toggle !h-[48px] !w-[48px]"
                        aria-label="Toggle dark mode">
                        <svg class="theme-icon-moon h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M21 12.8A9 9 0 1111.2 3c-.1.4-.2.8-.2 1.2A8 8 0 0019 12c0 .3 0 .5-.1.8z"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg class="theme-icon-sun h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8" />
                            <path
                                d="M12 2v2.2M12 19.8V22M4.93 4.93l1.56 1.56M17.51 17.51l1.56 1.56M2 12h2.2M19.8 12H22M4.93 19.07l1.56-1.56M17.51 6.49l1.56-1.56"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </button>

                    <button id="mobileMenuToggle" type="button" aria-label="Open menu" aria-expanded="false"
                        aria-controls="mobileMenuPanel"
                        class="inline-flex h-[48px] w-[48px] items-center justify-center rounded-2xl border-2 border-[#d79a24] bg-transparent text-[#060616] transition-all duration-300 hover:bg-black/5 dark:border-[#e2a93d] dark:text-white dark:hover:bg-white/10">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M4 7H20" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" />
                            <path d="M4 17H20" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
</header>

<div id="mobileMenuPanel" class="pointer-events-none fixed inset-0 z-[120] xl:hidden" aria-hidden="true">
    <div id="mobileMenuBackdrop"
        class="absolute inset-0 bg-[#030611]/50 opacity-0 backdrop-blur-[2px] transition-opacity duration-500"></div>

    <aside id="mobileMenuSheet"
        class="absolute inset-y-0 left-0 flex w-[86%] max-w-[390px] -translate-x-full flex-col overflow-y-auto border-r border-white/10 bg-[radial-gradient(circle_at_top_right,_rgba(84,105,255,0.18),_transparent_28%),linear-gradient(180deg,_#0c1122_0%,_#070b15_100%)] text-white shadow-[0_20px_70px_rgba(0,0,0,0.45)] transition-transform duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]">
        <div class="px-5 pb-4 pt-5 sm:px-6">
            <div class="flex items-center justify-between gap-3">
                <a href="{{ route('home') }}" class="flex items-center">
                    @if($hasDarkLogo)
                        <img src="{{ asset($logoDarkPath) }}" alt="Logo" class="h-[34px] w-auto object-contain">
                    @elseif($hasLightLogo)
                        <img src="{{ asset($logoLightPath) }}" alt="Logo"
                            class="h-[34px] w-auto object-contain brightness-[1.18] contrast-125">
                    @else
                        <span class="block h-[42px] w-[21px] rounded-l-full bg-white"></span>
                    @endif
                </a>

                <div class="flex items-center gap-2">
                    <button type="button"
                        class="theme-toggle js-theme-toggle !h-[42px] !w-[42px] !border-white/10 !bg-white/10 !text-white"
                        aria-label="Toggle dark mode">
                        <svg class="theme-icon-moon h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M21 12.8A9 9 0 1111.2 3c-.1.4-.2.8-.2 1.2A8 8 0 0019 12c0 .3 0 .5-.1.8z"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg class="theme-icon-sun h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8" />
                            <path
                                d="M12 2v2.2M12 19.8V22M4.93 4.93l1.56 1.56M17.51 17.51l1.56 1.56M2 12h2.2M19.8 12H22M4.93 19.07l1.56-1.56M17.51 6.49l1.56-1.56"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </button>

                    <button id="mobileMenuClose" type="button" aria-label="Close menu"
                        class="inline-flex h-[42px] w-[42px] items-center justify-center rounded-full text-white transition hover:bg-white/10">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M6 6L18 18" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" />
                            <path d="M18 6L6 18" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex flex-1 flex-col justify-between px-6 pb-8 pt-6 sm:px-8">
            <div>
                <nav class="space-y-1">
                    @foreach ($navItems as $item)
                        <a href="{{ route($item['route']) }}" class="mobile-nav-link">
                            <span class="mobile-nav-link__label">{{ $item['label'] }}</span>

                            @if(!empty($item['chevron']))
                                <svg class="h-5 w-5 shrink-0 text-white/45" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                    <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @endif
                        </a>
                    @endforeach
                </nav>

                <div class="mt-8">
                    <a href="{{ route('contact') }}" class="mobile-contact-btn">
                        Contact Us
                    </a>
                </div>

                <div class="mt-10 space-y-3">
                    <a href="mailto:hello@nexolioit.com"
                        class="block text-[17px] text-white/95 underline decoration-white/20 underline-offset-[9px]">
                        hello@nexolioit.com
                    </a>
                    <a href="tel:+8801234567890" class="block text-[17px] text-white/90">
                        +880 1234-567890
                    </a>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-3 text-[14px] text-white/70">
                    <a href="#" class="mobile-social-link">LinkedIn</a>
                    <a href="#" class="mobile-social-link">Instagram</a>
                    <a href="#" class="mobile-social-link">Facebook</a>
                    <a href="#" class="mobile-social-link">X</a>
                </div>
            </div>

            <div class="mt-10 flex flex-wrap gap-x-5 gap-y-3 text-[14px] text-white/60">
                <a href="{{ route('privacy') }}"
                    class="underline decoration-white/20 underline-offset-8 transition hover:text-white">Privacy</a>
                <a href="{{ route('terms') }}"
                    class="underline decoration-white/20 underline-offset-8 transition hover:text-white">Terms</a>
                <a href="{{ route('sitemap') }}"
                    class="underline decoration-white/20 underline-offset-8 transition hover:text-white">Sitemap</a>
            </div>
        </div>
    </aside>
</div>