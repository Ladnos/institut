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

const props = withDefaults(defineProps<{ articles: any[] }>(),{
    articles(props) {
        return [{}]
    },
})
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Лабораторная 3',
        href: lab3.index().url,
    },
];
function removeUserColumns(articles:any[]) {
    console.log(articles?.map(({ user, user_id, ...rest }) => rest) || []);
    
  return articles?.map(({ user, user_id, ...rest }) => rest) || [];
}
let test = props.articles
let data = ref(removeUserColumns(test))
async function createHandler()
{
    let response = await axios.get(ArticleController.create.url());
    data.value = removeUserColumns(response.data)
    
}
</script>

<template>

    <Head title="Лабораторная 3" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Button v-on:click="createHandler" >Создать экземпляр Article </Button>
        <div>
            <h1>Создание атрибутов модели</h1>
            <img src="/img/migration.png" alt="">
        </div>
        <div>
            <h1>Создание методов модели</h1>
            <img src="/img/model.png" alt="">
        </div>
        <div>
            <h1>Создание контроллера </h1>
            <img src="/img/controller.png" alt="">
        </div>
        <div>
            <h1>просмотр таблицы БД через Heidi.sql </h1>
            <img src="/img/db_inspector.png" alt="">
        </div>
        <div>
            <h1>Создание записи в БД через Heidi.sql </h1>
            <img src="/img/db_createion.png" alt="">
        </div>
        <h1>Таблица</h1>
        <Table v-if="data[0]" class="w-full table-fixed">
            <TableCaption>Данные модели Article</TableCaption>
            <TableHeader>
                <TableRow>
                        <TableHead class="text-center">#</TableHead>
                    <template v-for=" key in Object.keys(data[0])">
                        <TableHead class="text-center">{{ key }}</TableHead>
                    </template>
                </TableRow>
            </TableHeader>
            <TableBody>
                <template v-for="(value, index) in data">
                    <TableRow class=" w-full">
                            <TableCell class="text-wrap!  text-center px-2 py-2 align-top">{{ index+1 }}</TableCell>
                        <template v-for="item in Object.keys(value)">
                            <TableCell class="text-wrap!  text-center px-2 py-2 align-top">{{ value[item] }}</TableCell>
                        </template>
                    </TableRow>
                </template>
            </TableBody>
        </Table>
    </AppLayout>
</template>
