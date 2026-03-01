<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { dashboard, lab1, lab7 } from '@/routes';
import AppLogo from '@/components/AppLogo.vue';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { computed, ref } from 'vue';
import Input from '@/components/ui/input/Input.vue';
import { refThrottled } from '@vueuse/core';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Лабораторная 7',
        href: lab7().url,
    },
];
var data = [
    {
        "name": "Василий",
        "group": "912-2",
        "age": 19,
        "marks": [4, 3, 5, 5, 4]
    },
    {
        "name": "Анна",
        "group": "912-1",
        "age": 18,
        "marks": [3, 2, 3, 4, 3]
    },
    {
        "name": "Георгий",
        "group": "912-2",
        "age": 19,
        "marks": [3, 5, 4, 3, 5]
    },
    {
        "name": "Валентина",
        "group": "912-1",
        "age": 18,
        "marks": [5, 5, 5, 4, 5]
    }
]
let group = ref('')
console.log(data)
console.table(data)

let filteredGroups = computed(()=>{
    console.log(group.value);
    
    if (group.value != '') {
        let memo = data.filter((element)=>{
            if (element.group == group.value) {
                return element
            }
        })
        console.log('------------------------------------------------------------------------')
        console.log(memo)
        console.table(memo)
        return memo ?? []
    }else
    {
        return data
    }
})
</script>

<template>

    <Head title="Лабораторная 7">
    </Head>

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="space-y-4">
            <h4>Номер группы</h4>
            <Input class="w-80" placeholder="Номер группы" v-model="group"></Input>
            <hr class="h-1">
            <div v-html="filteredGroups.map((element)=> JSON.stringify(element)+'<br/>')">
            </div>
        </div>
    </AppLayout>
</template>
