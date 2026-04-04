@extends('layouts.app')

@section('content')
    <style>
        .blog-show-page {
            position: relative;
            overflow: hidden;
            padding: 7rem 0 8rem;
            background:
                radial-gradient(circle at top left, rgba(99, 102, 241, .08), transparent 22%),
                radial-gradient(circle at bottom right, rgba(56, 189, 248, .07), transparent 24%);
        }

        .blog-show-page__glow {
            position: absolute;
            border-radius: 999px;
            filter: blur(90px);
            opacity: .18;
            pointer-events: none;
        }

        .blog-show-page__glow--one {
            width: 320px;
            height: 320px;
            left: -100px;
            top: 140px;
            background: rgba(99, 102, 241, .22);
        }

        .blog-show-page__glow--two {
            width: 360px;
            height: 360px;
            right: -120px;
            top: 860px;
            background: rgba(56, 189, 248, .16);
        }

        .blog-show-hero {
            display: grid;
            grid-template-columns: minmax(0, 1.02fr) minmax(320px, .98fr);
            gap: 1.2rem;
            align-items: stretch;
            margin-bottom: 1.6rem;
        }

        .blog-show-hero__content,
        .blog-show-hero__cover,
        .blog-show-card,
        .blog-related-card {
            border-radius: 30px;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(255, 255, 255, .9) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .dark .blog-show-hero__content,
        .dark .blog-show-hero__cover,
        .dark .blog-show-card,
        .dark .blog-related-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, .05) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 18px 40px rgba(0, 0, 0, .2),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .blog-show-hero__content {
            padding: 2rem;
        }

        .blog-show-meta {
            display: flex;
            align-items: center;
            gap: .7rem;
            flex-wrap: wrap;
        }

        .blog-show-meta__pill {
            display: inline-flex;
            align-items: center;
            height: 34px;
            padding: 0 .9rem;
            border-radius: 999px;
            background: rgba(99, 102, 241, .08);
            color: #4f46e5;
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .05em;
            text-transform: uppercase;
        }

        .dark .blog-show-meta__pill {
            background: rgba(99, 102, 241, .16);
            color: #c7d2fe;
        }

        .blog-show-meta__text {
            font-size: .92rem;
            color: rgba(100, 116, 139, .9);
        }

        .dark .blog-show-meta__text {
            color: rgba(255, 255, 255, .5);
        }

        .blog-show-title {
            margin: 1.2rem 0 0;
            font-size: clamp(1.4rem, 3vw, 3rem);
            line-height: .96;
            letter-spacing: -.07em;
            font-weight: 400;
            color: #060616;
        }

        .dark .blog-show-title {
            color: #fff;
        }

        .blog-show-excerpt {
            margin: 1rem 0 0;
            font-size: 1.06rem;
            line-height: 1.82;
            color: rgba(71, 85, 105, .92);
            max-width: 760px;
        }

        .dark .blog-show-excerpt {
            color: rgba(255, 255, 255, .66);
        }

        .blog-show-hero__cover {
            min-height: 420px;
            overflow: hidden;
            background: linear-gradient(135deg, #0b1020 0%, #111827 100%);
        }

        .blog-show-cover {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .blog-show-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .blog-show-cover.is-fallback {
            background:
                radial-gradient(circle at top right, rgba(99, 102, 241, .25) 0%, rgba(99, 102, 241, 0) 34%),
                linear-gradient(135deg, #0b1020 0%, #0f172a 100%);
        }

        .blog-show-cover.is-fallback::before {
            content: attr(data-label);
            position: absolute;
            left: 1.4rem;
            bottom: 1.4rem;
            color: #fff;
            font-size: clamp(1.4rem, 2.4vw, 2rem);
            font-weight: 600;
            letter-spacing: -.04em;
        }

        .blog-show-layout {
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
            gap: 1.2rem;
            align-items: start;
            margin-top: 1.2rem;
        }

        .blog-show-sidebar {
            position: sticky;
            top: 7rem;
        }

        .blog-show-card {
            padding: 1.3rem;
        }

        .blog-show-card__title {
            margin: 0 0 .8rem;
            font-size: 1rem;
            font-weight: 700;
            color: #060616;
        }

        .dark .blog-show-card__title {
            color: #fff;
        }

        .blog-toc {
            display: flex;
            flex-direction: column;
            gap: .65rem;
        }

        .blog-toc a {
            text-decoration: none;
            color: rgba(71, 85, 105, .94);
            line-height: 1.55;
            border-bottom: 1px solid rgba(15, 23, 42, .06);
            padding-bottom: .65rem;
            transition: color .25s ease, transform .25s ease;
        }

        .blog-toc a:hover,
        .blog-toc a.is-active {
            color: #060616;
            transform: translateX(4px);
        }

        .dark .blog-toc a {
            color: rgba(255, 255, 255, .68);
            border-bottom-color: rgba(255, 255, 255, .08);
        }

        .dark .blog-toc a:hover,
        .dark .blog-toc a.is-active {
            color: #fff;
        }

        .blog-article {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .blog-article-section {
            padding: 1.6rem;
            border-radius: 30px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .9) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .dark .blog-article-section {
            background: linear-gradient(180deg, rgba(255, 255, 255, .05) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 18px 40px rgba(0, 0, 0, .2),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .blog-article-section h2 {
            margin: 0 0 .9rem;
            font-size: clamp(1.7rem, 2.2vw, 2.4rem);
            line-height: 1.05;
            letter-spacing: -.05em;
            font-weight: 500;
            color: #060616;
        }

        .dark .blog-article-section h2 {
            color: #fff;
        }

        .blog-article-section p {
            margin: 0;
            font-size: 1rem;
            line-height: 1.86;
            color: rgba(71, 85, 105, .94);
        }

        .dark .blog-article-section p {
            color: rgba(255, 255, 255, .68);
        }

        .blog-related {
            margin-top: 4rem;
        }

        .blog-related__title {
            margin: 0 0 1rem;
            font-size: clamp(2rem, 4vw, 3.2rem);
            line-height: .98;
            letter-spacing: -.06em;
            font-weight: 600;
            color: #060616;
        }

        .dark .blog-related__title {
            color: #fff;
        }

        .blog-related__grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
        }

        .blog-related-card {
            text-decoration: none;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .blog-related-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .1),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .blog-related-card__cover {
            min-height: 220px;
            overflow: hidden;
            background: linear-gradient(135deg, #0b1020 0%, #111827 100%);
            border-bottom: 1px solid rgba(15, 23, 42, .06);
        }

        .dark .blog-related-card__cover {
            border-bottom-color: rgba(255, 255, 255, .08);
        }

        .blog-related-card__cover img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .blog-related-card__cover.is-fallback {
            background:
                radial-gradient(circle at top right, rgba(99, 102, 241, .25) 0%, rgba(99, 102, 241, 0) 34%),
                linear-gradient(135deg, #0b1020 0%, #0f172a 100%);
            position: relative;
        }

        .blog-related-card__cover.is-fallback::before {
            content: attr(data-label);
            position: absolute;
            left: 1rem;
            bottom: 1rem;
            right: 1rem;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: -.03em;
        }

        .blog-related-card__body {
            padding: 1.2rem;
        }

        .blog-related-card__body h3 {
            margin: .85rem 0 0;
            font-size: 1.35rem;
            line-height: 1.12;
            letter-spacing: -.04em;
            font-weight: 600;
            color: #060616;
        }

        .dark .blog-related-card__body h3 {
            color: #fff;
        }

        .blog-related-card__body p {
            margin: .7rem 0 0;
            font-size: .98rem;
            line-height: 1.72;
            color: rgba(71, 85, 105, .92);
        }

        .dark .blog-related-card__body p {
            color: rgba(255, 255, 255, .66);
        }

        .blog-show-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition:
                opacity .82s cubic-bezier(.22, 1, .36, 1),
                transform .92s cubic-bezier(.22, 1, .36, 1);
        }

        .blog-show-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 1279px) {

            .blog-show-hero,
            .blog-show-layout {
                grid-template-columns: 1fr;
            }

            .blog-show-sidebar {
                position: relative;
                top: auto;
            }

            .blog-related__grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 767px) {
            .blog-show-page {
                padding: 4.8rem 0 5.5rem;
            }

            .blog-show-title {
                font-size: clamp(2.2rem, 11vw, 4rem);
            }

            .blog-show-hero__content,
            .blog-show-card,
            .blog-article-section,
            .blog-related-card {
                border-radius: 22px;
            }

            .blog-show-hero__content {
                padding: 1.25rem;
            }

            .blog-show-hero__cover {
                min-height: 280px;
                border-radius: 22px;
            }

            .blog-related__grid {
                grid-template-columns: 1fr;
            }

            .blog-article-section {
                padding: 1.2rem;
            }
        }
    </style>

    <section class="blog-show-page">
        <div class="blog-show-page__glow blog-show-page__glow--one"></div>
        <div class="blog-show-page__glow blog-show-page__glow--two"></div>

        <div class="site-shell">
            <section class="blog-show-hero">
                <div class="blog-show-hero__content blog-show-reveal">
                    <div class="blog-show-meta">
                        <span class="blog-show-meta__pill">{{ $post['category'] }}</span>
                        <span class="blog-show-meta__text">{{ $post['date'] }}</span>
                        <span class="blog-show-meta__text">{{ $post['read_time'] }}</span>
                    </div>

                    <h1 class="blog-show-title">{{ $post['title'] }}</h1>
                    <p class="blog-show-excerpt">{{ $post['excerpt'] }}</p>
                </div>

                <div class="blog-show-hero__cover blog-show-reveal">
                    <div class="blog-show-cover" data-label="{{ $post['title'] }}">
                        <img src="{{ asset($post['cover']) }}" alt="{{ $post['title'] }}"
                            onerror="this.parentElement.classList.add('is-fallback'); this.remove();">
                    </div>
                </div>
            </section>

            <section class="blog-show-layout">
                <aside class="blog-show-sidebar blog-show-reveal">
                    <div class="blog-show-card">
                        <h3 class="blog-show-card__title">On this page</h3>

                        <nav class="blog-toc">
                            <a href="#introduction" class="js-blog-toc-link">Introduction</a>
                            @foreach($post['sections'] as $section)
                                <a href="#{{ \Illuminate\Support\Str::slug($section['heading']) }}" class="js-blog-toc-link">
                                    {{ $section['heading'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </aside>

                <div class="blog-article">
                    <section id="introduction" class="blog-article-section blog-show-reveal js-blog-article-section">
                        <h2>Introduction</h2>
                        <p>{{ $post['intro'] }}</p>
                    </section>

                    @foreach($post['sections'] as $section)
                        <section id="{{ \Illuminate\Support\Str::slug($section['heading']) }}"
                            class="blog-article-section blog-show-reveal js-blog-article-section">
                            <h2>{{ $section['heading'] }}</h2>
                            <p>{{ $section['body'] }}</p>
                        </section>
                    @endforeach
                </div>
            </section>

            @if($related->count())
                <section class="blog-related">
                    <h2 class="blog-related__title blog-show-reveal">Related Articles</h2>

                    <div class="blog-related__grid">
                        @foreach($related as $item)
                            <a href="{{ route('blog.show', $item['slug']) }}" class="blog-related-card blog-show-reveal">
                                <div class="blog-related-card__cover" data-label="{{ $item['title'] }}">
                                    <img src="{{ asset($item['cover']) }}" alt="{{ $item['title'] }}"
                                        onerror="this.parentElement.classList.add('is-fallback'); this.remove();">
                                </div>

                                <div class="blog-related-card__body">
                                    <div class="blog-show-meta">
                                        <span class="blog-show-meta__pill">{{ $item['category'] }}</span>
                                        <span class="blog-show-meta__text">{{ $item['read_time'] }}</span>
                                    </div>

                                    <h3>{{ $item['title'] }}</h3>
                                    <p>{{ $item['excerpt'] }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revealItems = document.querySelectorAll('.blog-show-reveal');
            const tocLinks = document.querySelectorAll('.js-blog-toc-link');
            const sections = document.querySelectorAll('.js-blog-article-section');

            if (revealItems.length) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                        }
                    });
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -8% 0px'
                });

                revealItems.forEach((item) => observer.observe(item));
            }

            if (sections.length && tocLinks.length) {
                const sectionObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const id = entry.target.getAttribute('id');

                            tocLinks.forEach((link) => {
                                link.classList.toggle('is-active', link.getAttribute('href') === `#${id}`);
                            });
                        }
                    });
                }, {
                    threshold: 0.35,
                    rootMargin: '-20% 0px -50% 0px'
                });

                sections.forEach((section) => sectionObserver.observe(section));
            }
        });
    </script>
@endsection