<template>


         <!-- <div class="row">   -->

<!-- <div > -->

<!-- <div class="form-group"> -->

    <form @submit.prevent="SaveAnalysis" >

      <b-row>
     

<b-col>

<b-container>
  <h3>Add Fertilizer</h3>

       <b-row style="padding: 5px">
            <b-col cols="6">
                
            </b-col>
            <b-col cols="6">
                <h6>Nutrient Value</h6>
            </b-col> 
            
        </b-row>


        <b-row style="padding: 5px">

            <b-col cols="6">
                <label for="soilDepth">soilDepth</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.soilDepth" id="soilDepth" placeholder="300 ppm">
            </b-col>
            <!-- <b-col cols="5">
                
            </b-col> -->

        </b-row>

        <b-row  style="padding: 5px">
            <b-col cols="6">
                <label for="matOrgPer">matOrgPer</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.matOrgPer" id="matOrgPer" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.matOrgPerLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->
            
        </b-row>

        <b-row style="padding: 5px">
          <b-col cols="6">
                <label for="nitrogen">nitrogen</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.nitrogen" id="nitrogen" required >
            </b-col>
            <!-- <b-col cols="5">
                <select  class="col" v-model="analysisSoil.nitrogenLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->

        </b-row>

        <b-row style="padding: 5px">
            <b-col cols="6">
                <label for="phosphorus">phosphorus</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.phosphorus" id="phosphorus" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.phosphorusLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->

        </b-row>

        <b-row style="padding: 5px">
          <b-col cols="6">
                <label  for="potassium">potassium</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.potassium" id="potassium" required >
            </b-col>
            <!-- <b-col cols="5">
                <select  class="col" v-model="analysisSoil.potassiumLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label for="Magnesium">Magnesium</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Magnesium" id="Magnesium" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.MagnesiumLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->
      </b-row>

       <b-row style="padding: 5px">
        <b-col cols="6">
                <label for="Calcium">Calcium</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Calcium" id="Calcium" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.MagnesiumLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->
      </b-row>

       <b-row style="padding: 5px">
        <b-col cols="6">
                <label for="Sodium">Sodium</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Sodium" id="Sodium" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.MagnesiumLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label for="phSoil">phSoil</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.phSoil" id="phSoil" required >
            </b-col>
            <!-- <b-col cols="5">
                <select  class="col" v-model="analysisSoil.phSoilLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label  for="phBufferIndex">phBufferIndex</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.phBufferIndex" id="phBufferIndex" required >
            </b-col>
            <!-- <b-col cols="5">
                
            </b-col>  -->
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label  for="hydrogen">hydrogen</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.hydrogen" id="hydrogen" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.hydrogenLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col> -->
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label  for="Sulfur">Sulfur</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Sulfur" id="Sulfur" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.SulfurLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>    -->   
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label  for="zinc">zinc</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.zinc" id="zinc" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.zincLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>    -->      
        </b-row>

        <b-row style="padding: 5px">
          <b-col cols="6">
                <label  for="Manganese">Manganese</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Manganese" id="Manganese" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.ManganeseLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>  -->        
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label for="Cooper">Cooper</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Cooper" id="Cooper" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.CooperLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>    -->  
      </b-row>

      <b-row style="padding: 5px">
            <b-col cols="6">
                <label for="Iron">Iron</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Iron" id="Iron" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.IronLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>  -->          
      </b-row>

      <b-row style="padding: 5px">
            <b-col cols="6">
                <label for="Boron">Boron</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Boron" id="Boron" required >
            </b-col>
           <!--  <b-col cols="5">
                <select  class="col" v-model="analysisSoil.BoronLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>   -->        
      </b-row>

      <b-row style="padding: 5px">
            <b-col cols="6">
                <label for="Aluminium">Aluminium</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Aluminium" id="Aluminium" required >
            </b-col>
            <!-- <b-col cols="5">
                <select  class="col" v-model="analysisSoil.AluminiumLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>     -->      
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label for="excessLime">excessLime</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.excessLime" id="excessLime" required >
            </b-col>
            <!-- <b-col cols="5">
               
            </b-col>  --> 
      </b-row>


        <b-row style="padding: 5px">
          <b-col cols="6">
                <label  for="Sulfate">Sulfate</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Sulfate" id="Sulfate" required >
            </b-col>
            <!-- <b-col cols="5">
                <select  class="col" v-model="analysisSoil.SulfateLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>     -->    
      </b-row>

      <b-row style="padding: 5px">
         <b-col cols="6">
                <label  for="Chloride">Chloride</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Chloride" id="Chloride" required >
            </b-col>
            <!-- <b-col cols="5">
                <select  class="col" v-model="analysisSoil.ChlorideLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>    -->     
      </b-row>

      <b-row style="padding: 5px">
         <b-col cols="6">
                <label for="Ece">Ece</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.Ece" id="Ece" required >
            </b-col>
            <!-- <b-col cols="5">
                <select  class="col" v-model="analysisSoil.EceLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>  -->     
      </b-row>


   <b-row style="padding: 5px">
           <b-col cols="6">
                <label for="CEC">CEC</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.CEC" id="CEC" required >
            </b-col>
            <!-- <b-col cols="5">
               
            </b-col>  -->   
              
      </b-row>


    <!--   <b-row style="padding: 5px">
        <b-col cols="6">
                <label for="perCationSatK">perCationSatK</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.perCationSatK" id="perCationSatK" required >
            </b-col>
            <b-col cols="5">
                <select  class="col" v-model="analysisSoil.perCationSatKLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>        
      </b-row>

      <b-row style="padding: 5px">
        <b-col cols="6">
                <label for="perCationSatMg">perCationSatMg</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.perCationSatMg" id="perCationSatMg" required >
            </b-col>
            <b-col cols="5">
                <select  class="col" v-model="analysisSoil.perCationSatMgLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>        
      </b-row>

      <b-row style="padding: 5px">
          <b-col cols="6">
                <label  for="perCationSatH">perCationSatH</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.perCationSatH" id="perCationSatH" required >
            </b-col>
            <b-col cols="5">
                <select  class="col" v-model="analysisSoil.perCationSatHLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>        
      </b-row>

      <b-row style="padding: 5px">
         <b-col cols="6">
                <label for="perCationSatCa">perCationSatCa</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.perCationSatCa" id="perCationSatCa" required >
            </b-col>
            <b-col cols="5">
                <select  class="col" v-model="analysisSoil.perCationSatCaLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>        
      </b-row>

      <b-row style="padding: 5px">
         <b-col cols="6">
                <label  for="perCationSatNa">perCationSatNa</label>
            </b-col>
            <b-col cols="6">
                <input  class="col" type="number"  maxlength="5" v-model="analysisSoil.perCationSatNa" id="perCationSatCa" required >
            </b-col>
            <b-col cols="5">
                <select  class="col" v-model="analysisSoil.perCationSatNaLevel">
                    <option disabled value="">Please select one level</option>
                    <option value="1">Very Low</option>
                    <option value="2">Low</option>
                    <option value="3">Medium</option>
                    <option value="4">High</option>
                    <option value="5">Very High</option>
                  </select>
            </b-col>        
      </b-row>
 -->
    
     
       <b-row style="padding: 5px">
              <!-- <div  class="form-group"> -->
                  <label  class="col-2" for="Obs">Obs</label>
                  <input  class="col" type="text"  maxlength="250" v-model="analysisSoil.Obs" id="Obs" required >
              <!-- </div>  -->
        </b-row>

  </b-container>

