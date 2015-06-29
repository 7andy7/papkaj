<!--<div class="row">
    <span class="label label-default">Default</span>
    <span class="label label-primary">Primary</span>
    <span class="label label-success">Success</span>
    <span class="label label-info">Info</span>
    <span class="label label-warning">Warning</span>
    <span class="label label-danger">Danger</span>
</div>-->

 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form',
        'action' => yii::app()->createUrl('auth/registration'),
    )); ?>
   
<div class="row">
    <div class="container col-md-6 col-md-offset-3">  
        <div id="signupbox" class="mainbox ">   
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <div class="panel-title">Registrácia</div>
                </div>  

                <div class="panel-body" >
                    <div class="row">
                        <div class="form-group col-md-6 <?php echo $user->getError('firstName') ? 'has-error' : '';?>">
                            <?php echo $form->labelEx($user,'firstName',array( 'label'=>'Meno')); ?>
                            <?php echo $form->textField($user,'firstName',array( 'class'=>'form-control')); ?>
                            <?php if ($user->getError('firstName')) : ?>
                                <span class="help-block">
                                   <?php echo $form->error($user,'firstName'); ?>
                               </span>
                            <?php endif; ?>
                        </div>
                    

                        <div class="form-group col-md-6 <?php echo $user->getError('surName') ? 'has-error' : '';?>">
                            <?php echo $form->labelEx($user,'surName',array( 'label'=>'Priezvisko')); ?>
                            <?php echo $form->textField($user,'surName',array( 'class'=>'form-control')); ?>
                            <?php if ($user->getError('surName')) : ?>
                                <span class="help-block">
                                   <?php echo $form->error($user,'surName'); ?>
                               </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 <?php echo $user->getError('email') ? 'has-error' : '';?>">
                            <?php echo $form->labelEx($user,'email',array( 'label'=>'Email')); ?>
                            <?php echo $form->textField($user,'email',array( 'class'=>'form-control')); ?>
                            <?php if ($user->getError('email')) : ?>
                                <span class="help-block">
                                   <?php echo $form->error($user,'email'); ?>
                               </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group col-md-6 <?php echo $user->getError('password') ? 'has-error' : '';?>">
                            <?php echo $form->labelEx($user,'password',array( 'label'=>'Heslo')); ?>
                            <?php echo $form->passwordField($user,'password',array( 'class'=>'form-control')); ?>
                            <?php if ($user->getError('password')) : ?>
                                <span class="help-block">
                                   <?php echo $form->error($user,'password'); ?>
                               </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="form-group col-md-6 <?php echo $user->getError('city') ? 'has-error' : '';?>">
                            <?php echo $form->labelEx($user,'city',array( 'label'=>'Mesto')); ?>
                            <?php echo $form->textField($user,'city',array( 'class'=>'form-control')); ?>
                            <?php if ($user->getError('city')) : ?>
                                <span class="help-block">
                                   <?php echo $form->error($user,'city'); ?>
                               </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group col-md-6 <?php echo $user->getError('phoneNumber') ? 'has-error' : '';?>">
                            <?php echo $form->labelEx($user,'phoneNumber',array( 'label'=>'Telefónne číslo')); ?>
                            <?php echo $form->textField($user,'phoneNumber',array( 'class'=>'form-control')); ?>
                            <?php if ($user->getError('phoneNumber')) : ?>
                                <span class="help-block">
                                   <?php echo $form->error($user,'phoneNumber'); ?>
                               </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo $form->labelEx($user,'newsLetter',array('label'=>'Zasielať novinky?')); ?>
                                <?php echo $form->checkBox($user,'newsLetter'); ?>
                            <?php if ($user->getError('newsLetter')) : ?>
                                <span class="help-block">
                                   <?php echo $form->error($user,'newsLetter'); ?>
                               </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-3 pull-right ">
                            <input type="submit" class="btn btn-primary" value="Registrovať">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
