import Vue from "vue";
import VueRouter from 'vue-router';

import Dashboard from "../pages/Dashboard";
import Profile from "../pages/Profile";
import Test from "../pages/Test";
import Leads from "../pages/Leads";
import Contacts from "../pages/Contacts";
import Calendar from "../pages/Calendar";
import Portfolio from "../pages/Portfolio";
import Extractor from "../pages/Extractor";
import Info from "../pages/Info";
import Settings from "../pages/Settings";
import Sign from "../pages/Sign";

Vue.use(VueRouter);

let router = new VueRouter({
    mode:"history",
    routes:[
        {
            path:'/sign', 
            name:"sign", 
            meta: { title: "CPN - Connexion" },  
            component:Sign,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                next()
            }
        },
        {
            path:'/dashboard', 
            name:"dashboard", 
            meta: { title: "CPN - Tableau de bord" },  
            component:Dashboard,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/profile', 
            name:"profile", 
            meta: { title: "CPN - Profile" },  
            component:Profile,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/test', 
            name:"test", 
            meta: { title: "CPN - Test d'éligibilité" },  
            component:Test,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/leads', 
            name:"leads", 
            meta: { title: "CPN - Leads contact" },  
            component:Leads,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/contacts', 
            name:"contacts", 
            meta: { title: "CPN - Répertoire" },  
            component:Contacts,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/calendar', 
            name:"calendar", 
            meta: { title: "CPN - Agenda" },  
            component:Calendar,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/portfolio', 
            name:"portfolio", 
            meta: { title: "CPN - Portefeuille" },  
            component:Portfolio,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/extractor', 
            name:"extractor", 
            meta: { title: "CPN - Extraction" },  
            component:Extractor,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/info', 
            name:"info", 
            meta: { title: "CPN - Info" },  
            component:Info,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
        {
            path:'/settings', 
            name:"settings", 
            meta: { title: "CPN - Réglages" },  
            component:Settings,
            beforeEnter:(to,from,next)=>{
                window.document.title = to.meta && to.meta.title ? to.meta.title : 'CPN';
                //(localStorage.getItem("token"))?next():next({path:""});
                if(from.fullPath == "/test" && !confirm("Si vous quitter la page tous les données seront perdus !")) next(false)
                else next()
            }
        },
    ]
})

export default router;