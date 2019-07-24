<?php

namespace common\models;

use Yii;
use common\models\MediaFilesConfig;
use common\models\MediaFiles;
use yii\helpers\HtmlPurifier;

/**
 * This is the model class for table "addproperty".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 * @property string $project_name
 * @property integer $project_type_id
 * @property string $request_for
 * @property string $featured_image
 * @property string $featured_video
 * @property integer $city
 * @property string $locality
 * @property string $address
 * @property double $longitude
 * @property double $latitude
 * @property integer $total_plot_area
 * @property string $plot_unit
 * @property integer $expected_price
 * @property integer $price_sq_ft
 * @property integer $price_acres
 * @property string $asking_rental_price
 * @property string $price_negotiable
 * @property string $revenue_lauout
 * @property string $present_status
 * @property string $jurisdiction_development
 * @property string $shed_RCC
 * @property string $maintenance_cost
 * @property string $maintenance_by
 * @property string $annual_dues_payable
 * @property string $expected_rental
 * @property string $availability
 * @property string $age_of_property
 * @property string $possesion_by
 * @property string $transaction_type
 * @property string $ownership
 * @property string $facing
 * @property string $FAR_approval
 * @property string $LOAN_taken
 * @property integer $buildup_area
 * @property string $build_unit
 * @property integer $carpet_area
 * @property string $carpet_unit
 * @property integer $total_floors
 * @property integer $property_on_floor
 * @property integer $configuration
 * @property integer $floors_allowed_construction
 * @property integer $bedrooms
 * @property integer $bathrooms
 * @property integer $balconies
 * @property string $pooja_room
 * @property string $study_room
 * @property string $servant_room
 * @property string $other_room
 * @property string $furnished_status
 * @property integer $parking
 * @property string $is_active
 * @property string $created_date
 */
class Addproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'addproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['user_id', 'role_id', 'project_name', 'project_type_id', 'request_for', 'featured_image', 'featured_video', 'city', 'locality', 'address', 'longitude', 'latitude', 'total_plot_area', 'plot_unit', 'expected_price', 'price_sq_ft', 'price_acres', 'price_negotiable', 'revenue_lauout', 'present_status', 'jurisdiction_development', 'shed_RCC', 'maintenance_cost', 'maintenance_by', 'annual_dues_payable', 'expected_rental', 'availability', 'age_of_property', 'possesion_by', 'rental_type', 'ownership', 'facing', 'FAR_approval', 'LOAN_taken', 'buildup_area', 'build_unit', 'carpet_area', 'carpet_unit', 'total_floors', 'property_on_floor', 'configuration', 'floors_allowed_construction', 'bedrooms', 'bathrooms', 'balconies', 'furnished_status', 'parking','ownership_status','available_from', 'created_date'], 'required'],
			
           // [['user_id', 'role_id', 'project_type_id', 'total_plot_area', 'expected_price', 'price_sq_ft', 'price_acres', 'buildup_area', 'carpet_area', 'total_floors', 'property_on_floor', 'floors_allowed_construction', 'bedrooms', 'bathrooms', 'balconies', 'parking'], 'integer'],
            [['asking_rental_price','maintenance_cost','annual_dues_payable','buildup_area','carpet_area','total_floors', 'bedrooms','bathrooms','balconies','servant_room','expected_price','membership_charge','no_of_similiar_shops','expected_rental'], 'integer','message' => '{attribute} is invalid.'],
		   
            [['locality', 'address',  'price_negotiable', 'revenue_lauout', 'present_status', 'shed_RCC', 'maintenance_by', 'availability', 'age_of_property', 'possesion_by', 'rental_type', 'ownership', 'facing', 'LOAN_taken', 'build_unit', 'carpet_unit', 'pooja_room', 'study_room', 'servant_room', 'other_room', 'furnished_status', 'is_active', 'jurisdiction_development'], 'string','message' => '{attribute} is invalid.'],
			
			
            [['longitude', 'latitude'], 'number'],
            
            [['created_date','status'], 'safe'],
            
            
            [['project_name', 'featured_image', 'jurisdiction_development', 'maintenance_cost', 'annual_dues_payable', 'expected_rental'], 'string', 'max' => 100],
            
            
            [['featured_video'], 'string', 'max' => 200],
           
            
            // [['project_type_id', 'request_for','city', 'locality', 'address','expected_price', 'price_sq_ft','price_negotiable','ownership','LOAN_taken'], 'required','on'=>'creates'],
            [['project_type_id', 'locality', 'address'], 'required'],
            
            [['locality','address','ownership'], 'filter', 'filter' => function ($value) {
              return \yii\helpers\HtmlPurifier::process($value);
            }], 

            // [['project_type_id', 'request_for', 'city', 'locality', 'address','ownership','available_from','price_sq_ft','price_negotiable','LOAN_taken','asking_rental_price'], 'required','on'=>'create'],
             
            
            [['available_date'], 'default', 'value' => null],
      
      
             [['buildup_area','carpet_area','asking_rental_price','total_floors','maintenance_cost','annual_dues_payable','bedrooms','bathrooms','balconies','servant_room','parking','expected_price','membership_charge','expected_rental'],'match','pattern'=>"/[0-9]+(\.[0-9][0-9]?)?/"],
       
       
       //[['FAR_approval'],'match','pattern'=>"/^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?/"],
        
       
       ['available_date', 'required', 'when' => function($model){
				return ($model->available_from == 'Date' ? true : false);
			  }, 'whenClient' => "function (attribute, value) {
				  return $('input[type=\"radio\"][name=\"Addproperty[available_from]\"]:checked').val() == 'Date';
			  }"],
			 
			

