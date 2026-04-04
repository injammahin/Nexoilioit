@extends('layouts.app')

@section('content')
    @php
        $projects = [
            [
                'title' => 'TiktokSlang',
                'description' => 'TiktokSlang is a futures trending leads website  where anyone can find the trending viral topic.',
                'images' => [
                    '/images/work/tiktok5.png',
                    '/images/work/tiktok1.png',
                    '/images/work/tiktok2.png',
                    '/images/work/tiktok3.png',
                    '/images/work/tiktok4.png',
                ],
            ],
            [
                'title' => 'E-commerce',
                'description' => 'A branded website experience with elegant presentation, product emphasis, and refined visuals.',
                'images' => [
                    '/images/work/keshoriya1.png',
                    '/images/work/keshoriya2.png',
                    '/images/work/keshoriya3.png',
                    '/images/work/keshoriya4.png',
                    '/images/work/keshoriya5.png',
                ],
            ],
            [
                'title' => 'VYU LMS',
                'description' => 'A modern learning platform built around course access, student usability, and clean navigation.',
                'images' => [
                    '/images/work/lms_1.png',
                    '/images/work/lms_2.png',
                    '/images/work/lms_3.png',
                    '/images/work/lms_4.png',
                    '/images/work/lms_5.png',
                ],
            ],
            [
                'title' => 'UCM Services',
                'description' => 'A service-oriented company website with strong content structure and clean presentation.',
                'images' => [
                    '/images/work/UCM-1.png',
                    '/images/work/UCM-2.png',
                    '/images/work/UCM-3.png',
                    '/images/work/UCM-4.png',
                    '/images/work/UCM-5.png',
                ],
            ],
            [
                'title' => 'Fluidstream',
                'description' => 'A premium company presentation website with smooth layout and modern interface language.',
                'images' => [
                    '/images/work/fluidstream-1.png',
                    '/images/work/fluidstream-2.png',
                    '/images/work/fluidstream-3.png',
                    '/images/work/fluidstream-5.png',
                    '/images/work/fluidstream-4.png',
                ],
            ],
            // [
            //     'title' => 'Keshoriya',
            //     'description' => 'A branded website experience with elegant presentation, product emphasis, and refined visuals.',
            //     'images' => [
            //         'images/work/keshoriya/1.webp',
            //         'images/work/keshoriya/2.webp',
            //         'images/work/keshoriya/3.webp',
            //         'images/work/keshoriya/4.webp',
            //         'images/work/keshoriya/5.webp',
            //     ],
            // ],



        ];
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
                            <div class="work-project-slider js-work-project-slider">
                                <div class="work-project-slider__track js-work-project-track">
                                    @foreach ($project['images'] as $image)
                                        <div class="work-project-slider__slide">
                                            <img src="{{ asset($image) }}" alt="{{ $project['title'] }}"
                                                class="work-project-slider__image">
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
@endsection