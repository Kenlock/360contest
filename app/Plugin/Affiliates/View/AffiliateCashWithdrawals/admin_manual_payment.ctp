<?php /* SVN: $Id: edit.ctp 54285 2011-05-23 10:16:38Z aravindan_111act10 $ */ ?>
<div class="affiliateCashWithdrawals form">
<?php echo $this->Form->create('AffiliateCashWithdrawal', array('action' => 'admin_manual_payment', 'class' => 'normal'));?>
  <fieldset>
     <h2><?php echo __l('Manual Payment');?></h2>
  <?php
    echo $this->Form->input('id',array('label' => __l('Id')));
    echo $this->Form->input('description',array('type' => 'textarea', 'label' => __l('Description')));
  ?>
  </fieldset>
   <div class="form-actions">">
    <?php echo $this->Form->end(__l('Pay'));?>
  </div>
</div>
