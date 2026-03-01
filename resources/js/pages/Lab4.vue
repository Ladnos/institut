<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { dashboard, lab1 } from '@/routes';
import lab3 from '@/routes/lab3';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table'
import Button from '@/components/ui/button/Button.vue';
import ArticleController from '@/actions/App/Http/Controllers/ArticleController';
import axios from 'axios';
import { computed, ref } from 'vue';

const props = withDefaults(defineProps<{ article: any }>(),{
    article() {
        return {}
    },
})
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Лабораторная 4',
        href: ArticleController.all.url(),
    },
    {
        title: 'Статья ' + props.article.id,
        href: ArticleController.show.url(props.article.id),
    },
];

</script>

<template>

    <Head title="Лабораторная 4" >
        <link rel="stylesheet" href="/css/Lab4-2.css">
    </Head>

    <AppLayout :breadcrumbs="breadcrumbs">
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
    </AppLayout>
</template>