//['buildup_area', 'compare', 'compareAttribute' => 'carpet_area', 'operator' => '>','message' => 'Build up Area should be Greater then Carpet Area.','type' => 'number',],	



    
    // [['total_plot_area','plot_unit'] ,'required','when'=>function($model){
    //                              if($model->project_type_id == 15){
    //                                return $model->project_type_id == 15 ;  
    //                              }                                 
    //                              if($model->project_type_id == 18){
    //                                return $model->project_type_id == 18;  
    //                              }
    //                              if($model->project_type_id == 22){
    //                                return $model->project_type_id == 22 ;  
    //                              }
    //                              if($model->project_type_id == 17){
    //                                return $model->project_type_id == 17 ;  
    //                              }
    //                              if($model->project_type_id == 23){
    //                                return $model->project_type_id == 23 ;  
    //                              }
    //                              if($model->project_type_id == 16){
    //                                return $model->project_type_id == 16 ;  
    //                              }
    //                              if($model->project_type_id == 24){
    //                                return $model->project_type_id == 24 ;  
    //                              }
    //                              if($model->project_type_id == 25){
    //                                return $model->project_type_id == 25;  
    //                              }
    //                              if($model->project_type_id == 29){
    //                                return $model->project_type_id == 29;  
    //                              }
    //                              if($model->project_type_id == 4){
    //                                return $model->project_type_id == 4;  
    //                              }
    //                              if($model->project_type_id == 6){
    //                                return $model->project_type_id == 6;  
    //                              }
    //                              if($model->project_type_id == 5){
    //                                return $model->project_type_id == 5;  
    //                              }
    //                              if($model->project_type_id == 30){
    //                                return $model->project_type_id == 30;  
    //                              }
    //                              if($model->project_type_id == 10){
    //                                return $model->project_type_id == 10;  
    //                              }
				 
		//          	 }, 'whenClient' => "function (attribute, value) {
    //                                  if($('#project_type').val() == '15'){
    //                                  return $('#project_type').val() == '15';
    //                                  }
                                    
    //                                  if($('#project_type').val() == '18'){
    //                                  return $('#project_type').val() == '18';
    //                                  }
    //                                  if($('#project_type').val() == '22'){
    //                                  return $('#project_type').val() == '22';
    //                                  }
    //                                  if($('#project_type').val() == '17'){
    //                                  return $('#project_type').val() == '17';
    //                                  }
    //                                  if($('#project_type').val() == '23'){
    //                                  return $('#project_type').val() == '23';
    //                                  }
    //                                  if($('#project_type').val() == '16'){
    //                                  return $('#project_type').val() == '16';
    //                                  }
    //                                  if($('#project_type').val() == '24'){
    //                                  return $('#project_type').val() == '24';
    //                                  }
    //                                  if($('#project_type').val() == '25'){
    //                                  return $('#project_type').val() == '25';
    //                                  }
    //                                  if($('#project_type').val() == '29'){
    //                                  return $('#project_type').val() == '29';
    //                                  }
    //                                  if($('#project_type').val() == '4'){
    //                                  return $('#project_type').val() == '4';
    //                                  }
    //                                  if($('#project_type').val() == '6'){
    //                                  return $('#project_type').val() == '6';
    //                                  }
    //                                  if($('#project_type').val() == '5'){
    //                                  return $('#project_type').val() == '5';
    //                                  }
    //                                  if($('#project_type').val() == '30'){
    //                                  return $('#project_type').val() == '30';
    //                                  }
    //                                  if($('#project_type').val() == '10'){
    //                                  return $('#project_type').val() == '10';
    //                                  }
                        
    //                      }"], 
						 
						
    
    
    
    
    
    
    
    // [['maintenance_cost','maintenance_cost_unit'] ,'required','when'=>function($model){
    //                              if($model->project_type_id == 11){
    //                                return $model->project_type_id == 11 ;  
    //                              }
    //                              if($model->project_type_id == 13){
    //                                return $model->project_type_id == 13 ;  
    //                              }
    //                              if($model->project_type_id == 18){
    //                                return $model->project_type_id == 18 ;  
    //                              }
    //                              if($model->project_type_id == 12){
    //                                return $model->project_type_id == 12 ;  
    //                              }
    //                              if($model->project_type_id == 26){
    //                                return $model->project_type_id == 26 ;  
    //                              }
    //                              if($model->project_type_id == 27){
    //                                return $model->project_type_id == 27 ;  
    //                              }
    //                              if($model->project_type_id == 28){
    //                                return $model->project_type_id == 28 ;  
    //                              }
                                
                                
                                 
				 
		//          	 }, 'whenClient' => "function (attribute, value) {
    //                                  if($('#project_type').val() == '11'){
    //                                  return $('#project_type').val() == '11';
    //                                  }
                                     
    //                                  if($('#project_type').val() == '13'){
    //                                  return $('#project_type').val() == '13';
    //                                  }
    //                                  if($('#project_type').val() == '18'){
    //                                  return $('#project_type').val() == '18';
    //                                  }
    //                                  if($('#project_type').val() == '12'){
    //                                  return $('#project_type').val() == '12';
    //                                  }
    //                                  if($('#project_type').val() == '26'){
    //                                  return $('#project_type').val() == '26';
    //                                  }
    //                                  if($('#project_type').val() == '27'){
    //                                  return $('#project_type').val() == '27';
    //                                  }
    //                                  if($('#project_type').val() == '28'){
    //                                  return $('#project_type').val() == '28';
    //                                  }
                                    
                                   
                                    
                        
    //                      }"], 
						 
						
    
    
    
    
    // [['availability'] ,'required','when'=>function($model){
    //                              if($model->project_type_id == 11){
    //                                return $model->project_type_id == 11 ;  
    //                              }
                                 
    //                              if($model->project_type_id == 13){
    //                                return $model->project_type_id == 13 ;  
    //                              }
    //                              if($model->project_type_id == 18){
    //                                return $model->project_type_id == 18 ;  
    //                              }
                                
    //                              if($model->project_type_id == 23){
    //                                return $model->project_type_id == 23 ;  
    //                              }
    //                              if($model->project_type_id == 16){
    //                                return $model->project_type_id == 16 ;  
    //                              }
    //                              if($model->project_type_id == 24){
    //                                return $model->project_type_id == 24 ;  
    //                              }
    //                              if($model->project_type_id == 25){
    //                                return $model->project_type_id == 25;  
    //                              }
    //                              if($model->project_type_id == 29){
    //                                return $model->project_type_id == 29;  
    //                              }
                                 
    //                              if($model->project_type_id == 30){
    //                                return $model->project_type_id == 30;  
    //                              }
    //                              if($model->project_type_id == 12){
    //                                return $model->project_type_id == 12;  
    //                              }
				 
		//          	 }, 'whenClient' => "function (attribute, value) {
    //                                  if($('#project_type').val() == '11'){
    //                                  return $('#project_type').val() == '11';
    //                                  }
                                     
    //                                  if($('#project_type').val() == '13'){
    //                                  return $('#project_type').val() == '13';
    //                                  }
    //                                  if($('#project_type').val() == '18'){
    //                                  return $('#project_type').val() == '18';
    //                                  }
                                    
    //                                  if($('#project_type').val() == '23'){
    //                                  return $('#project_type').val() == '23';
    //                                  }
    //                                  if($('#project_type').val() == '16'){
    //                                  return $('#project_type').val() == '16';
    //                                  }
    //                                  if($('#project_type').val() == '24'){
    //                                  return $('#project_type').val() == '24';
    //                                  }
    //                                  if($('#project_type').val() == '25'){
    //                                  return $('#project_type').val() == '25';
    //                                  }
    //                                  if($('#project_type').val() == '29'){
    //                                  return $('#project_type').val() == '29';
    //                                  }
                                    
    //                                  if($('#project_type').val() == '30'){
    //                                  return $('#project_type').val() == '30';
    //                                  }
    //                                  if($('#project_type').val() == '12'){
    //                                  return $('#project_type').val() == '12';
    //                                  }
                        
    //                      }"], 
						 
						 
						 
    // [['carpet_area','carpet_unit'] ,'required','when'=>function($model){
    //                              if($model->project_type_id == 11){
    //                                return $model->project_type_id == 11 ;  
    //                              }
    //                              if($model->project_type_id == 13){
    //                                return $model->project_type_id == 13 ;  
    //                              }
    //                              if($model->project_type_id == 12){
    //                                return $model->project_type_id == 12 ;  
    //                              }
    //                              if($model->project_type_id == 18){
    //                               return $model->project_type_id == 18 ;  
    //                             }
    //                             if($model->project_type_id == 25){
    //                               return $model->project_type_id == 25 ;  
    //                             }
    //                              if($model->project_type_id == 26){
    //                                return $model->project_type_id == 26 ;  
    //                              }
                                 
    //                              if($model->project_type_id == 27){
    //                                return $model->project_type_id == 27 ;  
    //                              }
                                 
    //                              if($model->project_type_id == 28){
    //                                return $model->project_type_id == 28 ;  
    //                              }
    //                              if($model->project_type_id == 3){
    //                                return $model->project_type_id == 3 ;  
    //                              }
    //                              if($model->project_type_id == 7){
    //                                return $model->project_type_id == 7 ;  
    //                              }
    //                              if($model->project_type_id == 9){
    //                                return $model->project_type_id == 9 ;  
    //                              }
                                 
				 
		//          	 }, 'whenClient' => "function (attribute, value) {
    //                                  if($('#project_type').val() == '11'){
    //                                  return $('#project_type').val() == '11';
    //                                  }
    //                                  if($('#project_type').val() == '13'){
    //                                  return $('#project_type').val() == '13';
    //                                  }
    //                                  if($('#project_type').val() == '18'){
    //                                  return $('#project_type').val() == '18';
    //                                  }
    //                                  if($('#project_type').val() == '25'){
    //                                   return $('#project_type').val() == '25';
    //                                   }
    //                                   if($('#project_type').val() == '12'){
    //                                     return $('#project_type').val() == '12';
    //                                     }
    //                                  if($('#project_type').val() == '26'){
    //                                  return $('#project_type').val() == '26';
    //                                  }
    //                                  if($('#project_type').val() == '27'){
    //                                  return $('#project_type').val() == '27';
    //                                  }
    //                                  if($('#project_type').val() == '28'){
    //                                  return $('#project_type').val() == '28';
    //                                  }
    //                                  if($('#project_type').val() == '3'){
    //                                  return $('#project_type').val() == '3';
    //                                  }
    //                                  if($('#project_type').val() == '7'){
    //                                  return $('#project_type').val() == '7';
    //                                  }
    //                                  if($('#project_type').val() == '9'){
    //                                  return $('#project_type').val() == '9';
    //                                  }
                                    
                                    
    //                      }"], 





        //                  [['buildup_area','build_unit'] ,'required','when'=>function($model){
        //                   if($model->project_type_id == 11){
        //                     return $model->project_type_id == 11 ;  
        //                   }
        //                   if($model->project_type_id == 13){
        //                     return $model->project_type_id == 13 ;  
        //                   }
        //                   if($model->project_type_id == 12){
        //                     return $model->project_type_id == 12 ;  
        //                   }
        //                   if($model->project_type_id == 18){
        //                    return $model->project_type_id == 18 ;  
        //                  }
        //                  if($model->project_type_id == 24){
        //                   return $model->project_type_id == 24 ;  
        //                 }
        //                  if($model->project_type_id == 25){
        //                    return $model->project_type_id == 25 ;  
        //                  }
        //                   if($model->project_type_id == 26){
        //                     return $model->project_type_id == 26 ;  
        //                   }
                          
        //                   if($model->project_type_id == 27){
        //                     return $model->project_type_id == 27 ;  
        //                   }
                          
        //                   if($model->project_type_id == 28){
        //                     return $model->project_type_id == 28 ;  
        //                   }
        //                   if($model->project_type_id == 3){
        //                     return $model->project_type_id == 3 ;  
        //                   }
        //                   if($model->project_type_id == 7){
        //                     return $model->project_type_id == 7 ;  
        //                   }
        //                   if($model->project_type_id == 9){
        //                     return $model->project_type_id == 9 ;  
        //                   }
                          
  
        //  }, 'whenClient' => "function (attribute, value) {
        //                       if($('#project_type').val() == '11'){
        //                       return $('#project_type').val() == '11';
        //                       }
        //                       if($('#project_type').val() == '13'){
        //                       return $('#project_type').val() == '13';
        //                       }
        //                       if($('#project_type').val() == '18'){
        //                       return $('#project_type').val() == '18';
        //                       }
        //                       if($('#project_type').val() == '24'){
        //                         return $('#project_type').val() == '24';
        //                         }
        //                       if($('#project_type').val() == '25'){
        //                        return $('#project_type').val() == '25';
        //                        }
        //                        if($('#project_type').val() == '12'){
        //                          return $('#project_type').val() == '12';
        //                          }
        //                       if($('#project_type').val() == '26'){
        //                       return $('#project_type').val() == '26';
        //                       }
        //                       if($('#project_type').val() == '27'){
        //                       return $('#project_type').val() == '27';
        //                       }
        //                       if($('#project_type').val() == '28'){
        //                       return $('#project_type').val() == '28';
        //                       }
        //                       if($('#project_type').val() == '3'){
        //                       return $('#project_type').val() == '3';
        //                       }
        //                       if($('#project_type').val() == '7'){
        //                       return $('#project_type').val() == '7';
        //                       }
        //                       if($('#project_type').val() == '9'){
        //                       return $('#project_type').val() == '9';
        //                       }
                             
                             
        //           }"], 
						 
						 
						 
						 
                                         
            // [['property_on_floor'] ,'required','when'=>function($model){
                                     
            //                      if($model->project_type_id == 11){
            //                        return $model->project_type_id == 11 ;  
            //                      }
            //                      if($model->project_type_id == 13){
            //                        return $model->project_type_id == 13 ;  
            //                      }
            //                      if($model->project_type_id == 12){
            //                        return $model->project_type_id == 12 ;  
            //                      }
            //                      if($model->project_type_id == 18){
            //                       return $model->project_type_id == 18 ;  
            //                     }
            //                      if($model->project_type_id == 26){
            //                        return $model->project_type_id == 26;  
            //                      }
            //                      if($model->project_type_id == 27){
            //                        return $model->project_type_id == 27 ;  
            //                      }
            //                      if($model->project_type_id == 28){
            //                        return $model->project_type_id == 28;  
            //                      }
            //                      if($model->project_type_id == 29){
            //                        return $model->project_type_id == 29;  
            //                      }                                 
            //                      if($model->project_type_id == 3){
            //                        return $model->project_type_id == 3;  
            //                      }                                 
            //                      if($model->project_type_id == 5){
            //                        return $model->project_type_id == 5;  
            //                      }                                 
            //                      if($model->project_type_id == 7){
            //                        return $model->project_type_id == 7;  
            //                      }                                 
            //                      if($model->project_type_id == 9){
            //                        return $model->project_type_id == 9;  
            //                      }                                 
            //                      if($model->project_type_id == 10){
            //                        return $model->project_type_id == 10;  
            //                      }                                 
				 
		        //  	 }, 'whenClient' => "function (attribute, value) {
            //                          if($('#project_type').val() == '11'){
            //                          return $('#project_type').val() == '11';
            //                          }
                                     
            //                          if($('#project_type').val() == '13'){
            //                          return $('#project_type').val() == '13';
            //                          }
            //                          if($('#project_type').val() == '12'){
            //                          return $('#project_type').val() == '12';
            //                          }
            //                          if($('#project_type').val() == '18'){
            //                           return $('#project_type').val() == '18';
            //                           }
            //                          if($('#project_type').val() == '26'){
            //                          return $('#project_type').val() == '26';
            //                          }
            //                          if($('#project_type').val() == '27'){
            //                          return $('#project_type').val() == '27';
            //                          }                                     
            //                          if($('#project_type').val() == '28'){
            //                          return $('#project_type').val() == '28';
            //                          }
            //                          if($('#project_type').val() == '29'){
            //                          return $('#project_type').val() == '29';
            //                          }
            //                          if($('#project_type').val() == '3'){
            //                          return $('#project_type').val() == '3';
            //                          }
            //                          if($('#project_type').val() == '5'){
            //                          return $('#project_type').val() == '5';
            //                          }
            //                          if($('#project_type').val() == '7'){
            //                          return $('#project_type').val() == '7';
            //                          }
            //                          if($('#project_type').val() == '9'){
            //                          return $('#project_type').val() == '9';
            //                          }
            //                          if($('#project_type').val() == '10'){
            //                          return $('#project_type').val() == '10';
            //                          }
                        
            //              }"], 
                                         
            // [['furnished_status'] ,'required','when'=>function($model){
            //                      if($model->project_type_id == 11){
            //                        return $model->project_type_id == 11 ;  
            //                      }
            //                      if($model->project_type_id == 13){
            //                        return $model->project_type_id == 13 ;  
            //                      }
            //                      if($model->project_type_id == 18){
            //                        return $model->project_type_id == 18;  
            //                      }
            //                      if($model->project_type_id == 12){
            //                        return $model->project_type_id == 12;  
            //                      }
                                
            //                      if($model->project_type_id == 27){
            //                        return $model->project_type_id == 27 ;  
            //                      }
            //                      if($model->project_type_id == 28){
            //                        return $model->project_type_id == 28;  
            //                      }
            //                      if($model->project_type_id == 29){
            //                        return $model->project_type_id == 29;  
            //                      }                                 
				 
		        //  	 }, 'whenClient' => "function (attribute, value) {
            //                          if($('#project_type').val() == '11'){
            //                          return $('#project_type').val() == '11';
            //                          }
                                     
            //                          if($('#project_type').val() == '13'){
            //                          return $('#project_type').val() == '13';
            //                          }
            //                          if($('#project_type').val() == '18'){
            //                          return $('#project_type').val() == '18';
            //                          }
            //                          if($('#project_type').val() == '12'){
            //                          return $('#project_type').val() == '12';
            //                          }
                                    
            //                          if($('#project_type').val() == '27'){
            //                          return $('#project_type').val() == '27';
            //                          }                                     
            //                          if($('#project_type').val() == '28'){
            //                          return $('#project_type').val() == '28';
            //                          }
            //                          if($('#project_type').val() == '29'){
            //                          return $('#project_type').val() == '29';
            //                          }
                        
            //              }"], 
                         
                         

        //                  [['price_acres'] ,'required','when'=>function($model){
                          
        //                   if($model->project_type_id == 24){
        //                     return $model->project_type_id == 24;  
        //                   }
        //                   if($model->project_type_id == 25){
        //                     return $model->project_type_id == 25;  
        //                   }                                 
  
        //  }, 'whenClient' => "function (attribute, value) {
                                                
        //                       if($('#project_type').val() == '24'){
        //                       return $('#project_type').val() == '24';
        //                       }
        //                       if($('#project_type').val() == '25'){
        //                       return $('#project_type').val() == '25';
        //                       }
                 
        //           }"], 

  //                 [['present_status','shed_RCC'] ,'required','when'=>function($model){
                          
                    
  //                   if($model->project_type_id == 16){
  //                     return $model->project_type_id == 16;  
  //                   }                                 

  //  }, 'whenClient' => "function (attribute, value) {
                                          
                        
  //                       if($('#project_type').val() == '16'){
  //                       return $('#project_type').val() == '16';
  //                       }
           
  //           }"], 

