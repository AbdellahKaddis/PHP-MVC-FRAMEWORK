
    <h1>Create an Account</h1>
    <?php $form = \app\core\form\Form::begin("","post")?>
        <div class="row">
            <div class="col">
            <?php echo $form->field($model,"firstname")?>
            </div>
            <div class="col">
            <?php echo $form->field($model,"lastname")?>
            </div>
        </div>
        
        <?php echo $form->field($model,"email")?>
        <?php echo $form->field($model,"password")->passwordField()?>
        <?php echo $form->field($model,"confirmPassword")->passwordField()?>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?php $form = \app\core\form\Form::end()?>
<!-- <form action="" method="post">
    <div class="mb-3">
        <div class="row">
            <div class="mb-3 col">
                <label>FirstName</label>
                <input type="text" name="firstName" class="form-control" >
            </div>
            
            <div class="mb-3 col">
                <label>LastName</label>
                <input type="text" name="lastName" class="form-control" >
            </div>
        </div>

        

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" >
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control" >
        </div>

        
    </div>
</form> -->
