 <?php

use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
 
 <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">LESSOR</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>ADD PROPERTY</span>
                            </li>
                        </ul>
                 
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN : STEPS -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-plus font-blue"></i>
                                        <span class="caption-subject font-green bold uppercase">ADD PROPERTY</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="mt-element-step">
                                        
                                        <div class="row step-thin">
                                          <a href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/index']) ?>">
                                            <div class="col-md-4 bg-grey mt-step-col active">
                                                <div class="mt-step-number bg-white font-grey">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade"><font size="4dp">BASIC DETAILS</font></div>
                                                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
                                            </div></a><a href="<?php echo Yii::$app->urlManager->createUrl(['lessoraction/index']) ?>">
                                            <div class="col-md-4 bg-grey mt-step-col">
                                                <div class="mt-step-number bg-white font-grey">2</div>
                                                <div class="mt-step-title uppercase font-grey-cascade"><font size="3dp">ADDITIONAL DETAILS</font></div>
                                                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
                                            </div></a>
                                           
                                        </div>
                                        <br/>
                                        <br/>
                                    
                                    </div>
									<!-- start form -->
									 <!-- BEGIN FORM-->
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>"form-horizontal"]]) ?>

                                   
                                        <div class="form-body">
										<div class="portlet light bordered">
										 <div class="portlet-title"><div class="caption">
											PROPERTY INFO
											</div></div>
							 <div class="portlet-body form">
                               
											 <div class="form-group form-md-checkboxes has-success">
										
                                                <label class="col-md-3 control-label" for="form_control_1"> Property for</label>
                                                <div class="col-md-9">
                                                    <div class="md-checkbox-inline">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox1_3" name="checkbox1_3" value="Rent" class="md-check" checked disabled>
                                                            <label for="checkbox1_3">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Rent </label>
                                                        </div>
                                                        <!--<div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox1_4" class="md-check" checked="">
                                                            <label for="checkbox1_4">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Rent </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox1_5" class="md-check">
                                                            <label for="checkbox1_5">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> PG Accomodation </label>
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Property Type</label>
                                                <div class="col-md-9">
                    <select class="form-control" name="propertytye" id="propertytype" onChange="focalphy()" placeholder="" required>
													<option>Select..</option>
							
										
