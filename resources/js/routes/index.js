import Vue from "vue";
import VueRouter from "vue-router";

import { routes } from "./routes";
import { checkAuthMiddleware,checkRoleAccessMiddleware } from './middlewares'


Vue.use(VueRouter);


const router = new VueRouter({ 
    routes,
    linkActiveClass: "active",
    mode: "history"
}); 


router.beforeEach(checkAuthMiddleware) 
router.beforeEach(checkRoleAccessMiddleware)




export default router;
