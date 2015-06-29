<!--<div class="row">
    <span class="label label-default">Default</span>
    <span class="label label-primary">Primary</span>
    <span class="label label-success">Success</span>
    <span class="label label-info">Info</span>
    <span class="label label-warning">Warning</span>
    <span class="label label-danger">Danger</span>
</div>-->

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgottenPassword-form',
        'action' => yii::app()->createUrl('auth/forgottenPassword'),
    )); ?>

<div class="row">
    <div class="container col-md-6 col-md-offset-3">  
        
        <div id="signupbox" class="mainbox ">   
            <div class="panel panel-primary">
                <?php var_dump( $form->errorSummary($user));?>
                <div class="panel-heading">
                    <div class="panel-title">Zabudnuté heslo</div>
                    
                </div>  

                <div class="panel-body" >

                    <div class="form-group col-md-12 <?php echo $user->getError('email') ? 'has-error' : '';?>">
                        <?php echo $form->labelEx($user,'email'); ?>
                        <?php echo $form->textField($user,'email',array( 'class'=>'form-control')); ?>
                        <?php if ($user->getError('email')) : ?>
                            <span class="help-block">
                               <?php echo $form->error($user,'email'); ?>
                           </span>
                        <?php endif; ?>
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