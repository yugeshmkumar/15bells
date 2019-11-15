<?php

namespace frontend\modules\api\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $aliasname
 * @property string $auth_key
 * @property string $access_token
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $oauth_client
 * @property string $oauth_client_user_id
 * @property string $email
 * @property string $mobile
 * @property string $countrycode
 * @property integer $free_site_visit
 * @property string $otp
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $logged_at
 * @property string $fullname
 * @property string $lastname
 *
 * @property Article1[] $article1s
 * @property Article1[] $article1s0
 * @property Category[] $categories
 * @property CategorySubcategory[] $categorySubcategories
 * @property Communication[] $communications
 * @property Csq[] $csqs
 * @property GroupUsers[] $groupUsers
 * @property Question[] $questions
 * @property Respone[] $respones
 * @property ResponseConfig[] $responseConfigs
 * @property ReverseTransaction[] $reverseTransactions
 * @property Subcategory[] $subcategories
 * @property Survey[] $surveys
 * @property SurveyRecurringConfig[] $surveyRecurringConfigs
 * @property SurveyRespondents[] $surveyRespondents
 * @property SurveyRespondents[] $surveyRespondents0
 * @property SurveyType[] $surveyTypes
 * @property Template[] $templates
 * @property TemplateQuestions[] $templateQuestions
 * @property Transaction[] $transactions
 * @property UserProfile $userProfile
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aliasname', 'otp', 'fullname'], 'string'],
            [['auth_key', 'access_token', 'password_hash', 'email'], 'required'],
            [['free_site_visit', 'status', 'created_at', 'updated_at', 'logged_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['access_token'], 'string', 'max' => 40],
            [['password_hash', 'password_reset_token', 'oauth_client', 'oauth_client_user_id', 'email'], 'string', 'max' => 255],
            [['mobile', 'countrycode'], 'string', 'max' => 100],
            [['lastname'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'aliasname' => 'Aliasname',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'oauth_client' => 'Oauth Client',
            'oauth_client_user_id' => 'Oauth Client User ID',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'countrycode' => 'Countrycode',
            'free_site_visit' => 'Free Site Visit',
            'otp' => 'Otp',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'logged_at' => 'Logged At',
            'fullname' => 'Fullname',
            'lastname' => 'Lastname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle1s()
    {
        return $this->hasMany(Article1::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle1s0()
    {
        return $this->hasMany(Article1::className(), ['updater_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorySubcategories()
    {
        return $this->hasMany(CategorySubcategory::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunications()
    {
        return $this->hasMany(Communication::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsqs()
    {
        return $this->hasMany(Csq::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupUsers()
    {
        return $this->hasMany(GroupUsers::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespones()
    {
        return $this->hasMany(Respone::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponseConfigs()
    {
        return $this->hasMany(ResponseConfig::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReverseTransactions()
    {
        return $this->hasMany(ReverseTransaction::className(), ['sellor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategories()
    {
        return $this->hasMany(Subcategory::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveys()
    {
        return $this->hasMany(Survey::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyRecurringConfigs()
    {
        return $this->hasMany(SurveyRecurringConfig::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyRespondents()
    {
        return $this->hasMany(SurveyRespondents::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyRespondents0()
    {
        return $this->hasMany(SurveyRespondents::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyTypes()
    {
        return $this->hasMany(SurveyType::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplates()
    {
        return $this->hasMany(Template::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplateQuestions()
    {
        return $this->hasMany(TemplateQuestions::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['buyer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
    }
}
