<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthBase from '@/layouts/AuthLayout.vue';
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import Textarea from '@/components/ui/textarea/Textarea.vue';
import ArticleController from '@/actions/App/Http/Controllers/ArticleController';
defineProps<{
    status?: string;
}>();
</script>

<template>
    <AuthBase
        title="Создайте статью"
        description="На этой странице вы можете создать статью"
    >
        <Head title="Log in" />

        <div
            v-if="status"
            class="mb-4 text-center text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <Form
            :action="ArticleController.store.url()" method="POST"
            v-slot="{ errors, processing }"
            class="flex flex-col gap-6"
        >
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="title">Название статьи</Label>
                    <Input
                        id="title"
                        type="text"
                        name="title"
                        required
                        autofocus
                        :tabindex="1"
                        placeholder="Название статьи"
                    />
                    <InputError :message="errors.title" />
                </div>

                <div class="grid gap-2">
                    <Label for="title">Текст статьи</Label>
                    <Textarea
                        id="text"
                        name="text"
                        required
                        :tabindex="2"
                        placeholder="Текст статьи"
                    />
                    <InputError :message="errors.text" />
                </div>

                <Button
                    type="submit"
                    class="mt-4 w-full"
                    :tabindex="4"
                    :disabled="processing"
                >
                    <Spinner v-if="processing" />
                    Сохранить
                </Button>
            </div>
        </Form>
    </AuthBase>
</template>
