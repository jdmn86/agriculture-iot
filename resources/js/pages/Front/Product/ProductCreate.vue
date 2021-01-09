<template>

<b-container style="padding: 0px" >

    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

    <b-col sm="6" >

      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
          <b-row align-h="center" align-v="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-1">
              <h4 >Save Product</h4>
            </b-col>
            <!-- <b-col cols="auto" class="p-1" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col> -->
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(saveProduct)" style="margin-top: 40px;margin-left: 25px">

      <ValidationProvider 
        name="name" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-name" label="Name" label-for="input-name"> 
                    <b-form-input
                        id="input-name"
                        name="input-name"
                        v-model="product.name"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-name-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-name-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>



      <ValidationProvider 
        name="brand" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-brand" label="Name brand" label-for="input-brand"> 
                    <b-form-input
                        id="input-brand"
                        name="input-brand"
                        v-model="product.brand"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-brand-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-brand-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


 <ValidationProvider 
        name="is_biologic" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-is_biologic" label="is_biologic : " label-for="input-is_biologic">
                    <b-form-checkbox
                      id="input-is_biologic"
                      name="input-is_biologic"
                      v-model="product.is_biologic"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-is_biologic-live-feedback"
                    ></b-form-checkbox>

<b-form-invalid-feedback id="input-is_biologic-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

   <ValidationProvider 
        name="is_liquid" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-is_liquid" label="is_liquid : " label-for="input-is_liquid">
                    <b-form-checkbox
                      id="input-is_liquid"
                      name="input-is_liquid"
                      v-model="product.is_liquid"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-is_liquid-live-feedback"
                    ></b-form-checkbox>

<b-form-invalid-feedback id="input-is_liquid-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


   <ValidationProvider 
        name="quantityL" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-quantityL" label="quantityL : " label-for="input-quantityL">
                    <b-form-input
                      id="input-quantityL"
                      name="input-quantityL"
                      v-model="product.quantityL"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-quantityL-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-quantityL-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


  <ValidationProvider 
        name="quantityKg" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-quantityKg" label="quantityKg : " label-for="input-quantityKg">
                    <b-form-input
                      id="input-quantityKg"
                      name="input-quantityKg"
                      v-model="product.quantityKg"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-quantityKg-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-quantityKg-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

  <ValidationProvider 
        name="granulometry" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-granulometry" label="granulometry : " label-for="input-granulometry">
                    <b-form-input
                      id="input-granulometry"
                      name="input-granulometry"
                      v-model="product.granulometry"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-granulometry-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-granulometry-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


    <ValidationProvider 
        name="typeProduct_id" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-typeProduct_id" label="typeProduct_id : " label-for="input-typeProduct_id">
                    <b-form-input
                      id="input-typeProduct_id"
                      name="input-typeProduct_id"
                      v-model="product.typeProduct_id"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-typeProduct_id-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-typeProduct_id-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


      <ValidationProvider 
        name="solubility" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-solubility" label="solubility : " label-for="input-solubility">
                    <b-form-input
                      id="input-solubility"
                      name="input-solubility"
                      v-model="product.solubility"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-solubility-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-solubility-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


        <ValidationProvider 
        name="activeIngredients" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-activeIngredients" label="activeIngredients : " label-for="input-activeIngredients">
                    <b-form-input
                      id="input-activeIngredients"
                      name="input-activeIngredients"
                      v-model="product.activeIngredients"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-activeIngredients-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-activeIngredients-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

          <ValidationProvider 
        name="ph" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-ph" label="ph : " label-for="input-ph">
                    <b-form-input
                      id="input-ph"
                      name="input-ph"
                      v-model="product.ph"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-ph-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-ph-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>




          <ValidationProvider 
        name="description" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-description" label="description : " label-for="input-description">
                    <b-form-input
                      id="input-description"
                      name="input-description"
                      v-model="product.description"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-description-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-description-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


           <ValidationProvider 
        name="aplicationRates" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-aplicationRates" label="aplicationRates : " label-for="input-aplicationRates">
                    <b-form-input
                      id="input-aplicationRates"
                      name="input-aplicationRates"
                      v-model="product.aplicationRates"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-aplicationRates-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-aplicationRates-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


     <ValidationProvider 
        name="directionsForUse" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-directionsForUse" label="directionsForUse : " label-for="input-directionsForUse">
                    <b-form-input
                      id="input-directionsForUse"
                      name="input-directionsForUse"
                      v-model="product.directionsForUse"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-directionsForUse-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-directionsForUse-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


     <ValidationProvider 
        name="storage" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-storage" label="storage : " label-for="input-storage">
                    <b-form-input
                      id="input-storage"
                      name="input-storage"
                      v-model="product.storage"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-storage-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-storage-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


       <ValidationProvider 
        name="compatibility" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-compatibility" label="compatibility : " label-for="input-compatibility">
                    <b-form-input
                      id="input-compatibility"
                      name="input-compatibility"
                      v-model="product.compatibility"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-compatibility-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-compatibility-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


    <ValidationProvider 
        name="warnings" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-warnings" label="warnings : " label-for="input-warnings">
                    <b-form-input
                      id="input-warnings"
                      name="input-warnings"
                      v-model="product.warnings"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-warnings-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-warnings-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>