</b-col>

   <b-col >
 
<b-row style="margin: 10px ">
     <b-form-checkbox
          id="checkbox-1"
          v-model="showTypeSoil"
          name="checkbox-1"
          
        >
          change tipo soil
        </b-form-checkbox>
 </b-row>

<!-- <p>checkbox add change tipo solo</p> -->

<b-container v-if="showTypeSoil ">
<h3>tipo solo</h3>

  

        <b-row style="padding: 5px">
           <b-col cols="7">
                  <label  class="col" for="nome_solo">nome_solo</label>
              </b-col>
              <b-col cols="5">
                  <input  class="col" type="text"  maxlength="250" v-model="soiltype.nome_solo" id="nome_solo" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="7">
                  <label class="col" for="argila_percentagem">argila_percentagem</label>
              </b-col>
              <b-col cols="5">
                  <input class="col" type="number"  v-model="soiltype.argila_percentagem" id="argila_percentagem" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="7">
                   <label class="col" for="silte_percentagem">silte_percentagem</label>
              </b-col>
              <b-col cols="5">
                  <input class="col" type="number"  v-model="soiltype.silte_percentagem" id="silte_percentagem" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="7">
                   <label  class="col" for="areia_percentagem">areia_percentagem</label>
              </b-col>
              <b-col cols="5">
                  <input  class="col" type="number"  v-model="soiltype.areia_percentagem" id="areia_percentagem" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="7">
                   <label  class="col"  for="capacidade_campo">capacidade_campo</label>
              </b-col>
              <b-col cols="5">
                  <input  class="col"  type="number"  v-model="soiltype.capacidade_campo" id="capacidade_campo" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="7">
                   <label  class="col" for="capacidade_emurchecimento">capacidade_emurchecimento</label>
              </b-col>
              <b-col cols="5">
                  <input  class="col" type="number"  v-model="soiltype.capacidade_emurchecimento" id="capacidade_emurchecimento" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="7">
                   <label  class="col" for="massa_volumica_aparente">massa_volumica_aparente</label>
              </b-col>
              <b-col cols="5">
                  <input  class="col" type="number"  v-model="soiltype.massa_volumica_aparente" id="massa_volumica_aparente" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="7">
                   <label  class="col" for="agua_disponivel_total">agua_disponivel_total</label>
              </b-col>
              <b-col cols="5">
                  <input  class="col" type="number"  v-model="soiltype.agua_disponivel_total" id="agua_disponivel_total" required >
              </b-col>       
        </b-row>