//             [['maintenance_by'] ,'required','when'=>function($model){
                          
                    
//               if($model->project_type_id == 26){
//                 return $model->project_type_id == 26;  
//               }                                 

// }, 'whenClient' => "function (attribute, value) {
                                    
                  
//                   if($('#project_type').val() == '26'){
//                   return $('#project_type').val() == '26';
//                   }
     
//       }"], 

//       [['possesion_by'] ,'required','when'=>function($model){
                          
                    
//         if($model->project_type_id == 11){
//           return $model->project_type_id == 11;  
//         }  
//         if($model->project_type_id == 13){
//           return $model->project_type_id == 13;  
//         }  
//         if($model->project_type_id == 24){
//           return $model->project_type_id == 24;  
//         }  
//         if($model->project_type_id == 27){
//           return $model->project_type_id == 27;  
//         }  
//         if($model->project_type_id == 28){
//           return $model->project_type_id == 28;  
//         }                                 

// }, 'whenClient' => "function (attribute, value) {
                              
            
//             if($('#project_type').val() == '11'){
//             return $('#project_type').val() == '11';
//             }
//             if($('#project_type').val() == '13'){
//               return $('#project_type').val() == '13';
//               }
//               if($('#project_type').val() == '24'){
//                 return $('#project_type').val() == '24';
//                 }
//                 if($('#project_type').val() == '27'){
//                   return $('#project_type').val() == '27';
//                   }
//                   if($('#project_type').val() == '28'){
//                     return $('#project_type').val() == '28';
//                     }