<b-button v-can="'product-create'" type="button" btn-block @click="isComposition = !isComposition" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Add Composition ?</b-button>





<div v-if="isComposition">

 <ValidationProvider 
        name="nitrogenTotal" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-nitrogenTotal" label="nitrogenTotal : " label-for="input-nitrogenTotal">
                    <b-form-input
                      id="input-nitrogenTotal"
                      name="input-nitrogenTotal"
                      v-model="product.composition.nitrogenTotal"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-nitrogenTotal-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-nitrogenTotal-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

   <ValidationProvider 
        name="nitrateNitrogen" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-nitrateNitrogen" label="nitrateNitrogen : " label-for="input-nitrateNitrogen">
                    <b-form-input
                      id="input-nitrateNitrogen"
                      name="input-nitrateNitrogen"
                      v-model="product.composition.nitrateNitrogen"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-nitrateNitrogen-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-nitrateNitrogen-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


     <ValidationProvider 
        name="amoniacalNitrogen" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-amoniacalNitrogen" label="amoniacalNitrogen : " label-for="input-amoniacalNitrogen">
                    <b-form-input
                      id="input-amoniacalNitrogen"
                      name="input-amoniacalNitrogen"
                      v-model="product.composition.amoniacalNitrogen"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-amoniacalNitrogen-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-amoniacalNitrogen-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>



     <ValidationProvider 
        name="otherNitrogen" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-otherNitrogen" label="otherNitrogen : " label-for="input-otherNitrogen">
                    <b-form-input
                      id="input-otherNitrogen"
                      name="input-otherNitrogen"
                      v-model="product.composition.otherNitrogen"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-otherNitrogen-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-otherNitrogen-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


       <ValidationProvider 
        name="P2O5" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-P2O5" label="P2O5 : " label-for="input-P2O5">
                    <b-form-input
                      id="input-P2O5"
                      name="input-P2O5"
                      v-model="product.composition.P2O5"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-P2O5-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-P2O5-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

    <ValidationProvider 
        name="K2O" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-K2O" label="K2O : " label-for="input-K2O">
                    <b-form-input
                      id="input-K2O"
                      name="input-K2O"
                      v-model="product.composition.K2O"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-K2O-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-K2O-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

    <ValidationProvider 
        name="CaO" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-CaO" label="CaO : " label-for="input-CaO">
                    <b-form-input
                      id="input-CaO"
                      name="input-CaO"
                      v-model="product.composition.CaO"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-CaO-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-CaO-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

    <ValidationProvider 
        name="MgO" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-MgO" label="MgO : " label-for="input-MgO">
                    <b-form-input
                      id="input-MgO"
                      name="input-MgO"
                      v-model="product.composition.MgO"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-MgO-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-MgO-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

    <ValidationProvider 
        name="SO3" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-SO3" label="SO3 : " label-for="input-SO3">
                    <b-form-input
                      id="input-SO3"
                      name="input-SO3"
                      v-model="product.composition.SO3"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-SO3-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-SO3-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

    <ValidationProvider 
        name="Ca" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-Ca" label="Ca : " label-for="input-Ca">
                    <b-form-input
                      id="input-Ca"
                      name="input-Ca"
                      v-model="product.composition.Ca"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-Ca-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-Ca-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

    <ValidationProvider 
        name="B" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-B" label="B : " label-for="input-B">
                    <b-form-input
                      id="input-B"
                      name="input-B"
                      v-model="product.composition.B"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-B-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-B-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

    <ValidationProvider 
        name="Cu" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-Cu" label="Cu : " label-for="input-Cu">
                    <b-form-input
                      id="input-Cu"
                      name="input-Cu"
                      v-model="product.composition.Cu"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-Cu-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-Cu-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

  <ValidationProvider 
        name="Fe" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-Fe" label="Fe : " label-for="input-Fe">
                    <b-form-input
                      id="input-Fe"
                      name="input-Fe"
                      v-model="product.composition.Fe"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-Fe-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-Fe-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


  <ValidationProvider 
        name="Mn" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-Mn" label="Mn : " label-for="input-Mn">
                    <b-form-input
                      id="input-Mn"
                      name="input-Mn"
                      v-model="product.composition.Mn"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-Mn-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-Mn-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

  <ValidationProvider 
        name="Mo" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-Mo" label="Mo : " label-for="input-Mo">
                    <b-form-input
                      id="input-Mo"
                      name="input-Mo"
                      v-model="product.composition.Mo"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-Mo-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-Mo-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

  <ValidationProvider 
        name="Zn" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-Zn" label="Zn : " label-for="input-Zn">
                    <b-form-input
                      id="input-Zn"
                      name="input-Zn"
                      v-model="product.composition.Zn"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-Zn-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-Zn-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