</b-container>

<b-row style="margin: 10px ">
    <b-form-checkbox
      id="checkbox-2"
      v-model="showGuideAnalysis"
      name="checkbox-1"
    >
      add guide analysis
    </b-form-checkbox>

<!-- <p>checkbox add change analysis guide</p> -->
</b-row>

<b-container v-if="showGuideAnalysis ">
<h3>guide soil analysis</h3>
            
        
        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="Lime">Lime</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.Lime" id="Lime" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="nitrogen">nitrogen</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.nitrogen" id="nitrogen" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="phosphorus">phosphorus</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.phosphorus" id="phosphorus" required >  
              </b-col>    
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="potash">potash</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.potash" id="potash" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="Magnesium">Magnesium</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.Magnesium" id="Magnesium" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="zinc">zinc</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.zinc" id="zinc" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="Sulfur">Sulfur</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.Sulfur" id="Sulfur" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="Manganese">Manganese</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.Manganese" id="Manganese" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                  <label  class="col" for="Cooper">Cooper</label>
              </b-col>
              <b-col cols="5">
                  <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.Cooper" id="Cooper" required >                
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="Iron">Iron</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.Iron" id="Iron" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="Boron">Boron</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="number"  maxlength="5" v-model="analysis_guideline.Boron" id="Boron" required >
              </b-col>       
        </b-row>

        <b-row style="padding: 5px">
           <b-col cols="6">
                   <label  class="col" for="Obs">Obs</label>
              </b-col>
              <b-col cols="5">
                 <input  class="col" type="text"  maxlength="250" v-model="analysis_guideline.Obs" id="Obs"  >
              </b-col>       

        </b-row>

        <!-- <b-row style="padding: 5px">
                    <label  class="col" for="Obs">Obs</label>
                    <input  class="col" type="text"  maxlength="250" v-model="guide.Obs" id="Obs" required >
        </b-row> -->

    </b-container>

</b-col>

<div>{{ errors }}</div>

<!-- <button  class="col-md-5 offset-md-4 btn btn-success" @click.stop="SaveAnalysis" >Save Soil Analyse</button> -->

  <b-button  block  style=" border-color: #4AAD37;background-color: #4AAD37; " @click.stop="SaveAnalysis" >Save Soil Analyse</b-button>


</b-row>
 
 

    </form> 

  <!-- </div> -->
<!-- </div> -->

</template>

<script>
// import Vue from 'vue';

//import AddSoilAnalysis from './AddSoilAnalysis.vue';
//import ListTerrains from '../ListTerrains.vue';
//import AddDeviceToTerrain from '../AddDeviceToTerrain.vue';
// import {mapGetters,mapMutations,mapActions} from 'vuex'
import AnalyseSoil from '@/models/AnalyseSoil'
import SoilType from '@/models/SoilType'
import AnalyseSoilGuideline from '@/models/AnalyseSoilGuideline'