// }"], 


// [['FAR_approval'] ,'required','when'=>function($model){
                          
                    
//   if($model->project_type_id == 18){
//     return $model->project_type_id == 18;  
//   }                                 

// }, 'whenClient' => "function (attribute, value) {
                        
      
//       if($('#project_type').val() == '18'){
//       return $('#project_type').val() == '18';
//       }

// }"], 
             
                                         
            // [['bedrooms','bathrooms','balconies','servant_room','furnished_status','parking','availability','age_of_property'] ,'required','when'=>function($model){
                                     
            //                      if($model->project_type_id == 3){
            //                        return $model->project_type_id == 3;  
            //                      }
            //                      if($model->project_type_id == 6){
            //                        return $model->project_type_id == 6;  
            //                      }
                                 
            //                      if($model->project_type_id == 5){
            //                        return $model->project_type_id == 5;  
            //                      }
            //                      if($model->project_type_id == 30){
            //                        return $model->project_type_id == 30;  
            //                      }
            //                      if($model->project_type_id == 7){
            //                        return $model->project_type_id == 7;  
            //                      }                                 
            //                      if($model->project_type_id == 9){
            //                        return $model->project_type_id == 9;  
            //                      }                                 
            //                      if($model->project_type_id == 10){
            //                        return $model->project_type_id == 10;  
            //                      }                                 
				 
		        //  	 }, 'whenClient' => "function (attribute, value) {
            //                          if($('#project_type').val() == '3'){
            //                          return $('#project_type').val() == '3';
            //                          }
                                     
            //                          if($('#project_type').val() == '6'){
            //                          return $('#project_type').val() == '6';
            //                          }
                                     
            //                          if($('#project_type').val() == '5'){
            //                          return $('#project_type').val() == '5';
            //                          }                                     
            //                          if($('#project_type').val() == '30'){
            //                          return $('#project_type').val() == '30';
            //                          }
            //                          if($('#project_type').val() == '7'){
            //                          return $('#project_type').val() == '7';
            //                          }
            //                          if($('#project_type').val() == '9'){
            //                          return $('#project_type').val() == '9';
            //                          }
            //                          if($('#project_type').val() == '10'){
            //                          return $('#project_type').val() == '10';
            //                          }
                        
            //              }"],  
                                         
            //             [['configuration'] ,'required','when'=>function($model){
                                     
            //                      if($model->project_type_id == 3){
            //                        return $model->project_type_id == 3;  
            //                      }
            //                      if($model->project_type_id == 6){
            //                        return $model->project_type_id == 6;  
            //                      }
                                 
            //                      if($model->project_type_id == 5){
            //                        return $model->project_type_id == 5;  
            //                      }
            //                      if($model->project_type_id == 30){
            //                        return $model->project_type_id == 30;  
            //                      }
            //                      if($model->project_type_id == 10){
            //                        return $model->project_type_id == 10;  
            //                      }                                 
				 
		        //  	 }, 'whenClient' => "function (attribute, value) {
            //                          if($('#project_type').val() == '3'){
            //                          return $('#project_type').val() == '3';
            //                          }
                                     
            //                          if($('#project_type').val() == '6'){
            //                          return $('#project_type').val() == '6';
            //                          }
                                     
            //                          if($('#project_type').val() == '5'){
            //                          return $('#project_type').val() == '5';
            //                          }                                     
            //                          if($('#project_type').val() == '30'){
            //                          return $('#project_type').val() == '30';
            //                          }
            //                          if($('#project_type').val() == '10'){
            //                          return $('#project_type').val() == '10';
            //                          }
                        
            //              }"], 
                                         
            //             [['total_floors'] ,'required','when'=>function($model){
                                     
            //                      if($model->project_type_id == 3){
            //                        return $model->project_type_id == 3;  
            //                      }
            //                      if($model->project_type_id == 7){
            //                        return $model->project_type_id == 7;  
            //                      }
                                 
            //                      if($model->project_type_id == 5){
            //                        return $model->project_type_id == 5;  
            //                      }
            //                      if($model->project_type_id == 9){
            //                        return $model->project_type_id == 9;  
            //                      }
                                                                 
				 
		        //  	 }, 'whenClient' => "function (attribute, value) {
            //                          if($('#project_type').val() == '3'){
            //                          return $('#project_type').val() == '3';
            //                          }
                                     
            //                          if($('#project_type').val() == '7'){
            //                          return $('#project_type').val() == '7';
            //                          }
                                     
            //                          if($('#project_type').val() == '5'){
            //                          return $('#project_type').val() == '5';
            //                          }                                     
            //                          if($('#project_type').val() == '9'){
            //                          return $('#project_type').val() == '9';
            //                          }
                                     
                        
            //              }"],                   
                                         
            // [['available_date'] ,'required','when'=>function($model){
                                 
            //                        return $model->available_from == 'Date'; 
				 
		        //  	 }, 'whenClient' => "function (attribute, value) {
                                     
            //                          return $('#radioavailable').val() == 'Date';
                                 
            //              }"],        
                
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
            'project_name' => 'Project Name',
            'project_type_id' => 'Project Type ID',
            'request_for' => 'Request For',
            'featured_image' => 'Featured Image',
            'featured_video' => 'Featured Video',
            'city' => 'City',
            'locality' => 'Locality',
            'address' => 'Address',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
           
            
            'expected_price' => 'Expected Price',
            'price_sq_ft' => 'Price Sq Ft',
            'price_acres' => 'Price Acres',
            'all_inclusive_price' => 'All Inclusive Price',
            'asking_rental_price' => 'Asking Rental Price',
            'price_negotiable' => 'Price Negotiable',
            'revenue_lauout' => 'Revenue Lauout',
            'present_status' => 'Present Status',
			'status'=>'Status',
            'jurisdiction_development' => 'Jurisdiction Development',
            'shed_RCC' => 'Shed  Rcc',
            'maintenance_cost' => 'Maintenance Cost',
            'maintenance_by' => 'Maintenance By',
            'annual_dues_payable' => 'Annual Dues Payable',
            'expected_rental' => 'Expected Rental',
            'availability' => 'Availability',
            'age_of_property' => 'Age Of Property',
            'possesion_by' => 'Possession By',
            'transaction_type' => 'Transaction Type',
            'ownership' => 'Ownership',
            'facing' => 'Facing',
            'FAR_approval' => 'Far Approval',
            'LOAN_taken' => 'Loan Taken',
            'buildup_area' => 'Buildup Area',
            'build_unit' => 'Build Unit',
            'carpet_area' => 'Carpet Area',
            'carpet_unit' => 'Carpet Unit',
            'total_floors' => 'Total Floors',
            'property_on_floor' => 'Property On Floor',
            'configuration' => 'Configuration',
            'floors_allowed_construction' => 'Floors Allowed Construction',
            'bedrooms' => 'Bedrooms',
            'bathrooms' => 'Bathrooms',
            'balconies' => 'Balconies',
            'pooja_room' => 'Pooja Room',
            'study_room' => 'Study Room',
            'servant_room' => 'Servant Room',
            'other_room' => 'Other Room',
            'furnished_status' => 'Furnishing Status',
            'parking' => 'Reserved Parking',
            'is_active' => 'Is Active',
            'created_date' => 'Created Date',
        ];
    }
    
       

          public function getPictogramsID() {
        $ids = [];
        $pictogramsID = MediaFilesConfig::find()->where(['property_id' => $this->id])->all();
        foreach ($pictogramsID as $picID) {
            $ids[] = $picID->media_id;
        }

        return $ids; // returning all three ids
    }

    public function getPictogramPath() {

        $pic = [];
        $pictogramsID = MediaFiles::find()->where(['id' => $this->getPictogramsID()])->all();
        foreach ($pictogramsID as $picID) {
            $pic[] = $picID->file_name;
        }
        return $pic;
    }

    public function getPictogramUrl() {
        $url = [];
        foreach ($this->getPictogramPath() as $path):
            $url[] = Yii::getAlias('@archiveUrl') . '/propertydefaultimg/' . $path;
        endforeach;
        return $url; // returning al urls
    }


     public function getCircleDistance(
                                  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
    
}
