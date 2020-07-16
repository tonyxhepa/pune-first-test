import Vue from "vue";
import VueRouter from "vue-router";

import AdminIndex from "./components/admin/AdminIndex";
import CategoryIndex from './components/admin/categories/CategoryIndex';
import CategoryCreate from './components/admin/categories/CategoryCreate';
import CategoryEdit from './components/admin/categories/CategoryEdit';
import CategoryShow from "./components/admin/categories/CategoryShow";
import CountryIndex from "./components/admin/countries/CountryIndex";
import CountryCreate from "./components/admin/countries/CountryCreate";
import CountryEdit from "./components/admin/countries/CountryEdit";
import CityCreate from "./components/admin/cities/CityCreate";
import CityEdit from "./components/admin/cities/CityEdit";
import CityIndex from "./components/admin/cities/CityIndex";
import TypeCreate from "./components/admin/types/TypeCreate";
import TypeEdit from "./components/admin/types/TypeEdit";
import TypeIndex from "./components/admin/types/TypeIndex";
import CurrencyCreate from "./components/admin/currencies/CurrencyCreate";
import CurrencyEdit from "./components/admin/currencies/CurrencyEdit";
import CurrencyIndex from "./components/admin/currencies/CurrencyIndex";
import ExperienceCreate from "./components/admin/ecperiences/ExperienceCreate";
import ExperienceEdit from "./components/admin/ecperiences/ExperienceEdit";
import ExperienceIndex from "./components/admin/ecperiences/ExperienceIndex";
import JobCreate from "./components/admin/jobs/JobCreate";
import JobEdit from "./components/admin/jobs/JobEdit";
import JobIndex from "./components/admin/jobs/JobIndex";
import JobShow from "./components/admin/jobs/JobShow";

Vue.use(VueRouter);



const routes = [
    { path: '',
        name: 'Home',
        component: AdminIndex
    },
    {
        path: '/admin/jobs',
        name: 'JobIndex',
        component: JobIndex
    },
    {
        path: '/admin/jobs/create',
        name: 'JobCreate',
        component: JobCreate
    },
    {
        path: '/admin/jobs/:jobId/edit',
        name: 'JobEdit',
        component: JobEdit
    },
    {
        path: '/admin/jobs/:categoryId',
        name: 'JobShow',
        component: JobShow
    },
    {
        path: '/admin/categories',
        name: 'CategoryIndex',
        component: CategoryIndex
    },
    {
        path: '/admin/categories/create',
        name: 'CategoryCreate',
        component: CategoryCreate
    },
    {
        path: '/admin/categories/:categoryId/edit',
        name: 'CategoryEdit',
        component: CategoryEdit
    },
    {
        path: '/admin/categories/:categoryId',
        name: 'CategoryShow',
        component: CategoryShow
    },
    {
        path: '/admin/countries',
        name: 'CountryIndex',
        component: CountryIndex
    },
    {
        path: '/admin/countries/create',
        name: 'CountryCreate',
        component: CountryCreate
    },
    {
        path: '/admin/countries/:countryId/edit',
        name: 'CountryEdit',
        component: CountryEdit
    },
    {
        path: '/admin/countries/:countryId/cities',
        name: 'CityIndex',
        component: CityIndex
    },
    {
        path: '/admin/countries/:countryId/cities/create',
        name: 'CityCreate',
        component: CityCreate
    },
    {
        path: '/admin/countries/:countryId/cities/:cityId/edit',
        name: 'CityEdit',
        component: CityEdit
    },
    {
        path: '/admin/types',
        name: 'TypeIndex',
        component: TypeIndex
    },
    {
        path: '/admin/types/create',
        name: 'TypeCreate',
        component: TypeCreate
    },
    {
        path: '/admin/types/:typeId/edit',
        name: 'TypeEdit',
        component: TypeEdit
    },
    {
        path: '/admin/currencies',
        name: 'CurrencyIndex',
        component: CurrencyIndex
    },
    {
        path: '/admin/currencies/create',
        name: 'CurrencyCreate',
        component: CurrencyCreate
    },
    {
        path: '/admin/currencies/:currencyId/edit',
        name: 'CurrencyEdit',
        component: CurrencyEdit
    },
    {
        path: '/admin/experiences',
        name: 'ExperienceIndex',
        component: ExperienceIndex
    },
    {
        path: '/admin/experiences/create',
        name: 'ExperienceCreate',
        component: ExperienceCreate
    },
    {
        path: '/admin/experiences/:experienceId/edit',
        name: 'ExperienceEdit',
        component: ExperienceEdit
    },

];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
