<template>
    
  <b-container fluid style="margin: 0px; padding: 0px">
  
      <TopNavBar/>

      <div class="jumbotron big-banner "  >
    <div class="container-fluid" style="margin-left: 6vw">

        <div class="row align-items-center" style="padding-top: 21vh">
                <div class="col-7 text-light " >
                    <h1 class="title-text-overlay-img font-weight-bold display-4" >Farming Helper </h1>
                    <h3 class=" font-weight-bold"> {{ $t('title') }}</h3>
  
                </div>
          </div>
  
    </div>
  </div>
  
<div class="container-fluid position-sticky bar-green">

</div> 
 
<section id="what">
      <div class="container-fluid " style="height: 50vh ;">
          <div class="row align-items-center " style="padding: 15px; ">
                  <div class="col " >
                      <h1 class=" title-text font-weight-bold " style="padding: 35px; font-size: 40px" >What we do</h1>
                       <div class="row "
                        >

                         <div class="col-3  text-center" >
                          <img src="img/flower.png" style=" height: 100px; margin: 10px">
                            <p style="font-size: 20px">Crop monitoring</p>
                         </div>

                         <div class="col-3  text-center" >
                          <img src="img/advisor.png" style=" height: 100px; margin: 10px ">
                            <p style="font-size: 20px">Tips and analyse crops</p>
                         </div>

                         <div class="col-3  text-center" >
                          <img src="img/resources.png" style=" height: 100px; margin: 10px ">
                            <p style="font-size: 20px">Resource Reduction</p>
                         </div>

                         <div class="col-3  text-center" >
                          <img src="img/network.png" style=" height: 100px; margin: 10px ">
                            <p style="font-size: 20px">Always with you</p>
                         </div>

                            
                       </div>
                  </div>
            </div>
  </div>
</section>


<section id="for">
<div class="container-fluid" style=" background-color: green">
  
          <div class="row align-items-center" style="padding: 20px; margin: 20px">
                <div class="col " >
                   <!--  <h1 class=" title-text font-weight-bold " style="padding: 35px;padding-bottom: 0px; font-size: 40px" >For </h1> -->
                    <div class="col-8 offset-md-2  text-center" >
                          <p  style="font-size: 33px; margin: 30px; color: white;  ">
Created for Farmers and Agronomists, but also for small home-grown crops, or enthusiasts</p>


                     </div>
  
                </div>
          </div>
  </div>
</section>

      
<section id="product">
  <div class="container-fluid ">
          <div class="row align-items-center" style="padding: 20px; margin: 25px">
                <div class="col " >
                  
                    <h1 class=" title-text font-weight-bold " style="padding: 35px; font-size: 40px" >Product</h1>
                      <div class="row" >
                        <div class="col-6  text-center" style="margin-top: 25px" >
                            <img  src="img/prodSiteTransp.png" alt="Generic placeholder image" width="600" height="450">
                      </div>
                       <div class="col-5   text-center" >
                            <img  src="img/devicesMap.png" alt="Generic placeholder image" width="400" height="300" style="margin-bottom: 20px">
                     
                            <img  src="img/graph.png" alt="Generic placeholder image" width="400" height="300">
                      </div>
                    </div>
                </div>
          </div>
    </div>
</section>

<section id="who">
 <div class="container-fluid " style="background-color: #DBDBDB">
          <div class="row align-items-center" style="padding: 20px; margin: 25px">
                <div class="col " >
                    <h1 class=" title-text font-weight-bold " style="padding: 35px; font-size: 40px" >Founders</h1>
<div >
            <div class="row">
              <div class="col-3 offset-md-1" align="center">
                <img class="rounded-circle" src="img/nascimento.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>João Martins</h2>
                <p style="font-size: 17px">CEO and Developer</p><br>
              
              </div>
              <div class="col-3 offset-md-1" align="center">
                <img class="rounded-circle" src="img/cruz.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>João Cruz</h2>
                <p style="font-size: 17px">Commercial and Logistic</p>
              
              </div>
              <div class="col-3 offset-md-1" align="center">
                <img class="rounded-circle" src="img/trigo.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Nuno Trigo</h2>
                <p style="font-size: 17px">Marketing and Farmer</p><br>
               
              </div>
            </div>
       </div>

                </div>
    </div>
    </div>