<optgroup label="COMMERCIAL"></optgroup>
<?php $arrfindallpropertytype1 = \common\models\PropertyType::find()->where(['undercategory'=>"Commercial",'isactive'=>1])->all(); ?>
                                 <?php foreach($arrfindallpropertytype1 as $propertytype1) {  ?>
								<option value="<?php echo  $propertytype1->id ?>"><?php echo  $propertytype1->typename ?></option>
							<?php } ?>

						
													</select>
                                                    
                                                </div>
                                            </div>
											  <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Property Features</label>
                                                <div class="col-md-9">
                    <textArea class="form-control" name="propertyfeatures" id="propertyfeatures"  placeholder="" required>
													
													</textArea>
                                                    
                                                </div>
                                            </div>
											</div>
                                            </div>
											  <div class="portlet light bordered">
										 <div class="portlet-title"><div class="caption">
											PROPERTY DETAILS
											</div></div>
							 <div class="portlet-body form">
							 <div id="one" style="display:none;">
							 <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Building Name</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <input type="text" class="form-control" name="building_name" id="building_name" placeholder="Building Name">
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter Building Name only...</span>
                                                        <i class="icon-"></i>
                                                    </div>
                                                </div>
                                            </div> </div> <div id="two" style="display:none;">
											<div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Building No.</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <input type="number" class="form-control"  name="building_no" id="building_no" placeholder="Building No.">
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="icon-building"></i>
                                                    </div>
                                                </div>
                                            </div></div> <div id="three" style="display:none;">
							  <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Total Rooms</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <input type="number" class="form-control" name="total_rooms" id="total_rooms" placeholder="Total Rooms">
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="icon-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                          </div> <div id="four" style="display:none;">
											 <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Total Balconies</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <input type="number" class="form-control" name="total_balconies" id="total_balconies" placeholder="Total Balconies">
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="icon-home"></i>
                                                    </div>
                                                </div>
                                            </div></div> <div id="five" style="display:none;">
											 <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Furnished Status</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                       
                                                         <select id="furnished_status" name="furnished_status" class="form-control" onchange="" size="1">
		                                     	<option value="">Select</option>
												<option value="Furnished">Furnished</option><option value="Unfurnished">Unfurnished</option><option value="Semi-Furnished">Semi-Furnished</option>
			                                </select>
                                                       
                                                    </div>
                                                </div>
                                            </div>
											</div> <div id="six" style="display:none;">
											 <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Total Floors</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                         <select id="totalfloors" name="totalfloors" class="form-control" onchange="" size="1">
	                                         		<option value="-1">Select</option>
													<option value="LB">Lower Basement</option><option value="UB">Upper Basement</option><option value="Grnd">Ground</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="12069">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="12092">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="89">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option><option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option><option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option><option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option><option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option><option value="138">138</option><option value="139">139</option><option value="140">140</option><option value="141">141</option><option value="142">142</option><option value="143">143</option><option value="144">144</option><option value="145">145</option><option value="146">146</option><option value="147">147</option><option value="148">148</option><option value="149">149</option><option value="150">150</option><option value="151">151</option><option value="152">152</option><option value="153">153</option><option value="154">154</option><option value="155">155</option><option value="156">156</option><option value="157">157</option><option value="158">158</option><option value="159">159</option><option value="160">160</option><option value="161">161</option><option value="162">162</option><option value="163">163</option><option value="164">164</option><option value="165">165</option><option value="166">166</option><option value="167">167</option><option value="168">168</option><option value="169">169</option><option value="170">170</option><option value="171">171</option><option value="172">172</option><option value="173">173</option><option value="174">174</option><option value="175">175</option><option value="176">176</option><option value="177">177</option><option value="178">178</option><option value="179">179</option><option value="189">180</option><option value="181">181</option><option value="182">182</option><option value="183">183</option><option value="184">184</option><option value="185">185</option><option value="186">186</option><option value="187">187</option><option value="188">188</option><option value="189">189</option><option value="190">190</option><option value="191">191</option><option value="192">192</option><option value="193">193</option><option value="194">194</option><option value="195">195</option><option value="196">196</option><option value="197">197</option><option value="198">198</option><option value="199">199</option><option value="200">200</option>
				                             </select>
                                                        
                                                    </div>
                                                </div>
                                            </div></div> <div id="seven" style="display:none;">
											<div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Floor No.</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <select id="FloorNumber" name="FloorNumber" class="form-control" onchange="" size="1">
	                                        	<option value="-1">Select</option>
												<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="12069">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="12092">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="89">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option><option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option><option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option><option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option><option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option><option value="138">138</option><option value="139">139</option><option value="140">140</option><option value="141">141</option><option value="142">142</option><option value="143">143</option><option value="144">144</option><option value="145">145</option><option value="146">146</option><option value="147">147</option><option value="148">148</option><option value="149">149</option><option value="150">150</option><option value="151">151</option><option value="152">152</option><option value="153">153</option><option value="154">154</option><option value="155">155</option><option value="156">156</option><option value="157">157</option><option value="158">158</option><option value="159">159</option><option value="160">160</option><option value="161">161</option><option value="162">162</option><option value="163">163</option><option value="164">164</option><option value="165">165</option><option value="166">166</option><option value="167">167</option><option value="168">168</option><option value="169">169</option><option value="170">170</option><option value="171">171</option><option value="172">172</option><option value="173">173</option><option value="174">174</option><option value="175">175</option><option value="176">176</option><option value="177">177</option><option value="178">178</option><option value="179">179</option><option value="189">180</option><option value="181">181</option><option value="182">182</option><option value="183">183</option><option value="184">184</option><option value="185">185</option><option value="186">186</option><option value="187">187</option><option value="188">188</option><option value="189">189</option><option value="190">190</option><option value="191">191</option><option value="192">192</option><option value="193">193</option><option value="194">194</option><option value="195">195</option><option value="196">196</option><option value="197">197</option><option value="198">198</option><option value="199">199</option><option value="200">200</option>
			                                </select>
                                                      
                                                    </div>
                                                </div></div></div> <div id="eight" style="display:none;">
												<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label has-success" for="form_control_1">Office Space Shared?</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_8" name="officespaceshared" value="Yes" class="md-radiobtn">
                                                        <label for="checkbox2_8">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Yes </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_9" name="officespaceshared" value="No" class="md-radiobtn" checked="">
                                                        <label for="checkbox2_9">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> No </label>
                                                    </div>
                                                   
                                                </div> </div>
                                            </div> </div>
											</div> <div id="nine" style="display:none;">
											<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">Personal Washrooms Availabel ?</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_10" name="personalwashrooms" value="Yes" class="md-radiobtn">
                                                        <label for="checkbox2_10">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Yes </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_11" name="personalwashrooms" value="No" class="md-radiobtn" checked="">
                                                        <label for="checkbox2_11">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> No </label>
                                                    </div>
                                                   
                                                </div> </div>
                                            </div> </div></div> <div id="ten" style="display:none;">
											<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">Pantry Available?</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_12" name="pantryavail" value="Yes" class="md-radiobtn">
                                                        <label for="checkbox2_12">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Yes </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_13" name="pantryavail" value="No" class="md-radiobtn" checked>
                                                        <label for="checkbox2_13">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> No </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_14" name="pantryavail" value="Combined" class="md-radiobtn">
                                                        <label for="checkbox2_14">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Combined </label>
                                                    </div>
                                                </div> </div>
                                            </div> </div>
											</div> <div id="eleven" style="display:none;">
											<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">Corner Shop?</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_15" name="cornershop" value="Yes" class="md-radiobtn">
                                                        <label for="checkbox2_15">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Yes </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_16" name="cornershop" value="No" class="md-radiobtn" checked>
                                                        <label for="checkbox2_16">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> No </label>
                                                    </div>
                                                    
                                                </div> </div>
                                            </div> </div>
											</div> <div id="twelve" style="display:none;">
											<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">On Main Road?</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_17" name="onmainroad" value="Yes" class="md-radiobtn">
                                                        <label for="checkbox2_17">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Yes </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_18" name="onmainroad" value="No" class="md-radiobtn" checked>
                                                        <label for="checkbox2_18">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> No </label>
                                                    </div>
                                                   
                                                </div> </div>
                                            </div> </div>
											</div> <div id="thirteen" style="display:none;">
											<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">Boundry Wall Made?</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_19" name="bundrywallmade" value="Yes" class="md-radiobtn">
                                                        <label for="checkbox2_19">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Yes </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_20" name="bundrywallmade" value="No"class="md-radiobtn" checked>
                                                        <label for="checkbox2_20">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> No </label>
                                                    </div>
                                                   
                                                </div> </div>
                                            </div> </div></div> <div id="fourteen" style="display:none;">
											<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">In Colony?</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_21" name="in_colony" value="Yes" class="md-radiobtn">
                                                        <label for="checkbox2_21">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Yes </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_22" name="in_colony" value="No" class="md-radiobtn" checked>
                                                        <label for="checkbox2_22">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> No </label>
                                                    </div>
                                                   
                                                </div> </div>
                                            </div> </div></div> 
												
							 
                               </div></div>
											<div class="portlet light bordered">
											<div class="portlet-title"><div class="caption">
											Location
											</div></div>
							 <div class="portlet-body form">
                                
                                            <div class="form-group form-md-line-input has-success">
											
                                                <label class="col-md-3 control-label" for="form_control_1">City</label>
                                                <div class="col-md-9">
                                                   <select id="City" name="City" class="form-control" onchange="updateLocalityMap(this);" required>
		                             <option>---Select City---</option>
		                             <optgroup label="Delhi NCR" style="background:#ececec"></optgroup>
    <option value="Gurgaon">Gurgaon</option>
    <option value="Noida">Noida</option>
    <option value="New Delhi">New Delhi</option>
    <option value="New Delhi - Central">New Delhi - Central</option>
    <option value="New Delhi - North">New Delhi - North</option>
    <option value="New Delhi - East">New Delhi - East</option>
    <option value="New Delhi - South">New Delhi - South</option>
    <option value="New Delhi - West">New Delhi - West</option>
    <option value="New Delhi - Dwarka">New Delhi - Dwarka</option>
    <option value="New Delhi - Rohini">New Delhi - Rohini</option> 
    <option value="Greater Noida">Greater Noida</option>
    <option value="Ghaziabad">Ghaziabad</option>
    <option value="Faridabad">Faridabad</option>
    
    <option class="heading-dd" value="Mumbai">Mumbai</option>
    <option value="Mumbai-Central Mumbai">Mumbai - Central Mumbai</option>
    <option value="Mumbai-South Mumbai">Mumbai - South Mumbai</option>
    <option value="Mumbai-Western Suburbs">Mumbai - Western Suburbs</option>
    <option value="Mumbai-Harbour Line">Mumbai - Harbour Line</option>
    <option value="Mumbai-Central Line">Mumbai - Central Line</option>
    <option value="Mumbai-Around Mumbai">Mumbai - Around Mumbai</option>
    <option value="Mumbai-North Mumbai">Mumbai - North Mumbai</option>
    <option value="Navi Mumbai">Navi Mumbai</option>

    <option class="heading-dd" value="Bangalore">Bangalore</option>
    <option value="Bangalore-North">Bangalore - North</option>
    <option value="Bangalore-East">Bangalore - East</option>
    <option value="Bangalore-South">Bangalore - South</option>
    <option value="Bangalore-West">Bangalore - West</option>
    <option value="Bangalore-North West">Bangalore - North West</option>
    <option value="Bangalore-North East">Bangalore - North East</option>
    <option value="Bangalore-South West">Bangalore - South West</option>
    <option value="Bangalore-South East">Bangalore - South East</option>
    <option value="Bangalore-Central">Bangalore - Central</option>
    <option value="Bangalore-Anekal">Bangalore - Anekal</option>
    
    <option class="heading-dd" value="Pune">Pune</option>
    <option value="Pune-North">Pune - North</option>
    <option value="Pune-South">Pune - South</option>
    <option value="Pune-East">Pune - East</option>
    <option value="Pune-West">Pune - West</option>
    <option value="Pune-Central">Pune - Central</option>
    <option value="Pune-Suburb">Pune - Suburb</option>
    
    <option class="heading-dd" value="Hyderabad" >Hyderabad</option>
    <option value="Hyderabad-North">Hyderabad - North</option>
    <option value="Hyderabad-South">Hyderabad - South</option>
    <option value="Hyderabad-East">Hyderabad - East</option>
    <option value="Hyderabad-West">Hyderabad - West</option>
    <option value="Hyderabad-Central">Hyderabad - Central</option>
    <option value="Hyderabad-Suburb">Hyderabad - Suburb</option>
    
    <option class="heading-dd" value="Chennai">Chennai</option>
    <option value="Chennai-North">Chennai - North</option>
    <option value="Chennai-South">Chennai - South</option>
    <option value="Chennai-East">Chennai - East</option>
    <option value="Chennai-West">Chennai - West</option>
    <option value="Chennai-Central">Chennai - Central</option>
    <option value="Chennai-Suburb">Chennai - Suburb</option>
    
    <option class="heading-dd" value="Kolkata" >Kolkata</option>
    <option value="Kolkata-North">Kolkata - North</option>
    <option value="Kolkata-South">Kolkata - South</option>
    <option value="Kolkata-East">Kolkata - East</option>
    <option value="Kolkata-West">Kolkata - West</option>
    <option value="Kolkata-Central">Kolkata - Central</option>
    <option value="Kolkata-Suburb">Kolkata - Suburb</option>
    
    <option class="heading-dd" value="Ahmedabad" >Ahmedabad</option>
    <option value="Ahmedabad-North">Ahmedabad - North</option>
    <option value="Ahmedabad-South">Ahmedabad - South</option>
    <option value="Ahmedabad-East">Ahmedabad - East</option>
    <option value="Ahmedabad-West">Ahmedabad - West</option>
    <option value="Ahmedabad-Central">Ahmedabad - Central</option>
    
    <option  class="heading-dd" value="Thane" >Thane</option>
    <option value="Thane - Beyond Thane">Thane - Beyond Thane</option>
    
    <optgroup label="Other Cities" style="background:#ececec"></optgroup>
    <option value="Lucknow">Lucknow</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Jaipur">Jaipur</option>
    <option value="Coimbatore">Coimbatore</option>
    <option value="Indore">Indore</option>
    <option value="Kochi">Kochi</option>
    <option value="Bhubaneswar">Bhubaneswar</option>
    <option value="Goa">Goa</option>
    <option value="Vadodara">Vadodara</option>
    <option value="Visakhapatnam">Visakhapatnam</option>
    <option value="Jamshedpur">Jamshedpur</option>
    <option value="Mangalore">Mangalore</option>
    <option value="Bokaro Steel City">Bokaro Steel City</option>

	
		<optgroup label="Andhra Pradesh" style="background:#ececec"></optgroup>
	 	
			<option value="Anantapur">Anantapur</option>
		
			<option value="Chittoor">Chittoor</option>
		
			<option value="Eluru">Eluru</option>
		
			<option value="Guntur">Guntur</option>
		
			<option value="Hyderabad">Hyderabad</option>
		
			<option value="2071">Kakinada</option>
		
			<option value="2090">Kurnool</option>
		
			<option value="2111">Nalgonda</option>
		
			<option value="2121">Nellore</option>
		
			<option value="2145">Rajahmundry</option>
		
			<option value="1200041">Ranga Reddy</option>
		
			<option value="2165">Secunderabad</option>
		
			<option value="2188">Tirupathi</option>
		
			<option value="2200">Vijayawada</option>
		
			<option value="2202">Visakhapatnam</option>
		
			<option value="2203">Vizianagaram</option>
		
			<option value="2205">Warangal</option>
		
			<option value="1200187">West Godavari</option>
		
	
		<optgroup label="Assam" style="background:#ececec"></optgroup>
	 	
			<option value="2280">Guwahati</option>
		
	
		<optgroup label="Bihar" style="background:#ececec"></optgroup>
	 	
			<option value="2373">Bhagalpur</option>
		
			<option value="2384">Darbhanga</option>
		
			<option value="2445">Muzaffarpur</option>
		
			<option value="2453">Patna</option>
		
	
		<optgroup label="Chandigarh" style="background:#ececec"></optgroup>
	 	
			<option value="2481">Chandigarh</option>
		
	
		<optgroup label="Chhattisgarh" style="background:#ececec"></optgroup>
	 	
			<option value="7085">BHILAI</option>
		
			<option value="2501">Bilaspur</option>
		
			<option value="2518">Durg</option>
		
			<option value="2561">Raigarh</option>
		
			<option value="2562">Raipur</option>
		
	
		<optgroup label="Dadra & Nagar Haveli" style="background:#ececec"></optgroup>
	 	
			<option value="2580">Silvassa</option>
		
	
		<optgroup label="Delhi NCR" style="background:#ececec"></optgroup>
	 	
			<option value="2944">Faridabad</option>
		
			<option value="6146">Ghaziabad</option>
		
			<option value="7045">Greater Noida</option>
		
			<option value="2951">Gurgaon</option>
		
			<option value="2624">New Delhi</option>
		
			<option value="6403">Noida</option>
		
	
		<optgroup label="Goa" style="background:#ececec"></optgroup>
	 	
			<option value="2669">Goa</option>
		
	
		<optgroup label="Gujarat" style="background:#ececec"></optgroup>
	 	
			<option value="Ahmedabad">Ahmedabad</option>
		
			<option value="2695">Amreli</option>
		
			<option value="2696">Anand</option>
		
			<option value="2700">Ankleshwar</option>
		
			<option value="2713">Bharuch</option>
		
			<option value="2714">Bhavnagar</option>
		
			<option value="2760">Gandhidham</option>
		
			<option value="2761">Gandhinagar</option>
		
			<option value="2781">Jamnagar</option>
		
			<option value="7084">Kutch</option>
		
			<option value="2817">Mehsana</option>
		
			<option value="2842">Navsari</option>
		
			<option value="2859">Rajkot</option>
		
			<option value="2881">Surat</option>
		
			<option value="1200142">Umargam</option>
		
			<option value="2899">Vadodara</option>
		
			<option value="2902">Valsad</option>
		
			<option value="2904">Vapi</option>
		
	
		<optgroup label="Haryana" style="background:#ececec"></optgroup>
	 	
			<option value="2921">Ambala</option>
		
			<option value="2929">Bahadurgarh</option>
		
			<option value="1000591">Dharuhera</option>
		
			<option value="2951">Gurgaon</option>
		
			<option value="2956">Hisar</option>
		
			<option value="2972">Karnal</option>
		
			<option value="2988">Palwal</option>
		
			<option value="2989">Panchkula</option>
		
			<option value="2990">Panipat</option>
		
			<option value="3003">Rewari</option>
		
			<option value="3004">Rohtak</option>
		
			<option value="3014">Sonipat</option>
		
			<option value="3025">Yamunanagar</option>
		
	
		<optgroup label="Himachal Pradesh" style="background:#ececec"></optgroup>
	 	
			<option value="3049">Kasauli</option>
		
			<option value="3074">Shimla</option>
		
			<option value="3075">Solan</option>
		
	
		<optgroup label="Jammu & Kashmir" style="background:#ececec"></optgroup>
	 	
			<option value="3111">Jammu</option>
		
	
		<optgroup label="Jharkhand" style="background:#ececec"></optgroup>
	 	
			<option value="3177">Bokaro Steel City</option>
		
			<option value="3198">Dhanbad</option>
		
			<option value="3225">Jamshedpur</option>
		
			<option value="3284">Ranchi</option>
		
	
		<optgroup label="Karnataka" style="background:#ececec"></optgroup>
	 	
			<option value="Bangalore">Bangalore</option>
		
			<option value="3334">Belgaum</option>
		
			<option value="1200038">Dharwad</option>
		
			<option value="3384">Gulbarga</option>
		
			<option value="1200171">Hubli</option>
		
			<option value="3413">Hubli-Dharwad</option>
		
			<option value="3438">Kolar</option>
		
			<option value="3475">Mangalore</option>
		
			<option value="3493">Mysore</option>
		
			<option value="3558">Tumkur</option>
		
			<option value="3560">Udupi</option>
		
	
		<optgroup label="Kerala" style="background:#ececec"></optgroup>
	 	
			<option value="3576">Alappuzha</option>
		
			<option value="3577">Aluva</option>
		
			<option value="7064">Ernakulam</option>
		
			<option value="3614">Guruvayoor</option>
		
			<option value="3632">Kannur</option>
		
			<option value="3637">Kochi</option>
		
			<option value="3641">Kollam</option>
		
			<option value="3646">Kottayam</option>
		
			<option value="3649">Kozhikode</option>
		
			<option value="3678">Palakkad</option>
		
			<option value="3689">Pathanamthitta</option>
		
			<option value="3720">Thrissur</option>
		
			<option value="1200049">Trivandrum</option>
		
	
		<optgroup label="Madhya Pradesh" style="background:#ececec"></optgroup>
	 	
			<option value="3808">Bhopal</option>
		
			<option value="3845">Dewas</option>
		
			<option value="3871">Gwalior</option>
		
			<option value="3886">Indore</option>
		
			<option value="3889">Jabalpur</option>
		
			<option value="4111">Ujjain</option>
		
	
		<optgroup label="Maharashtra" style="background:#ececec"></optgroup>
	 	
			<option value="4122">Ahmadnagar</option>
		
			<option value="4126">Akola</option>
		
			<option value="4129">Alibag</option>
		
			<option value="4135">Amravati</option>
		
			<option value="4139">Aurangabad</option>
		
			<option value="4142">Badlapur</option>
		
			<option value="4152">Bhiwandi</option>
		
			<option value="4228">Jalgaon</option>
		
			<option value="4274">Kolhapur</option>
		
			<option value="1200024">Lavasa</option>
		
			<option value="4290">Lonavala</option>
		
			<option value="Mumbai">Mumbai</option>
		
			<option value="4321">Murbad</option>
		
			<option value="4327">Nagpur</option>
		
			<option value="4339">Nashik</option>
		
			<option value="4341">Navi Mumbai</option>
		
			<option value="4354">Palghar</option>
		
			<option value="4374">Phaltan</option>
		
			<option value="4375">Pimpri Chinchwad</option>
		
			<option value="Pune">Pune</option>
		
			<option value="1200023">Raigad</option>
		
			<option value="4390">Ratnagiri</option>
		
			<option value="7072">Sangli</option>
		
			<option value="4402">Satara</option>
		
			<option value="4412">Shirdi</option>
		
			<option value="8889">Sindhudurg</option>
		
			<option value="4429">Solapur</option>
		
			<option value="4442">Thane</option>
		
	
		<optgroup label="Odisha/Orissa" style="background:#ececec"></optgroup>
	 	
			<option value="1200053">Berhampur</option>
		
			<option value="4596">Bhubaneswar</option>
		
			<option value="4612">Cuttack</option>
		
			<option value="4633">Jajpur</option>
		
			<option value="4684">Puri</option>
		
	
		<optgroup label="Pondicherry" style="background:#ececec"></optgroup>
	 	
			<option value="4715">Pondicherry</option>
		
			<option value="1200045">Puducherry</option>
		
	
		<optgroup label="Punjab" style="background:#ececec"></optgroup>
	 	
			<option value="4724">Amritsar</option>
		
			<option value="2481">Chandigarh</option>
		
			<option value="4756">Dera Bassi</option>
		
			<option value="4788">Jalandhar</option>
		
			<option value="4806">Ludhiana</option>
		
			<option value="7062">Mohali</option>
		
			<option value="4830">Patiala</option>
		
			<option value="4840">Rajpura</option>
		
			<option value="7066">Zirakpur</option>
		
	
		<optgroup label="Rajasthan" style="background:#ececec"></optgroup>
	 	
			<option value="4872">Ajmer</option>
		
			<option value="4874">Alwar</option>
		
			<option value="4904">Bhiwadi</option>
		
			<option value="1000540">Bikaner</option>
		
			<option value="4949">Jaipur</option>
		
			<option value="4957">Jodhpur</option>
		
			<option value="4978">Kota</option>
		
			<option value="1201056">Neemrana</option>
		
			<option value="5079">Udaipur</option>
		
	
		<optgroup label="Tamil Nadu" style="background:#ececec"></optgroup>
	 	
			<option value="Chennai">Chennai</option>
		
			<option value="5216">Coimbatore</option>
		
			<option value="5234">Dindigul</option>
		
			<option value="5246">Erode</option>
		
			<option value="1000539">Hosur</option>
		
			<option value="5312">Kancheepuram</option>
		
			<option value="5365">Kodaikanal</option>
		
			<option value="5399">Kumbakonam</option>
		
			<option value="5420">Madurai</option>
		
			<option value="7059">Ooty</option>
		
			<option value="5666">Salem</option>
		
			<option value="5714">Sriperumbudur</option>
		
			<option value="5738">Thanjavur</option>
		
			<option value="5774">Thiruvallur</option>
		
			<option value="1200047">Tiruchirappalli</option>
		
			<option value="5801">Tirunelveli</option>
		
			<option value="7081">Tirupur</option>
		
			<option value="5798">Trichy</option>
		
			<option value="5872">Vellore</option>
		
	
		<optgroup label="Uttar Pradesh" style="background:#ececec"></optgroup>
	 	
			<option value="5931">Agra</option>
		
			<option value="5938">Aligarh</option>
		
			<option value="5939">Allahabad</option>
		
			<option value="6003">Bareilly</option>
		
			<option value="1202040">Gautam Buddha Nagar</option>
		
			<option value="6146">Ghaziabad</option>
		
			<option value="6160">Gorakhpur</option>
		
			<option value="7045">Greater Noida</option>
		
			<option value="6216">Jhansi</option>
		
			<option value="6245">Kanpur</option>
		
			<option value="6317">Lucknow</option>
		
			<option value="6347">Mathura</option>
		
			<option value="6354">Meerut</option>
		
			<option value="6370">Moradabad</option>
		
			<option value="6381">Muzaffarnagar</option>
		
			<option value="6481">Saharanpur</option>
		
			<option value="6586">Varanasi</option>
		
			<option value="6588">Vrindavan</option>
		
	
		<optgroup label="Uttarakhand" style="background:#ececec"></optgroup>
	 	
			<option value="Dehradun">Dehradun</option>
		
			<option value="Haldwani">Haldwani</option>
		
			<option value="Haridwar">Haridwar</option>
		
			<option value="Nainital">Nainital</option>
		
			<option value="Ranikhet">Ranikhet</option>
		
			<option value="Rishikesh">Rishikesh</option>
		
			<option value="Roorkee">Roorkee</option>
		
			<option value="Rudrapur">Rudrapur</option>
		
	
		<optgroup label="West Bengal" style="background:#ececec"></optgroup>
	 	
			<option value="Asansol">Asansol</option>
		
			<option value="Bolpur">Bolpur</option>
		
			<option value="Burdwan">Burdwan</option>
		
			<option value="Durgapur">Durgapur</option>
		
			<option value="Kharagpur">Kharagpur</option>
		
			<option value="Kolkata">Kolkata</option>
		
			<option value="Konnagar">Konnagar</option>
		
			<option value="Medinipur">Medinipur</option>
		
			<option value="Nadia">Nadia</option>
		
			<option value="North 24 Parganas">North 24 Parganas</option>
		
			<option value="Serampore">Serampore</option>
		
			<option value="Siliguri">Siliguri</option>
		
			<option value="South 24 Parganas">South 24 Parganas</option>
		
	


	                           </select>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Location</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="location" id="location" class="form-control" placeholder="" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Some help goes here...</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">State</label>
                                                <div class="col-md-9">
                                                    <select id="stateDropDown" name="state" class="form-control">
		                        		<option value="-1">---Select State---</option>
										<option value="Andaman Nicobar">Andaman &amp; Nicobar</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chandigarh">Chandigarh</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Dadra Nagar Haveli">Dadra &amp; Nagar Haveli</option><option value="Daman Diu">Daman &amp; Diu</option><option value="Delhi NCR" selected="selected">Delhi NCR</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu Kashmir">Jammu &amp; Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Lakshadweep">Lakshadweep</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Odisha/Orissa">Odisha/Orissa</option><option value="Pondicherry">Pondicherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option>
		                             </select>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Locality</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <input type="text" id="Locality" name="Locality" class="form-control" placeholder="Locality" required>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Some help goes here...</span>
                                                        <i class="icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Address</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <textArea id="Address" name="Address" class="form-control" placeholder="Address" required></textArea>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Some help goes here...</span>
                                                        <i class="icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Country</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon">
                                                        <input type="text" class="form-control" id="country" name="country" value="India" placeholder="Country" disabled>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Some help goes here...</span>
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                            </div>
											   
											</div></div>
                                         
                                           <div class="portlet light bordered">
										 <div class="portlet-title"><div class="caption">
											AREA
											</div></div>
							 <div class="portlet-body form">
							 
							 <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-2 control-label" for="form_control_1">Total Area</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <input type="text" value="sq-ft"class="form-control" name="Total_Area" id="Total_Area" placeholder="Total Area" required>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="icon-home"></i>
                                                    </div>
                                                </div>
                                            </div>
											
											 <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-2 control-label" for="form_control_1">Built-up Area</label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <input type="text" value="sq-ft"class="form-control" name="builtup_area" id="builtup_area" placeholder="Built-up Area" required>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="icon-home"></i>
                                                    </div>
                                                </div>
												 <label class="col-md-2 control-label" for="form_control_1">Carpet Area</label>
												<div class="col-md-3">
                                                    <div class="input-icon right">
                                                        <input type="text" value="sq-ft"class="form-control" name="carpet_area" id="carpet_area" placeholder="Carpet Area" required>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="icon-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                               </div></div>
                                           <div class="portlet light bordered">
										 <div class="portlet-title"><div class="caption">
											PRICE DETAILS
											</div></div>
							 <div class="portlet-body form">
							 
							 <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Expected Price</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <input type="text" value="Rs"class="form-control" name="expected_price" id="expected_price" placeholder="Expected Price" required>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Price per sq-ft</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <input type="text" value="Rs"class="form-control" name="price_per_sq_ft" id="price_per_sq_ft" placeholder="Price Per Sq-ft" required>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="form-group form-md-line-input has-success">
                                                <label class="col-md-3 control-label" for="form_control_1">Maintaince Cost</label>
                                                <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <input type="text" value="Rs"class="form-control" name="maintaince_cost" id="maintaince_cost" placeholder="Total Balconies" required>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div><div class="col-md-1">
                                                    <div class="input-icon right">
                                                        per
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                       
                                                    </div>
                                                </div><div class="col-md-4">
                                                    <div class="input-icon right">
													<select id="maintaincecostper" name="maintaincecostper" class="form-control" required>
                                                        <option value="monthly">Monthly</option>
														 <option value="annualy">Annualy</option>
														  <option value="quaterly">Quaterly</option>
														   <option value="weekly">Weekly</option>
														    <option value="onetime">Onetime</option>
														</select>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Enter number only...</span>
                                                        
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="form-group form-md-checkboxes">
                                                <label class="col-md-3 control-label" for="form_control_1"></label>
                                                <div class="col-md-9">
                                                    <div class="md-checkbox-list">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox1_1" name="checkbox1_1"  class="md-check">
                                                            <label for="checkbox1_1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Include Stamp and Registration Charges </label>
                                                        </div></div></div></div>
														
														<div class="form-group form-md-checkboxes">
                                                <label class="col-md-3 control-label" for="form_control_2"></label>
                                                <div class="col-md-9">
                                                    <div class="md-checkbox-list">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox2_1" name="checkbox2_1"  class="md-check">
                                                            <label for="checkbox2_1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Not interested in getting response from brokers </label>
                                                        </div></div></div></div>
                               </div></div>
                                           <div class="portlet light bordered">
										 <div class="portlet-title"><div class="caption">
											TRANSACTION DETAILS
											</div></div>
							 <div class="portlet-body form">
						
					<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">Transaction type</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_23" name="radio24" value="New Property" class="md-radiobtn">
                                                        <label for="checkbox2_23">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> New Property </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_24" name="radio24" value="Resale" class="md-radiobtn" checked>
                                                        <label for="checkbox2_24">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Resale </label>
                                                    </div>
                                                   
                                                </div> </div>
                                            </div> </div>
											
											<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">Possession Status</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                              
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_25" name="radio25" value="Under Construction" class="md-radiobtn">
                                                        <label for="checkbox2_25">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Under Construction </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" id="checkbox2_26" name="radio25" value="Ready to move" class="md-radiobtn" checked>
                                                        <label for="checkbox2_26">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Ready to move </label>
                                                    </div>
                                                   
                                                </div> </div>
                                            </div> </div>
					
					
					
                               </div></div>
                                            <div class="portlet light bordered">
										 <div class="portlet-title"><div class="caption">
											AVAILABILITY
											</div></div>
							 <div class="portlet-body form">
						
					<div class="form-group form-md-line-input has-success">
												<label class="col-md-3 control-label" for="form_control_1">Available from </label>
                                                
                                               <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <select id="availablefrom" name="availablefrom" class="form-control" onchange="" size="1">
	                                        	<option value="-1">Select</option>
												<option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option>
												</select>
                                               </div>
                                            </div>
											
											  <div class="col-md-4">
                                                    <div class="input-icon right">
                                                        <select id="availableyear" name="availableyear" class="form-control" onchange="" size="1">
	                                        	<option value="-1">Select</option>
												<option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option>
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												</select>
                                               </div>
                                            </div>


											</div>
											
											
					
					
					
                               </div></div> 
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" name="submitform" id="submitform" class="btn green">Submit</button>
                                                    <a href="javascript:;" class="btn default">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                   
                                    <!-- END FORM-->
                                    <!-- END FORM-->
									
									<!-- end form -->
									
                                </div>
                            </div>
                        </div>
						<?php 
						$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_profile");
						if($getprofilestatus){$count = $getprofilestatus->process_status ;}
						else{$count = 0;}
						?>
						
                    </div>
                    <!-- END : STEPS -->
					
					   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                </div>
                <!-- END CONTENT BODY -->

	  
	   <?php ActiveForm::end(); ?>
         <script>
	  function focalphy(){
	  var foc=$('#propertytype').val();
	  if(foc=='1'){
	  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	   }
	  else if(foc=='2'){
	  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
        else if(foc=='3'){
	  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
        else if(foc=='4'){
	  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
        else if(foc=='5'){
  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
        else if(foc=='6'){
	   document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
        else if(foc=='7'){
	  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
        else if(foc=='8'){
	  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
        else if(foc=='9'){
  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
        else if(foc=='10'){
	 	  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='block';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }
	 else if(foc=='11'){
	  document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='block';
	  document.getElementById('nine').style.display='block';
	  document.getElementById('ten').style.display='block';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	 
	  }else if(foc=='12'){
	
	   document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='block';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='block';
	  document.getElementById('nine').style.display='block';
	  document.getElementById('ten').style.display='block';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	 
	  }else if(foc=='13'){
		 document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='block';
	  document.getElementById('ten').style.display='block';
	  document.getElementById('eleven').style.display='block';
	  document.getElementById('twelve').style.display='block';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	 
	  }else if(foc=='14'){
	 document.getElementById('one').style.display='block';
	   document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	 document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='block';
	  document.getElementById('ten').style.display='block';
	  document.getElementById('eleven').style.display='block';
	  document.getElementById('twelve').style.display='block';
	 document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }else if(foc=='15'){
	
	  document.getElementById('one').style.display='none';
	  document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='none';
	  document.getElementById('six').style.display='none';
	  document.getElementById('seven').style.display='none';
	  document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='block';
	  document.getElementById('thirteen').style.display='block';
	  document.getElementById('fourteen').style.display='none';
	  }else if(foc=='16'){
	document.getElementById('one').style.display='none';
	  document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='block';
	  document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='block';
	  document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  }else if(foc=='17'){
	
	   document.getElementById('one').style.display='none';
	  document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='none';
	  document.getElementById('six').style.display='none';
	  document.getElementById('seven').style.display='none';
	  document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='block';
	  document.getElementById('thirteen').style.display='block';
	  document.getElementById('fourteen').style.display='none';
	  }else if(foc=='18'){
	  document.getElementById('one').style.display='none';
	  document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='none';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='none';
	  document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='none';
	  document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	 
	  
	  }else if(foc=='19'){
	  document.getElementById('one').style.display='none';
	  document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='none';
	  document.getElementById('six').style.display='none';
	  document.getElementById('seven').style.display='none';
	  document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='block';
	  document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	  
	 
	 
	  }else if(foc=='20'){
	  document.getElementById('one').style.display='none';
	  document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='none';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='none';
	  document.getElementById('six').style.display='none';
	  document.getElementById('seven').style.display='none';
	  document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='block';
	  document.getElementById('thirteen').style.display='block';
	  document.getElementById('fourteen').style.display='none';
	  
	 
	  }else{
	 document.getElementById('one').style.display='none';
	  document.getElementById('two').style.display='none';
	  document.getElementById('three').style.display='block';
	  document.getElementById('four').style.display='none';
	  document.getElementById('five').style.display='block';
	  document.getElementById('six').style.display='block';
	  document.getElementById('seven').style.display='none';
	  document.getElementById('eight').style.display='none';
	  document.getElementById('nine').style.display='none';
	  document.getElementById('ten').style.display='none';
	  document.getElementById('eleven').style.display='none';
	  document.getElementById('twelve').style.display='block';
	  document.getElementById('thirteen').style.display='none';
	  document.getElementById('fourteen').style.display='none';
	 
	  }
          
        
          
          
	  }
	  
	  </script>
	  
