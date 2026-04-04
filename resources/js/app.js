import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const root = document.documentElement;

    const header = document.getElementById('siteHeader');
    const mobilePanel = document.getElementById('mobileMenuPanel');
    const mobileBackdrop = document.getElementById('mobileMenuBackdrop');
    const mobileSheet = document.getElementById('mobileMenuSheet');
    const mobileToggle = document.getElementById('mobileMenuToggle');
    const mobileClose = document.getElementById('mobileMenuClose');

    const desktopLinks = document.querySelectorAll('.js-nav-link');
    const mobileLinks = document.querySelectorAll('.js-mobile-nav-link');
    const themeToggles = document.querySelectorAll('.js-theme-toggle');

    let lastScrollY = window.scrollY;
    let ticking = false;
    let mobileMenuOpen = false;

    const getPreferredTheme = () => {
        const saved = localStorage.getItem('theme');
        if (saved === 'light' || saved === 'dark') return saved;
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    };

    const applyTheme = (theme) => {
        if (theme === 'dark') {
            root.classList.add('dark');
        } else {
            root.classList.remove('dark');
        }
        localStorage.setItem('theme', theme);
    };

    const toggleTheme = () => {
        applyTheme(root.classList.contains('dark') ? 'light' : 'dark');
    };

    applyTheme(getPreferredTheme());

    themeToggles.forEach((button) => {
        button.addEventListener('click', toggleTheme);
    });

    const showHeader = () => {
        if (!header) return;
        header.classList.remove('-translate-y-full', 'opacity-0');
        header.classList.add('translate-y-0', 'opacity-100');
    };

    const hideHeader = () => {
        if (!header) return;
        header.classList.add('-translate-y-full', 'opacity-0');
        header.classList.remove('translate-y-0', 'opacity-100');
    };

    const handleScroll = () => {
        if (!header) return;

        const currentScrollY = window.scrollY;

        if (currentScrollY > 8) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }

        if (mobileMenuOpen) {
            showHeader();
            lastScrollY = currentScrollY;
            return;
        }

        if (currentScrollY <= 10) {
            showHeader();
            lastScrollY = currentScrollY;
            return;
        }

        if (Math.abs(currentScrollY - lastScrollY) <= 6) return;

        if (currentScrollY > lastScrollY && currentScrollY > 120) {
            hideHeader();
        } else {
            showHeader();
        }

        lastScrollY = currentScrollY;
    };

    window.addEventListener(
        'scroll',
        () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        },
        { passive: true }
    );

    const openMobileMenu = () => {
        if (!mobilePanel || !mobileBackdrop || !mobileSheet) return;

        mobileMenuOpen = true;
        mobilePanel.classList.remove('pointer-events-none');
        mobilePanel.setAttribute('aria-hidden', 'false');
        mobileBackdrop.classList.remove('opacity-0');
        mobileSheet.classList.remove('-translate-x-full');
        document.body.classList.add('overflow-hidden');
        mobileToggle?.setAttribute('aria-expanded', 'true');
        showHeader();
    };

    const closeMobileMenu = () => {
        if (!mobilePanel || !mobileBackdrop || !mobileSheet) return;

        mobileMenuOpen = false;
        mobileBackdrop.classList.add('opacity-0');
        mobileSheet.classList.add('-translate-x-full');
        mobilePanel.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
        mobileToggle?.setAttribute('aria-expanded', 'false');

        setTimeout(() => {
            if (mobileSheet.classList.contains('-translate-x-full')) {
                mobilePanel.classList.add('pointer-events-none');
            }
        }, 500);
    };

    mobileToggle?.addEventListener('click', openMobileMenu);
    mobileClose?.addEventListener('click', closeMobileMenu);
    mobileBackdrop?.addEventListener('click', closeMobileMenu);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMobileMenu();
        }
    });

    mobileLinks.forEach((link) => {
        link.addEventListener('click', () => {
            closeMobileMenu();
        });
    });

    const setActiveLink = (targetId) => {
        const selector = `#${targetId}`;
        desktopLinks.forEach((link) => {
            link.classList.toggle('is-active', link.getAttribute('href') === selector);
        });
    };

    desktopLinks.forEach((link) => {
        link.addEventListener('click', () => {
            const target = link.dataset.target;
            if (target) setActiveLink(target);
        });
    });

    const observedSections = [...desktopLinks]
        .map((link) => {
            const href = link.getAttribute('href');
            if (!href || !href.startsWith('#')) return null;
            return document.querySelector(href);
        })
        .filter(Boolean);

    if (observedSections.length) {
        const observer = new IntersectionObserver(
            (entries) => {
                const visibleEntries = entries
                    .filter((entry) => entry.isIntersecting)
                    .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

                if (visibleEntries.length) {
                    setActiveLink(visibleEntries[0].target.id);
                }
            },
            {
                threshold: [0.2, 0.35, 0.5, 0.7],
                rootMargin: '-20% 0px -55% 0px',
            }
        );

        observedSections.forEach((section) => observer.observe(section));
    }

    handleScroll();
    const heroArt = document.querySelector('.js-home-hero-art');
    const heroMotion = document.querySelector('.js-home-hero-motion');

    const revealHeroArt = () => {
        if (heroArt) {
            heroArt.classList.add('is-visible');
        }
    };

    const updateHeroArtMotion = () => {
        if (!heroMotion) return;

        const y = window.scrollY || 0;
        const moveY = Math.min(y * 0.08, 42);
        const rotate = Math.min(y * 0.008, 2.4);

        heroMotion.style.transform = `translate3d(0, ${moveY}px, 0) rotate(${rotate}deg)`;
    };

    window.addEventListener('load', revealHeroArt);
    setTimeout(revealHeroArt, 180);



    updateHeroArtMotion();
    const showreelSection = document.querySelector('.js-showreel-section');
    const showreelCard = document.querySelector('.js-showreel-card');
    const showreelVideo = document.querySelector('.js-showreel-video');
    const showreelPlay = document.querySelector('.js-showreel-play');

    const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

    const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

    const updateShowreelSection = () => {
        if (!showreelSection || !showreelCard) return;

        const rect = showreelSection.getBoundingClientRect();
        const viewportH = window.innerHeight;
        const totalScrollable = Math.max(showreelSection.offsetHeight - viewportH, 1);
        const passed = clamp(-rect.top, 0, totalScrollable);
        let progress = passed / totalScrollable;

        progress = clamp((progress - 0.04) / 0.72, 0, 1);
        const eased = easeOutCubic(progress);

        const width = 84 + (100 - 84) * eased;
        const height = 58 + (100 - 58) * eased;
        const radius = 34 - 34 * eased;
        const translateY = 34 - 34 * eased;
        const scale = 0.965 + (1 - 0.965) * eased;
        const shadowY = 30 - 16 * eased;
        const shadowBlur = 60 - 18 * eased;
        const shadowOpacity = 0.18 - 0.06 * eased;

        showreelCard.style.width = `${width}vw`;
        showreelCard.style.height = `${height}vh`;
        showreelCard.style.borderRadius = `${radius}px`;
        showreelCard.style.transform = `translateY(${translateY}px) scale(${scale})`;
        showreelCard.style.boxShadow = `0 ${shadowY}px ${shadowBlur}px rgba(10, 14, 28, ${shadowOpacity}), 0 10px 24px rgba(10, 14, 28, 0.10)`;

        if (progress > 0.86) {
            showreelCard.classList.add('is-full');
        } else {
            showreelCard.classList.remove('is-full');
        }
    };

    const openShowreelExperience = async () => {
        if (!showreelVideo || !showreelCard) return;

        showreelCard.classList.add('is-interacted');

        try {
            showreelVideo.muted = false;
            showreelVideo.volume = 1;
            await showreelVideo.play();
        } catch (error) {
            showreelVideo.muted = false;
        }

        try {
            if (showreelVideo.requestFullscreen) {
                await showreelVideo.requestFullscreen();
            } else if (showreelCard.requestFullscreen) {
                await showreelCard.requestFullscreen();
            } else if (showreelVideo.webkitEnterFullscreen) {
                showreelVideo.webkitEnterFullscreen();
            }
        } catch (error) {
            /* ignore */
        }
    };

    if (showreelVideo) {
        showreelVideo.play().catch(() => { });
    }

    showreelPlay?.addEventListener('click', openShowreelExperience);
    showreelVideo?.addEventListener('click', openShowreelExperience);

    document.addEventListener('fullscreenchange', () => {
        if (!document.fullscreenElement && showreelVideo) {
            showreelVideo.muted = true;
            showreelVideo.play().catch(() => { });
        }
    });

    let showreelTicking = false;

    window.addEventListener(
        'scroll',
        () => {
            if (!showreelTicking) {
                window.requestAnimationFrame(() => {
                    updateShowreelSection();
                    showreelTicking = false;
                });
                showreelTicking = true;
            }
        },
        { passive: true }
    );

    window.addEventListener('resize', updateShowreelSection);

    updateShowreelSection();
    const servicesShowcase = document.querySelector('.js-services-showcase');

    if (servicesShowcase) {
        const items = [...servicesShowcase.querySelectorAll('.js-service-item')];
        const triggers = [...servicesShowcase.querySelectorAll('.js-service-trigger')];
        const panes = [...servicesShowcase.querySelectorAll('.js-service-preview-pane')];
        const tabsWrap = servicesShowcase.querySelector('.js-services-tabs');

        let openKey = items[0]?.dataset.key || null;

        const setPreview = (key) => {
            panes.forEach((pane) => {
                pane.classList.toggle('is-active', pane.dataset.key === key);
            });
        };

        const openItem = (key) => {
            openKey = key;

            items.forEach((item) => {
                const isOpen = item.dataset.key === key;
                item.classList.toggle('is-open', isOpen);

                const trigger = item.querySelector('.js-service-trigger');
                if (trigger) {
                    trigger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                }
            });

            setPreview(key);
        };

        triggers.forEach((trigger) => {
            const parent = trigger.closest('.js-service-item');
            const key = parent?.dataset.key;

            if (!key) return;

            trigger.addEventListener('click', () => {
                openItem(key);
            });

            trigger.addEventListener('mouseenter', () => {
                if (window.innerWidth >= 1280) {
                    setPreview(key);
                }
            });

            parent?.addEventListener('mouseenter', () => {
                if (window.innerWidth >= 1280) {
                    setPreview(key);
                }
            });
        });

        tabsWrap?.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 1280 && openKey) {
                setPreview(openKey);
            }
        });

        openItem(openKey);
    }
    const fintechCard = document.querySelector('.js-fintech-card');
    const fintechShape = document.querySelector('.js-fintech-shape');
    const fintechOrb = document.querySelector('.js-fintech-orb');

    // const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

    const updateFintechCardMotion = () => {
        if (!fintechCard) return;

        const rect = fintechCard.getBoundingClientRect();
        const viewportH = window.innerHeight || 1;
        const progress = clamp((viewportH - rect.top) / (viewportH + rect.height), 0, 1);
        const centerOffset = (rect.top + rect.height / 2 - viewportH / 2) / viewportH;

        if (progress > 0.08) {
            fintechCard.classList.add('is-visible');
        } else {
            fintechCard.classList.remove('is-visible');
        }

        if (fintechShape) {
            const translateY = centerOffset * -36;
            const rotate = centerOffset * -6;
            const scale = 1.02 + progress * 0.025;

            fintechShape.style.transform =
                `translate3d(0, ${translateY}px, 0) rotate(${rotate}deg) scale(${scale})`;
        }

        if (fintechOrb) {
            const orbY = centerOffset * -28;
            const orbX = centerOffset * 10;

            fintechOrb.style.transform =
                `translate3d(${orbX}px, ${orbY}px, 0)`;
        }
    };

    let fintechTicking = false;

    window.addEventListener(
        'scroll',
        () => {
            if (!fintechTicking) {
                window.requestAnimationFrame(() => {
                    updateFintechCardMotion();
                    fintechTicking = false;
                });
                fintechTicking = true;
            }
        },
        { passive: true }
    );

    window.addEventListener('resize', updateFintechCardMotion);

    updateFintechCardMotion();

    const workCards = document.querySelectorAll('.js-work-card');
    const workVideos = document.querySelectorAll('.js-work-video');
    const workRevealItems = document.querySelectorAll('.js-work-reveal');

    if (workRevealItems.length) {
        const workObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            },
            {
                threshold: 0.14,
                rootMargin: '0px 0px -8% 0px',
            }
        );

        workRevealItems.forEach((item) => workObserver.observe(item));
    }

    if (workVideos.length) {
        const playVisibleVideo = (video) => {
            if (!video) return;
            video.play().catch(() => { });
        };

        const pauseVideo = (video) => {
            if (!video) return;
            video.pause();
        };

        const videoObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    const video = entry.target;
                    if (entry.isIntersecting) {
                        playVisibleVideo(video);
                    } else {
                        pauseVideo(video);
                    }
                });
            },
            {
                threshold: 0.35,
            }
        );

        workVideos.forEach((video) => {
            videoObserver.observe(video);
        });

        workCards.forEach((card) => {
            const video = card.querySelector('.js-work-video');
            if (!video) return;

            card.addEventListener('mouseenter', () => {
                playVisibleVideo(video);
            });

            card.addEventListener('mouseleave', () => {
                playVisibleVideo(video);
            });
        });
    }
    const testimonialSlider = document.querySelector('.js-testimonial-slider');

    if (testimonialSlider) {
        const slides = [...testimonialSlider.querySelectorAll('.js-testimonial-slide')];
        const prevBtn = testimonialSlider.querySelector('.js-testimonial-prev');
        const nextBtn = testimonialSlider.querySelector('.js-testimonial-next');

        let currentIndex = 0;
        let autoplay;

        const showSlide = (index) => {
            currentIndex = (index + slides.length) % slides.length;

            slides.forEach((slide, i) => {
                slide.classList.toggle('is-active', i === currentIndex);
            });
        };

        const startAutoplay = () => {
            stopAutoplay();
            autoplay = setInterval(() => {
                showSlide(currentIndex + 1);
            }, 5000);
        };

        const stopAutoplay = () => {
            if (autoplay) {
                clearInterval(autoplay);
            }
        };

        prevBtn?.addEventListener('click', () => {
            showSlide(currentIndex - 1);
            startAutoplay();
        });

        nextBtn?.addEventListener('click', () => {
            showSlide(currentIndex + 1);
            startAutoplay();
        });

        testimonialSlider.addEventListener('mouseenter', stopAutoplay);
        testimonialSlider.addEventListener('mouseleave', startAutoplay);

        showSlide(0);
        startAutoplay();
    }

    // clients
    const clientRevealItems = document.querySelectorAll('.js-client-reveal');
    const clientOrbit = document.querySelector('.js-client-orbit');

    if (clientRevealItems.length) {
        const clientObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            },
            {
                threshold: 0.14,
                rootMargin: '0px 0px -10% 0px',
            }
        );

        clientRevealItems.forEach((item) => clientObserver.observe(item));
    }

    if (clientOrbit) {
        const updateClientOrbit = () => {
            const rect = clientOrbit.getBoundingClientRect();
            const viewportH = window.innerHeight || 1;
            const centerOffset = (rect.top + rect.height / 2 - viewportH / 2) / viewportH;
            const moveY = centerOffset * -24;
            const rotate = centerOffset * -4;

            clientOrbit.style.transform = `translate3d(0, ${moveY}px, 0) rotate(${rotate}deg)`;
        };

        let orbitTicking = false;

        window.addEventListener(
            'scroll',
            () => {
                if (!orbitTicking) {
                    window.requestAnimationFrame(() => {
                        updateClientOrbit();
                        orbitTicking = false;
                    });
                    orbitTicking = true;
                }
            },
            { passive: true }
        );

        window.addEventListener('load', () => {
            clientOrbit.classList.add('is-visible');
            updateClientOrbit();
        });

        setTimeout(() => {
            clientOrbit.classList.add('is-visible');
            updateClientOrbit();
        }, 180);
    }
    const workArchiveCards = [...document.querySelectorAll('.js-work-archive-card')];
    const workArchiveTrigger = document.querySelector('.js-work-archive-load-trigger');
    const workArchiveLoader = document.querySelector('.js-work-archive-loader');
    const workProjectSliders = document.querySelectorAll('.js-work-project-slider');

    const galleryModal = document.querySelector('.js-work-gallery-modal');
    const galleryTrack = document.querySelector('.js-work-gallery-track');
    const galleryDots = document.querySelector('.js-work-gallery-dots');
    const galleryTitle = document.querySelector('.js-work-gallery-title');
    const galleryPrev = document.querySelector('.js-work-gallery-prev');
    const galleryNext = document.querySelector('.js-work-gallery-next');
    const galleryCloseBtns = document.querySelectorAll('.js-work-gallery-close');

    let galleryCurrent = 0;
    let galleryImages = [];

    const updateGallery = (index) => {
        if (!galleryTrack) return;
        galleryCurrent = (index + galleryImages.length) % galleryImages.length;
        galleryTrack.style.transform = `translateX(-${galleryCurrent * 100}%)`;

        const dots = galleryDots?.querySelectorAll('.work-gallery-modal__dot') || [];
        dots.forEach((dot, dotIndex) => {
            dot.classList.toggle('is-active', dotIndex === galleryCurrent);
        });
    };

    const openGallery = (title, images, startIndex = 0) => {
        if (!galleryModal || !galleryTrack || !galleryDots || !galleryTitle) return;

        galleryImages = images;
        galleryTitle.textContent = title;
        galleryTrack.innerHTML = '';
        galleryDots.innerHTML = '';

        images.forEach((src, index) => {
            const slide = document.createElement('div');
            slide.className = 'work-gallery-modal__slide';
            slide.innerHTML = `<img src="${src}" alt="${title}">`;
            galleryTrack.appendChild(slide);

            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = `work-gallery-modal__dot ${index === startIndex ? 'is-active' : ''}`;
            dot.addEventListener('click', () => updateGallery(index));
            galleryDots.appendChild(dot);
        });

        galleryModal.classList.add('is-open');
        document.body.classList.add('overflow-hidden');
        updateGallery(startIndex);
    };

    const closeGallery = () => {
        if (!galleryModal) return;
        galleryModal.classList.remove('is-open');
        document.body.classList.remove('overflow-hidden');
    };

    galleryPrev?.addEventListener('click', () => updateGallery(galleryCurrent - 1));
    galleryNext?.addEventListener('click', () => updateGallery(galleryCurrent + 1));
    galleryCloseBtns.forEach((btn) => btn.addEventListener('click', closeGallery));

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeGallery();
    });

    if (workProjectSliders.length) {
        workProjectSliders.forEach((slider) => {
            const track = slider.querySelector('.js-work-project-track');
            const slides = slider.querySelectorAll('.work-project-slider__slide');
            const prev = slider.querySelector('.js-work-project-prev');
            const next = slider.querySelector('.js-work-project-next');
            const dots = slider.querySelectorAll('.js-work-project-dot');
            const expand = slider.querySelector('.js-work-project-expand');
            const card = slider.closest('.js-work-archive-card');
            const title = card?.querySelector('.work-archive-card__title')?.textContent?.trim() || 'Project';

            let current = 0;
            let startX = 0;
            let moveX = 0;
            let isDragging = false;

            const getImages = () =>
                [...slides].map((slide) => slide.querySelector('img')?.src).filter(Boolean);

            const updateSlider = (index) => {
                current = (index + slides.length) % slides.length;
                track.style.transform = `translateX(-${current * 100}%)`;

                dots.forEach((dot, dotIndex) => {
                    dot.classList.toggle('is-active', dotIndex === current);
                });
            };

            prev?.addEventListener('click', () => updateSlider(current - 1));
            next?.addEventListener('click', () => updateSlider(current + 1));

            dots.forEach((dot) => {
                dot.addEventListener('click', () => {
                    updateSlider(Number(dot.dataset.slide));
                });
            });

            expand?.addEventListener('click', () => {
                openGallery(title, getImages(), current);
            });

            slides.forEach((slide, slideIndex) => {
                slide.addEventListener('click', () => {
                    openGallery(title, getImages(), slideIndex);
                });
            });

            slider.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                moveX = startX;
                isDragging = true;
            }, { passive: true });

            slider.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
                moveX = e.touches[0].clientX;
            }, { passive: true });

            slider.addEventListener('touchend', () => {
                if (!isDragging) return;
                const diff = moveX - startX;

                if (Math.abs(diff) > 40) {
                    if (diff < 0) {
                        updateSlider(current + 1);
                    } else {
                        updateSlider(current - 1);
                    }
                }

                isDragging = false;
                startX = 0;
                moveX = 0;
            });

            updateSlider(0);
        });
    }

    if (workArchiveCards.length) {
        let visibleCount = Math.min(6, workArchiveCards.length);
        let loading = false;

        const prepDirectionClass = (cardIndex) => {
            const mod = cardIndex % 3;
            if (mod === 0) return 'is-prep-left';
            if (mod === 1) return 'is-prep-bottom';
            return 'is-prep-right';
        };

        const visibleDirectionClass = (cardIndex) => {
            const mod = cardIndex % 3;
            if (mod === 0) return 'is-from-left';
            if (mod === 1) return 'is-from-bottom';
            return 'is-from-right';
        };

        const revealCards = (from, to) => {
            const batch = workArchiveCards.slice(from, to);

            batch.forEach((card, index) => {
                const globalIndex = from + index;
                card.style.display = 'block';
                card.classList.remove('work-archive-card--queued', 'is-from-left', 'is-from-right', 'is-from-bottom');
                card.classList.add(prepDirectionClass(globalIndex));
                card.style.transitionDelay = `${index * 85}ms`;

                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        card.classList.add('is-visible', visibleDirectionClass(globalIndex));
                        card.classList.remove('is-prep-left', 'is-prep-right', 'is-prep-bottom');
                    });
                });
            });
        };

        const showNextBatch = () => {
            if (loading || visibleCount >= workArchiveCards.length) {
                if (visibleCount >= workArchiveCards.length) {
                    workArchiveLoader?.classList.remove('is-active');
                }
                return;
            }

            loading = true;
            workArchiveLoader?.classList.add('is-active');

            window.setTimeout(() => {
                const nextCount = Math.min(visibleCount + 6, workArchiveCards.length);
                revealCards(visibleCount, nextCount);
                visibleCount = nextCount;
                loading = false;
                workArchiveLoader?.classList.remove('is-active');
            }, 850);
        };

        if (workArchiveTrigger) {
            const archiveObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            showNextBatch();
                        }
                    });
                },
                {
                    threshold: 0.1,
                    rootMargin: '0px 0px 240px 0px',
                }
            );

            archiveObserver.observe(workArchiveTrigger);
        }
    }
    const servicePageRevealItems = document.querySelectorAll('.js-service-page-reveal');
    const serviceMoreBlocks = document.querySelectorAll('.js-service-more');

    if (servicePageRevealItems.length) {
        const servicePageObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            },
            {
                threshold: 0.14,
                rootMargin: '0px 0px -8% 0px',
            }
        );

        servicePageRevealItems.forEach((item) => servicePageObserver.observe(item));
    }

    if (serviceMoreBlocks.length) {
        serviceMoreBlocks.forEach((block) => {
            const toggle = block.querySelector('.js-service-more-toggle');
            const text = block.querySelector('.service-feature__button-text');

            toggle?.addEventListener('click', () => {
                const isOpen = block.classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

                if (text) {
                    text.textContent = isOpen ? 'View Less' : 'View More';
                }
            });
        });
    }
});