import  $bus   from '@/app';

    export default {
        name: 'AddSoilAnalysis',
        components:{},
        props: {
           AnalyseSoilLast: { type: Object, default: null },
        },
        data() {
            return{
              errors: null,
              showGuideAnalysis: false,
              showTypeSoil: false,

              analysisSoil: {
                    terrain_id: null,
                    tipoSolo_id: null,
                    analysisGuideline_id: null,
                    soilDepth: null,
                    date: null,
                    matOrgPer: null,
                    nitrogen: null,
                    phosphorus: null,         
                    potassium: null, 
                    Magnesium: null,
                    Calcium: null,
                    Sodium: null,
                    phSoil: null,
                    phBufferIndex: null,
                    hydrogen: null,
                    Sulfur: null,
                    zinc: null,
                    Manganese: null,         
                    Cooper: null,
                    Iron: null,
                    Boron: null,
                    Aluminium: null,
                    excessLime: null,
                    Sulfate: null,
                    Chloride: null,
                    Ece: null,
                    CEC: null,
                    perCationSatK: null,
                    perCationSatMg: null,
                    perCationSatH: null,
                    perCationSatCa: null,
                    perCationSatNa: null,
                    created_at: null,
                    Obs: null,                    

              },
              analysis_guideline: {
                     Lime: null, //  kg/ha
                     nitrogen: null,
                     phosphorus: null,        
                     potash: null, 
                     Magnesium: null,
                     zinc: null,
                     Sulfur: null,
                     Manganese: null,         
                     Cooper: null, 
                     Iron: null,
                     Boron: null,
                     created_at: null,
                     Obs: null,
                },
                soiltype:{
                     nome_solo: null,
                     argila_percentagem: null, 
                     silte_percentagem: null,
                     areia_percentagem: null,
                     capacidade_campo: null,
                     capacidade_emurchecimento: null, 
                     massa_volumica_aparente: null,
                     agua_disponivel_total: null,
                }
                    
            }
        }, 
        watch: {
              terrainSelected: function() {
                  //this.getData();
              }
          },
         computed: {
          // ...mapGetters(['get_soilAnalysisLast','get_guide']),
        },

        methods: {    
            //  ...mapMutations([]),           
            // ...mapActions(['action_SaveSoilAnalysisGuide','action_SaveSoilAnalysis']),
          async SaveAnalysis(){


             this.loading = true;
                try {

                    this.analysisSoil.terrain_id = this.AnalyseSoilLast.terrain_id;
                    this.analysisSoil.tipoSolo_id = this.AnalyseSoilLast.tipoSolo_id;

                    if(this.showGuideAnalysis){
                        const result = await AnalyseSoilGuideline.api().post('analyseSoilGuideline',this.analysis_guideline);    

                        console.log("result guide : "+ JSONstringify(result));

                       // this.analysisSoil.analysisGuideline_id=this.guide.id;
                    }

                    if(this.showTypeSoil){
                        const result = await SoilType.api().post('soilType',this.soiltype);    

                        console.log("result soiltype: "+ JSONstringify(result));

                       // this.analysisSoil.tipoSolo_id=this.guide.id;
                    }


                    await AnalyseSoil.api().post('analyseSoil',this.analysisSoil);    
                    //this.$router.push({path: '/front/terrain/'+result.response.data.id});
                    
                    // console.log("terrain :"+ JSON.stringify(data))
                    // this.$router.push({path: '/front/terrain/'+this.terrain.id});
                    
                    // await Crop.api().get('crop');
                        
                } catch (e) {
                    this.$bus.$emit('warningFixTop', e.message);
                    this.error = e.message
                    console.log(e)
                } finally {
                    
                   // this.$router.push({path: '/front/crop/'+this.crop.id+'/plantHealth'});

                    this.loading = false
                }  
                       

            //save analysis soil
            // await this.action_SaveSoilAnalysisGuide(this.guide);

               console.log("teste methode add soil analysis");
          },
           
        },     
        mounted() {

          //get last tipo solo and put on inputs

          //get last analysis and put on inputs  
          // this.tipoSolo = this.soilLast.SoilType ;
          this.analysisSoil = this.AnalyseSoilLast ;

          if(this.AnalyseSoilLast.analysis_guideline){
            this.analysis_guideline = this.AnalyseSoilLast.analysis_guideline;
          }

          if(this.AnalyseSoilLast.soilType){
            this.soiltype = this.AnalyseSoilLast.soilType;
          }
          // this.guide = this.soilLast.analysis_guideline ;

            console.log('Component Terrain mounted.')
            
        },
    }
</script>


<style scoped>

</style>

