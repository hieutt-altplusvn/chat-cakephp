<div class="container">
    
    <?php 
    echo $this->Form->create('User', array(
                    'class' => 'form-signin'
                )
    );
    echo '<h3 class="form-signin-heading">Register</h3>';
    echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username', 'label' => false));
    echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email', 'label' => false));
    echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password', 'label' => false));
    ?>
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Agree with term
    </label>
        <?php
    echo $this->Form->submit(__('Register',true), array('class'=>'btn btn-lg btn-primary btn-block')); 

    echo '<a href="register">Forgot your password?</a>';
    
    echo $this->Session->flash('register');
    echo $this->Form->end();
    ?>
</div>