</section>



<section id="contact">
      <div class="container-fluid " style="padding: 25px">
         <div class="well well-sm">
        <h1 class=" title-text font-weight-bold " style="padding: 20px; font-size: 40px" ><strong>Where we are</strong></h1>
    </div>
  
  <div class="row">
    <div class="col-md-7">
        <iframe src="https://www.google.com/maps/embed/v1/view?zoom=12&center=39.7495,-8.8077&key=AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <div class="col-md-5">
           <h1 class=" title-text font-weight-bold " style=" font-size: 25px" ><strong>More info:</strong></h1>


        <form v-on:submit.prevent="onSubmit">
          <div class="form-group">
            <input v-model="form.name" class="form-control"  id="name" type="text" name="name" placeholder="Name"   required >
          </div>
          <div class="form-group">
            <input v-model="form.email"  class="form-control"  id="email" type="email" name="email" placeholder="E-mail" >

          </div>
          <div class="form-group">
             <input v-model="form.phone"  class="form-control"  id="phone" type="phone" name="phone" placeholder="Phone" >

          </div>
          <div class="form-group">
            <textarea name="message"  class="form-control" v-model="form.message"  id="message" rows="3" placeholder="Message" ></textarea>

          </div>
           
           <input type="checkbox" id="cookie" v-model="cookiePolicy">
          <label for="cookie">I have read and accept the <router-link  to="/front/inst/cookiePolicy">Cookie policy</router-link></label>

          <input type="checkbox" id="newsletter" v-model="newsletter">
          <label for="newsletter">I accept getting e-mails from Sadalab with news and marketing materials.</label>


          <div class="form-group">
            <g-recaptcha  ref="gRecaptcha" class="g-recaptcha" :sitekey="sitekey"
            :callback="callback"></g-recaptcha>
          </div>


          <button class="btn btn-lg btn-block" type="submit"  style="background-color: green; color: white ">
              Contact
          </button>

        </form>


      </div>
    </div>
   

      </div>
    </section>
<!-- </div> -->
</b-container>

</template>

<script>

import TopNavBar from "../../layouts/TopNavBar";

export default {
  name: "Welcome",
  components: {
    TopNavBar,
    
  },
  data() {
     return{
      
       form:{
          name: this.name,
          email: this.email,
          phone: this.phone,                  
          message: this.message,
        },
      cookiePolicy: false,
      newsletter: false,
      sitekey: '6Lc_KocUAAAAAFp3Z47n9Tm_D7YajARvhFFchxSt',
      errors: [],
      isSubmitting: false,
      token: null,

    };
  },
  created() {
  },
  methods: {
    callback (token) {
            this.token=token;
            console.log("tokenSave "+this.token);
          },

          onSubmit: function () {
            if( this.token!=null){              

              if(this.newsletter==false || this.cookiePolicy==false){
                  alert("Please accept the terms");
                }else{                  
                  this.moreinfo()
                  
                }
            }
            console.log('on submit')
          },


          reset(){
            this.$refs.gRecaptcha.reset(this.token);
            this.form.name = '';
            this.form.email = '';
            this.form.phone = '';
            this.form.message = '';
            this.token = null; 
          },

        moreinfo: function() {
          
          if( this.form.phone== null ){
            console.log("phone empty");
            this.form.phone = "000000000"
          }
              console.log("in moreinfo"+this.token);
            axios.post('api/moreinfo/create',{
                      name: this.form.name,
                      email: this.form.email,                                           
                      phone: this.form.phone,
                      message: this.form.message,
                      token: this.token
                    }).then((response) => {
                      this.reset();
                      //alert('form would be posted!');

                }).catch((error) => {
                    console.log('test error'+JSON.stringify(error));
                    
                  });  
            
          },
    
  }
};
</script>

<style scoped>
  .big-banner {
  background-image: url(/img/landingFull.jpeg);
  background-size: cover;
  height: 85vh;
  width: 100vw;
  position: relative;
  top: 0;
  margin: 0px;
}
</style>
