<template>
    
   <footer class="py-4 bg-light">
     <cookie-law>
        <div slot-scope="props">
          <button class="skew" @click="props.accept"><span>I accept</span></button>
          <p>
            This site uses 🍪
          </p>
          <button class="skew" @click="props.close"><span>Ignore me</span></button>
        </div>
       
      </cookie-law>
      <div class="container">
        <p class="m-0 text-center text-black">Copyright &copy; Sadalab 2020</p>
        <p class="m-0 text-center text-black"><router-link  to="/front/inst/cookiePolicy">Cookie policy</router-link></p>
      </div>
      <!-- /.container -->
    </footer>

</template>

<script>
  //import CookieLaw from 'vue-cookie-law';
  import CookieLaw from 'vue-cookie-law'

    export default {
        name: 'app-footer',
      components: { CookieLaw },
        mounted() {
            console.log('Component footer mounted.')
        }
    }
</script> 