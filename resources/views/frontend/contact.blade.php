@extends('layouts.app')

@section('content')
    <style>
        .contact-page {
            position: relative;
            overflow: hidden;
            padding: 7rem 0 8rem;
            background:
                radial-gradient(circle at top left, rgba(99, 102, 241, 0.10), transparent 24%),
                radial-gradient(circle at bottom right, rgba(56, 189, 248, 0.08), transparent 22%);
        }

        .contact-page__glow {
            position: absolute;
            border-radius: 999px;
            filter: blur(90px);
            pointer-events: none;
            opacity: 0.22;
        }

        .contact-page__glow--one {
            width: 320px;
            height: 320px;
            left: -110px;
            top: 120px;
            background: rgba(99, 102, 241, 0.24);
        }

        .contact-page__glow--two {
            width: 360px;
            height: 360px;
            right: -120px;
            top: 580px;
            background: rgba(34, 197, 94, 0.14);
        }

        .contact-hero {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(320px, 0.95fr);
            gap: 1.2rem;
            align-items: stretch;
            margin-bottom: 1.4rem;
        }

        .contact-hero__content,
        .contact-hero__visual,
        .contact-card,
        .contact-form-card,
        .contact-faq-card {
            border-radius: 30px;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(255, 255, 255, .90) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .dark .contact-hero__content,
        .dark .contact-hero__visual,
        .dark .contact-card,
        .dark .contact-form-card,
        .dark .contact-faq-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, .05) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 18px 40px rgba(0, 0, 0, .20),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .contact-hero__content {
            padding: 2rem;
        }

        .contact-hero__eyebrow,
        .contact-section__eyebrow {
            margin: 0 0 .85rem;
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: rgba(6, 6, 22, .42);
        }

        .dark .contact-hero__eyebrow,
        .dark .contact-section__eyebrow {
            color: rgba(255, 255, 255, .42);
        }

        .contact-hero__title {
            margin: 0;
            font-size: clamp(2.2rem, 3.8vw, 3.8rem);
            line-height: .94;
            letter-spacing: -.078em;
            font-weight: 400;
            color: #060616;
        }

        .dark .contact-hero__title {
            color: #fff;
        }

        .contact-hero__subtitle {
            margin: 1rem 0 0;
            max-width: 760px;
            font-size: 1.05rem;
            line-height: 1.82;
            color: rgba(71, 85, 105, .92);
        }

        .dark .contact-hero__subtitle {
            color: rgba(255, 255, 255, .66);
        }

        .contact-hero__actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .contact-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .75rem;
            height: 56px;
            padding: 0 1.4rem;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            letter-spacing: -.02em;
            transition: transform .25s ease, box-shadow .25s ease, background .25s ease;
        }

        .contact-btn:hover {
            transform: translateY(-2px);
        }

        .contact-btn--dark {
            background: #050b25;
            color: #fff;
            box-shadow: 0 16px 36px rgba(11, 16, 32, .18);
        }

        .dark .contact-btn--dark {
            background: #fff;
            color: #060616;
        }

        .contact-btn--light {
            background: rgba(255, 255, 255, .88);
            color: #060616;
            border: 1px solid rgba(15, 23, 42, .06);
        }

        .dark .contact-btn--light {
            background: rgba(255, 255, 255, .08);
            color: #fff;
            border-color: rgba(255, 255, 255, .08);
        }

        .contact-hero__visual {
            position: relative;
            min-height: 460px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .contact-orbit {
            position: relative;
            width: min(500px, 100%);
            aspect-ratio: 1 / 1;
        }

        .contact-orbit__ring {
            position: absolute;
            inset: 0;
            border-radius: 999px;
            border: 1px dashed rgba(99, 102, 241, .22);
            animation: contactSpin 24s linear infinite;
        }

        .contact-orbit__ring::before,
        .contact-orbit__ring::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            inset: 15%;
            border: 1px dashed rgba(56, 189, 248, .18);
        }

        .contact-orbit__ring::after {
            inset: 30%;
            border-color: rgba(168, 85, 247, .16);
        }

        .contact-orbit__core {
            position: absolute;
            inset: 18% 16%;
            border-radius: 32px;
            padding: 1.6rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: .7rem;
            background: linear-gradient(180deg, rgba(255, 255, 255, .92) 0%, rgba(247, 249, 252, .74) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .08),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            backdrop-filter: blur(10px);
            animation: contactFloat 6s ease-in-out infinite;
        }

        .dark .contact-orbit__core {
            background: linear-gradient(180deg, rgba(255, 255, 255, .06) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 24px 48px rgba(0, 0, 0, .24),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .contact-orbit__label {
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(100, 116, 139, .84);
        }

        .dark .contact-orbit__label {
            color: rgba(255, 255, 255, .46);
        }

        .contact-orbit__title {
            margin: 0;
            font-size: clamp(1.6rem, 2vw, 2rem);
            line-height: 1.02;
            letter-spacing: -.05em;
            font-weight: 400;
            color: #060616;
        }

        .dark .contact-orbit__title {
            color: #fff;
        }

        .contact-orbit__text {
            margin: 0;
            font-size: 1rem;
            line-height: 1.72;
            color: rgba(71, 85, 105, .92);
        }

        .dark .contact-orbit__text {
            color: rgba(255, 255, 255, .64);
        }

        .contact-orbit__pill {
            position: absolute;
            padding: .85rem 1rem;
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .90) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 16px 34px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            font-size: .95rem;
            font-weight: 700;
            color: #060616;
            letter-spacing: -.02em;
        }

        .dark .contact-orbit__pill {
            background: linear-gradient(180deg, rgba(255, 255, 255, .06) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            color: #fff;
        }

        .contact-orbit__pill--one {
            top: 8%;
            right: 6%;
            animation: contactFloatSmall 5.5s ease-in-out infinite;
        }

        .contact-orbit__pill--two {
            left: 0;
            bottom: 16%;
            animation: contactFloatSmall 6.3s ease-in-out infinite reverse;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 330px minmax(0, 1fr);
            gap: 1.2rem;
            align-items: start;
            margin-top: 1.2rem;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .contact-card {
            padding: 1.35rem;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .10),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .contact-card__label {
            display: inline-block;
            margin-bottom: .85rem;
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: rgba(100, 116, 139, .84);
        }

        .dark .contact-card__label {
            color: rgba(255, 255, 255, .46);
        }

        .contact-card__title {
            margin: 0;
            font-size: 1.5rem;
            line-height: 1.12;
            letter-spacing: -.04em;
            font-weight: 500;
            color: #060616;
        }

        .dark .contact-card__title {
            color: #fff;
        }

        .contact-card__text,
        .contact-card__link {
            margin: .7rem 0 0;
            font-size: 1rem;
            line-height: 1.72;
            color: rgba(71, 85, 105, .92);
            text-decoration: none;
        }

        .contact-card__link {
            display: block;
            width: fit-content;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            transition: color .25s ease, transform .25s ease;
        }

        .contact-card__link:hover {
            color: #060616;
            transform: translateX(4px);
        }

        .dark .contact-card__text,
        .dark .contact-card__link {
            color: rgba(255, 255, 255, .66);
            border-bottom-color: rgba(255, 255, 255, .10);
        }

        .dark .contact-card__link:hover {
            color: #fff;
        }

        .contact-form-card {
            padding: 1.5rem;
        }

        .contact-form-card__head {
            margin-bottom: 1.4rem;
        }

        .contact-form-card__title {
            margin: 0;
            font-size: clamp(1.9rem, 3vw, 3rem);
            line-height: 1;
            letter-spacing: -.05em;
            font-weight: 400;
            color: #060616;
        }

        .dark .contact-form-card__title {
            color: #fff;
        }

        .contact-form-card__text {
            margin: .8rem 0 0;
            font-size: 1rem;
            line-height: 1.76;
            color: rgba(71, 85, 105, .92);
        }

        .dark .contact-form-card__text {
            color: rgba(255, 255, 255, .66);
        }

        .contact-form {
            display: grid;
            gap: 1rem;
        }

        .contact-form__row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .contact-field {
            display: flex;
            flex-direction: column;
            gap: .45rem;
        }

        .contact-field label {
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: -.02em;
            color: #060616;
        }

        .dark .contact-field label {
            color: #fff;
        }

        .contact-field input,
        .contact-field select,
        .contact-field textarea {
            width: 100%;
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .82);
            color: #060616;
            border-radius: 18px;
            padding: .95rem 1rem;
            font-size: .98rem;
            line-height: 1.4;
            outline: none;
            transition: border-color .25s ease, box-shadow .25s ease, background .25s ease;
        }

        .contact-field textarea {
            min-height: 150px;
            resize: vertical;
        }

        .contact-field input:focus,
        .contact-field select:focus,
        .contact-field textarea:focus {
            border-color: rgba(99, 102, 241, .42);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .08);
        }

        .dark .contact-field input,
        .dark .contact-field select,
        .dark .contact-field textarea {
            background: rgba(255, 255, 255, .04);
            color: #fff;
            border-color: rgba(255, 255, 255, .08);
        }

        .contact-form__actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1rem;
            margin-top: .35rem;
        }

        .contact-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .7rem;
            height: 56px;
            padding: 0 1.4rem;
            border: 0;
            border-radius: 999px;
            background: #050b25;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: -.02em;
            box-shadow: 0 16px 36px rgba(11, 16, 32, .18);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .contact-submit:hover {
            transform: translateY(-2px);
        }

        .dark .contact-submit {
            background: #fff;
            color: #060616;
        }

        .contact-form__hint {
            font-size: .94rem;
            line-height: 1.6;
            color: rgba(100, 116, 139, .88);
        }

        .dark .contact-form__hint {
            color: rgba(255, 255, 255, .52);
        }

        .contact-sections {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 1.2rem;
        }

        .contact-faq-card {
            padding: 1.4rem;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .contact-faq-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .10),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .contact-faq-card h3 {
            margin: 0;
            font-size: 1.35rem;
            line-height: 1.12;
            letter-spacing: -.04em;
            font-weight: 700;
            color: #060616;
        }

        .dark .contact-faq-card h3 {
            color: #fff;
        }

        .contact-faq-card p {
            margin: .75rem 0 0;
            font-size: 1rem;
            line-height: 1.78;
            color: rgba(71, 85, 105, .92);
        }

        .dark .contact-faq-card p {
            color: rgba(255, 255, 255, .66);
        }

        .contact-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition:
                opacity .85s cubic-bezier(.22, 1, .36, 1),
                transform .95s cubic-bezier(.22, 1, .36, 1);
        }

        .contact-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes contactSpin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes contactFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes contactFloatSmall {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @media (max-width: 1279px) {

            .contact-hero,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .contact-hero__visual {
                min-height: 320px;
            }
        }

        @media (max-width: 767px) {
            .contact-page {
                padding: 4.8rem 0 5.5rem;
            }

            .contact-hero__title {
                font-size: clamp(2.3rem, 6vw, 3rem);
            }

            .contact-hero__content,
            .contact-hero__visual,
            .contact-card,
            .contact-form-card,
            .contact-faq-card {
                border-radius: 22px;
            }

            .contact-hero__content,
            .contact-form-card,
            .contact-faq-card,
            .contact-card {
                padding: 1.2rem;
            }

            .contact-form__row,
            .contact-sections {
                grid-template-columns: 1fr;
            }

            .contact-orbit__core {
                inset: 18% 8%;
                padding: 1.2rem;
                border-radius: 22px;
            }

            .contact-hero__actions,
            .contact-form__actions {
                flex-direction: column;
                align-items: stretch;
            }

            .contact-btn,
            .contact-submit {
                width: 100%;
            }
        }
    </style>

    <section class="contact-page">
        <div class="contact-page__glow contact-page__glow--one"></div>
        <div class="contact-page__glow contact-page__glow--two"></div>

        <div class="site-shell">
            <section class="contact-hero contact-reveal">
                <div class="contact-hero__content">
                    <p class="contact-hero__eyebrow">Contact</p>
                    <h1 class="contact-hero__title">
                        Let’s build something
                        <br class="hidden md:block">
                        useful and modern
                    </h1>
                    <p class="contact-hero__subtitle">
                        Tell us about your website, software, marketing, lead generation, or automation
                        idea. We will help shape it into a clean solution with clear direction.
                    </p>

                    <div class="contact-hero__actions">
                        <a href="mailto:nexolioit@gmail.com" class="contact-btn contact-btn--dark">Email Us</a>
                        <a href="https://wa.me/8801978675507" target="_blank" rel="noopener noreferrer"
                            class="contact-btn contact-btn--light">WhatsApp</a>
                    </div>
                </div>

                <div class="contact-hero__visual">
                    <div class="contact-orbit">
                        <div class="contact-orbit__ring"></div>

                        <div class="contact-orbit__core">
                            <span class="contact-orbit__label">Nexolio IT</span>
                            <h2 class="contact-orbit__title">Fast communication, clear process, premium execution</h2>
                            <p class="contact-orbit__text">
                                Share your project goals and we will guide you toward the right digital solution.
                            </p>
                        </div>

                        <div class="contact-orbit__pill contact-orbit__pill--one">Web + Software</div>
                        <div class="contact-orbit__pill contact-orbit__pill--two">Growth + Automation</div>
                    </div>
                </div>
            </section>

            <section class="contact-grid">
                <div class="contact-info">
                    <div class="contact-card contact-reveal">
                        <span class="contact-card__label">Email</span>
                        <h3 class="contact-card__title">Direct Communication</h3>
                        <a href="mailto:nexolioit@gmail.com" class="contact-card__link">nexolioit@gmail.com</a>
                    </div>

                    <div class="contact-card contact-reveal">
                        <span class="contact-card__label">Phone / WhatsApp</span>
                        <h3 class="contact-card__title">Quick Discussion</h3>
                        <a href="tel:+8801978675507" class="contact-card__link">+880 1978675507</a>
                        <a href="https://wa.me/8801978675507" target="_blank" rel="noopener noreferrer"
                            class="contact-card__link">Open WhatsApp Chat</a>
                    </div>

                    <div class="contact-card contact-reveal">
                        <span class="contact-card__label">Services</span>
                        <h3 class="contact-card__title">What we can help with</h3>
                        <p class="contact-card__text">
                            Custom web development, WordPress websites, digital marketing, lead generation, and AI
                            automation.
                        </p>
                    </div>
                </div>

                <div class="contact-form-card contact-reveal">
                    <div class="contact-form-card__head">
                        <p class="contact-section__eyebrow">Start a Project</p>
                        <h2 class="contact-form-card__title">Send your requirement</h2>
                        <p class="contact-form-card__text">
                            Fill out the form below. On submit, it will open WhatsApp with your project details pre-filled.
                        </p>
                    </div>

                    <form id="contactForm" class="contact-form">
                        <div class="contact-form__row">
                            <div class="contact-field">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Your name" required>
                            </div>

                            <div class="contact-field">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="you@example.com" required>
                            </div>
                        </div>

                        <div class="contact-form__row">
                            <div class="contact-field">
                                <label for="company">Company / Brand</label>
                                <input type="text" id="company" name="company" placeholder="Your company name">
                            </div>

                            <div class="contact-field">
                                <label for="service">Service Needed</label>
                                <select id="service" name="service" required>
                                    <option value="">Select a service</option>
                                    <option value="Custom Web Development">Custom Web Development</option>
                                    <option value="WordPress Website">WordPress Website</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Lead Generation">Lead Generation</option>
                                    <option value="AI Automation">AI Automation</option>
                                </select>
                            </div>
                        </div>

                        <div class="contact-form__row">
                            <div class="contact-field">
                                <label for="budget">Estimated Budget</label>
                                <input type="text" id="budget" name="budget" placeholder="Optional budget range">
                            </div>

                            <div class="contact-field">
                                <label for="timeline">Preferred Timeline</label>
                                <input type="text" id="timeline" name="timeline" placeholder="For example: 2 weeks">
                            </div>
                        </div>

                        <div class="contact-field">
                            <label for="message">Project Details</label>
                            <textarea id="message" name="message"
                                placeholder="Tell us about your project, goals, and required features..."
                                required></textarea>
                        </div>

                        <div class="contact-form__actions">
                            <button type="submit" class="contact-submit">Send via WhatsApp</button>
                            <span class="contact-form__hint">You can also contact us directly by email for formal
                                discussion.</span>
                        </div>
                    </form>
                </div>
            </section>

            <section class="contact-sections">
                <div class="contact-faq-card contact-reveal">
                    <p class="contact-section__eyebrow">Why Work With Us</p>
                    <h3>Clear process and practical thinking</h3>
                    <p>
                        We focus on communication, clean execution, and solutions that fit real business needs
                        instead of overcomplicating the project.
                    </p>
                </div>

                <div class="contact-faq-card contact-reveal">
                    <p class="contact-section__eyebrow">Project Fit</p>
                    <h3>For businesses that want quality</h3>
                    <p>
                        Our work is best suited for companies, brands, startups, and institutions that want
                        a polished digital presence or a useful custom system.
                    </p>
                </div>
            </section>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revealItems = document.querySelectorAll('.contact-reveal');

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

            const form = document.getElementById('contactForm');

            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const name = document.getElementById('name').value.trim();
                    const email = document.getElementById('email').value.trim();
                    const company = document.getElementById('company').value.trim();
                    const service = document.getElementById('service').value.trim();
                    const budget = document.getElementById('budget').value.trim();
                    const timeline = document.getElementById('timeline').value.trim();
                    const message = document.getElementById('message').value.trim();

                    const whatsappMessage =
                        `Hello Nexolio IT,%0A%0A` +
                        `I want to discuss a project.%0A%0A` +
                        `Name: ${encodeURIComponent(name)}%0A` +
                        `Email: ${encodeURIComponent(email)}%0A` +
                        `Company: ${encodeURIComponent(company || 'N/A')}%0A` +
                        `Service: ${encodeURIComponent(service)}%0A` +
                        `Budget: ${encodeURIComponent(budget || 'N/A')}%0A` +
                        `Timeline: ${encodeURIComponent(timeline || 'N/A')}%0A%0A` +
                        `Project Details:%0A${encodeURIComponent(message)}`;

                    const whatsappUrl = `https://wa.me/8801978675507?text=${whatsappMessage}`;
                    window.open(whatsappUrl, '_blank');
                });
            }
        });
    </script>
@endsection