<ValidationProvider 
        name="OrganicMatter" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-OrganicMatter" label="OrganicMatter : " label-for="input-OrganicMatter">
                    <b-form-input
                      id="input-OrganicMatter"
                      name="input-OrganicMatter"
                      v-model="product.composition.OrganicMatter"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-OrganicMatter-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-OrganicMatter-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>



</div>


          </b-form>
        </validation-observer>




         <ModalToConfirm  v-can="'product-create'" v-if="product" :name="product.name" :isTo="'save'">
                            
            <template slot="confirmButton">
                 <button type="button"  class="btn btn-danger" @click="saveProduct">Confirmar</button>
            </template>

        </ModalToConfirm>

        <!--   <b-row align-h="center" style="margin-top: 20px">

                <b-button v-can="'farm-create'" type="submit" btn-block @click="saveFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button>
               
          </b-row> -->

      </b-container>

      </b-col>
<!-- 
    </template>

            </BodyContainer>
</div> -->
</b-row>
</b-container>
  </template>
  
  <script>

// import {FarmService} from "@/services/FarmService"; 
import Plant from '@/models/Plant'
import PlantPlague from '@/models/PlantPlague'
import PlantStage from '@/models/PlantStage'

import Product from '@/models/Product'

import  $bus   from '@/app';

import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import ModalToConfirm from "@/components/ModalToConfirm";


  export default {
    name: "ProductCreate",
    components: {
      HeadContainer,
        BodyContainer,
      ModalToConfirm
    },
    // props: ['plantReceive'], 
    // {
        // farmId: { type: String, default: null },
      // },
    data() {
      return {        
          title: "Product Create",
          loading: false, 
          isComposition: false,
          product: {
              name: null,
              brand: null,
              is_biologic: null,
              is_liquid: null,
              quantityL: null,
              quantityKg: null,
              granulometry: null,
              typeProduct_id: null,
              solubility: null,
              activeIngredients: null,
              ph: null,
              description: null,
              aplicationRates: null,
              directionsForUse: null,
              storage: null,
              compatibility: null,
              warnings: null,
              composition_id: null,
              composition: {
                  nitrogenTotal: null,
                  nitrateNitrogen: null,
                  amoniacalNitrogen: null,
                  otherNitrogen: null,
                  P2O5: null,
                  K2O: null,
                  CaO: null,
                  MgO: null,
                  SO3: null,
                  Ca: null,
                  B: null,
                  Cu: null,
                  Fe: null,
                  Mn: null,
                  Mo: null,
                  Zn: null,
                  OrganicMatter: null,
              }
            },     
         
    }
  },

    computed : {
    
    },
    created() {
      // this.plant = this.plantReceive;

        // this.plant.nome_variedade = item.nome_variedade;
        // this.plant.master_plant_id=this.plantReceive.id;
        // this.plant.name = this.plantReceive.name;
        // this.plant.name_cientifico = this.plantReceive.name_cientifico;
        // this.plant.tipo_planta_id = this.plantReceive.tipo_planta_id;
        // this.plant.fracao_esgotamento_agua_solo_conforto_hidrico= this.plantReceive.fracao_esgotamento_agua_solo_conforto_hidrico;
        //  this.plant.ph_min= this.plantReceive.ph_min;
        //  this.plant.ph_max= this.plantReceive.ph_max;
        //  this.plant.compasso_plantas= this.plantReceive.compasso_plantas;
        //  this.plant.compasso_linhas= this.plantReceive.compasso_linhas;
        //  this.plant.fotoperiodo= this.plantReceive.fotoperiodo;
        //  this.plant.image= this.plantReceive.image;
        //  this.plant.water_consumption= this.plantReceive.water_consumption;
    },
    methods: { 
       getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
        },

      async saveProduct(){      

        try {
             this.loading = true;

              const result = await Product.api().post('product',this.product)

              // await PlantPlague.api().get('plantPlague');
              // await PlantStage.api().get('plantStage');

                this.$router.push({path: '/front/product/'+result.response.data.id});
              
          } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);

                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false;
                
          }

      },

    },
    mounted () {
        console.log("Mounted productCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  