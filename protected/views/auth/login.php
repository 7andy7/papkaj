<!--<div class="row">
    <span class="label label-default">Default</span>
    <span class="label label-primary">Primary</span>
    <span class="label label-success">Success</span>
    <span class="label label-info">Info</span>
    <span class="label label-warning">Warning</span>
    <span class="label label-danger">Danger</span>
</div>-->

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
        'action' => yii::app()->createUrl('auth/login'),
    )); ?>
<div class="row">
    <div class="container col-md-6 col-md-offset-3">  
        
        <div id="signupbox" class="mainbox ">   
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <div class="panel-title">Prihlásenie<span class="pull-right"><a href="<?php echo yii::app()->createUrl("auth/forgottenPassword")?>" >Zabudli ste heslo?</a></span></div>
                    
                </div>  

                <div class="panel-body" >

                    <div class="form-group col-md-12 <?php echo $loginForm->getError('username') ? 'has-error' : '';?>">
                        <?php echo $form->labelEx($loginForm,'username',array( 'label'=>'Email')); ?>
                        <?php echo $form->textField($loginForm,'username',array( 'class'=>'form-control')); ?>
                        <?php if ($loginForm->getError('username')) : ?>
                            <span class="help-block">
                               <?php echo $form->error($loginForm,'username'); ?>
                           </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group col-md-12 <?php echo $loginForm->getError('password') ? 'has-error' : '';?>">
                        <?php echo $form->labelEx($loginForm,'password',array( 'label'=>'Heslo')); ?>
                        <?php echo $form->passwordField($loginForm,'password',array( 'class'=>'form-control')); ?>
                        <?php if ($loginForm->getError('password')) : ?>
                            <span class="help-block">
                               <?php echo $form->error($loginForm,'password'); ?>
                           </span>
                        <?php endif; ?>
                    </div>

                   <div class="form-group col-md-12">
                        <?php echo $form->labelEx($loginForm,'rememberMe',array('class'=>'col-md-5 control-label text-right')); ?>
                        <div class="col-md-7">
                            <?php echo $form->checkBox($loginForm,'rememberMe'); ?>
                        </div>
                    </div>


                    <div class="col-md-3 pull-right ">
                        <input type="submit" class="btn btn-primary" value="Prihlásiť">
                    </div>

                </div>
            </div>
        </div>
            </div>
    </div>

<?php $this->endWidget(); ?>