<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\assets\FontAsset;



FontAsset::register($this);
/*$this->title = 'Contact';*/
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>


        <!-- Contact Section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Contact Us</h2>
                        <h3 class="section-subheading text-muted">Feel free to leave a suggestion or any matter.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder'=>"Enter Your Name"]) ?>
                                    </div>
                                    <div class="form-group">
                                        <?= $form->field($model, 'email')->textInput()->input('email',
                                            ['placeholder' => "Enter Your Email"]) ?>
                                    </div>
                                    <div class="form-group">
                                        <?= $form->field($model, 'subject')->textInput()->input('text',
                                            ['placeholder' => "Your Subject"]) ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?= $form->field($model, 'body')->textarea(['rows' => 6,'placeholder'=>"Enter your message Here"])?>
                                    </div>
                                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                    ]) ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">

                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-xl">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


                <?php ActiveForm::end(); ?>

            </div>

    <?php endif; ?>
</div>
