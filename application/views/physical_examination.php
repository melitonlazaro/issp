<?php echo form_open('Main/prenatal'); ?>
    <input type="text" name="patient_id">
    <br>
    <fieldset>
      <div style="float: left; width: 300px">
        <font size="5">Blood Pressure:</font>
        <input type="text" name="blood_pressure" size="35">
        <br>
         <font size="5">Blood Type:</font>
            <select name="blood_type"><br>
            <option value="O">O</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            </select> 
      </div>

      <div style="float: right; width: 350px">
            <font size="5">Height:</font>
            <input type="text" name="height" placeholder="in Centimeters" size="35">
            <font size="5">Weight:</font>
            <input type="text" name="weight" placeholder="in kilograms" size="35">
      </div>
        
    </fieldset>

    
    <fieldset>
    <legend><font size="5">Conjuctiva</font></legend>
      <div style="float: left; width: 300px">
        <font size="5">Pale:</font>
        <select name="pale"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">Yellowish:</font>
            <select name="yellowish"><br>
           <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
        </div>
        </fieldset>

       
    
    <fieldset>
    <legend><font size="5">Neck</font></legend>
      <div style="float: left; width: 300px">
        <font size="5">Enlarged Thyroid:</font>
        <select name="enlargedthyroid"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">Enlarged Lymp Nodes:</font>
            <select name="enlargedlympnodes"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
        </div>
        </fieldset>

        
    
    <fieldset>
    <legend><font size="5">Breast</font></legend>
      <div style="float: left; width: 300px">
            <font size="5">Mass:</font>
            <select name="mass"><br>
            <<option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
            <font size="5">Nipple Discharged:</font>
            <select name="nippledischarged"><br>
          <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">Skin-orange-peel or dimpling:</font>
            <select name="skinorangepeel"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
            <font size="5">Enlarged axilary lymp nodes:</font>
            <select name="enlargedaxilarylympnodes"><br>
           <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
        </div>
        </fieldset>


    
    <fieldset>
    <legend><font size="5">Thorax</font></legend>
      <div style="float: left; width: 300px">
        <font size="5">Abnormal heart sounds/Cardiac rate:</font>
        <select name="abnormalheartsound"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">Abnormal breath sounds/Resperatory rate:</font>
            <select name="abnormalbreathsounds"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
        </div>
        </fieldset>

        
    
    <fieldset>
    <legend><font size="5">Abdomen</font></legend>
      <div style="float: left; width: 300px">
        <font size="5">Height:</font>
            <input type="text" name="abdomenheight" placeholder="in Centimeters">
        <font size="5">Fetal Movement:</font>
            <input type="text" name="fetalmovement">
        
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">Fetal Heart Tone:</font>
            <input type="text" name="fetalhearttone" placeholder="if applicable by AOG" size="35"> 
        </div>
        </fieldset>

        
    
    <fieldset>
    <legend><font size="5">Leopard's Manuever</font></legend>
      <div style="float: left; width: 300px">
        <font size="5">1. Presenting Part:</font>
            <input type="text" name="presentingpart" placeholder="in Centimeters">
        <font size="5">2. Pisitivon of fetal back:</font>
            <input type="text" name="positionfetalback">
            <font size="5">Urine Activity:</font>
            <input type="text" name="urineactivity" size="25">
        
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">3. Fetal parts in fundus:</font>
            <input type="text" name="fetalparts" placeholder="if applicable by AOG" size="35"> 
            <font size="5">4. Status of the presenting part:</font>
            <input type="text" name="statuspresenntingpart" placeholder="if applicable by AOG" size="35">
        </div>
        </fieldset>


        <center><p style="padding-top:5px; padding-bottom:1px;"><font size="6">Pelvic Examination</font></p></center>


    
    <fieldset>
    <legend><font size="5">Perineum</font></legend>
      <div style="float: left; width: 300px">
        <font size="5">Scars:</font>
            <select name="scars"><br>
           <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>
        <font size="5">Warts/Mass:</font>
            <select name="wartsmass"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>    
        
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">Laceration:</font>
            <select name="laceration"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>

        <font size="5">Severe Varicosities:</font>
            <select name="severevaricosities"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>
        </div>
        </fieldset>



    
    <fieldset>
    <legend><font size="5">Vagina</font></legend>
      <div style="float: left; width: 300px">
        <font size="5">Bartholin's cyst:</font>
            <select name="bartholinscyst"><br>
           <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>
        <font size="5">Warts/Skene's gland discharged:</font>
            <select name="wartsskenesgland"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select> 
        <font size="5">Cystocoele/Rectocoele:</font>
            <select name="crystocoele"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>    
        
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">Purulent discharged/bleeding:</font>
            <select name="purulentdischarged"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>

        <font size="5">Eroslon/Polyp/Foreign Body:</font>
            <select name="eroslon"><br>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>
        </div>
        </fieldset>

 <center><p style="padding-top:5px; padding-bottom:1px;"><font size="6">Internal Examination</font></p></center>


    
    <fieldset>
    <legend><font size="5">Cervix</font></legend>
      <div style="float: left; width: 300px">
        <font size="5">Consistency:</font>
            <input type="text" name="consistency">   
        <font size="5">Dilation:</font>
            <input type="text" name="dilation"> 
 
       </div>

       <div style="float: right; width: 350px">
            <font size="5">Palpable Presenting Part:</font>
            <input type="text" name="palpablepresentingpart"> 

       <font size="5">Status of Bag of Water:</font>
            <input type="text" name="statusofbagofwater"> 
        </div><br><br><br><br><br><br>

        <font size="5">Impression:</font>
        <br>
        <textarea rows="4" cols="105" name="impression">

        </textarea>
        <font size="5">PLANS (Procedure/Treatment/Referral/Return Visit):</font>
        <br>
        <textarea rows="4" cols="105"  name ="plans">

        </textarea>
        </fieldset>

<br>   

<div style="width:850px;">
<div style="float: left; width: 125px"> 

    <input type="submit" name="submit"
      value="Save" class="btn-login">

</div>
<div style="float: right; width: 185px"> 
    
    <input type="submit" name="submit"
      value="Reset" class="btn-login">
	  
   </form>