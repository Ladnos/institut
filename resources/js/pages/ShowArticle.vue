<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { dashboard, login, logout, register } from '@/routes';
import { $ } from 'jquery';
import Lab8 from './Lab8.vue';
import Lab8Content from './Lab8Content.vue';
const props = withDefaults(defineProps<{ article: any }>(),{
    article() {
        return {}
    },
})
</script>

<template>

    <Head title="Коллективный блог ">
        <link rel="stylesheet" href="/css/Lab9.css">
    </Head>
    <main>
        <div class=" min-h-screen mx-auto flex h-full w-full max-w-7xl flex-1 flex-col ">
            <img src="/favicon.svg" class="header h-20 my-8">
            <div class="archive space-y-8">
                <h1 class="post-title">
                    {{ article.title }}
                </h1>
                <div class="flex justify-between">
                    <h3 class="article-author">
                        {{ article.name_user }}
                    </h3>
                    <span class="article-created-date">{{ article.created_at }}</span>
                </div>
                <p>
                    {{ article.text }}
                </p>
            </div>
        </div>
    </main>

</template>
