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
import { computed, onMounted, ref } from 'vue';

const props = withDefaults(defineProps<{ articles: any[] }>(), {
    articles(props) {
        return [{}]
    },
})
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Лабораторная 7-2',
        href: lab3.index().url,
    },
];


onMounted(()=>{
var foldBtns: HTMLCollection = document.getElementsByClassName("fold-button");
console.log(foldBtns);
for (let element of foldBtns) {
    element.addEventListener("click", function (event) {
        if (element.textContent.trim()  == 'свернуть') {
            element.textContent  = 'развернуть'
            document.querySelector(`.one-post-${element.dataset.hide}`)?.classList.add('hidden')

        }
        else{
            element.textContent  = 'свернуть'
            document.querySelector(`.one-post-${element.dataset.hide}`)?.classList.remove('hidden')
        }
    });
}
})


</script>

<template>

    <Head title="Лабораторная 7-2">
        <link rel="stylesheet" href="/css/Lab4-2.css">
    </Head>
    <AppLayout :breadcrumbs="breadcrumbs">
        <a :href="ArticleController.createFormArticle.url()">
            <Button>Создать статью </Button>
        </a>
        <template v-for="(article, index) in articles">
            <section>
                <div class="px-20 mb-4">
                    <div class="flex flex-row justify-between">
                        <div>
                            <Link :href="ArticleController.show.url({ lab3: article.id })">
                                <h2 class=" underline">{{ article.title }}</h2>
                            </Link>
                        </div>
                        <div class="underline cursor-pointer fold-button" :data-hide="index">
                            свернуть
                        </div>
                    </div>
                    <div :class="'one-post-' + index">
                        <div class="flex justify-between " >
                            <h3 class="article-author">
                                {{ article.name_user }}
                            </h3>
                            <span class="article-created-date " >{{ article.created_at }}</span>
                        </div>
                        <div class=" line-clamp-2 article-text" >
                            {{ article.text }}
                        </div>
                    </div>
                </div>
            </section>
        </template>
    </AppLayout>
</template>
