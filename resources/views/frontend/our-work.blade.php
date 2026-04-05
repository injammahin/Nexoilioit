@extends('layouts.app')

@section('content')
    @php
        $projects = [
            [
                'title' => 'TiktokSlang',
                'description' => 'TiktokSlang is a futures trending leads website  where anyone can find the trending viral topic.',
                'images' => [
                    '/images/work/tiktok5.webp',
                    '/images/work/tiktok1.webp',
                    '/images/work/tiktok2.webp',
                    '/images/work/tiktok3.webp',
                    '/images/work/tiktok4.webp',
                ],
            ],
            [
                'title' => 'E-commerce',
                'description' => 'A branded website experience with elegant presentation, product emphasis, and refined visuals.',
                'images' => [
                    '/images/work/keshoriya1.webp',
                    '/images/work/keshoriya2.webp',
                    '/images/work/keshoriya3.webp',
                    '/images/work/keshoriya4.webp',
                    '/images/work/keshoriya5.webp',
                ],
            ],
            [
                'title' => 'VYU LMS',
                'description' => 'A modern learning platform built around course access, student usability, and clean navigation.',
                'images' => [
                    '/images/work/lms_1.webp',
                    '/images/work/lms_2.webp',
                    '/images/work/lms_3.webp',
                    '/images/work/lms_4.webp',
                    '/images/work/lms_5.webp',
                ],
            ],
            [
                'title' => 'UCM Services',
                'description' => 'A service-oriented company website with strong content structure and clean presentation.',
                'images' => [
                    '/images/work/UCM-1.webp',
                    '/images/work/UCM-2.webp',
                    '/images/work/UCM-3.webp',
                    '/images/work/UCM-4.webp',
                    '/images/work/UCM-5.webp',
                ],
            ],
            [
                'title' => 'Fluidstream',
                'description' => 'A premium company presentation website with smooth layout and modern interface language.',
                'images' => [
                    '/images/work/fluidstream-1.webp',
                    '/images/work/fluidstream-2.webp',
                    '/images/work/fluidstream-3.webp',
                    '/images/work/fluidstream-5.webp',
                    '/images/work/fluidstream-4.webp',
                ],
            ],
        ];

        $tinyPlaceholder = 'data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=';
    @endphp

    <section class="work-archive-page">
        <div class="work-archive-page__glow work-archive-page__glow--one"></div>
        <div class="work-archive-page__glow work-archive-page__glow--two"></div>

        <div class="site-shell">
            <section class="work-archive-hero">
                <p class="work-archive-hero__eyebrow">Portfolio</p>
                <h1 class="work-archive-hero__title">Selected Work</h1>
                <p class="work-archive-hero__subtitle">
                    A premium collection of websites, products, business systems, and digital platforms built by Nexolio IT.
                </p>
            </section>

            <section class="work-archive-grid js-work-archive-grid">
                @foreach ($projects as $index => $project)
                    <article
                        class="work-archive-card js-work-archive-card {{ $index < 6 ? 'is-visible' : 'work-archive-card--queued' }}"
                        data-index="{{ $index }}">
                        <div class="work-archive-card__media">
                            <div class="work-project-slider js-work-project-slider"
                                data-gallery='@json(array_map(fn($image) => asset($image), $project["images"]))'>
                                <div class="work-project-slider__track js-work-project-track">
                                    @foreach ($project['images'] as $dotIndex => $image)
                                        <div class="work-project-slider__slide">
                                            <img @if ($index === 0 && $dotIndex === 0) src="{{ asset($image) }}" data-loaded="1"
                                            loading="eager" fetchpriority="high" @else src="{{ $tinyPlaceholder }}"
                                                data-src="{{ asset($image) }}" loading="lazy" @endif alt="{{ $project['title'] }}"
                                                class="work-project-slider__image js-work-project-image" width="1600" height="900"
                                                decoding="async">
                                        </div>
                                    @endforeach
                                </div>

                                <button type="button"
                                    class="work-project-slider__nav work-project-slider__nav--prev js-work-project-prev"
                                    aria-label="Previous image">
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M15 6L9 12L15 18" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>

                                <button type="button"
                                    class="work-project-slider__nav work-project-slider__nav--next js-work-project-next"
                                    aria-label="Next image">
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>

                                <button type="button" class="work-project-slider__expand js-work-project-expand"
                                    aria-label="Open fullscreen gallery">
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M9 4H4V9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 4H20V9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M9 20H4V15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 20H20V15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>

                                <div class="work-project-slider__dots">
                                    @foreach ($project['images'] as $dotIndex => $image)
                                        <button type="button"
                                            class="work-project-slider__dot js-work-project-dot {{ $dotIndex === 0 ? 'is-active' : '' }}"
                                            data-slide="{{ $dotIndex }}" aria-label="Go to image {{ $dotIndex + 1 }}"></button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="work-archive-card__body">
                            <h2 class="work-archive-card__title">{{ $project['title'] }}</h2>
                            <p class="work-archive-card__desc">{{ $project['description'] }}</p>
                        </div>
                    </article>
                @endforeach
            </section>

            <div class="work-archive-loader js-work-archive-loader">
                <div class="work-archive-loader__spinner"></div>
                <div class="work-archive-loader__text">Loading more work</div>
            </div>

            <div class="work-archive-load-trigger js-work-archive-load-trigger"></div>
        </div>
    </section>

    <div class="work-gallery-modal js-work-gallery-modal" aria-hidden="true">
        <div class="work-gallery-modal__backdrop js-work-gallery-close"></div>

        <div class="work-gallery-modal__dialog">
            <button type="button" class="work-gallery-modal__close js-work-gallery-close" aria-label="Close gallery">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6 6L18 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                    <path d="M18 6L6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </button>

            <div class="work-gallery-modal__head">
                <h3 class="work-gallery-modal__title js-work-gallery-title"></h3>
            </div>

            <div class="work-gallery-modal__slider">
                <div class="work-gallery-modal__track js-work-gallery-track"></div>

                <button type="button" class="work-gallery-modal__nav work-gallery-modal__nav--prev js-work-gallery-prev"
                    aria-label="Previous image">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M15 6L9 12L15 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>

                <button type="button" class="work-gallery-modal__nav work-gallery-modal__nav--next js-work-gallery-next"
                    aria-label="Next image">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <div class="work-gallery-modal__dots js-work-gallery-dots"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loadImage = (img) => {
                if (!img || !img.dataset.src || img.dataset.loaded === '1') return;
                img.src = img.dataset.src;
                img.dataset.loaded = '1';
            };

            const loadNearbySlides = (slider, index = 0) => {
                const slides = slider.querySelectorAll('.work-project-slider__slide');
                if (!slides.length) return;

                const total = slides.length;
                const current = ((index % total) + total) % total;
                const prev = (current - 1 + total) % total;
                const next = (current + 1) % total;

                [current, prev, next].forEach((i) => {
                    const img = slides[i]?.querySelector('.js-work-project-image');
                    loadImage(img);
                });
            };

            const getActiveIndex = (slider) => {
                const activeDot = slider.querySelector('.js-work-project-dot.is-active');
                if (!activeDot) return 0;
                return parseInt(activeDot.dataset.slide || '0', 10) || 0;
            };

            const sliders = document.querySelectorAll('.js-work-project-slider');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    const slider = entry.target;
                    loadNearbySlides(slider, 0);
                    observer.unobserve(slider);
                });
            }, {
                rootMargin: '300px 0px'
            });

            sliders.forEach((slider) => {
                observer.observe(slider);

                slider.querySelectorAll('.js-work-project-prev, .js-work-project-next, .js-work-project-dot')
                    .forEach((button) => {
                        button.addEventListener('click', () => {
                            requestAnimationFrame(() => {
                                loadNearbySlides(slider, getActiveIndex(slider));
                            });
                        }, {
                            passive: true
                        });
                    });

                const expandButton = slider.querySelector('.js-work-project-expand');
                if (expandButton) {
                    expandButton.addEventListener('click', () => {
                        slider.querySelectorAll('.js-work-project-image[data-src]').forEach(loadImage);
                    }, {
                        passive: true
                    });
                }
            });

            const modal = document.querySelector('.js-work-gallery-modal');
            if (modal) {
                const modalObserver = new MutationObserver(() => {
                    const isOpen = modal.classList.contains('is-open') || modal.getAttribute('aria-hidden') === 'false';
                    if (!isOpen) return;

                    const modalImages = modal.querySelectorAll('img[data-src]');
                    modalImages.forEach((img, index) => {
                        if (index < 3) loadImage(img);
                    });
                });

                modalObserver.observe(modal, {
                    attributes: true,
                    attributeFilter: ['class', 'aria-hidden']
                });
            }
        });
    </script>
@endsection