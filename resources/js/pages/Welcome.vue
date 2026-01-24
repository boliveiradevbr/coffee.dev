<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';

defineProps({
    posts: Array<{
        id: number,
        title: string,
        date: string,
        excerpt: string
    }>,
});

onMounted(() => {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('show'); });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
})

const year = new Date().getFullYear();
</script>

<template>
    <Head title="Welcome">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>coffee.dev — Code. Coffee. Creativity.</title>

        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=JetBrains+Mono:wght@400;600;700&display=swap"
            rel="stylesheet"
        />

        <!-- Icons -->
        <link href="https://unpkg.com/phosphor-icons@1.4.2/src/css/icons.css" rel="stylesheet" />
    </Head>
    <header>
        <div class="nav container">
            <div class="logo">
                <a href="#hero">
                    <img src="/images/logo-40x40.png" alt="logo" />
                    <span>coffee<span>.</span>dev</span>
                </a>
            </div>
            <nav class="menu">
                <a href="#services">Serviços</a>
                <a href="#process">Processo</a>
                <a href="#blog">Blog</a>
                <a href="#contact">Contato</a>
            </nav>
            <a href="#contact" class="btn btn-primary"> <i class="ph-coffee"></i> Fale com a gente </a>
        </div>
    </header>

    <section id="hero" class="hero">
        <div class="hero-content fade-up container">
            <div class="hero-badges">
                <span><i class="ph-code"></i> Código limpo</span>
                <span><i class="ph-coffee"></i> Muito café</span>
                <span><i class="ph-rocket"></i> Produtos reais</span>
            </div>
            <h1>Software feito com código limpo e café forte.</h1>
            <p>Criamos produtos digitais para startups e empresas que valorizam tecnologia bem feita, performance e experiência.</p>
            <div class="hero-cta">
                <a href="#contact" class="btn btn-primary"><i class="ph-chat"></i> Vamos conversar</a>
                <a href="#services" class="btn"><i class="ph-arrow-down"></i> Ver serviços</a>
            </div>
        </div>
        <div class="hero-bg">&lt;/&gt;</div>
    </section>

    <section id="services">
        <div class="container">
            <div class="grid">
                <div class="card fade-up">
                    <i class="ph-code"></i>
                    <h3>Software sob medida</h3>
                    <p>Desenvolvimento focado em performance, escalabilidade e boas práticas.</p>
                </div>
                <div class="card fade-up">
                    <i class="ph-cloud"></i>
                    <h3>SaaS & Plataformas</h3>
                    <p>Produtos digitais completos, do MVP à escala.</p>
                </div>
                <div class="card fade-up">
                    <i class="ph-plugs"></i>
                    <h3>APIs & Integrações</h3>
                    <p>Integrações seguras e eficientes entre sistemas.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="process">
        <div class="container">
            <div class="steps">
                <div class="step fade-up">
                    <span>01</span>
                    <p>Entendimento profundo do negócio</p>
                </div>
                <div class="step fade-up">
                    <span>02</span>
                    <p>Planejamento técnico e UX</p>
                </div>
                <div class="step fade-up">
                    <span>03</span>
                    <p>Desenvolvimento iterativo</p>
                </div>
                <div class="step fade-up">
                    <span>04</span>
                    <p>Entrega, métricas e evolução contínua</p>
                </div>
            </div>
        </div>
    </section>

    <section id="blog">
        <div class="container">
            <h2 style="margin-bottom: 16px">Blog <i class="ph-bookmarks"></i></h2>
            <p style="max-width: 640px; opacity: 0.8; margin-bottom: 48px">
                Conteúdo sobre programação, mercado, carreira dev, SaaS e bastidores de quem vive código e café todos os dias.
            </p>
            <div class="grid" id="blog-posts" v-if="posts?.length > 0">
                <div class="card fade-up" v-for="post in posts" :key="post.id">
                    <div class="post-cover">CAPA</div>
                    <div class="post-meta">{{ post.date }}}</div>
                    <h3>{{ post.title }}</h3>
                    <p style="opacity:.8;">{{ post.excerpt }}</p>
                    <a href="#" class="read-more">Continue lendo →</a>
                </div>
            </div>
            <div class="grid" id="blog-posts" v-else>
                <div class="card fade-up">
                    <p>Volte mais tarde, teremos muitas novidades...</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="fade-up container">
            <h2>Vamos tomar um café <i class="ph-coffee"></i></h2>
            <p>Conte um pouco sobre sua ideia ou desafio. Respondemos rápido e com objetividade.</p>
            <form>
                <input type="text" placeholder="Seu nome" required />
                <input type="email" placeholder="Seu e-mail" required />
                <textarea rows="8" placeholder="Conte um pouco sobre o projeto"></textarea>
                <button class="btn btn-primary" type="submit"><i class="ph-paper-plane"></i> Enviar mensagem</button>
            </form>
            <div class="social-links">
                <a href="#" aria-label="GitHub"><i class="ph-github-logo"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="ph-linkedin-logo"></i></a>
                <a href="#" aria-label="Instagram"><i class="ph-instagram-logo"></i></a>
                <a href="#" aria-label="Twitter"><i class="ph-twitter-logo"></i></a>
            </div>
        </div>
    </section>

    <footer>coffee.dev &copy; {{ year}} · Code. Coffee. Creativity.</footer>
</template>
