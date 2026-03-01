<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { dashboard, lab1 } from '@/routes';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Лабораторная 1',
        href: lab1().url,
    },
];
</script>

<template>

    <Head title="Лабораторная 1" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div>
            <h1>Привет, Мир!</h1>
            <h2>Это учебный сайт, с его помощью будут изучены технологии
                php/laravel, html/css.</h2>
            <h3>Как видите, здесь используются заголовки различных
                уровней.</h3>
            <p>Здесь есть маркированный список:</p>
            <h4>Заголовок маркированного списка</h4>
            <ul class="list">
                <li>Элемент 1;</li>
                <li>элемент 2;</li>
                <li>элемент 3;</li>
                <li>последний элемент.</li>
            </ul>
            <p>И нумерованный список:</p>
            <h4>Заголовок нумерованного списка</h4>
            <ol class="list">
                <li>Элемент 1;</li>
                <li>элемент 2;</li>
                <li>элемент 3;</li>
                <li>последний элемент.</li>
            </ol>
            <p>И даже таблица:</p>
            <table  class=" border-none ">
                <thead>
                    <tr class="text-left ">
                        <th>Столбик 1</th>
                        <th>Столбик 2</th>
                        <th>Столбик 3</th>
                        <th>Столбик 4</th>
                    </tr>
                </thead>
                <tr>
                    <td>Строка 1 Столбец 1</td>
                    <td>Строка 1 Столбец 2</td>
                    <td>Строка 1 Столбец 3</td>
                    <td>Строка 1 Столбец 4</td>
                    
                </tr>
                <tr>
                    <td>Строка 2 Столбец 1</td>
                    <td>Строка 2 Столбец 2</td>
                    <td>Строка 2 Столбец 3</td>
                    <td>Строка 2 Столбец 4</td>
                    
                </tr>
                <tr>
                    <td>Строка 3 Столбец 1</td>
                    <td>Строка 3 Столбец 2</td>
                    <td>Строка 3 Столбец 3</td>
                    <td>Строка 3 Столбец 4</td>
                    
                </tr>
                <tr>
                    <td>Строка 3 Столбец 1</td>
                    <td>Строка 3 Столбец 2</td>
                    <td>Строка 3 Столбец 3</td>
                    <td>Строка 3 Столбец 4</td>
                    
                </tr>
                <tr>
                    <td>Строка 4 Столбец 1</td>
                    <td>Строка 4 Столбец 2</td>
                    <td>Строка 4 Столбец 3</td>
                    <td>Строка 4 Столбец 4</td>
                </tr>
            </table>
        </div>
    </AppLayout>
</template>
<style lang="css" scoped>
    td{
        padding: 2rem;
    }
    th{
        padding: 2rem;
    }
</style>