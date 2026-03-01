<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { dashboard, lab1, lab41 } from '@/routes';
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Textarea from '@/components/ui/textarea/Textarea.vue';
import ArticleController from '@/actions/App/Http/Controllers/ArticleController';

defineProps<{errors:Object}>()

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Лабораторная 4',
        href: ArticleController.all.url(),
    },
    {
        title: 'Лабораторная 5',
        href: lab41().url,
    },
];
console.log(ArticleController.store.url());

</script>

<template>

    <Head title="Лабораторная 1" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Form class="p-8 space-y-8" :action="ArticleController.store.url()" method="POST" #default="{wasSuccessful}">
            <template v-if="errors">
                <ul class=" text-red-700 list">
                    <li v-for="error in errors">
                        {{ error }}
                    </li>
                </ul>
            </template>
            <template v-if="wasSuccessful">
                <p class=" text-green-700">Статья успешно создана</p>
            </template>
            <Input type="text" name="title" placeholder="Название статьи" />
            <Textarea name="text" placeholder="Текст статьи"></Textarea>
            <Button type="submit">Сохранить</Button>
        </Form>
    </AppLayout>
</template>
