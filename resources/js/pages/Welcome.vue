<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { dashboard, login, register } from '@/routes';
import { $ } from 'jquery';
import Lab8 from './Lab8.vue';
import Lab8Content from './Lab8Content.vue';

withDefaults(
    defineProps<{
        canRegister: boolean;
        articles:any
    }>(),
    {
        canRegister: true,
    },
);
$(document).ready(function () {
    var yPosition;
    var scrolled = 0;
    var parallaxElements = $('.icons-for-parallax img');
    console.log(parallaxElements);
    
    $(window).scroll(function () {
        scrolled = $(window).scrollTop();
        for (var i = 0; i < parallaxElements.length; i++) {
            yPosition = (scrolled * 0.15 * (i + 1));
            parallaxElements.eq(i).css({ top: yPosition });
        }
    });
});
</script>

<template>

    <Head title="Коллективный блог ">
        <link rel="stylesheet" href="/css/Lab9.css">
    </Head>
    <main>
        <div class=" min-h-screen mx-auto flex h-full w-full max-w-7xl flex-1 flex-col ">
            <img src="/favicon.svg" class="text-center h-40 logo mb-30">
            <div class="flex flex-row h-80  items-center">
                <div class=" h-full flex flex-col justify-around" >
                    <h1 class="service-title">Коллективный блог</h1>
                    <div v-if="!$page.props.auth.user"  class="flex justify-between">
                        <h4 class="underline">
                            <a :href="register.url()" class="register-link">Регистрация</a>
                        </h4>
                        <h4 class="underline">
                            <a :href="login.url()" class="register-link">Вход</a>
                        </h4>
                    </div>
                </div>
                <div class="icons-for-parallax flex-1 w-full relative">
                    <img class="icon-for-parallax-first" src="/img/file.png">
                    <img class="icon-for-parallax-second" src="/img/file.png">
                    <img class="icon-for-parallax-third" src="/img/file.png">
                </div>
            </div>
            <Lab8Content :articles="articles"></Lab8Content>
        </div>
    </main>

</template>
