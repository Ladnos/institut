<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { BookOpen, FlaskConicalIcon, Folder, LayoutGrid } from 'lucide-vue-next';
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import AppLogo from './AppLogo.vue';
import { dashboard, lab1, lab2, lab41, lab7, lab72, lab8 } from '@/routes';
import lab3 from '@/routes/lab3';
import ArticleController from '@/actions/App/Http/Controllers/ArticleController';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Лабораторная 2',
        href: lab1(),
        icon: FlaskConicalIcon,
    },
    {
        title: 'Лабораторная 2 - 2 задание',
        href: lab2(),
        icon: FlaskConicalIcon,
    },
    {
        title: 'Лабораторная 3',
        href: ArticleController.index.url(),
        icon: FlaskConicalIcon,
    },
    {
        title: 'Лабораторная 4',
        href: ArticleController.all.url(),
        icon: FlaskConicalIcon,
    },
    {
        title: 'Лабораторная 7',
        href: lab7(),
        icon: FlaskConicalIcon,
    },
    {
        title: 'Лабораторная 7 задание 2',
        href: lab72(),
        icon: FlaskConicalIcon,
    },
    {
        title: 'Лабораторная 8',
        href: lab8(),
        icon: FlaskConicalIcon,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Github Repo',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#vue',
        icon: BookOpen,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
