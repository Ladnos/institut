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

const props = withDefaults(defineProps<{ articles: any[] }>(), {
    articles(props) {
        return [{}]
    },
})
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Лабораторная 4',
        href: lab3.index().url,
    },
];

</script>

<template>
    <Head title="Лабораторная 4" >
        <link rel="stylesheet" href="/css/Lab4-2.css">
    </Head>
    <AppLayout :breadcrumbs="breadcrumbs">
        <a :href="ArticleController.createFormArticle.url()">
            <Button>Создать статью </Button>
        </a>
        <template v-for="article in articles">
            <section>
                <div class="px-20 mb-4">
                    <Link :href="ArticleController.show.url({lab3:article.id})">
                        <h2 class=" underline">{{ article.title }}</h2>
                    </Link>
                    <div class="flex justify-between">
                        <h3>
                            {{ article.name_user }}
                        </h3>
                        <span>{{ article.created_at }}</span>                    
                    </div>
                    <p class=" line-clamp-2">
                        {{ article.text }}
                    </p>
                </div>
            </section>
        </template>
    </AppLayout>
</template>
