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
import { $ } from "jquery";
import { transform } from 'typescript';
const props = withDefaults(defineProps<{ articles: any[] }>(), {
    articles(props) {
        return [{}]
    },
})
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Лабораторная 8',
        href: lab3.index().url,
    },
];
$(document).ready(function () {
    $('.one-post').on("mouseenter", function (event) {
        
        $(event.currentTarget).find('.one-post-shadow').animate({
            opacity:
                '0.1'
        }, 300);
    })
    $('.one-post').on("mouseleave", function (event) {
        $(event.currentTarget).find('.one-post-shadow').animate({ opacity: '0' },
            300);
    })
});
$(document).ready(function () {
    $('.logo').on("mouseenter", function (event) {
        
        $(event.currentTarget).animate({width: '90px' }, 300)
    })
    $('.logo').on("mouseleave", function (event) {
        $(event.currentTarget).animate({width: '70px'}, 300)

    })
});
onMounted(() => {
    var foldBtns: HTMLCollection = document.getElementsByClassName("fold-button");
    console.log(foldBtns);
    for (let element of foldBtns) {
        element.addEventListener("click", function (event) {
            if (element.textContent.trim() == 'Свернуть') {
                element.textContent = 'Развернуть'
                element.closest('.one-post')?.classList.add('hidden')

            }
            else {
                element.textContent = 'Свернуть'
                element.closest('.one-post')?.classList.remove('hidden')
            }
        });
    }
})


</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="Лабораторная 7-2">
        <link rel="stylesheet" href="/css/Lab4-2.css">
    </Head>
        <a :href="ArticleController.createFormArticle.url()">
            <Button>Создать статью </Button>
        </a>
            <img src="/favicon.svg" class="normalLab logo">

        <template v-for="(article, index) in articles">
                <div class="one-post relative">
                    <div class="post-managment">
                        <h2 class="post-title">
                            <a class="underline" :href="ArticleController.show.url({lab3:article.id})">
                                {{ article.title }}
                            </a>
                        </h2>
                        <p class="fold-button">Свернуть</p>
                    </div>
                    <div class="article-info">
                        <div class="article-author">{{ article.name_user }}</div>
                        <div class="article-created-date">{{ article.created_at }}</div>
                    </div>
                    <p class="article-text">{{ article.text }}</p>
                    <div class="one-post-shadow"></div>
                </div>
        </template>

    </AppLayout>
</template>
