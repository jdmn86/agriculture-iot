import Vue from "vue";
import VueRouter from "vue-router";

import Store from "./../stores";
import { routes } from "./routes";
// import { initCurrentUserStateMiddleware, checkAccessMiddleware, setPageTitleMiddleware } from './middlewares'
import { checkAccessMiddleware,checkRouteAccessMiddleware } from './middlewares'


Vue.use(VueRouter);


const router = new VueRouter({ 
    routes,
    linkActiveClass: "active",
    mode: "history"
});


router.beforeEach(checkAccessMiddleware)
router.beforeEach(checkRouteAccessMiddleware)

// router.beforeEach(setPageTitleMiddleware)





export default router;
