@php
    $footerMenuLeft = [
        ['label' => 'Work', 'route' => 'our-work'],
        ['label' => 'Services', 'route' => 'services'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Contact', 'route' => 'contact'],
    ];

    $footerMenuRight = [
        ['label' => 'Clients', 'route' => 'clients'],
        ['label' => 'Industries', 'route' => 'industries'],
        ['label' => 'Blog', 'route' => 'blog'],
    ];
@endphp

<footer class="footer-premium-section">
    <div class="site-shell !max-w-none !px-0">
        <div class="footer-premium">
            <div class="footer-premium__bg footer-premium__bg--one">
                <img src="{{ asset('/images/service/img2.webp') }}" alt="" class="footer-premium__bg-image">
            </div>

            <div class="footer-premium__overlay"></div>

            <div class="footer-premium__inner">
                <div class="footer-premium__top">
                    <div class="footer-premium__intro">
                        <h2 class="footer-premium__title">Let’s Talk</h2>

                        <div class="footer-premium__contact">
                            <a href="mailto:nexolioit@gmail.com" class="footer-premium__contact-link">
                                nexolioit@gmail.com
                            </a>
                            <a href="tel:+8801978675507" class="footer-premium__contact-link">
                                +880 1978675507
                            </a>
                        </div>
                    </div>

                    <div class="footer-premium__menus">
                        <nav class="footer-premium__menu-col">
                            @foreach ($footerMenuLeft as $item)
                                <a href="{{ route($item['route']) }}" class="footer-premium__menu-link">
                                    {{ $item['label'] }}
                                </a>
                            @endforeach
                        </nav>

                        <nav class="footer-premium__menu-col">
                            @foreach ($footerMenuRight as $item)
                                <a href="{{ route($item['route']) }}" class="footer-premium__menu-link">
                                    {{ $item['label'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>

                <div class="footer-premium__bottom">
                    <div class="footer-premium__socials">
                        <a href="{{ route('home') }}" class="footer-premium__social" aria-label="Home">
                            <i class="fa-solid fa-house"></i>
                        </a>

                        <a href="https://www.linkedin.com/company/nexolioit/" target="_blank" rel="noopener noreferrer"
                            class="footer-premium__social" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>

                        <a href="https://www.facebook.com/thendybits/" target="_blank" rel="noopener noreferrer"
                            class="footer-premium__social" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </div>

                    <div class="footer-premium__legal">
                        <span class="footer-premium__copyright">© 2022–2026 Nexolio IT</span>

                        <div class="footer-premium__legal-links">
                            <a href="{{ route('privacy') }}" class="footer-premium__legal-link">Privacy</a>
                            <a href="{{ route('terms') }}" class="footer-premium__legal-link">Terms</a>
                            <a href="{{ route('sitemap') }}" class="footer-premium__legal-link">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>